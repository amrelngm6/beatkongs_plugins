<?php 
if (!function_exists('str_contains')) {
    function str_contains (string $haystack, string $needle)
    {
        return empty($needle) || strpos($haystack, $needle) !== false;
    }
}//fixing php 7.2 error

function vtfd_plugin_dir_url(){
    $v=explode('/',plugin_dir_url( __DIR__ ));
    array_pop($v);
    return implode('/',$v);
}
// vendor templates for dokan plugin dir urls

if( ! function_exists( 'vtfd_add_setting_template' ) )
{
	function vtfd_add_setting_template( $data )
	{
        $data['dokan_appearance']['store_header_template']['options']['vendor-templates-dokan_layout1']=vtfd_plugin_dir_url().'/assets/img/temp1.png';
        $data['dokan_appearance']['store_header_template']['options']['vendor-templates-dokan_layout2']=vtfd_plugin_dir_url().'/assets/img/temp2.png';
        $data['dokan_appearance']['store_header_template']['options']['vendor-templates-dokan_layout3']=vtfd_plugin_dir_url().'/assets/img/temp3.png';
        $data['dokan_appearance']['store_header_template']['options']['vendor-templates-dokan_layout4']=vtfd_plugin_dir_url().'/assets/img/temp4.png';
		// print_r($data);
		return $data;
	}
}
add_filter( 'dokan_settings_fields', 'vtfd_add_setting_template', 11 );


function vtfd_theme_name_scripts() {
	wp_enqueue_style( 'style-name',vtfd_plugin_dir_url().'/assets/css/style.css'  );
}
add_action( 'wp_enqueue_scripts', 'vtfd_theme_name_scripts',11 );