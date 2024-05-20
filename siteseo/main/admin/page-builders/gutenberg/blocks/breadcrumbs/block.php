<?php

/**
 * Breadcrumbs Block display callback
 *
 * @param   array     $attributes  Block attributes
 * @param   string    $content     Inner block content
 * @param   WP_Block  $block       Actual block
 * @return  string    $html
 */
function siteseo_breadcrumb_block( $attributes, $content, $block ){
    $html = '';

	if( '1' == siteseo_get_toggle_option('advanced')){
		if ( '1' === siteseo_get_service('AdvancedOption')->getBreadcrumbsEnable() || '1' === siteseo_get_service('AdvancedOption')->getBreadcrumbsJsonEnable() ) {
			$attr   = get_block_wrapper_attributes();
			$html   = sprintf( '<div %s>%s</div>', $attr, siteseo_display_breadcrumbs( false ) );
		}
	}
	return apply_filters( 'siteseo_breadcrumb_block_html', $html, $attributes, $content, $block );
}
