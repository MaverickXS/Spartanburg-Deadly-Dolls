<?
// CodeIgniter/SDD specific
function get_controller_as_page_slug(){
    $ci =& get_instance();
    $controller_name = strtolower($ci->router->fetch_class());

    return $controller_name;
}

function get_qs_var($var){
    $return_val = '';

    if (isset($_GET[$var])){
        $return_val = trim($_GET[$var] . '');
    }

    return $return_val;
}

function is_edit(){
    $is_edit = false;
    $url_parts = explode('/', uri_string());

    $possible_key = trim($url_parts[(count($url_parts) - 1)] . '');
    if ($possible_key==''){
        $possible_key = trim($url_parts[(count($url_parts) - 2)] . '');
    }

    if (is_numeric($possible_key)){
        $is_edit = true;
    }

    return $is_edit;
}

?>