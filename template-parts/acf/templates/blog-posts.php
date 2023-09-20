<?php
/**
 * The ACF template part for displaying Blog posts.
 *
 * @package ProfileTree
 */

$post_ids = get_sub_field( 'select_posts' );
?>

<section class="w-full">
	<div class="container">

		<?php
		$args = [
			'post_type'      => 'post',
			'posts_per_page' => '-1',
			'post__in'       => $post_ids,
			'orderby'        => 'post__in',
		];
	
		$query = new WP_Query( $args );
	
		if ( ! $query->have_posts() ) {
			echo '<p>No posts found.</p>';
		}

		echo '<div class="grid md:grid-cols-3 gap-4 items-start">';

		while ( $query->have_posts() ) :
			$query->the_post();

			$img_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );

			if ( $img_url ) {
				$img_html = '<img class="mb-2 aspect-[211/122] object-cover" src="' . $img_url . '" alt="Post Image">';
			}

			$categories_list = get_the_category_list( ', ', 'profiletree' );

			printf(
				'<article class="grid gap-4">
					%s
					<div class="text-primary-color text-xs font-extrabold uppercase">%s</div>
					<div class="grid gap-2">
						<h3 class="text-xl font-semibold">%s</h3>
						<div class="text-sm leading-relaxed">%s</div>
					</div>
					<a href="%s" class="flex items-center gap-4 hover:gap-6 text-primary-color font-semibold transition-all">%s%s</a>
				</article>',
				wp_kses_post( $img_html ),
				wp_kses_post( $categories_list ),
				esc_html( get_the_title() ),
				html_entity_decode( wp_trim_words( htmlentities( wpautop( get_the_content() ) ), 20, '...' ) ), // phpcs:ignore
				esc_url( get_the_permalink() ),
				esc_html__( 'Read more', 'profiletree' ),
				get_svg( 'icons/arrow-right', false ) // phpcs:ignore
			);

		endwhile;
		wp_reset_postdata();

		echo '</div>';
		?>

	</div>
</section>
