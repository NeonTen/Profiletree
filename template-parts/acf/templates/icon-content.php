<?php
/**
 * The ACF template part for displaying Icon with content.
 *
 * @package ProfileTree
 */

if ( ! have_rows( 'add_content' ) ) {
	return;
}
?>

<section class="w-full bg-light-color dark:bg-d-dark-color">
	<div class="container">

	<?php
	if ( have_rows( 'add_content' ) ) :

		echo '<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10 md:gap-x-10 md:gap-y-[90px]">';

		// Loop through rows.
		while ( have_rows( 'add_content' ) ) :
			the_row();

			// Load sub field value.
			$icon    = get_sub_field( 'icon' );
			$heading = get_sub_field( 'title' );
			$content = get_sub_field( 'content' );
			$btn     = get_sub_field( 'button' );

			$icon_html = '';

			if ( $icon ) {
				$icon_html = '<img class="w-[60px] h-[60px] mb-4" src="' . $icon . '">';
			}

			printf(
				'<div class="grid gap-4">
					%s
					<h3 class="text-3xl">%s</h3>
					<p>%s</p>
					<a href="%s" class="flex items-center gap-4 hover:gap-6 text-primary-color font-semibold transition-all" target="%s">%s%s</a>
				</div>',
				wp_kses_post( $icon_html ),
				wp_kses_post( $heading ),
				wp_kses_post( $content ),
				esc_url( $btn['url'] ),
				esc_html( $btn['target'] ),
				esc_html( $btn['title'] ),
				get_svg( 'icons/arrow-right', false ) // phpcs:ignore
			);

		endwhile;

		echo '</div>';

	endif;
	?>

	</div>
</section>
