<?php
/**
 * The template part for displaying Widget 2 in footer.
 *
 * @package ProfileTree
 */

$heading = get_field( 'fw2_heading', 'option' );
$content = get_field( 'fw2_content', 'option' );
$btn     = get_field( 'fw2_link', 'option' );
?>

<div class="grid gap-4 text-sm">

	<?php
	if ( $heading ) {
		echo '<div class="text-primary-color text-xs font-extrabold uppercase">' . esc_html( $heading ) . '</div>';
	}
	if ( $content ) {
		echo '<div class="wysiwyg-editor">' . wp_kses_post( $content ) . '</div>';
	}
	if ( $btn ) {
		printf(
			'<a href="%s" class="flex items-center gap-4 hover:gap-6 text-primary-color text-sm font-semibold transition-all" target="%s">%s%s</a>',
			esc_url( $btn['url'] ),
			esc_html( $btn['target'] ),
			esc_html( $btn['title'] ),
			get_svg( 'icons/arrow-right', false ) // phpcs:ignore
		);
	}
	?>

</div>
