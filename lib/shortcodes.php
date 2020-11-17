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

function full_enter( $atts, $content = null ) {

    $result = "</div>";
    return $result;
}
add_shortcode ('fullscreenenter', 'full_enter');

function full_exit( $atts, $content = null ) {

    $result = '<div class="col-xs-12 col-md-offset-2 col-md-8">';
    return $result;
}
add_shortcode ('fullscreenexit', 'full_exit');

function fullsizeimage( $atts, $content = null ) {

    $result = "</div>";
    $result .= '<img style="width:100%;margin-bottom:15px; padding-top:20px;" src="' . $atts[ 'source' ] . '" class="img-responsive"><p class="wp-caption-text" style="margin-left:10px;font-style: italic;">' . $atts[ 'caption' ] . '</p> <div class="col-xs-12 col-md-offset-2 col-md-8">';

    return $result;
}
add_shortcode ('fullimage', 'fullsizeimage');

function fullsizeimage_slim( $atts, $content = null ) {

  if ($atts[ 'data-url' ]) {
    $sc1 = '<span class="soundcite" data-url="'.$atts[ 'data-url' ].'" data-start="'.$atts[ 'data-start' ].'" data-end="'.$atts[ 'data-end' ].'" data-plays="'.$atts[ 'data-plays' ].'">Listen</span>';
  }

    $result = "</div>";
    $result .= '<img style="width:100%;margin-bottom:15px; padding-top:20px;" src="' . $atts[ 'source' ] . '" class="img-responsive"><p class="wp-caption-text" style="margin-left:10px;font-style: italic;">' . $atts[ 'caption' ] . ' '.$sc1.'</p> <div class="col-xs-12 col-md-offset-3 col-md-6">';

    return $result;
}
add_shortcode ('fullimage-slim', 'fullsizeimage_slim');

function mediumsizeimage_slim( $atts, $content = null ) {

    $result = '</div><div class="col-xs-12 col-md-offset-2 col-md-8" style="padding-top:20px;">';
    $result .= '<img style="width:100%;margin-bottom:15px; padding-top:20px;" src="' . $atts[ 'source' ] . '" class="img-responsive"><p class="wp-caption-text" style="margin-left:10px;font-style: italic;">' . $atts[ 'caption' ] . '</p></div> <div class="col-xs-12 col-md-offset-3 col-md-6">';

    return $result;
}
add_shortcode ('mediumimage-slim', 'mediumsizeimage_slim');

function threeupcombo_slim( $atts, $content = null ) {

  if ($atts[ 'data-url1' ]) {
    $sc1 = '<span class="soundcite" data-url="'.$atts[ 'data-url1' ].'" data-start="'.$atts[ 'data-start1' ].'" data-end="'.$atts[ 'data-end1' ].'" data-plays="'.$atts[ 'data-plays1' ].'">Listen</span>';
  }

    $result = '</div><div class="col-xs-12 col-md-offset-1 col-md-10" style="padding-top:20px;">';
    $result .= '<img style="width:100%;margin-bottom:15px; padding-top:20px;" src="' . $atts[ 'source' ] . '" class="img-responsive"><p class="wp-caption-text" style="margin-left:10px;font-style: italic;">' . $atts[ 'caption' ] . ' '.$sc1.'</p></div> <div class="col-xs-12 col-md-offset-3 col-md-6">';

    return $result;
}
add_shortcode ('threeupcombobig-slim', 'threeupcombo_slim');

function img2up( $atts, $content = null ) {

    $result = '</div><div class="col-sm-5 col-sm-offset-1 col-xs-12" style="padding-bottom: 20px;"><div class="two-up-overlay">';
    $result .= '<img style="margin-bottom:5px; padding-top:20px;" src="' . $atts[ 'source1' ] . '"><p class="wp-caption-text" style="margin-left:10px;font-style: italic;">' . $atts[ 'caption1' ] . '</p>  </div> </div> <div class="col-sm-5 col-xs-12"><div class="two-up-overlay">';
    $result .= '<img style="margin-bottom:5px;padding-top:20px;" src="' . $atts[ 'source2' ] . '"><p class="wp-caption-text" style="margin-left:10px;font-style: italic;">' . $atts[ 'caption2' ] . '</p> </div></div> <div class="col-xs-12 col-md-offset-2 col-md-8"> ';

    return $result;
}
add_shortcode ('2up_image', 'img2up');

