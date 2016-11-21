<?php
/**
 * Plugin Name: MBT Jumbo Share Button
 * Plugin URI:  http://www.mybloggertricks.com/2016/02/jumbo-share-counters-plugin.html
 * Description: WordPress Jumbo Share Counters Plugin Ultra Fast Social share buttons Developed by <a href="http://www.mybloggertricks.com">Mohammad Mustafa Ahmedzai</a>.
 * Version:     1.0
 * Author:      Santhosh veer
 * Author URI:  http://www.santhoshveer.com
 */

//plugin JS File
function wpbb_adding_scripts() {
wp_register_script('my_amazing_script', plugins_url('js/jumboshare.js', __FILE__), array('jquery'),'1.1', true);
wp_enqueue_script('my_amazing_script');
}

add_action( 'wp_enqueue_scripts', 'wpbb_adding_scripts' );  

//plugin jQuery file
function add_js_file() {
wp_enqueue_script( 'jumbo-js', 'https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js' );
}
add_action( 'wp_enqueue_scripts', 'add_js_file' );

//Plugin CSS File!
function jumbo_share_posts_style() 
{
    wp_register_style("jumbo-share-posts-style-file", plugin_dir_url(__FILE__) . "css/jumboshare.css");
    wp_enqueue_style("jumbo-share-posts-style-file");
}

add_action("wp_enqueue_scripts", "jumbo_share_posts_style");



