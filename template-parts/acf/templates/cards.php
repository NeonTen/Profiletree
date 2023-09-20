<?php
/**
 * The ACF template part for displaying Cards.
 *
 * @package ProfileTree
 */

if ( ! have_rows( 'add_cards' ) ) {
	return;
}

$count = 1;
?>

<section class="w-full bg-light-color dark:bg-d-dark-color p-4">

	<?php
	if ( have_rows( 'add_cards' ) ) :

		echo '<div class="grid md:grid-cols-2 lg:grid-cols-12 gap-4">';

		// Loop through rows.
		while ( have_rows( 'add_cards' ) ) :
			the_row();

			// Load sub field value.
			$url           = get_sub_field( 'link' );
			$image         = get_sub_field( 'image' );
			$small_heading = get_sub_field( 'small_heading' );
			$content       = get_sub_field( 'content' );

			$image_html = '';
			$class      = 'lg:col-span-4';
			$aspect     = ' aspect-square';

			if ( 1 === $count || 2 === $count ) {
				$class  = 'lg:col-span-6 ';
				$aspect = ' aspect-square lg:aspect-[174/115]';
			}

			if ( $image ) {
				$image_html = '<img class="w-full' . $aspect . ' object-cover group-hover:scale-105 transition-all duration-300" src="' . $image . '" alt="Card image">';
			}

			printf(
				'<a href="%s" class="%s relative overflow-hidden group">
					%s
					<div class="grid items-end text-white p-8 absolute inset-0">
						<div class="gradient | absolute inset-0"></div>
						<div class="grid gap-4 relative z-10">
							<div class="text-xs font-extrabold uppercase">%s</div>
							<div class="wysiwyg-editor dark">%s</div>
						</div>
					</div>
				</a>',
				esc_url( $url ),
				esc_html( $class ),
				wp_kses_post( $image_html ),
				wp_kses_post( $small_heading ),
				wp_kses_post( $content )
			);

			++$count;

		endwhile;

		echo '</div>';

	endif;
	?>

</section>
