<?php
/**
 * The template part for displaying icons in header.
 *
 * @package ProfileTree
 */

?>

<div
	x-data="{ open: false }"
	x-on:menu-open.window="open = ! open"
	:class="{ 'active-menu': open }"
	class="flex items-center gap-3"
>
	<button x-data @click="$dispatch('menu-open')" class="mobile-menu-button | grid gap-1.5">
		<span class="w-[34px] h-0.5 bg-text-color dark:bg-white transition ease-out duration-300"></span>
		<span class="w-[34px] h-0.5 bg-text-color dark:bg-white transition ease-out duration-300"></span>
		<span class="w-[34px] h-0.5 bg-text-color dark:bg-white transition ease-out duration-300"></span>
	</button>
</div>
