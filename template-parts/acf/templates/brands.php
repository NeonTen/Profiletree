<?php
/**
 * The ACF template part for displaying Brands.
 *
 * @package ProfileTree
 */

if ( ! have_rows( 'add_brands' ) ) {
	return;
}
?>

<section class="w-full bg-light-color dark:bg-d-dark-color p-6">

	<?php
	if ( have_rows( 'add_brands' ) ) :

		echo '<div class="grid sm:grid-cols-2 lg:grid-cols-4">';

		// Loop through rows.
		while ( have_rows( 'add_brands' ) ) :
			the_row();

			// Load sub field value.
			$image   = get_sub_field( 'image' );
			$d_image = get_sub_field( 'dark_image' );

			$image_html   = '';
			$d_image_html = '';

			if ( $image ) {
				$image_html = '<img class="w-full h-[152px] object-cover" src="' . $image . '" alt="Brand image">';
			}
			if ( $d_image ) {
				$d_image_html = '<img class="w-full h-[152px] object-cover" src="' . $d_image . '" alt="Brand image">';
			}

			printf(
				'<div class="dark:hidden">
					%s
				</div>',
				wp_kses_post( $image_html )
			);
			printf(
				'<div class="hidden dark:block">
					%s
				</div>',
				wp_kses_post( $d_image_html )
			);

		endwhile;

		echo '</div>';

	endif;
	?>

</section>
