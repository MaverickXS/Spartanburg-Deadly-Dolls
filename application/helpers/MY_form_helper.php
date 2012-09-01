<?
function draw_prepend_icon($icon, $input, $white = false){
    $result = '';
    if (trim($icon . '') != ''){
        $white_icon = '';
        if ($white){
            $white_icon = ' icon-white';
        }
        $result = '<div class="input-prepend"><span class="add-on"><i class="icon-' . $icon . $white_icon . '"></i></span>' . $input . '</div>';
	}
    return $result;
}
