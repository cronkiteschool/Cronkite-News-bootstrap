<?php

/* * *********************************************************
 * Row [row][/row]
 * ********************************************************* */
function row( $params, $content=null ) {
    extract( shortcode_atts( array(
        'class' => 'row'
    ), $params ) );
    $content = preg_replace( '/<br class="nc".\/>/', '', $content );
    $result = '<div class="' . $class . '">';
    $result .= do_shortcode( $content );
    $result .= '</div>';
    return force_balance_tags( $result );
}
add_shortcode('row', 'row');


/* * *********************************************************
 * Columns [col class="col-xs-12 col-sm-8"]...[/col]
 * ********************************************************* */
function span( $params, $content=null ) {
    extract( shortcode_atts( array(
        'class' => 'col-xs-1'
        ), $params ) );

    $result = '<div class="' . $class . '">';
    $result .= do_shortcode( $content );
    $result .= '</div>';
    return force_balance_tags( $result );
}
add_shortcode( 'col', 'span' );



/* * *********************************************************
 * Accordion 
 * ********************************************************* */

/* --------------------------------------------
 
[collapse id="collapse_1518-cfde"]
[collapse_item title="Collapsible Group Item 1" id="citem_5aff-6d94" parent="collapse_1518-cfde"]
Collapse content goes here....
[/collapse_item]
[collapse_item title="Collapsible Group Item 2" id="citem_aa73-9920" parent="collapse_1518-cfde"]
Collapse content goes here....
[/collapse_item]
[collapse_item title="Collapsible Group Item 3" id="citem_14a6-0798" parent="collapse_1518-cfde"]
Collapse content goes here....
[/collapse_item]
[/collapse]

-------------------------------------------- */


function collapse( $params, $content=null ){
    extract( shortcode_atts( array(
        'id'=>''
         ), $params ) );
    $content = preg_replace( '/<br class="nc".\/>/', '', $content );
    $result = '<div class="panel-group" id="' . $id . '">';
    $result .= do_shortcode( $content );
    $result .= '</div>';
    return force_balance_tags( $result );
}
add_shortcode( 'collapse', 'collapse' );


function citem( $params, $content=null ){
    extract( shortcode_atts( array(
        'id'=> '',
        'title'=> 'Collapse title',
        'parent' => ''
         ), $params ) );
    $content = preg_replace( '/<br class="nc".\/>/', '', $content );
    $result =  '<div class="panel panel-default">';
    $result .= '    <div class="panel-heading">';
    $result .= '        <h4 class="panel-title">';
    $result .= '<a class="accordion-toggle" data-toggle="collapse" data-parent="#' . $parent . '" href="#' . $id . '">';
    $result .= $title;
    $result .= '</a>';
    $result .= '        </h4>';
    $result .= '    </div>';
    $result .= '    <div id="' . $id . '" class="panel-collapse collapse">';
    $result .= '        <div class="panel-body">';
    $result .= do_shortcode( $content );
    $result .= '        </div>';
    $result .= '    </div>';
    $result .= '</div>';
    return force_balance_tags( $result );
}
add_shortcode('collapse_item', 'citem' );


/* * *********************************************************
 * Tabs
 * ********************************************************* */

/*--------------
[tabs]
    [thead]
        [tab href="#link" title="title"]
        [dropdown title="title"]
            [tab href="#link" title="title"]
        [/dropdown]
    [/thead]
    [tab_contents]
        [tab_content id="link"]
        [/tab_content]
    [/tab_contents]
[/tabs]
---------------*/


/*-------------------
 
[tabs]
[thead]
[tab class="active" type="tab" href="#one" title="First Tab"]
[tab class="" type="tab" href="#two" title="Second Tab"]
[tab class="" type="tab" href="#three" title="Third Tab"]
[/thead]
[tab_contents]
[tab_content class="active" id="one"]Aliquip placeat salvia cillum iphone. Seitan autcher voluptate nisi qui.[/tab_content]
[tab_content class="" id="two"] sedtr, sedoluptugren, no sea takimata sanctus est Lorem ipsum dolor sit amet.[/tab_content]
[tab_content class="" id="three"]ita kasd gubergren, no sea takimata sanctus est Lolrem ipsum dolor sit amet.[/tab_content]
[/tab_contents]
[/tabs]
  
------------------------- */

function tabs( $params, $content=null ){
    $content = preg_replace( '/<br2 class="nc".\/>/', '', $content );
    $result = '<div class="tab_wrap">';
    $result .= do_shortcode( $content );
    $result .= '</div>';
    return force_balance_tags( $result );
}
add_shortcode( 'tabs', 'tabs' );

function thead( $params, $content=null) {
    $content = preg_replace( '/<br2 class="nc".\/>/', '', $content );
    $result = '<ul class="nav nav-tabs">';
    $result .= do_shortcode( $content );
    $result .= '</ul>';
    return force_balance_tags( $result );
}
add_shortcode( 'thead', 'thead' );

function tab( $params, $content=null ) {
    extract( shortcode_atts( array(
        'href' => '#',
        'title' => '',
        'class' => ''
        ), $params ) );
    $content = preg_replace( '/<br2 class="nc".\/>/', '', $content );

    $result = '<li class="' . $class . '">';
    $result .= '<a data-toggle="tab" href="' . $href . '">' . $title . '</a>';
    $result .= '</li>';
    return force_balance_tags( $result );
}
add_shortcode( 'tab', 'tab' );

function dropdown( $params, $content=null ) {
    global $bs_timestamp;
    extract( shortcode_atts( array(
        'title' => '',
        'id' => '',
        'class' => '',
        ), $params ) );
    $content = preg_replace( '/<br2 class="nc".\/>/', '', $content );
    $result = '<li class="dropdown">';
    $result .= '<a class="' . $class . '" id="' . $id . '" class="dropdown-toggle" data-toggle="dropdown">' . $title . '<b class="caret"></b></a>';
    $result .= '<ul class="dropdown-menu">';
    $result .= do_shortcode( $content );
    $result .= '</ul></li>';
    return force_balance_tags( $result );
}
add_shortcode( 'dropdown', 'dropdown' );

function tcontents( $params, $content=null ) {
    $content = preg_replace( '/<br2 class="nc".\/>/', '', $content );
    $result = '<div class="tab-content">';
    $result .= do_shortcode( $content );
    $result .= '</div>';
    return force_balance_tags( $result );
}
add_shortcode( 'tab_contents', 'tcontents' );

function tcontent( $params, $content=null ) {
    extract(shortcode_atts(array(
        'id' => '',
        'class'=>'',
        ), $params ) );
    $content = preg_replace( '/<br2 class="nc".\/>/', '', $content );
    $class = ($class=='active')? 'active in': '';
    $result = '<div class="tab-pane fade ' . $class . '" id=' . $id . '>';
    $result .= do_shortcode( $content );
    $result .= '</div>';
    return force_balance_tags( $result );
}
add_shortcode( 'tab_content', 'tcontent' );

