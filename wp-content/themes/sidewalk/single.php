<?php get_header(); ?>

<?php get_template_part('sections/cover-area'); ?>

<?php $sid = sdw_get_current_sidebar(); ?>

<div id="content" class="site-content sdw-sid-<?php echo esc_attr( $sid['use_sidebar'] ); ?>">

<?php  if ( $sid['use_sidebar'] == 'left' ) : ?>
	<?php get_sidebar(); ?>
<?php endif; ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php
				$layout = sdw_get_post_meta( get_the_ID(), 'layout' );
				$layout = $layout == 'inherit' ? sdw_get_option( 'single_layout' ) : $layout;
			?>
			<?php get_template_part( 'sections/content-single-'.$layout ); ?>

		<?php endwhile; ?>

		</main>

		<?php if ( sdw_get_option( 'show_prev_next' ) ) : ?>
			<?php get_template_part( 'sections/prev-next' ); ?>
		<?php endif; ?>

		<?php if ( sdw_get_option( 'show_related' ) ) : ?>
			<?php get_template_part( 'sections/related-box' ); ?>
		<?php endif; ?>

		<?php if ( sdw_get_option( 'show_author_box' ) ) : ?>
			<?php get_template_part( 'sections/author-box' ); ?>
		<?php endif; ?>

		<?php comments_template(); ?>

	</div>

<?php if ( $sid['use_sidebar'] == 'right' ) : ?>
	<?php get_sidebar(); ?>
<?php endif; ?>

</div>

<?php if ( sdw_get_option( 'infinite_scroll_single' ) ) : ?>
	<?php get_template_part( 'sections/pagination/single-infinite-scroll' ); ?>
<?php endif; ?>

<?php get_footer(); ?>