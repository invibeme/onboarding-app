<?php

/* Template name: Homepage */

require get_template_directory() . '/new-header.php';

?>
  
<?php if( get_field( 'banner_video' ) ) : ?>

<div class="video-popup">
  <div class="video-popup-content">
    <div class="video-popup-content-inner">
      <img class="lazyload close" data-src="<?php echo get_template_directory_uri(); ?>/assets/images/close.svg" alt="close">
      <video class="video-content" controls src="<?php the_field( 'banner_video' ); ?>"></video>
    </div>
  </div>
</div>

<?php endif; ?>


<!-- BANNER SECTION STARTS HERE -->
<section class="banner">
  <div class="banner-wrapper">
    <div class="banner-text-wrap">
      <h1><?php the_field( 'banner_title' ); ?></h1>
      <h4><?php the_field( 'banner_subtitle' ); ?></h4>
      <a href="<?php the_field( 'banner_button_1_link' ); ?>" class="site-button fix-button alter-btn"><?php the_field( 'banner_button_1_text' ); ?></a>
      <a href="<?php the_field( 'banner_button_2_link' ); ?>" class="site-button fix-button border-button"><?php the_field( 'banner_button_2_text' ); ?></a>
      <a href="#" class="watch-video-button">
        <span class="witch-video-button-icon"><i class="fas fa-play"></i></span> <?php the_field( 'banner_video_button_text' ); ?>
      </a>
    </div> <!-- banner-text-wrap Ends -->
    <div class="banner-image-wrap">
      <img src="<?php the_field( 'banner_image' ); ?>" alt="IMAGE">
    </div> <!-- banner-image-wrap Ends -->
  </div> <!-- banner-wrapper Ends -->

  <?php if( have_rows( 'banner_brands' ) ) : ?>

  <div class="bannar-brands desktop">

    <?php while( have_rows( 'banner_brands' ) ) : the_row(); ?>

    <div class="bannar-brands-item">
      <img src="<?php the_sub_field( 'brand_image' ); ?>" alt="brand">
    </div>

    <?php endwhile; ?>

  </div> <!-- bannar-brands Ends -->
  <div class="bannar-brands tab">
    <div class="brand-carousel owl-carousel owl-theme">

      <?php while( have_rows( 'banner_brands' ) ) : the_row(); ?>

      <div class="bannar-brands-item item">
        <img src="<?php the_sub_field( 'brand_image' ); ?>" alt="brand">
      </div>

      <?php endwhile; ?>

    </div>
  </div>

  <?php endif; ?>

</section>
<!-- BANNER SECTION ENDS HERE -->


<!-- MAIN SERVICE SECTION START HERE -->
<section class="main-service">
  <div class="home-service-title">
    <h2><?php the_field( 'main_services_heading' ); ?></h2>
    <h4><?php the_field( 'main_services_subheading' ); ?></h4>
  </div> <!-- main-service-title Ends -->

  <?php if( have_rows( 'main_single_service' ) ) : ?>

  <div class="main-service-wrapper">

    <?php while( have_rows( 'main_single_service' ) ) : the_row(); ?>

    <div class="main-service-item">
      <p><?php the_sub_field( 'single_service_heading' ); ?></p>
      <a href="<?php the_sub_field( 'single_service_link' ); ?>"><img class="lazyload" data-src="<?php the_sub_field( 'single_service_icon' ); ?>" alt=""></a>
      <a href="<?php the_sub_field( 'single_service_link' ); ?>" class="link-hover"><?php the_sub_field( 'single_service_button_text' ); ?></a>
    </div> <!-- main-service-item Ends -->

    <?php endwhile; ?>

  </div> <!-- main-service-wrapper Ends -->

  <?php endif; ?>

  <div class="service-area-button">
    <a href="<?php the_field( 'main_services_button_link' ); ?>" class="site-button"><?php the_field( 'main_services_button_text' ); ?></a>
  </div>
</section>
<!-- MAIN SERVICE SECTION ENDS HERE -->



