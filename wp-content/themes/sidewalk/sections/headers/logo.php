<div class="site-branding">
	<?php 
		$logo_url = sdw_get_option('logo_custom_url') ? esc_url(sdw_get_option('logo_custom_url')) : esc_url(home_url( '/' )); 
		$logo = sdw_get_option('logo');
		$mobile_logo = sdw_get_option('mobile_logo');
		$mobile_logo_class = !empty($mobile_logo['url']) ? 'hide-standard-logo' : '';
	?>

	<?php 
		$title_tag = is_front_page() ? 'h1' : 'span';
		$class = !empty($logo['url']) ? 'has-logo' : '';
	?>

	<<?php echo $title_tag;?> class="site-title">

		<a href="<?php echo esc_url( $logo_url ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="main-logo <?php echo esc_attr( $class );?> <?php echo esc_attr($mobile_logo_class); ?>" ><?php if(!empty($logo['url'])) : ?><img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr(get_bloginfo( 'name' )); ?>" /><?php else: ?><?php bloginfo( 'name' ); ?><?php endif; ?></a>

		<?php if ( !empty($mobile_logo['url']) ) : ?>
			<a href="<?php echo esc_url( $logo_url ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="<?php echo esc_attr($class);?> show-mobile-logo"><img src="<?php echo esc_url($mobile_logo['url']); ?>" alt="<?php echo esc_attr(get_bloginfo( 'name' )); ?>" /></a>
		<?php endif ?>

	</<?php echo $title_tag;?>>


	
</div>