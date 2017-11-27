<section class="sdw-box-authors clearfix sdw-author-box">
	

	<?php
       $authors_meta = sdw_get_page_meta( get_the_ID(), 'authors' );
       
	   $args = array(
            'fields'    => array('ID'),
            'order'     => $authors_meta['order'],
            'orderby'   => $authors_meta['orderby'],
            'role__not_in' => $authors_meta['roles'],
            'exclude'   => $authors_meta['exclude'] 
        );

	   $authors_query = new WP_User_Query($args); 
	   $authors = $authors_query->get_results();
       
	?>
	<?php if (!empty($authors)) : ?>
		<?php 
			$count = count($authors);

		?>
	    <?php foreach ( $authors as $i => $author ) : ?>
	        
			<div class="sdw-box-inside clearfix ">

				<div class="data-image">
					<?php echo get_avatar( get_the_author_meta('ID',$author->ID), 135 ); ?>
				</div>
				
				<div class="data-content">
					<h4 class="author-title"><?php the_author_meta('display_name', $author->ID); ?></h4>
					<div class="data-entry-content">
						<?php echo wpautop(get_the_author_meta('description', $author->ID)); ?>
					</div>


					<div class="sdw-data-links">
							<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID', $author->ID ))); ?>" class="sdw-author-link sdw-button-secondary sdw-button-small"><i class="fa fa-file-text-o"></i><?php echo __sdw('view_all_posts'); ?></a>
					</div>
				
					<div class="sdw-author-links">
						<?php if (get_the_author_meta('url', $author->ID)) {?> <a href="<?php esc_url(the_author_meta('url', $author->ID )); ?>" target="_blank" class="fa fa-link sdw-author-website"></a><?php } ?>
						<?php $user_social = sdw_get_social(); ?>			
						<?php foreach($user_social as $soc_id => $soc_name): ?>
							<?php if($social_meta = get_the_author_meta($soc_id, $author->ID)) : ?>
								<a href="<?php echo esc_url($social_meta); ?>" target="_blank" class="fa fa-<?php echo esc_attr($soc_id); ?>"></a>
							<?php endif; ?>			
						<?php endforeach; ?>					
					</div>
				
				</div>	

			</div>
		
			<?php if ($count - 1 > $i ): ?>
				<hr class="sdw-box-inside nice-divider">
			<?php endif ?>

		 <?php endforeach; ?>
	<?php endif; ?>

</section>