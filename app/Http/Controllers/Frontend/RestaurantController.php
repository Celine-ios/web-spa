<?php 

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
* 
*/
class RestaurantController extends Controller
{
	
	function index() {


			return view('user.restaurant');

	}
}

 ?>