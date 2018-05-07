<?php
// My common functions
function verify_link($file){
    $file_headers = @get_headers(url($file));

    if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
        return false;
    } else {
        return true;
    }
}

function slugify_text($text){
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    $text = preg_replace('~[^-\w]+~', '', $text);
    $text = trim($text, '-');
    $text = preg_replace('~-+~', '-', $text);
    $text = strtolower($text);

    if (empty($text)) {
        return 'n-a';
    }

    return $text;
}

function getTheDate($date){
    $dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

    $date = $dias[date('w', strtotime($date))]." ".date('d', strtotime($date))." de ".$meses[date('n', strtotime($date))-1]. " de ".date('Y', strtotime($date)). date(' h:i:s A', strtotime($date));

    return $date;
}

function array_multisort_by(&$array, $by, $sort = SORT_ASC){
    foreach($array as $key => $row){
        $tmp[$key] = $row[$by];
    }
    array_multisort($tmp, $sort, $array);    

    return $array;
}

function mb_ucfirst($string, $encoding = 'UTF-8'){
    $string = mb_strtolower($string, $encoding);
    return mb_convert_case($string, MB_CASE_TITLE, $encoding);
}

function word_on($str){
    $str = str_replace('_', ' ', $str);
    $str = mb_ucfirst($str);

    return $str;
}

function youtube_match($texto) {
    $url = urldecode(rawurldecode($texto));
    preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $url, $matches);

    if (is_array($matches) && isset($matches[1])) {
        return $matches[1];
    } else {
        return '';
    }
}

function cop_format($number){
    $fmt = new NumberFormatter( 'es_CO', NumberFormatter::CURRENCY );
    $number = ceil($number);

    return 'COP '.$fmt->formatCurrency($number, "COP");
}

function is_json($string) {
   json_decode($string);
   return (json_last_error() == JSON_ERROR_NONE);
}

function replace_r_n($string){
    $string = str_replace(array("\r\n", "\r", "\n"), " ", $string);
    return $string;
}



?>
