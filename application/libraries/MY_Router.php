<?php
class MY_Router extends CI_Router {

    function MY_Router(){
        parent::CI_Router();
    }

    function _validate_request($segments){
        // Does the requested controller NOT exist?
        if (!file_exists(APPPATH . 'controllers/' . $segments[0] . EXT)){
            $segments = array_merge(array("content", "index"), $segments);
        }

        return parent::_validate_request($segments);
    }
}
?>