function img2upslim( $atts, $content = null ) {

    if ($atts[ 'data-url1' ]) {
      $sc1 = '<span class="soundcite" data-url="'.$atts[ 'data-url1' ].'" data-start="'.$atts[ 'data-start1' ].'" data-end="'.$atts[ 'data-end1' ].'" data-plays="'.$atts[ 'data-plays1' ].'">Listen</span>';
    }

    if ($atts[ 'data-url2' ]) {
      $sc2 = '<span class="soundcite" data-url="'.$atts[ 'data-url2' ].'" data-start="'.$atts[ 'data-start2' ].'" data-end="'.$atts[ 'data-end2' ].'" data-plays="'.$atts[ 'data-plays2' ].'">Listen</span>';
    }

    $result = '</div><div class="col-sm-5 col-sm-offset-1 col-xs-12" style="padding-bottom: 20px;"><div class="two-up-overlay">';
    $result .= '<img style="margin-bottom:5px; padding-top:20px;" src="' . $atts[ 'source1' ] . '"><p class="wp-caption-text" style="margin-left:10px;font-style: italic;">' . $atts[ 'caption1' ] . ' '.$sc1.'</p>  </div> </div> <div class="col-sm-5 col-xs-12"><div class="two-up-overlay">';
    $result .= '<img style="margin-bottom:5px;padding-top:20px;" src="' . $atts[ 'source2' ] . '"><p class="wp-caption-text" style="margin-left:10px;font-style: italic;">' . $atts[ 'caption2' ] . ' '.$sc2.'</p> </div></div> <div class="col-xs-12 col-md-offset-3 col-md-6"> ';

    return $result;
}
add_shortcode ('2up_image_slim', 'img2upslim');

function img2upmedium( $atts, $content = null ) {

    $result = '</div><div class="col-md-4 col-md-offset-2 col-xs-12" style="padding-bottom: 20px;"><div class="two-up-overlay">';
    $result .= '<img style="margin-bottom:5px; padding-top:20px;" src="' . $atts[ 'source1' ] . '"><p class="wp-caption-text" style="margin-left:10px;font-style: italic;">' . $atts[ 'caption1' ] . '</p>  </div> </div> <div class="col-sm-4 col-xs-12"><div class="two-up-overlay">';
    $result .= '<img style="margin-bottom:5px;padding-top:20px;" src="' . $atts[ 'source2' ] . '"><p class="wp-caption-text" style="margin-left:10px;font-style: italic;">' . $atts[ 'caption2' ] . '</p> </div></div> <div class="col-xs-12 col-md-offset-3 col-md-6"> ';

    return $result;
}
add_shortcode ('2up_image_medium', 'img2upmedium');

function img4up( $atts, $content = null ) {


    $result = '</div><div class="container" style="padding-top: 30px; padding-bottom: 20px;"><div class="row" style="overflow:visible; margin-top:20px;"><div class="col-xs-12 col-sm-5 col-sm-offset-1" style="padding-bottom: 20px;">';
    $result .= '<img style="margin-bottom:5px;padding-top:20px;" src="' . $atts[ 'source1' ] . '"><p class="wp-caption-text" style="margin-left:10px;font-style: italic;">' . $atts[ 'caption1' ] . '</p></div>  <div class="col-xs-12 col-sm-5">';
    $result .= '<img style="margin-bottom:5px;padding-top:20px;" src="' . $atts[ 'source2' ] . '"><p class="wp-caption-text" style="margin-left:10px;font-style: italic;">' . $atts[ 'caption2' ] . '</p> </div></div>';
    $result .= '<div class="row" style="padding-top:5px;"><div class="col-xs-12 col-sm-5 col-sm-offset-1" style="padding-bottom: 20px;">';
    $result .= '<img style="margin-bottom:10px;" src="' . $atts[ 'source3' ] . '"><p class="wp-caption-text" style="margin-left:10px;font-style: italic;">' . $atts[ 'caption3' ] . '</p> </div>  <div class="col-xs-12 col-sm-5">';
    $result .= '<img style="margin-bottom:5px;" src="' . $atts[ 'source4' ] . '"><p class="wp-caption-text" style="margin-left:10px;font-style: italic;">' . $atts[ 'caption4' ] . '</p> </div> </div> </div> <div class="col-xs-12 col-md-offset-2 col-md-8"> ';

    return $result;
}
add_shortcode ('4up_image', 'img4up');

