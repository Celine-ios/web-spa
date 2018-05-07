<?php

namespace App\Http\Controllers\ApiRest;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\ProductBrand;
use App\Product;
use App\ProductCategory;
use App\ProductSubcategory;
use App\ProductTag;
use App\PushSubscription;

use App\Models\Caracteristic;
use App\Models\CaracteristicCategory;

use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;
use Cart;

class ApiController extends Controller{
	public function carga_procesador($procesador, Request $request){
		$processor = Product::where('slug', $procesador)
		->with(['discounts' => function ($query){
			$query->where('estado', 1)
			->where('fecha_fin', '>', date('Y-m-d 00:00:00'))
			->where('codigo', null)
			->where('tipo_cupon', 'normal')
			->select('id','discount')
			->orderBy('discount', 'desc')
			->orderBy('created_at', 'desc');
		}, 'images'])->first();
		$processor = $this->formato_productos($processor);


		$product = Product::whereHas('product_categories', function($query){
			$query->whereIn('nombre', ['BOARD / PLACA MADRE']);
		})
		// ->whereHas('product_dependency', function ($query2) use ($processor){
		// 	$query2->where('title', $processor->title);
		// })
		->where('published', 1)
		->where('quantity', '>', 0)
		->where('processor_type', $processor->processor_type)
		->select('title', 'slug')->get();

		if (count($product) > 0) {
			return \Response::json(['product' => $product, 'processor' => $processor], 200);
		} else {
			return \Response::json(['response' => 'No se encuentran productos relacionados', 'processor' => $processor], 404);
		}
	}

	public function carga_board($tboard, Request $request){
		$board = Product::where('slug', $tboard)
		->with(['discounts' => function ($query){
			$query->where('estado', 1)
			->where('fecha_fin', '>', date('Y-m-d 00:00:00'))
			->where('codigo', null)
			->where('tipo_cupon', 'normal')
			->select('id','discount')
			->orderBy('discount', 'desc')
			->orderBy('created_at', 'desc');
		}, 'images'])->first();
		$board = $this->formato_productos($board);


		$product = Product::whereHas('product_categories', function($query){
			$query->whereIn('nombre', ['MEMORIAS RAM']);
		})
		// ->whereHas('product_dependency', function ($query2) use ($processor){
		// 	$query2->where('title', $processor->title);
		// })
		->where('published', 1)
		->where('quantity', '>', 0)
		->whereIn('processor_type', ['n/a', $board->processor_type])
		->select('title', 'slug')->get();

		if (count($product) > 0) {
			return \Response::json(['product' => $product, 'board' => $board], 200);
		} else {
			return \Response::json('No se encuentran productos relacionados', 404);
		}
	}

	public function carga_ram($ram, Request $request){
		$ram = Product::where('slug', $ram)
		->with(['discounts' => function ($query){
			$query->where('estado', 1)
			->where('fecha_fin', '>', date('Y-m-d 00:00:00'))
			->where('codigo', null)
			->where('tipo_cupon', 'normal')
			->select('id','discount')
			->orderBy('discount', 'desc')
			->orderBy('created_at', 'desc');
		}, 'images'])->first();
		$ram = $this->formato_productos($ram);

		if (count($ram) > 0) {
			return \Response::json(['ram' => $ram], 200);
		} else {
			return \Response::json(['response' => 'No se encuentran productos relacionados'], 404);
		}
	}

	public function add_tags(Request $request){
		$new_tags = [];
		$tags = explode(',', $request->get('tags'));

		foreach ($tags as $tag) {
			if (!empty(trim($tag))) {
				$new_tag = ProductTag::where('nombre', trim($tag))->first();
				if ($new_tag) {
					$push = array_push($new_tags, ['id' => $new_tag->id, 'nombre' => $new_tag->nombre]);
				} else {
					$new_tag = ProductTag::create(['nombre' => trim($tag)]);
					$push = array_push($new_tags, ['id' => $new_tag->id, 'nombre' => $new_tag->nombre]);
				}
			}
		}
		return \Response::json(['new' => $new_tags], 200);
	}

	public function add_caracteristics(Request $request){
		$new_tags = [];
		$tags = explode(',', $request->get('caracteristics'));
		foreach ($tags as $tag) {
			if (!empty(trim($tag))) {
				$new_tag = Caracteristic::where('name_caracteristic', trim($tag))->first();
				if ($new_tag) {
					$push = array_push($new_tags, ['id' => $new_tag->id_caracteristic, 'nombre' => $new_tag->name_caracteristic]);
				} else {
					$new = new  Caracteristic;
					$new->name_caracteristic  = trim($tag);
					$new->save();
					$last = Caracteristic::all()->last();
					$push = array_push($new_tags, ['id' => $last->id_caracteristic, 'nombre' => $last->name_caracteristic]);
				}
			}
		}
		return \Response::json(['new' => $new_tags], 200);
	}

