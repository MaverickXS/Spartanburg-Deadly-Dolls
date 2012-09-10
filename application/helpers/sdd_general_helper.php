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

// Facebook API
function get_fb_access_token(){
    // Get FB Access Token
    $url    = 'https://graph.facebook.com/oauth/access_token?client_id=277754392334380&client_secret=60bdee57edf5d5c7a27da109d543fbab&grant_type=client_credentials';
    $ch     = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    $fb_access_token = str_ireplace('access_token=', '', $output);

    return $fb_access_token;
}

function get_fb_events(){
    $return_array       = array();
    $fb_access_token    = get_fb_access_token();

    // Get events
    $url    = 'https://graph.facebook.com/spddolls/events?access_token=' . $fb_access_token; // SDD
    //$url  = 'https://graph.facebook.com/576061663/events?access_token=' . $fb_access_token; // Me
    $ch     = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);

    // Convert response
    $fb_json = json_decode($output);

    // Handle Output
    if (curl_getinfo($ch, CURLINFO_HTTP_CODE)==200){
        if (count($fb_json) > 0 && strlen($output) > 11){
            $fb_event_array = $fb_json->data;
            if (count($fb_event_array) > 0){
                foreach ($fb_event_array as $event){
                    $return_array[$event->id] = array('start_time' => $event->start_time, 'name' => $event->name, 'location' => $event->location);
                }
            }
        }
    }
    curl_close($ch);

    asort($return_array);
    return $return_array;
}
?>