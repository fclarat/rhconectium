<?php
/**
 * Template Name: Most Liked Posts
 *
 * Description: Twenty Twelve loves the no-sidebar look as much as
 * you do. Use this page template to remove the sidebar from any page.
 *
 * Tip: to remove the sidebar from all posts and pages simply remove
 * any active widgets from the Main Sidebar area, and the sidebar will
 * disappear everywhere.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
		<?php
		// Get the last voted time based on a week
		$last_voted_time = GetWtiLastDate('7');
		
		// Query to get all posts sorted by like count after a specific date
		$the_query = new WP_Query(
					array(
						'post_type' => 'post',
						'posts_per_page' => 5,
						'meta_key' => '_wti_like_count',
						'orderby' => 'meta_value_num',
						'order' => 'DESC',
						'meta_query' => array(
							array(
								'key'     => '_wti_last_voted_time',
								'value'   => $last_voted_time,
								'type' 	=> 'DATETIME',
								'compare' => '>='
							)
						)
					)
				);
		
		if ( $the_query->have_posts() ) :
			?>
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<article>
					<header class="entry-header">
						<h1 class="entry-title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h1>
					</header>
					<div class="entry-content"><?php the_content(); ?></div>
				</article>
			<?php endwhile; ?>
			<?php
		else :
			?>
			<article>
				<header class="entry-header">
					<h1 class="entry-title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h1>
				</header>
				<div class="entry-content"><?php _e( 'Nothing Found', 'wti-like-post' ); ?></div>
			</article>
			<?php
		endif;
		
		/* Restore original Post Data */
		wp_reset_postdata();
		?>
		
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar( ); ?>
<?php get_footer(); ?>