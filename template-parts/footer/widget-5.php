<?php
/**
 * The template part for displaying Widget 5 in footer.
 *
 * @package ProfileTree
 */

$heading = get_field( 'fw5_heading', 'option' );

if ( ! $heading && ! have_rows( 'fw5_links', 'option' ) ) {
	return;
}
?>
<div class="grid gap-4 text-sm">
	<?php

	if ( $heading ) {
		echo '<div class="text-primary-color text-xs font-extrabold uppercase">' . esc_html( $heading ) . '</div>';
	}

	if ( have_rows( 'fw5_links', 'option' ) ) :

		echo '<ul class="grid gap-1.5">';

		while ( have_rows( 'fw5_links', 'option' ) ) :
			the_row();

			$links = get_sub_field( 'fw5_link' );

			if ( $links ) {
				printf(
					'<li>
						<a class="hover:text-primary-color" href="%s" target="%s">%s</a>
					</li>',
					esc_url( $links['url'] ),
					esc_html( $links['target'] ),
					esc_html( $links['title'] )
				);
			}

		endwhile;

		echo '</ul>';

	endif;
	?>
</div>
