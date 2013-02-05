<?php 

/**
 * Shortcodes
 *
 * => Buttons [btn]
 * => Info boxes [info]
 * => Icon links [link]
 * => Horizontal rule [hr]
 *
 */
    

/**
 * Buttons
 */
 
add_shortcode('btn', 'ts_btn');

function ts_btn($atts) {

    extract(shortcode_atts(array(
        'label'     => 'Your Linktext',
        'link'     => '1',
        'url'    => '',
        'p'        => 'true',
        'size'    => '',
        'icon'    => '',
        'color' => '',
        'target'    => '',
        'title' => ''
    ), $atts));
    
    $link = $url ? $url : get_permalink($link);
    $size = ($size=='big') ? ' btn-big' : '';
    $color = ($color) ? ' style="background-color:'.$color.'"' : '';
    $icon = ($icon) ? '<span class="span-icon icon-'.$icon.'"></span>' : '';
    $icon_class = ($icon) ? ' btn-icon' : '';
    if($target=='_blank') :
    	$target='target="_blank"';
    elseif($target=='lightbox') :
    	$target =' rel="prettyPhoto"';
    endif;
 	if($title) $title = ' title="'.$title.'"';
    
    if($p!='false') :
    	return wpautop('<a href="'.$link.'" class="btn'.$size.$icon_class.'" '.$target.$color.$title.'>'.$icon.$label.'</a>');
    else :
    	return '<a href="'.$link.'" class="btn'.$size.$icon_class.'" '.$target.$color.$title.'>'.$icon.$label.'</a>';
    endif;
}


/**
 * Info boxes
 */
 
add_shortcode('info', 'ts_info');

function ts_info($atts, $content = null) {
    extract(shortcode_atts(array(
        'icon'    => '',
        'width'    => ''
    ), $atts));
    
    $icon = ($icon) ? '<span class="icon-'.$icon.'"></span>' : '';
    $icon_class = ($icon) ? ' info-icon' : '';
    
    return '<div class="ts-info'.$icon_class.'" style="width:'.$width.'"><div class="ts-info-inner">'.$icon.$content.'</div></div>';
}


/**
 * Icon links
 */
 
add_shortcode('link', 'ts_link');

function ts_link($atts, $content = null) {

    extract(shortcode_atts(array(
    	'label'     => 'Your Linktext',
        'icon'    => '',
        'link'     => '1',
        'url'    => '',
        'target'    => ''
    ), $atts));
    
    $link = $url ? $url : get_permalink($link);
    if($target=='_blank') : $target='target="_blank"'; elseif($target=='lightbox') : $target='rel="prettyPhoto"'; else : $target=''; endif;
    
    return '<a href="'.$link.'" class="ts-link icon-'.$icon.'" '.$target.'>'.$label.'</a>';
}

/**
 * Horizontal rule
 */
 
add_shortcode('hr', 'ts_hr');

function ts_hr($atts) {
    extract(shortcode_atts(array(
        'height'    => '1'
    ), $atts));
    
    return '<div class="ts-hr" style="height:'.$height.'px"></div>';
}

?>