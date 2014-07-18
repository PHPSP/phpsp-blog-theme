<?php
/**
 * The template for displaying search forms in Twenty Eleven
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
	<form class="form-search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">		
		<input type="text"  name="s" id="s" placeholder="Buscar no PHPSP" />
		<input type="submit" id="searchsubmit" value="OK" />
	</form>              