function img4upslim( $atts, $content = null ) {


    $result = '</div><div class="container" style="padding-top: 30px; padding-bottom: 20px;"><div class="row" style="overflow:visible; margin-top:20px;"><div class="col-xs-12 col-sm-5 col-sm-offset-1" style="padding-bottom: 20px;">';
    $result .= '<img style="margin-bottom:5px;padding-top:20px;" src="' . $atts[ 'source1' ] . '"><p class="wp-caption-text" style="margin-left:10px;font-style: italic;">' . $atts[ 'caption1' ] . '</p></div>  <div class="col-xs-12 col-sm-5">';
    $result .= '<img style="margin-bottom:5px;padding-top:20px;" src="' . $atts[ 'source2' ] . '"><p class="wp-caption-text" style="margin-left:10px;font-style: italic;">' . $atts[ 'caption2' ] . '</p> </div></div>';
    $result .= '<div class="row" style="padding-top:5px;"><div class="col-xs-12 col-sm-5 col-sm-offset-1" style="padding-bottom: 20px;">';
    $result .= '<img style="margin-bottom:10px;" src="' . $atts[ 'source3' ] . '"><p class="wp-caption-text" style="margin-left:10px;font-style: italic;">' . $atts[ 'caption3' ] . '</p> </div>  <div class="col-xs-12 col-sm-5">';
    $result .= '<img style="margin-bottom:5px;" src="' . $atts[ 'source4' ] . '"><p class="wp-caption-text" style="margin-left:10px;font-style: italic;">' . $atts[ 'caption4' ] . '</p> </div> </div> </div> <div class="col-xs-12 col-md-offset-3 col-md-6"> ';

    return $result;
}
add_shortcode ('4up_image_slim', 'img4upslim');


function parallaximg( $atts, $content = null ) {

    $result = '</div></div>';
    $result .= '<div class="parallax_img" style="margin-top:20px;background-image:url(\'' . $atts[ 'source']  . '\');"></div>';
    $result .= '<div class="col-sm-11 col-sm-offset-1" style="margin-bottom:20px;"><p class="wp-caption-text" style="margin-left:10px;font-style: italic;">' . $atts[ 'caption' ] . '</p></div><div class="col-xs-12 col-md-offset-2 col-md-8">';

    return $result;
}
add_shortcode ('parallax-image', 'parallaximg');

function emptylines( $atts, $content = null ) {

    $result = '';
    for($i=0; $i< $atts[ 'number' ]; $i++)
    {
        $result .= "<br>";
    }
    return $result;

}
add_shortcode ('blanklines', 'emptylines');

function img2up_standard( $atts, $content = null ) {

    $result = '<div class="row" style="margin-bottom:20px;"><div class="col-sm-6 col-xs-12" style="padding-bottom: 20px;"><div class="two-up-overlay">';
    $result .= '<img style="margin-bottom:5px; padding-top:20px;" src="' . $atts[ 'source1' ] . '"><p class="wp-caption-text" style="margin-left:10px;font-style: italic;">' . $atts[ 'caption1' ] . '</p>  </div> </div> <div class="col-sm-6 col-xs-12"><div class="two-up-overlay">';
    $result .= '<img style="margin-bottom:5px;padding-top:20px;" src="' . $atts[ 'source2' ] . '"><p class="wp-caption-text" style="margin-left:10px;font-style: italic;">' . $atts[ 'caption2' ] . '</p> </div></div> </div> ';

    return $result;
}
add_shortcode ('2up_image-standard', 'img2up_standard');

function nextchapter( $atts, $content = null ) {

    $result = "</div><div class='next-chapter-container'><a href='" . $atts[ 'link' ] . "'><img src='" . $atts[ 'source' ] . "' class='img-responsive' style='display:block;cursor: pointer; width:100%;height:auto; padding-top:35px;'/>
    <h3> Next Chapter: <br></h3>
    <h2> " . $atts[ 'chapter-name' ] . "  <span class='glyphicon glyphicon-chevron-right' style='right:-75px;'></span></h2>
    </a></div>" ;

    return $result;
}
add_shortcode ('next-chapter', 'nextchapter');

function related_box_left( $atts, $content = null ) {

    $result = '<div class="related-story-box-left"><h4><strong>' . $atts[ 'box-title' ] . '</strong></h4>';
    $result .= '<div class="story">';
    $result .= '<div class="img"><a href="'. $atts[ 'link' ] . '" '.$target.'><img src="'. $atts[ 'image' ] . '" style="width:100%;"/></a></div>';
    $result .= '<div class="headline"><p><a href="'. $atts[ 'link' ] . '" '.$target.'>'. $atts[ 'headline' ] .' <i class="fas fa-angle-right"></i></a></p></div>';
    $result .= '</div>';
    $result .= '</div>';

    return $result;
}
add_shortcode ('related-story-left', 'related_box_left');

function related_box_right( $atts, $content = null ) {
    if ($atts[ 'target' ]) {
      $target = 'target="'.$atts[ 'target' ].'"';
    }

    $result = '<div class="related-story-box-right"><h4><strong>' . $atts[ 'box-title' ] . '</strong></h4>';
    $result .= '<div class="story">';
    $result .= '<div class="img"><a href="'. $atts[ 'link' ] . '" '.$target.'><img src="'. $atts[ 'image' ] . '" style="width:100%;"/></a></div>';
    $result .= '<div class="headline"><p><a href="'. $atts[ 'link' ] . '" '.$target.'>'. $atts[ 'headline' ] .' <i class="fas fa-angle-right"></i></a></p></div>';
    $result .= '</div>';
    $result .= '</div>';

    return $result;
}
add_shortcode ('related-story-right', 'related_box_right');

