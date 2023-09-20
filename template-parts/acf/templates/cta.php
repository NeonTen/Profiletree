<?php
/**
 * The ACF template part for displaying CTA.
 *
 * @package ProfileTree
 */

$heading = get_sub_field( 'heading' );
$btn     = get_sub_field( 'button' );

if ( ! $heading && ! $btn ) {
	return;
}
?>

<section class="w-full bg-light-color dark:bg-d-dark-color">
	<div class="container">

		<div class="grid text-center gap-12">
		<?php
		if ( $heading ) {
			echo '<h2 class="text-4xl md:text-45 font-semibold leading-none">' . do_shortcode( $heading ) . '</h2>';
		}
		if ( $btn ) {
			printf(
				'<div><a href="%s" class="button" target="%s">%s</a></div>',
				esc_url( $btn['url'] ),
				esc_html( $btn['target'] ),
				esc_html( $btn['title'] )
			);
		}
		?>
		</div>

	</div>
</section>
