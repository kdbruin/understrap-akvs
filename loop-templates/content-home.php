<?php
/**
 * Content home partial template.
 *
 * @package understrap-child
 */
?>

<!-- Carousel for featured posts -->
<?php
$args = array(
	'posts_per_page' => 5,
	'post_type'      => 'post',
	// 'category_name'  => 'featured',
);
$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) :
	?>
<div class="row">
	<div class="container">
		<div id="featured-blog-posts" class="carousel slide" data-ride="carousel">

			<ol class="carousel-indicators">
				<!-- Start Carousel Indicator Loop -->
				<?php
				while ( $the_query->have_posts() ) :
					$the_query->the_post();
					?>
				<li data-target="#featured-blog-posts" data-slide-to="<?php echo $the_query->current_post; ?>" class="
																		<?php
																		if ( $the_query->current_post == 0 ) :
																			?>
					active<?php endif; ?>">"></li>
						<?php
				endwhile;
				?>
			</ol>
			<?php rewind_posts(); ?>

			<div class="carousel-inner">
				<?php
				while ( $the_query->have_posts() ) :
					$the_query->the_post();
					$thumbnail_id   = get_post_thumbnail_id();
					$thumbnail_url  = wp_get_attachment_image_src( $thumbnail_id, 'full', true );
					$thumbnail_meta = get_post_meta( $thumbnail_id, '_wp_attatchment_image_alt', true );
					?>
				<div class="carousel-item 
						<?php
						if ( $the_query->current_post == 0 ) :
							?>
					active<?php endif; ?>">
					<div class="media">
						<?php if ( has_post_thumbnail() ) : ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
								<?php the_post_thumbnail( 'thumb' ); ?>
						</a>
						<?php endif; ?>
						<div class="media-body">
							<h4 class="mt-0">
								<?php the_title(); ?>
							</h4>
							<?php the_excerpt(); ?>
						</div>
					</div>
				</div>

						<?php
				endwhile;
				?>
			</div>

			<a class="carousel-control-prev" href="#featured-blog-posts" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#featured-blog-posts" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
</div>
	<?php
endif;
?>
