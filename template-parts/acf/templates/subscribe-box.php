<?php
/**
 * The ACF template part for displaying Subscribe box.
 *
 * @package ProfileTree
 */

$heading   = get_sub_field( 'heading' );
$content   = get_sub_field( 'content' );
$shortcode = get_sub_field( 'form_shortcode' );

if ( ! $heading && ! $content && ! $shortcode ) {
	return;
}
?>

<section class="w-full grid items-center bg-light-color dark:bg-d-dark-color">
	<div class="container">
		<div class="grid md:grid-cols-2 items-center gap-10">
		<?php
		if ( $heading || $content ) {
			echo '<div class="grid gap-2">';
			if ( $heading ) {
				echo '<h3 class="text-2xl md:text-3xl font-semibold leading-none">' . do_shortcode( $heading ) . '</h3>';
			}
			if ( $content ) {
				echo '<p class="text-sm max-w-[396px] leading-relaxed">' . wp_kses_post( $content ) . '</p>';
			}
			echo '</div>';
		}
		if ( $shortcode ) {
			echo '<div class="shrink-0">';
			echo do_shortcode( $shortcode );
			echo '</div>';
		}
		?>
		</div>
	</div>
</section>