function side_box_right_pro( $atts, $content = null ) {

    $result = '<div class="related-story-box-right">'. $atts[ 'html' ] .'</div>' ;

    return $result;
}
add_shortcode ('side-box-right-pro', 'side_box_right_pro');

function side_box_left_pro( $atts, $content = null ) {

    $result = '<div class="related-story-box-left">'. $atts[ 'html' ] .'</div>' ;

    return $result;
}
add_shortcode ('side-box-left-pro', 'side_box_left_pro');


function two_column( $atts, $content = null ) {

    $result = '<div class="row"><div class="col-xs-12 col-sm-6">' . $atts[ 'col1' ] . '</div><div class="col-xs-12 col-sm-6">' . $atts[ 'col2' ] . '</div></div>' ;

    return $result;
}
add_shortcode ('two-column-content', 'two_column');

function sub_tag( $atts, $content = null ) {

    $result = '<div style="padding-bottom:40px;" class="no-amp">
        <p style="text-align:center;">Sign up for <strong style="color:#234384;"> CRONKITE DAILY </strong> to catch up on the latest news. </p>
        <a href="https://cronkitenews.azpbs.org/daily-newsletter-signup/"><button style="color:white; background-color:#234384; border:none; padding:10px; width:40%; position: absolute; left:50%; transform: translateX(-50%);"> SUBSCRIBE </button></a></div>' ;

    return $result;
}
add_shortcode ('sub-tag', 'sub_tag');

function social_icons( $atts, $content = null ) {

    $result = '<div class="row"><div class="col-xs-12"> <h3> Connect with us:</h3> <br>';

if( $atts[ 'facebook' ] == "yes" ) {
     $result .='<a href="https://www.facebook.com/cronkitenewsazpbs/" target="_blank"> <span class="fa fa-facebook tag-social-icons" style="padding-left:20px;padding-right: 20px;"></span></a>';
}
  if( $atts[ 'twitter' ] == "yes"  ) {
     $result .='<a href="https://twitter.com/cronkitenews" target="_blank"><span class="fa fa-twitter tag-social-icons"></span></a>';

}
if( $atts[ 'instagram' ] == "yes"  ) {
   $result .= '<a href="https://www.instagram.com/cronkitenews/" target="_blank">  <span class="fa fa-instagram tag-social-icons"></span></a>' ;
}
if( $atts[ 'youtube' ] == "yes"  ) {
   $result .= '<a href="https://www.youtube.com/user/CronkiteNewsWatch" target="_blank">  <span class="fa fa-youtube tag-social-icons"></span></a>' ;
}
 if( $atts[ 'snapchat' ] == "yes"  ) {
   $result .= ' <a href="#" data-featherlight=\'<img src="https://cronkitenews.azpbs.org/wp-content/uploads/2018/01/IMG_C77BE6BD8B91-1.jpeg">\'> <span class="fa fa-snapchat-ghost tag-social-icons"></span></a>';
}
    $result .= '</div></div>';

    return $result;
}
add_shortcode ('social-icons', 'social_icons');

function img3vertical( $atts, $content = null ) {

    $result = '</div><div class="row" style="overflow: visible;"><div class="col-xs-10 col-md-3 col-md-offset-1" style="padding-bottom: 10px;">';
    $result .= '<img src="' . $atts[ 'source1' ] . '" style=" margin-left:40px;"> </div> <div class="col-xs-10 col-md-3"><img src="' . $atts[ 'source2' ] . '" style=" margin-left:40px;"></div>';
      $result .= '<div class="col-xs-10 col-md-3"><img src="' . $atts[ 'source3' ] . '" style=" margin-left:40px;"></div></div> <div class="row"><div class="col-xs-10 col-xs-offset-1 col-md-10 col-md-offset-1"><p class="wp-caption-text" style="margin-left:10px;font-style: italic; margin-left:40px;">' . $atts[ 'caption' ] . '</p> </div></div> <div class="col-xs-12 col-md-offset-3 col-md-6"> ';

    return $result;
}
add_shortcode ('3verticalrow', 'img3vertical');

function promquote( $atts, $content = null ) {

    $result = '<div class"row"><div class="col-xs-12" style="padding:0; margin-bottom: 20px;">';
    $result .= '<h3 style="padding:20px; border-top: 5px solid #234384; border-bottom: 5px solid #234384; padding-bottom: 20px !important; font-weight:600;">' . $atts[ 'quote' ] . '</h3></div></div>';

    return $result;
}
add_shortcode ('pquote', 'promquote');
