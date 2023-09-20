<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package ProfileTree
 */

/**
 * Prints HTML of logo.
 *
 * @param string $loc location of logo.
 */
function theme_logo( $loc = '' ) {
	?>
	<div class="logo">
	<?php
	if ( has_custom_logo() ) {
		$custom_logo_id = get_theme_mod( 'custom_logo' );
		$image          = wp_get_attachment_image_src( $custom_logo_id, 'full' );

		printf(
			'<a href="%s" rel="home">
				<img class="max-h-7 sm:max-h-9" src="%s">
			</a>',
			esc_url( get_home_url() ),
			esc_url( $image[0] )
		);
	} else {
		?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-3xl text-primary-color font-semibold" rel="home"><?php bloginfo( 'name' ); ?></a>
		<?php
	}
	?>
	</div>
	<?php
}

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;

/**
 * Prints HTML of header.
 */
function theme_header_html() {
	?>

	<!-- Menu icon -->
	<?php get_template_part( 'template-parts/header/mega', 'menu' ); ?>

	<!-- Header start -->
	<header class="site-header | w-full bg-white dark:bg-d-body-color relative">

		<div class="container">

			<div class="header-wrap | min-h-[124px] flex justify-between items-center relative z-10">

				<div class="flex items-center gap-8 sm:gap-16">

				<!-- Menu icon -->
				<?php get_template_part( 'template-parts/header/menu', 'icon' ); ?>

				<!-- Logo -->
				<?php theme_logo(); ?>

				<!-- Nav bar -->
				<?php get_template_part( 'template-parts/header/primary', 'nav' ); ?>

				</div>

				<!-- Icons -->
				<?php get_template_part( 'template-parts/header/theme', 'button' ); ?>

			</div>

		</div><!-- Container end -->

	</header>
	<?php
}

/**
 * Prints HTML of footer.
 */
function theme_footer_html() {
	?>

	<footer class="bg-light-color dark:bg-d-dark-color pt-10 md:pt-12 pb-6">
		<div class="container">

			<div class="grid xs:grid-cols-2 md:grid-cols-3 xl:grid-cols-5 items-start gap-10">
				<?php
				/**
				 * Widgets here
				 */
				get_template_part( 'template-parts/footer/widget', '1' );
				get_template_part( 'template-parts/footer/widget', '2' );
				get_template_part( 'template-parts/footer/widget', '3' );
				get_template_part( 'template-parts/footer/widget', '4' );
				get_template_part( 'template-parts/footer/widget', '5' );
				?>
			</div>

		</div><!-- container end -->
	</footer>

	<?php
	theme_copyrights_html();
}

/**
 * Prints HTML of Copyrights.
 */
function theme_copyrights_html() {
	$copyright_text = get_field( 'c_text', 'option' );
	?>

	<!-- Copyrights start -->
	<div class="w-full text-sm font-medium bg-light-color dark:bg-d-dark-color py-8">
		<div class="container">

			<div class="grid md:flex justify-between gap-6 md:gap-10">
				<?php
				if ( $copyright_text ) {
					echo '<div class="flex">' . wp_kses_post( $copyright_text ) . '</div>';
				}
				if ( have_rows( 'c_links', 'option' ) ) :

					echo '<ul class="flex gap-4">';

					while ( have_rows( 'c_links', 'option' ) ) :
						the_row();

						$links = get_sub_field( 'link' );

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

		</div>
	</div>
	<!-- Copyrights end -->

	<?php
}
