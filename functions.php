<?php
define('THEME_VERSION', '1.0.1');
define('THEME_ICON', get_stylesheet_directory_uri() . '/images/icon.png');

class PBA_Main {
  private $section_param;

  public function __construct($param) {
    $this->section_param = $param;
  }

  public static function showSection($param) {
    if($param && !empty($param)) {
        include_once( 'includes/sections/'. $param .'.php' );
    }
  }
}

/**
 * Setup
 */
function plandd_setup()
{
    /**
     * Registrar formatos de miniaturas
     */
    add_theme_support('post-thumbnails');

    set_post_thumbnail_size(242, 220, true);
    if (function_exists('add_image_size')) {
        add_image_size('destaque.grande', 960, 395, true);
        add_image_size('destaque.medio', 300, 187, true);
        add_image_size('destaque.pequeno', 140, 98, true);
        add_image_size('destaque.rodape', 300, 286, true);
        add_image_size('destaque.editoria', 300, 286, true);
        add_image_size('destaque.colunista', 80, 80, true);
    }

    function new_excerpt_length($length) {
        return 20;
    }
    add_filter('excerpt_length', 'new_excerpt_length');

    remove_filter('the_excerpt', 'wpautop'); // sem paragrafo no resumo

    /**
     * Menus
     */
    register_nav_menus( array(
        'primary' => __( 'Menu principal',   'plandd' )
    ) );
}
add_action('init','plandd_setup');

/**
* Configure funções para campos personalizados da aplicação
*/
define( 'USE_LOCAL_ACF_CONFIGURATION', true ); // apenas conf. local
add_filter('acf/settings/path', 'plandd_acf_path');
function plandd_acf_path( $path ) {
     // update path
     $path = get_stylesheet_directory() . '/includes/acf-pro/';
     // return
     return $path;
}
add_filter('acf/settings/dir', 'plandd_acf_dir');
function plandd_acf_dir( $dir ) {
     // update path
     $dir = get_stylesheet_directory_uri() . '/includes/acf-pro/';
     // return
     return $dir;
}
/**
 * Framework para personalização de campos
 * (custom meta post)
 */
include_once( get_stylesheet_directory() . '/includes/acf-pro/acf.php' );
//define( 'ACF_LITE' , true );
//include_once( get_stylesheet_directory() . '/includes/acf/preconfig.php' );
if( function_exists('acf_add_options_page') ) {
  
  acf_add_options_page(array(
    'page_title'  => 'Opções gerais',
    'menu_title'  => 'PB Agora',
    'menu_slug'   => 'opcoes-gerais',
    'capability'  => 'edit_posts',
    'redirect'    => false
  ));
  
  acf_add_options_sub_page(array(
    'page_title'  => 'Defina categorias para seções da página principal',
    'menu_title'  => 'Seções',
    'parent_slug' => 'opcoes-gerais',
  ));

}

/**
 * Definir funções ajax
 * */
add_action('wp_ajax_nopriv_load_sections', 'load_sections');
add_action('wp_ajax_load_sections', 'load_sections');
function load_sections() {
	PBA_Main::showSection($_GET['param']);
	exit();
}

/**
 * Incorporar scripts */
function plandd_scripts() {
  /*
    Folha de estilo base para a aplicação
   */
  wp_enqueue_style('style', get_stylesheet_directory_uri() . '/style.css', array(), THEME_VERSION, "screen");
    
  /*
    modernizr
  */
  wp_enqueue_script('modernizr', '//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js', array(), THEME_VERSION);
  
  wp_enqueue_script(
		'angularjs',
		'https://ajax.googleapis.com/ajax/libs/angularjs/1.4.7/angular.min.js'
	);

  wp_enqueue_script(
	'angularjs-route',
	'https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.7/angular-route.min.js',
  array('angularjs')
  );

  /*
    Jquery
   */
  wp_deregister_script('jquery');

  wp_register_script('jquery', '//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js', false, THEME_VERSION);
  wp_enqueue_script('jquery');
  /*
    Scripts essenciais minificados em
    um arquivo unico e essenciais para
    o funcionamento do lado cliente
  */
  wp_enqueue_script('scripts', get_stylesheet_directory_uri() . '/scripts.js', array(), THEME_VERSION, true);

  wp_enqueue_script('angular-scripts', get_stylesheet_directory_uri() . '/app.js', array(), THEME_VERSION, true);

}
add_action( 'wp_enqueue_scripts', 'plandd_scripts' );

/**
 * Taxonomia para destacar postagens
 */
function featured_post() {
	register_taxonomy('destaque', 'post', array(
    'hierarchical' => true,
    'labels' => array(
      'name' => _x( 'Destaque', '' ),
      'singular_name' => _x( 'Destaque', '' ),
      'search_items' =>  __( 'Buscar Destaque' ),
      'all_items' => __( 'Todos' ),
      'parent_item' => __( 'Destaque' ),
      'parent_item_colon' => __( 'Destaque:' ),
      'edit_item' => __( 'Editar Destaque' ),
      'update_item' => __( 'Atualizar Destaque' ),
      'add_new_item' => __( 'Adicionar novo Destaque' ),
      'new_item_name' => __( 'Novo' ),
      'menu_name' => __( 'Destaque' ),
    ),
    'rewrite' => array(
      'slug' => 'destaque',
      'with_front' => false,
      'hierarchical' => true
    ),
  ));
}
add_action( 'init', 'featured_post' );

/**
 * Funções utilitárias */

//Nome da 1a categoria de uma postagem em um loop
function get_first_category_name() {
  $category = get_the_category(); 
  if($category[0]){
      return $category[0]->cat_name;
  }
}

//retorna primeira tag
function get_first_tag() {
  $posttags = get_the_tags();
  $count=0;
  if ($posttags) {
      foreach($posttags as $tag) {
          $count++;
          if (1 == $count) {
              return $tag->name . ' ';
          }
      }
  } else {
      get_first_category_name();
  }
}

//mais lidas
function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function wpb_track_post_views ($post_id) {
    if ( !is_single() ) return;
    if ( empty ( $post_id) ) {
        global $post;
        $post_id = $post->ID;    
    }
    wpb_set_post_views($post_id);
}
add_action( 'wp_head', 'wpb_track_post_views');

function wpb_get_post_views($postID){
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}

//Colunistas
include_once( get_stylesheet_directory() . '/includes/post-types/colunistas.php' );

/*
    Icones para post-types
    (http://melchoyce.github.io/dashicons/)
    edit.php?post_type=acf
 */
function add_menu_icons_styles(){
?>

<style>
#menu-posts-colunista div.wp-menu-image:before {
  content: "\f338";
}
</style>
 
<?php
}

add_action( 'admin_head', 'add_menu_icons_styles' );