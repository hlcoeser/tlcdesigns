<?php
/**
 * The Header for our theme.
 * @package Luxury Travel
 */

?><!DOCTYPE html>

<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'luxury-travel' ) ); ?>">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php /** slider section **/ ?>

<section id="slider">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
      <?php $pages = array();
          for ( $count = 1; $count <= 4; $count++ ) {
            $mod = intval( get_theme_mod( 'luxury_travel_slidersettings_page' . $count ));
            if ( 'page-none-selected' != $mod ) {
              $pages[] = $mod;
            }
          }
          if( !empty($pages) ) :
          $args = array(
              'post_type' => 'page',
              'post__in' => $pages,
              'orderby' => 'post__in'
          );
          $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            $i = 1;
      ?>     
      <div class="carousel-inner" role="listbox">
          <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
          <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
              <img src="<?php the_post_thumbnail_url('full'); ?>"/>
              <div class="carousel-caption">
                <div class="inner_carousel">
                    <h2><?php the_title();?></h2>  
                    <div class ="read-more">
                      <a href="<?php echo esc_url( get_permalink() );?>"> <?php echo esc_html(get_theme_mod('luxury_travel_slidersettings_page',__('FIND OUT MORE','luxury-travel'))); ?><i class="fas fa-caret-right"></i></a>

                    </div>                    
                </div>
              </div>
          </div>
          <?php $i++; endwhile; 
          wp_reset_postdata();?>
      </div>
      <?php else : ?>
        <div class="no-postfound"></div>
        <?php endif;
        endif;?>
    </div>  
    <div class="clearfix"></div>
</section> 

<div class="social-media">  
  <?php if( get_theme_mod( 'luxury_travel_facebook_url','' ) != '') { ?>
    <a href="<?php echo esc_url( get_theme_mod( 'luxury_travel_facebook_url','' ) ); ?>"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
  <?php } ?>
  <?php if( get_theme_mod( 'luxury_travel_twitter_url','' ) != '') { ?>
    <a href="<?php echo esc_url( get_theme_mod( 'luxury_travel_twitter_url','' ) ); ?>"><i class="fab fa-twitter" aria-hidden="true"></i></a>
  <?php } ?>
  <?php if( get_theme_mod( 'luxury_travel_insta_url','' ) != '') { ?>
    <a href="<?php echo esc_url( get_theme_mod( 'luxury_travel_insta_url','' ) ); ?>"><i class="fab fa-instagram" aria-hidden="true"></i></a>    
  <?php } ?>
  <?php if( get_theme_mod( 'luxury_travel_youtube_url','' ) != '') { ?>
    <a href="<?php echo esc_url( get_theme_mod( 'luxury_travel_youtube_url','' ) ); ?>"><i class="fab fa-youtube"></i></a>
  <?php } ?>
  <?php if( get_theme_mod( 'luxury_travel_pintrest_url','' ) != '') { ?>
    <a href="<?php echo esc_url( get_theme_mod( 'luxury_travel_pintrest_url','' ) ); ?>"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a>
  <?php } ?>
</div>

<div id="header">
  <div class="menu-sec">
    <div class="container">
      <div class="row">
        <div class="logo col-md-3 col-sm-3 wow bounceInDown">
            <?php if( has_custom_logo() ){ luxury_travel_the_custom_logo();
             }else{ ?>
            <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <?php $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ) : ?> 
              <p class="site-description"><?php echo esc_html($description); ?></p>       
            <?php endif; }?>
        </div>
        <div class="toggle"><a class="toggleMenu" href="#"><?php esc_html_e('Menu','luxury-travel'); ?></a></div>
        <div class="menubox col-md-7 col-sm-7">
          <div class="nav">
              <?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
          </div>
        </div>
        <div class="top-contact col-md-2 col-sm-2">
          <?php if( get_theme_mod( 'luxury_travel_call','' ) != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'luxury_travel_call','' ) ); ?>"><i class="fa fa-phone" aria-hidden="true"></i></a>
          <?php } ?>     
          <?php if( get_theme_mod( 'luxury_travel_mail','' ) != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'luxury_travel_mail','' ) ); ?>"><i class="fa fa-envelope" aria-hidden="true"></i></a>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>