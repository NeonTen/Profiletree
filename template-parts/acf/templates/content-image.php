<?php
/**
 * The ACF template part for displaying Content with image.
 *
 * @package ProfileTree
 */

$small_heading = get_sub_field( 'small_heading' );
$heading       = get_sub_field( 'heading' );
$content       = get_sub_field( 'content' );
$image         = get_sub_field( 'image' );
$btn           = get_sub_field( 'link' );

if ( ! $small_heading && ! $heading && ! $content && ! $image && ! $btn ) {
	return;
}
?>

<section class="w-full">
	<div class="container">

		<div class="grid lg:flex justify-between items-center gap-10 lg:gap-24">
			<div class="grid">
				<?php
				if ( $small_heading ) {
					echo '<div class="text-primary-color text-xs font-extrabold uppercase mb-4">' . esc_html( $small_heading ) . '</div>';
				}
				if ( $heading ) {
					echo '<h2 class="text-4xl md:text-45 font-semibold leading-none mb-10">' . do_shortcode( $heading ) . '</h2>';
				}
				if ( $content ) {
					echo '<div class="wysiwyg-editor gap-10">' . wp_kses_post( $content ) . '</div>';
				}
				if ( $btn ) {
					printf(
						'<a href="%s" class="flex items-center gap-4 hover:gap-6 text-primary-color font-semibold mt-10 transition-all" target="%s">%s%s</a>',
						esc_url( $btn['url'] ),
						esc_html( $btn['target'] ),
						esc_html( $btn['title'] ),
						get_svg( 'icons/arrow-right', false ) // phpcs:ignore
					);
				}
				?>
			</div>
			<?php
			if ( $image ) {
				echo '<img class="w-full max-w-[540px] aspect-[18/19] object-cover" src="' . esc_url( $image ) . '">';
			}
			?>
		</div>

	</div>
</section>