	public function product_addon($id){
		$product = Product::find($id);

		if (count($product) > 0) {
			$addons = [];
			if (!is_null($product->product_categories)) {
				$addons['categories'] = $product->product_categories->lists('id');
			} else {
				$addons['categories'] = $product->product_categories;
			}

			if (!is_null($product->tags)) {
				$addons['tags'] = $product->tags->lists('id');
			} else {
				$addons['tags'] = $product->tags;
			}

			if (!is_null($product->dependencies)) {
				$addons['dependencies'] = $product->dependencies->lists('id');
			} else {
				$addons['dependencies'] = [];
			}

			return \Response::json($addons, 200);
		} else {
			return \Response::json([], 404);
		}
	}

	public function search_product(Request $request){
		$board = Product::where('slug', 'LIKE', '%'.$request->term.'%')->where('published', 1)->select('id', 'title as value', 'slug')->get();

		return \Response::json($board, 200);
	}

	public function push_post(Request $request){
		$subscription = PushSubscription::where('token', $request->token)
		->where('tipo_archivo', $request->user_type)
		->first();

		if (!$subscription) {
			$subscription = PushSubscription::create($request->all());

			$optionBuilder = new OptionsBuilder();
			$optionBuilder->setTimeToLive(60*20);

			$url = ($request->tipo_archivo == 'user' ? url('/') : url('admin/home'));

			$notificationBuilder = new PayloadNotificationBuilder('Tauret Computadores');
			$notificationBuilder->setBody('Has quedado suscrito, desde ahora te llegarán notificaciones sobre la tienda')
			->setIcon(url('images/icono.png'))
			->setClickAction($url)
			->setSound('default');

			$dataBuilder = new PayloadDataBuilder();
			$dataBuilder->addData(['a_data' => 'my_data']);

			$option       = $optionBuilder->build();
			$notification = $notificationBuilder->build();
			$data         = $dataBuilder->build();

			$downstreamResponse = FCM::sendTo($request->token, $option, $notification, $data);

			$downstreamResponse->numberSuccess();
			$downstreamResponse->numberFailure();
			$downstreamResponse->numberModification();

			$downstreamResponse->tokensToDelete(); 
			$downstreamResponse->tokensToModify(); 
			$downstreamResponse->tokensToRetry();

			return \Response::json('Has quedado suscrito, te llegarán notificaciones sobre la tienda', 200);
		}
	}

	private function formato_productos($product){
		if(count($product->discounts) > 0) {
			$discount_price    = ceil($product->price - ($product->price * ($product->discounts->first()->discount / 100)));
			$product->tax      = ($product->tax ? $discount_price * 0.19 : 0);
			$product->price    = cop_format($discount_price);
			$product->nf_price = $discount_price;
		} else {
			$product->nf_price = ceil($product->price);
			$product->price    = cop_format($product->price);
		}
		$product->image = $product->images->first()['link_imagen'];

		return $product;
	}

	public function get_brands(){
		$brands = ProductBrand::where('estado', 1)->select('id as value', 'nombre as text')->orderBy('text', 'asc')->get();

		return $brands;
	}

	public function get_products(){
		$brands = Product::where('published', 1)->select('id as value', 'title as text')->orderBy('text', 'asc')->get();

		return $brands;
	}

	public function getcaracteristics(Request $request)
	{
		$caracteristics = [];
		foreach($request->categories as $idCategory)
		{
			$category = ProductSubcategory::find($idCategory);
			$categoryCaracteristics = $category->categoryCaracteristics;
			foreach($categoryCaracteristics as $categorycaracteristic)
			{
				if(!in_array($categorycaracteristic->category_name,$caracteristics))
				{
					$caracteristics[$categorycaracteristic->category_name] =array('name'=>$categorycaracteristic->category_name,"id"=>$categorycaracteristic->id_caracteristic_category);

				}
			}

		}
		return \Response::json($caracteristics);
	}

	public function geteachcaracteristic(Request $request)
	{
		$categorycaracteristic = CaracteristicCategory::find($request->id);

		$options = [];
		foreach($categorycaracteristic->caracteristics as $caracteristic)
		{
			array_push($options, array('id'=>$caracteristic->id_caracteristic,
										'name'=>$caracteristic->name_caracteristic));

		}

		return \Response::json($options);

	}
}
