<?php if( $next_link = get_previous_post_link('%link','%title',true) ) : ?>
	
	<!-- <div class="sdw-post-separator sdw-post-separator-1 sdw-pagination-separator"></div> -->
	<nav id="sdw-pagination" class="sdw-pagination sdw-infinite-scroll-single">
			<?php echo $next_link; ?>
			<div class="sdw-loader"><?php _e('Loading...', THEME_SLUG); ?></div>
	</nav>

<?php endif; ?>