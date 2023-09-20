<?php
/**
 * The ACF template part for displaying Heading section.
 *
 * @package ProfileTree
 */

$small_heading = get_sub_field( 'small_heading' );
$heading       = get_sub_field( 'heading' );
$btn           = get_sub_field( 'button' );
$content       = get_sub_field( 'content' );
$heading_tag   = get_sub_field( 'heading_tag' );
$v_alignment   = get_sub_field( 'vertical_alignment' );
$btn_position  = get_sub_field( 'button_position' );
$is_bg         = get_sub_field( 'background' );

$grid_col = ' lg:grid-cols-2';
$span5    = '';
$span7    = '';
$h_font   = 'text-4xl md:text-45';
$p_font   = 'text-lg';
$classes  = 'w-full';

if ( 'h1' === $heading_tag ) {
	$grid_col = ' lg:grid-cols-12';
	$span5    = ' lg:col-span-5';
	$span7    = ' lg:col-span-7';
	$h_font   = 'text-5xl md:text-65';
	$p_font   = 'text-base';
}
if ( $is_bg ) {
	$classes = 'w-full bg-light-color dark:bg-d-dark-color';
}
?>
<section class="<?php echo esc_html( $classes ); ?>">
	<div class="container">

		<div class="grid gap-10 xl:gap-28 <?php echo esc_html( $v_alignment ); ?><?php echo esc_html( $grid_col ); ?>">
			<?php
			if ( $small_heading || $heading || $btn ) {
				echo '<div class="w-full' . esc_html( $span7 ) . '">';
				if ( $small_heading ) {
					echo '<div class="text-primary-color text-xs font-extrabold uppercase mb-4">' . esc_html( $small_heading ) . '</div>';
				}
				if ( $heading ) {
					printf(
						'<%1$s class="%2$s font-semibold leading-none">%3$s</%1$s>',
						esc_html( $heading_tag ),
						esc_html( $h_font ),
						do_shortcode( $heading )
					);
				}
				if ( $btn && 'left' === $btn_position ) {
					printf(
						'<div><a href="%s" class="button mt-10" target="%s">%s</a></div>',
						esc_url( $btn['url'] ),
						esc_html( $btn['target'] ),
						esc_html( $btn['title'] )
					);
				}
				echo '</div>';
			}

			// Content.
			if ( $content || $btn ) {
				echo '<div class="grid gap-10' . esc_html( $span5 ) . '">';
				if ( $content ) {
					echo '<p class="' . esc_html( $p_font ) . '">' . wp_kses_post( $content ) . '</p>';
				}
				if ( $btn && 'right' === $btn_position ) {
					printf(
						'<div class="lg:ml-auto"><a href="%s" class="button" target="%s">%s</a></div>',
						esc_url( $btn['url'] ),
						esc_html( $btn['target'] ),
						esc_html( $btn['title'] )
					);
				}
				echo '</div>';
			}
			?>
		</div>

	</div>
</section>
