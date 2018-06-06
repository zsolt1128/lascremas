<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package storefront
 */

get_header(); ?>
<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post();

				do_action( 'storefront_page_before' );

				get_template_part( 'content', 'page' );

				/**
				 * Functions hooked in to storefront_page_after action

				 *
			         * @hooked storefront_display_comments - 10
				 */

				do_action( 'storefront_page_after' );

			endwhile; // End of the loop. 
      $terms = get_terms('pa_marca');
     if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
        echo '<ul>';
        foreach ( $terms as $term ) {
           echo'<li>
                <div class="tooltip">'.$term->name.'
                <span class="tooltiptext">'.$term->description.'</span>
                </div></li>';
        }
        echo '</ul>';
     }


?>
<style>
.tooltip {
    position: relative;
    display: inline-block;
    border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
    visibility: hidden;
    width: 120px;
    background-color: black;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;

    /* Position the tooltip */
    position: absolute;
    z-index: 1;
}

.tooltip:hover .tooltiptext {
    visibility: visible;
}
</style>


		</main><!-- #main -->
	</div><!-- #primary -->
<?php
do_action( 'storefront_sidebar' );
get_footer();
