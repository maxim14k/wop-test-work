<?php
/**
 * Test Work
 * Functions
 * @package WordPress
 * @subpackage clean
 */


function css_admin() {

    wp_register_style('admin-custom-css', get_template_directory_uri() . '/assets/css/custom-admin.css', array(), rand(99,999) );
    wp_enqueue_style('admin-custom-css');

	wp_enqueue_script('wp-color-picker', get_template_directory_uri() . '/assets/js/colorpicker.js', array( 'farbtastic' ), false, true );

	wp_enqueue_script('custom-admin-js', get_template_directory_uri() . '/assets/js/custom-admin.js', array(), rand(99,999) );
}
add_action('admin_enqueue_scripts', 'css_admin');


/** Post Type Car */
add_action( 'init', 'register_post_types' );
function register_post_types(){
	register_post_type( 'car', [
		'labels' => [
			'name'               => 'Car',
			'singular_name'      => 'Car',
			'add_new'            => 'Add Car',
			'add_new_item'       => 'Add Car', 
			'edit_item'          => 'Edit Car',
			'new_item'           => 'New Car',
			'view_item'          => 'Vew Car',
			'search_items'       => 'Search Car',
			'not_found'          => 'Not Found',
			'not_found_in_trash' => 'Not Found in trash',
			'menu_name'          => 'Car',
		],
		'public'              => true,
		'rewrite'             => array( 'slug' => 'car' ),
		'menu_icon'           => 'dashicons-car',
		'supports'            => [ 'title', 'editor' ],
	] );
}
/** end */


/** Register Taxonomy Brand */
add_action( 'init', 'create_taxonomy_brand' );
function create_taxonomy_brand(){

	register_taxonomy( 'brand', 'car' , [
		'hierarchical'          => true,
		'labels'                => [
			'name'              => 'Brand',
			'singular_name'     => 'Brand',
			'search_items'      => 'Search Brand',
			'all_items'         => 'All Brands',
			'view_item '        => 'View Brand',
			'edit_item'         => 'Edit Brand',
			'update_item'       => 'Update Brand',
			'add_new_item'      => 'Add New Brand',
			'new_item_name'     => 'New Brand',
			'menu_name'         => 'Brand',
			'back_to_items'     => '← Back to Brand',
		],
		'show_ui'       => true,
		'query_var'     => true,
	] );
}
/** end */

/** Register Taxonomy Country */
add_action( 'init', 'create_taxonomy_country' );
function create_taxonomy_country(){

	register_taxonomy( 'country', 'car', [
		'hierarchical'          => true,
		'labels'                => [
			'name'              => 'Country',
			'singular_name'     => 'Country',
			'search_items'      => 'Search Country',
			'all_items'         => 'All Country',
			'view_item '        => 'View Country',
			'edit_item'         => 'Edit Country',
			'update_item'       => 'Update Country',
			'add_new_item'      => 'Add New Country',
			'new_item_name'     => 'New Country',
			'menu_name'         => 'Country',
			'back_to_items'     => '← Back to Country',
		],
		'show_ui'       => true,
		'query_var'     => true,
	] );
}
/** end */

/** Register meta */

function register_metabox_car(){
	add_meta_box( 'car-metabox', 'Meta-fields', 'meta_display_car', 'car' );
}

add_action('add_meta_boxes', 'register_metabox_car');

function meta_display_car(){
	include plugin_dir_path(__FILE__) . 'meta_car.php';
}

function car_meta_save($post_id){
	$field_list = [
		'car_meta_color',
		'car_meta_fuel',
		'car_meta_power',
		'car_meta_price',
	];
	foreach($field_list as $field){
		if(array_key_exists($field, $_POST)){
			update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
		}
	}
}

add_action('save_post', 'car_meta_save');

/** end */

/** Logo customizer */
function custom_logo_setup() {
    $defaults = array(
        'height'               => 150,
        'width'                => 400,
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => array( 'site-title', 'site-description' ),
        'unlink-homepage-logo' => true, 
    );
 
    add_theme_support( 'custom-logo', $defaults );
}

add_action('after_setup_theme', 'custom_logo_setup');

/** end */

/** Phone customizer */


add_action('customize_register','car_customizer_tel', 21);

function car_customizer_tel($wp_customize){
	global $wp_customizer;

	$wp_customize->add_section('car_cust_section', array(
		'title'			=> __('Phone number', 'wl_test_theme'),
		'priority'		=> 21,
		'description' 	=> __('Add phone number', 'wl_test_theme'),
	));

	$wp_customize->add_setting('car_cust_settings', array(

	));

	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'car_cust_setting', array(
		'label'   	=> __('Phone number', 'wl_test_theme'),
		'section'	=> 'car_cust_section',
		'settings'	=> 'car_cust_settings'
	)));
}

//Display field phone
function output_custom_tel(){ 
	$custom_tel = get_theme_mod('car_cust_settings');
	if($custom_tel){
		echo '<div class="tel_num">' . $custom_tel . '</div>';
	}
}

/** end */

/** Display Car list */
function car_list(){
	$posts = get_posts( array(
		'numberposts' => 20,
		'orderby'     => 'date',
		'order'       => 'DESC',
		'post_type'   => 'car',
		'suppress_filters' => true,
	) ); 

	echo '<ul>';

	foreach( $posts as $post ){
		setup_postdata($post); 
	?>
		<li><a href="<?php echo get_permalink($post->ID); ?>"><?php echo $post->post_title; ?></a></li>
	<?php }
	
	echo '</ul>';
	  
}
add_shortcode( 'get-car-list', 'car_list' );

/** end */

/** Gas */
function get_fuel_name($slug){
	if($slug == 'patrol') return 'Petrol';
	if($slug == 'diesel') return 'Diesel';
	if($slug == 'gas') return 'Gas';
}
/** end */



