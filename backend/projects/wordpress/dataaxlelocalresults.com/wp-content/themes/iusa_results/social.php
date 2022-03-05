<?php // this isn't doing anything yet, its just holding code that will be reworked ?>
<script type="text/javascript">
function mk_social_share_global() {

  "use strict";

  var eventtype = 'click';

  $('.twitter-share').on(eventtype, function() {
    var $this = $(this),
        $url = $this.attr('data-url'),
        $title = $this.attr('data-title');

    window.open('http://twitter.com/intent/tweet?text=' + $title + ' ' + $url, "twitterWindow", "height=380,width=660,resizable=0,toolbar=0,menubar=0,status=0,location=0,scrollbars=0");
    return false;
  });

  $('.pinterest-share').on(eventtype, function() {
    var $this = $(this),
        $url = $this.attr('data-url'),
        $title = $this.attr('data-title'),
        $image = $this.attr('data-image');
    window.open('http://pinterest.com/pin/create/button/?url=' + $url + '&media=' + $image + '&description=' + $title, "twitterWindow", "height=320,width=660,resizable=0,toolbar=0,menubar=0,status=0,location=0,scrollbars=0");
    return false;
  });

  $('.facebook-share').on(eventtype, function() {
    var $url = $(this).attr('data-url');
    window.open('https://www.facebook.com/sharer/sharer.php?u=' + $url, "facebookWindow", "height=380,width=660,resizable=0,toolbar=0,menubar=0,status=0,location=0,scrollbars=0");
    return false;
  });

  $('.googleplus-share').on(eventtype, function() {
    var $url = $(this).attr('data-url');
    window.open('https://plus.google.com/share?url=' + $url, "googlePlusWindow", "height=380,width=660,resizable=0,toolbar=0,menubar=0,status=0,location=0,scrollbars=0");
    return false;
  });

  $('.linkedin-share').on(eventtype, function() {
    var $this = $(this),
        $url = $this.attr('data-url'),
        $title = $this.attr('data-title'),
        $desc = $this.attr('data-desc');
    window.open('http://www.linkedin.com/shareArticle?mini=true&url=' + $url + '&title=' + $title + '&summary=' + $desc, "linkedInWindow", "height=380,width=660,resizable=0,toolbar=0,menubar=0,status=0,location=0,scrollbars=0");
    return false;
  });
}
   </script>

   <span class="blog-share-container">
    <span class="mk-blog-share mk-toggle-trigger"><?php Mk_SVG_Icons::get_svg_icon_by_class_name(true, 'mk-moon-share-2', 16); ?></span>
    <ul class="blog-social-share mk-box-to-trigger">
	    <li><a class="facebook-share" data-title="<?php the_title_attribute(); ?>" data-url="<?php echo esc_url( get_permalink() ); ?>" href="#"><?php Mk_SVG_Icons::get_svg_icon_by_class_name(true, 'mk-jupiter-icon-simple-facebook', 16); ?></a></li>
	    <li><a class="twitter-share" data-title="<?php the_title_attribute(); ?>" data-url="<?php echo esc_url( get_permalink() ); ?>" href="#"><?php Mk_SVG_Icons::get_svg_icon_by_class_name(true, 'mk-jupiter-icon-simple-twitter', 16); ?></a></li>
	    <li><a class="googleplus-share" data-title="<?php the_title_attribute(); ?>" data-url="<?php echo esc_url( get_permalink() ); ?>" href="#"><?php Mk_SVG_Icons::get_svg_icon_by_class_name(true, 'mk-jupiter-icon-simple-googleplus', 16); ?></a></li>
	    <li><a class="pinterest-share" data-image="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id() , 'full', true) [0]; ?>" data-title="<?php the_title_attribute(); ?>" data-url="<?php echo esc_url( get_permalink() ); ?>" href="#"><?php Mk_SVG_Icons::get_svg_icon_by_class_name(true, 'mk-jupiter-icon-simple-pinterest', 16); ?></a></li>
	    <li><a class="linkedin-share" data-desc="<?php echo esc_attr(get_the_excerpt()); ?>" data-title="<?php the_title_attribute(); ?>" data-url="<?php echo esc_url( get_permalink() ); ?>" href="#"><?php Mk_SVG_Icons::get_svg_icon_by_class_name(true, 'mk-jupiter-icon-simple-linkedin', 16); ?></a></li>
    </ul>
</span>