<!-- STATUS SECTION STARTS HERE -->
<section class="status-section">
  <div class="statusbg-icons">
    <span class="statusbg-icons-item icon-1"></span>
    <span class="statusbg-icons-item icon-2"><img class="lazyload" data-src="<?php echo get_template_directory_uri(); ?>/assets/images/cloud.png" alt=""></span>
    <span class="statusbg-icons-item icon-3"><img class="lazyload" data-src="<?php echo get_template_directory_uri(); ?>/assets/images/cloud.png" alt=""></span>
    <span class="statusbg-icons-item icon-4"><img class="lazyload" data-src="<?php echo get_template_directory_uri(); ?>/assets/images/cloud.png" alt=""></span>
    <span class="statusbg-icons-item icon-5"><img class="lazyload" data-src="<?php echo get_template_directory_uri(); ?>/assets/images/cloud.png" alt=""></span>
  </div>
  <div class="status-wrapper">
    <div class="status-title-wrap">
      <h2><?php the_field( 'status_heading' ); ?></h2>
    </div> <!-- status-title-wrap Ends -->

    <?php if( have_rows( 'status_counter' ) ) : ?>

    <div class="status-main-area">

      <?php while( have_rows( 'status_counter' ) ) : the_row(); ?>

      <div class="status-item">
        <h3 class="counter">+<span class="counter-animation"><?php the_sub_field( 'status_counter_number' ); ?></span></h3>
        <p><b><?php the_sub_field( 'status_counter_text' ); ?></b></p>
      </div> <!-- status-area Ends -->

      <?php endwhile; ?>

    </div> <!-- status-main-area Ends -->

    <?php endif; ?>

  </div> <!-- status-wrapper Ends -->
</section>
<!-- STATUS SECTION ENDS HERE -->



<!-- SERVICE SECTION START HERE -->
<section class="home-services">
  <div class="home-service-title">
    <h2><?php the_field( 'services_heading' ); ?></h2>
    <h4><?php the_field( 'services_subheading' ); ?></h4>
  </div> <!-- home-service-title Ends -->
  <div class="home-services-wrapper">

    <?php if( have_rows( 'single_service' ) ) : ?>

    <div class="home-services-main">
      
      <?php

      $serials = array( '3', '1', '6', '5', '7', '4', '2' );

      function endsWith( $haystack, $needle ) {
          $length = strlen( $needle );
          if( !$length ) {
              return true;
          }
          return substr( $haystack, -$length ) === $needle;
      }

      $index = 0;

      while( have_rows( 'single_service' ) ) : the_row(); $index++; ?>

      <!-- Service Item Starts -->
      <div class="home-services-item home-services-item-<?php echo $serials[$index-1]; ?>">

        <?php if( $index%2 == 0 ) { ?>

        <div class="home-services-item-image">
        <?php if( endsWith( get_sub_field( 'single_service_imagevideo' ), 'mp4' ) ) { ?>
          <video loop autoplay muted>
            <source src="<?php the_sub_field( 'single_service_imagevideo' ); ?>" type="video/mp4">
          </video>
        <?php } else { ?>
          <img class="lazyload" data-src="<?php the_sub_field( 'single_service_imagevideo' ); ?>" alt="">
        <?php } ?>
        </div>
        <div class="home-services-item-text">
          <h3><?php the_sub_field( 'single_service_heading' ); ?></h3>
          <?php the_sub_field( 'single_service_text' ); ?>
          <a href="<?php the_sub_field( 'single_service_button_link' ); ?>"><?php the_sub_field( 'single_service_button_text' ); ?></a>
        </div>

      <?php } else { ?>

        <div class="home-services-item-text">
          <h3><?php the_sub_field( 'single_service_heading' ); ?></h3>
          <?php the_sub_field( 'single_service_text' ); ?>
          <a href="<?php the_sub_field( 'single_service_button_link' ); ?>"><?php the_sub_field( 'single_service_button_text' ); ?></a>
        </div>
        <div class="home-services-item-image">
        <?php if( endsWith( get_sub_field( 'single_service_imagevideo' ), 'mp4' ) ) { ?>
          <video loop autoplay muted>
            <source src="<?php the_sub_field( 'single_service_imagevideo' ); ?>" type="video/mp4">
          </video>
        <?php } else { ?>
          <img class="lazyload" data-src="<?php the_sub_field( 'single_service_imagevideo' ); ?>" alt="">
        <?php } ?>
        </div>
        
      <?php } ?>

      </div>
      <!-- Service Item Ends -->

      <?php endwhile; ?>

    </div> <!-- home-services-main Ends -->

    <?php endif; ?>

    <div class="service-area-button">
      <a href="<?php the_field( 'service_button_link' ); ?>" class="site-button"><?php the_field( 'service_button_text' ); ?></a>
    </div>
  </div> <!-- home-services-wrapper Ends -->
