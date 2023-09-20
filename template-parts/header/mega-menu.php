<?php
/**
 * The template part for displaying Mega menu in header.
 *
 * @package ProfileTree
 */

$email     = get_field( 'email', 'option' );
$phone     = get_field( 'phone_number', 'option' );
$facebook  = get_field( 'facebook_url', 'option' );
$twitter   = get_field( 'twitter_url', 'option' );
$instagram = get_field( 'instagram_url', 'option' );
$linkedin  = get_field( 'linkedin_url', 'option' );
$tiktok    = get_field( 'tiktok_url', 'option' );
$youtube   = get_field( 'youtube_url', 'option' );

if ( ! have_rows( 'add_menu', 'option' ) && ! $email && ! $phone && ! $facebook && ! $twitter && ! $instagram && ! $linkedin && ! $tiktok && ! $youtube ) {
	return;
}
?>

<div x-data="{ open: false }">
	<div
		class="w-full bg-light-color dark:bg-d-dark-color py-10 md:py-16 absolute top-[156px] shadow-lg"
		x-show="open"
		x-on:menu-open.window="open = ! open"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="-translate-y-[9999px]"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-end="translate-y-0"
		>

		<div class="container">
			<div class="clone | border-b border-border-color mb-6 xl:hidden"></div>

			<?php
			echo '<div class="grid sm:grid-cols-2 md:grid-cols-3 items-start gap-10">';

			// Loop through rows.
			while ( have_rows( 'add_menu', 'option' ) ) :
				the_row();

				echo '<div class="grid gap-6">';

				// Load sub field value.
				$heading = get_sub_field( 'heading' );

				if ( $heading ) {
					echo '<div class="text-primary-color text-sm font-extrabold uppercase">' . esc_html( $heading ) . '</div>';
				}

				// Loop through Links.
				if ( have_rows( 'menu_links', 'option' ) ) :
					echo '<ul class="grid gap-2 text-base sm:text-lg lg:text-2xl">';
					while ( have_rows( 'menu_links', 'option' ) ) :
						the_row();

						// Load sub field value.
						$menu_link = get_sub_field( 'menu_link' );

						printf(
							'<li><a href="%s" class="hover:text-primary-color" target="%s">%s</a></li>',
							esc_url( $menu_link['url'] ),
							esc_html( $menu_link['target'] ),
							esc_html( $menu_link['title'] )
						);

					endwhile;
					echo '</ul>';
				endif;
				// Loop through Links end.

				echo '</div>';

			endwhile;

			echo '</div>';
			?>

			<!-- Footer -->
			<?php
			if ( $email || $phone || $facebook || $twitter || $instagram || $linkedin || $tiktok || $youtube ) {
			?>
			<footer class="border-t border-[#2b2b2b]/20 mt-16 pt-8">
				<div class="grid md:flex gap-8 justify-between">
					<?php
					if ( $email || $phone ) {
						echo '<div class="flex gap-4 sm:gap-8">';
						if ( $email ) {
							printf(
								'<a href="mailto:%1$s" class="hover:text-primary-color">%1$s</a>',
								esc_html( $email )
							);
						}
						if ( $phone ) {
							printf(
								'<a href="tel:%s" class="hover:text-primary-color">%s</a>',
								esc_html( clean_string( $phone ) ),
								esc_html( $phone )
							);
						}
						echo '</div>';
					}

					// Social icons.
					if ( $facebook || $twitter || $instagram || $linkedin || $tiktok || $youtube ) {
						echo '<ul class="flex gap-6">';
						if ( $facebook ) {
							echo '<a class="hover:text-primary-color" href="' . esc_html( $facebook ) . '">' . get_svg( 'icons/facebook', false ) . '</a>';
						}
						if ( $twitter ) {
							echo '<a class="hover:text-primary-color" href="' . esc_html( $twitter ) . '">' . get_svg( 'icons/twitter', false ) . '</a>';
						}
						if ( $instagram ) {
							echo '<a class="hover:text-primary-color" href="' . esc_html( $instagram ) . '">' . get_svg( 'icons/instagram', false ) . '</a>';
						}
						if ( $linkedin ) {
							echo '<a class="hover:text-primary-color" href="' . esc_html( $linkedin ) . '">' . get_svg( 'icons/linkedin', false ) . '</a>';
						}
						if ( $tiktok ) {
							echo '<a class="hover:text-primary-color" href="' . esc_html( $tiktok ) . '">' . get_svg( 'icons/tiktok', false ) . '</a>';
						}
						if ( $youtube ) {
							echo '<a class="hover:text-primary-color" href="' . esc_html( $youtube ) . '">' . get_svg( 'icons/youtube', false ) . '</a>';
						}
						echo '</ul>';
					}
					?>
				</div>
			</footer>
			<?php
			}
			?>
		</div>

	</div>
</div>
