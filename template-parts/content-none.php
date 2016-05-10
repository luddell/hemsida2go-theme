<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package hemsida2go
 */

?>

<section class="<?php if ( is_404() ) { echo 'error-404'; } else { echo 'no-results'; } ?> not-found">
	<header class="page-header">
		<h1 class="page-title">
			<?php 
			if ( is_404() ) { esc_html_e( 'Sidan är tyvärr inte tillgänglig', 'hemsida2go' );
			} else if ( is_search() ) {
				/* translators: %s = search query */
				printf( esc_html__( 'Ingenting kunde hittas för &ldquo;%s&rdquo;', 'hemsida2go'), '<em>' . get_search_query() . '</em>' );
			} else {
				esc_html_e( 'Ingenting kunde hittas', 'hemsida2go' );
			}
			?>
		</h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( wp_kses( __( 'Redo att publicera ditt första inlägg? <a href="%1$s">Börja här!</a>.', 'hemsida2go' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php esc_html_e( 'Tyvärr kunde vi inte hitta det du sökte efter, vänligen försök igen med nya sökord.', 'hemsida2go' ); ?></p>
			<?php get_search_form(); ?>
		
		<?php elseif ( is_404() ) : ?>

			<p><?php esc_html_e( 'Du verkar ha hamnat vilse. För att hitta det du letar efter så kan du söka här:', 'hemsida2go' ); ?></p>
			<?php get_search_form(); ?>
			
		<?php else : ?>

			<p><?php esc_html_e( 'Det verkar som att vi inte kan hitta det du söker efter, testa att söka!', 'hemsida2go' ); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>
	</div><!-- .page-content -->
	

</section><!-- .no-results -->