</section>
<!-- SERVICE SECTION ENDS HERE -->



<!-- PMS DEL SECTION STARTS HERE -->
<section class="pms-del">
  <div class="pms-del-wrapper">
    <div class="pms-del-image">
      <img class="lazyload" data-src="<?php the_field( 'pms_image' ); ?>" alt="">
    </div> <!-- pms-del-image Ends -->
    <div class="pms-del-text">
      <h2><?php the_field( 'pms_heading' ); ?></h2>
      <?php the_field( 'pms_text' ); ?>
      <a href="<?php the_field( 'pms_button_link' ); ?>" class="site-button"><?php the_field( 'pms_button_text' ); ?></a>
    </div> <!-- pms-del-text Ends -->
  </div> <!-- pms-del-wrapper Ends -->
</section>
<!-- PMS DEL SECTION ENDS HERE -->



<!-- REVIEW SECTION STARTS HERE -->
<section class="review-section">
  <div class="review-wrapper">
    <div class="review-title-wrap">
      <h2><?php the_field( 'review_heading' ); ?></h2>
    </div> <!-- review-title-wrap Ends -->

    <?php if( have_rows( 'review_slider' ) ) : ?>

    <div class="main-review-area">
      <div class="review-carousel owl-carousel owl-theme">

        <?php $index = 0; while( have_rows( 'review_slider' ) ) : the_row(); $index++; ?>

        <div class="item">
          <div class="rating">
            <img class="lazyload" data-src="<?php echo get_template_directory_uri(); ?>/assets/images/rating.svg" alt="">
          </div>
          <div class="shape-image shape-image-<?php echo $index; ?>">
            <img class="lazyload" data-src="<?php the_sub_field( 'review_slider_image' ); ?>" alt="">
          </div>
          <h4><?php the_sub_field( 'review_slider_heading' ); ?></h4>
          <h3><?php the_sub_field( 'review_slider_subheading' ); ?></h3>
          <?php the_sub_field( 'review_slider_text' ); ?>
        </div>

        <?php endwhile; ?>

      </div>
      <!-- <div style="width:50%;margin:0 auto;height:300px;background:#fff"></div> -->
    </div> <!-- main-review-area Ends -->

    <?php endif; ?>

  </div> <!-- review-wrapper Ends -->
</section>
<!-- REVIEW SECTION ENDS HERE -->



<!-- CALL TO ACTION SECTION STARTS HERE -->
<section class="callto-action">
  <div class="callto-action-wrapper">
    <h2><?php the_field( 'cta_heading' ); ?></h2>
    <a href="<?php the_field( 'cta_button_1_link' ); ?>" class="site-button fix-button alter-btn"><?php the_field( 'cta_button_1_text' ); ?></a>
    <a href="<?php the_field( 'cta_button_2_link' ); ?>" class="site-button fix-button border-button"><?php the_field( 'cta_button_2_text' ); ?></a>
  </div> <!-- callto-action-wrapper Ends -->
</section>
<!-- CALL TO ACTION ENDS HERE -->



<!-- OUR APP SECTION STARTS HERE -->
<section class="our-app">
  <div class="our-app-wrapper">
    <div class="our-app-image-wrap">
      <img class="lazyload" data-src="<?php the_field( 'app_image' ); ?>" alt="">
    </div> <!-- our-app-image-wrap Ends -->
    
    <div class="our-app-text-wrap">
      <h2><?php the_field( 'app_heading' ); ?></h2>
      <?php the_field( 'app_text' ); ?>
      <div class="our-app-buttons">
        <a href="<?php the_field( 'app_button_1_link' ); ?>" class="site-button fixbutton"><img class="lazyload" data-src="<?php the_field( 'app_button_1_image' ); ?>" alt=""></a>
        <a href="<?php the_field( 'app_button_2_link' ); ?>" class="site-button fixbutton"><img class="lazyload" data-src="<?php the_field( 'app_button_2_image' ); ?>" alt=""></a>
      </div>
    </div> <!-- our-app-text-wrap Ends -->
  </div> <!-- our-app-wrapper Ends -->
</section>
<!-- OUR APP SECTION ENDS HERE -->

<?php require get_template_directory() . '/new-footer.php'; ?>