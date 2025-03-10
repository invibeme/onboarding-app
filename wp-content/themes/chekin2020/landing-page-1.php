<?php

/* Template name: Landing Page 1 */

require get_template_directory() . '/new-header.php';

?>


<!-- BANNER SECTION STARTS HERE -->
<section class="banner">
  <div class="banner-wrapper">
    <div class="banner-text-wrap">
      <h1><?php the_field( 'banner_title' ); ?></h1>
      <h4><?php the_field( 'banner_subtitle' ); ?></h4>
      <?php the_field( 'banner_text' ); ?>
      <a href="<?php the_field( 'banner_button_1_link' ); ?>" class="site-button fix-button alter-btn"><?php the_field( 'banner_button_1_text' ); ?></a>
      <a href="<?php the_field( 'banner_button_2_link' ); ?>" class="site-button fix-button border-button"><?php the_field( 'banner_button_2_text' ); ?></a>
    </div> <!-- banner-text-wrap Ends -->
    <div class="banner-image-wrap">
      <img src="<?php the_field( 'banner_image' ); ?>" alt="">
    </div> <!-- banner-image-wrap Ends -->
  </div> <!-- banner-wrapper Ends -->
</section>
<!-- BANNER SECTION ENDS HERE -->



<!-- SERVICE SECTION START HERE -->
<section class="home-services">
  <div class="home-services-wrapper">
    <div class="home-service-title">
      <?php if( get_field('services_sub_heading') ): ?><h4><?php the_field( 'services_sub_heading' ); ?></h4><?php endif; ?>
      <h2><?php the_field( 'services_heading' ); ?></h2>
    </div> <!-- home-service-title Ends -->

    <?php if( have_rows( 'single_service' ) ) : ?>

    <div class="home-services-main">
      
      <?php

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
      <div class="home-services-item home-services-item-<?php echo $index; ?>">

        <?php if( $index%2 != 0 ) { ?>

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
<!-- CALL TO ACTION ENDS STARTS HERE -->

<?php require get_template_directory() . '/new-footer.php'; ?>