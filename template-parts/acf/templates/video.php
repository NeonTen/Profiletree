<?php
/**
 * The ACF template part for displaying YouTube video.
 *
 * @package ProfileTree
 */

$video = get_sub_field( 'youtube_id' );
if ( ! $video ) {
	return;
}
?>

<section class="bg-light-color dark:bg-d-dark-color p-4">
	<iframe class="w-full aspect-video" src="https://www.youtube.com/embed/<?php echo esc_html( $video ); ?>?autoplay=1&mute=1&controls=0"></iframe>
</section>