//Jumbo Share Counters Plugin 
function jumbo_shares_after_post($content){ 
if (is_single()) {    
    $content .= ' 
<div id="MBTshares-wrap">
<!--TOTAL--> 
<div class="share-btn tcount" data-service="total"> 
        <div class="count h2 anim"></div> 
        <div class="h4">SHARES</div> 
</div> 
<span id="horiz"> 
<!--FACEBOOK --> 
<div id="MBTshares"  > 
<div class="mbt-o" > 
<a rel="nofollow" href="http://www.facebook.com/sharer.php?u='.get_permalink( $post->ID).'&amp;t='.get_the_title( $post->ID).'" onclick="window.open(this.href, \'sharer\', \'toolbar=0, scrollbars,status=0,  width=626,height=436\');  return false;" target="_blank" title="Share on Facebook!" class="mbt-fb"><i class="fa fa-facebook"></i><span class="label">Share</span></a> 
</div> 
<div class="mbtcount-o" > 
<div class="arrow"><s></s><i></i></div> 
<span class="share-btn" data-service="facebook"> 
<span id="mbtcount" class="count anim"></span></span> 
</div> 
</div>
<!--GOOGLE PLUS--> 
<div id="MBTshares"  > 
<div class="mbt-o" > 
<a rel="nofollow" href="https://plus.google.com/share?url='.get_permalink( $post->ID).'" onclick="window.open(this.href, \'sharer\', \'toolbar=0, scrollbars,status=0,  width=626,height=436\');  return false;" target="_blank" title="Share on Google Plus!" class="mbt-gp"><i class="fa fa-google-plus"></i><span class="label">Share</span></a> 
</div> 
<div class="mbtcount-o ext" > 
<div class="arrow"><s></s><i></i></div> 
<span class="share-btn" data-service="google"> 
<span id="mbtcount" class="count anim"></span></span> 
</div> 
</div>
<!--TWITTER--> 
<div id="MBTshares"  > 
<div class="mbt-o" > 
<a rel="nofollow" href="http://twitter.com/home/?status='.get_the_title( $post->ID).' - '.get_permalink( $post->ID).'" onclick="window.open(this.href, \'sharer\', \'toolbar=0, scrollbars,status=0,  width=626,height=436\');  return false;" target="_blank" title="Share on Twitter!" class="mbt-tw"><i class="fa fa-twitter"></i><span class="label">Tweet</span></a> 
</div> 
</div>
<!--PINTEREST--> 
<div id="MBTshares"  > 
<div class="mbt-o" > 
<a rel="nofollow" href="http://pinterest.com/pin/create/button/?url='.get_permalink( $post->ID).'&media='.wp_get_attachment_url( get_post_thumbnail_id($post->ID) ).'&description='.get_the_title($post->ID).'" onclick="window.open(this.href, \'sharer\', \'toolbar=0, scrollbars,status=0,  width=626,height=436\');  return false;"  target="_blank" title="Pin it!" class="mbt-gp pinit"><i class="fa fa-pinterest"></i><span class="label">Pin it</span></a> 
</div> 
<div class="mbtcount-o ext" > 
<div class="arrow"><s></s><i></i></div> 
<span class="share-btn" data-service="pinterest"> 
<span id="mbtcount" class="count anim"></span></span> 
</div> 
</div> 
<div style="display:none;" class="switchoff2"> 
<!--STUMBLEUPON--> 
<div id="MBTshares"  > 
<div class="mbt-o" > 
<a rel="nofollow" href="http://www.stumbleupon.com/submit?url='.get_permalink( $post->ID).'&amp;title='.get_the_title( $post->ID).'" onclick="window.open(this.href, \'sharer\', \'toolbar=0, scrollbars,status=0,  width=626,height=436\');  return false;" target="_blank" title="Stumble it!" class="mbt-gp stumb"><i class="fa fa-stumbleupon"></i><span class="label">Share</span></a> 
</div> 
<div class="mbtcount-o ext" > 
<div class="arrow"><s></s><i></i></div> 
<span class="share-btn" data-service="stumbleupon"> 
<span id="mbtcount" class="count anim"></span></span> 
</div> 
</div>
<!--LINKEDIN--> 
<div id="MBTshares"  > 
<div class="mbt-o" > 
<a rel="nofollow" href="http://www.linkedin.com/shareArticle?mini=true&amp;title='.get_the_title( $post->ID).'&amp;url='.get_permalink( $post->ID).'" onclick="window.open(this.href, \'sharer\', \'toolbar=0, scrollbars,status=0,  width=626,height=436\');  return false;" target="_blank" title="Share on Linkedin!" class="mbt-linkedin"><span class="ibg"><i class="fa fa-linkedin"></i></span><span class="label">Share</span></a> 
</div> 
<div class="mbtcount-o ext" > 
<div class="arrow"><s></s><i></i></div> 
<span class="share-btn" data-service="linkedin"> 
<span id="mbtcount" class="count anim"></span></span> 
</div> 
</div>
<!--BUFFER--> 
<div id="MBTshares"> 
<div class="mbt-o"> 
<a class="mbt-gp" href="https://buffer.com/add?url='.get_permalink( $post->ID).'&picture='.wp_get_attachment_url( get_post_thumbnail_id($post->ID) ).'&text='.get_the_title( $post->ID).'&via=allwebtuts" onclick="window.open(this.href, \'sharer\', \'toolbar=0, scrollbars,status=0,  width=626,height=436\');  return false;" rel="nofollow" target="_blank" title="Share on Buffer!"><img class="bufferimg" src=" https://3.bp.blogspot.com/-eYyUk4KGuBg/Vs-oFm656VI/AAAAAAAAQfE/maUNyJ9PWqE/s1600/logo-icon.png"/><span class="label">Buffer</span></a> 
</div> 
<div class="mbtcount-o ext"> 
<div class="arrow"><s></s><i></i></div> 
<span class="share-btn" data-service="buffer"> 
<span class="count anim" id="mbtcount"></span></span> 
</div> 
</div>

<!-- WHATSAPP --> 
  <div id="MBTshares"> 
    <div class="mbt-o"> 
      <a class="mbt-tw whatsapp" href="whatsapp://send?text='.get_the_title( $post->ID).' >> '.get_permalink( $post->ID).'"  rel="nofollow" target="_blank" title="Share on whatsapp!"><i class="fa fa-whatsapp"></i>      <span class="label">SMS</span></a> 
    </div> 
  </div> 
</div> <!--switchoff-->
<span class="mbtswitch2"><i class="active"></i></span> 
</span> 
</div>'; 
} 
    return $content; 
}
add_filter( "the_content", "jumbo_shares_after_post" );
