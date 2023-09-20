<?php
/**
 * The template part for displaying Theme changer and button in header.
 *
 * @package ProfileTree
 */

$btn = get_field( 'header_button', 'options' );
?>

<div class="flex items-center gap-16">

	<div x-data="{ open: false }" class="relative">
		<button @click="open = true" @click.outside="open = false" class="flex items-center gap-4 dark:text-white dark:hidden">
			<?php get_svg( 'icons/light' ); ?>
			<?php get_svg( 'icons/arrow-down' ); ?>
		</button>
		<button @click="open = true" @click.outside="open = false" class="hidden dark:flex items-center gap-4 dark:text-white">
			<?php get_svg( 'icons/dark' ); ?>
			<?php get_svg( 'icons/arrow-down' ); ?>
		</button>
	
		<div x-show="open" class="w-48 grid dark:text-white bg-white dark:bg-white/20 shadow rounded-lg p-2.5 absolute right-0 top-12">
			<button onClick="setLightTheme()" @click="open = false" class="flex items-center gap-4 text-primary-color dark:text-white dark:bg-transparent bg-light-color hover:bg-light-color dark:hover:bg-white/20 p-4 rounded-lg">
				<?php
					get_svg( 'icons/light' );
					esc_html_e( 'Light', 'profiletree' );
				?>
			</button>
			<button onClick="setDarkTheme()" @click="open = false" class="flex items-center gap-4 dark:text-primary-color hover:bg-light-color dark:bg-white/20 p-4 rounded-lg">
				<?php
					get_svg( 'icons/dark' );
					esc_html_e( 'Dark', 'profiletree' );
				?>
			</button>
		</div>
	</div>

	<?php
	if ( $btn ) {
		printf(
			'<div class="hidden md:block"><a href="%s" class="button" target="%s">%s</a></div>',
			esc_url( $btn['url'] ),
			esc_html( $btn['target'] ),
			esc_html( $btn['title'] )
		);
	}
	?>

</div>
