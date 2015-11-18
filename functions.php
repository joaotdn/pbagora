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

  acf_add_options_sub_page(array(
    'page_title'  => 'Código de rastramento do analytics',
    'menu_title'  => 'Analytics',
    'parent_slug' => 'opcoes-gerais',
  ));

  acf_add_options_sub_page(array(
    'page_title'  => 'Otimizar indexação da página',
    'menu_title'  => 'SEO',
    'parent_slug' => 'opcoes-gerais',
  ));

  acf_add_options_sub_page(array(
    'page_title'  => 'Adicione código extra no site',
    'menu_title'  => 'Extra',
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

//Ofertas
include_once( get_stylesheet_directory() . '/includes/post-types/ofertas.php' );

/*
    Icones para post-types
    (http://melchoyce.github.io/dashicons/)
    edit.php?post_type=acf
 */
function add_menu_icons_styles(){
?>

<style>
#menu-posts-coluna div.wp-menu-image:before {
  content: "\f122";
}
#menu-posts-oferta div.wp-menu-image:before {
  content: "\f488";
}
</style>
 
<?php
}

add_action( 'admin_head', 'add_menu_icons_styles' );

//SEO
//Pegar descrição de página ativa
function getPageDescription() {
  $desc = get_field('pab_desc', 'option');
  if(is_home())
    return $desc;
  elseif(is_page() || is_single())
    return the_excerpt();
  elseif(is_category())
    return get_query_var('cat');
  else
    return get_bloginfo( 'description' );
}

function getThumbUrl($size) {
    global $post;
    if(!$size) {
        $size = 'full';
    }
    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $size );
    echo $thumb[0];
}

function fb_opengraph() {
    global $post;
    $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'destaque.pequeno');
    $th = (!empty($thumb[0])) ? $thumb[0] : '';
    $site_description = get_bloginfo( 'description' ); 
    $stylesheet_url = get_bloginfo( 'stylesheet_url' );
    $stylesheet_directory = get_bloginfo( 'stylesheet_directory' );
    $site_name = (is_home()) ? get_bloginfo( 'name' ) : get_the_title( $post->ID );
    $site_url = (is_home()) ? get_bloginfo( 'siteurl' ) : get_permalink( $post->ID );
    $keywords = get_field('pba_keywords', 'option');
    
    ?>

    <meta name="description" content="<?php echo getPageDescription(); ?>">
    <meta name="keywords" content="<?php echo $keywords; ?>">
    <meta name="author" content="http://plandc.com.br">
    <meta name="subject" content="Portal de notícias da Paraíba">

    <title><?php bloginfo('name'); ?> | <?php is_home() ? bloginfo('description') : wp_title(''); ?></title>
    <link rel="shortcut icon" href="<?php echo $stylesheet_directory; ?>/favicon.ico" type="image/vnd.microsoft.icon"/>
    <link rel="icon" href="<?php echo $stylesheet_directory; ?>/favicon.ico" type="image/x-ico"/>
    <link rel="stylesheet" href="<?php echo $stylesheet_url; ?>" />

    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="<?php echo $site_name; ?>">
    <meta itemprop="description" content="<?php echo getPageDescription(); ?>">
    <?php if(is_home()): ?>
      <meta itemprop="image" content="<?php echo $stylesheet_directory; ?>/screenshot.png">
    <?php else: ?><meta itemprop="image" content="<?php getThumbUrl(); ?>"><?php endif; ?>

    <!-- Twitter Card data -->
    <?php if(is_home()): ?>
      <meta name="twitter:card" content="<?php echo $stylesheet_directory; ?>/screenshot.png">
    <?php else: ?><meta name="twitter:card" content="<?php getThumbUrl(); ?>"><?php endif; ?>
    <meta name="twitter:site" content="@pbagora">
    <meta name="twitter:title" content="<?php echo $site_name; ?>">
    <meta name="twitter:description" content="<?php echo getPageDescription(); ?>">
    <meta name="twitter:creator" content="@plandc">
    <!-- Twitter summary card with large image must be at least 280x150px -->
    <?php if(is_home()): ?>
      <meta name="twitter:image:src" content="<?php echo $stylesheet_directory; ?>/screenshot.png">
    <?php else: ?><meta name="twitter:image:src" content="<?php getThumbUrl(); ?>"><?php endif; ?>

    <!-- Open Graph data -->
    <meta property="og:title" content="<?php echo $site_name; ?>" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="<?php echo $site_url; ?>" />
    <?php if(is_home()): ?>
      <meta property="og:image" content="<?php echo $stylesheet_directory; ?>/screenshot.png" />
    <?php else: ?><meta property="og:image" content="<?php getThumbUrl(); ?>" /><?php endif; ?>
    <meta property="og:description" content="<?php echo getPageDescription(); ?>" />
    <meta property="og:site_name" content="<?php echo $site_name; ?>" />
    
    <?php if(!is_home()): ?>
      <meta property="article:section" content="Artigo" />
      <meta property="article:tag" content="<?php echo $keywords; ?>" />
    <?php endif; ?>
 
<?php
  echo get_field('pba_analytics', 'option');
}
add_action('wp_head', 'fb_opengraph', 5);

/**
 * Busca via ajax
 */
add_action('wp_ajax_nopriv_pba_search_form', 'pba_search_form');
add_action('wp_ajax_pba_search_form', 'pba_search_form');

function pba_search_form() {
  $query = $_GET['keyword'];
  $term = $query['term'];
  $the_query = new WP_Query( array( 's' => $term, 'post_type' => 'post', 'posts_per_page' => 12, 'orderby' => 'date' ) );
  if ( $the_query->have_posts() ) :  while ( $the_query->have_posts() ) : $the_query->the_post();
    global $post;
    $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'destaque.editoria');
    $th = (!empty($thumb[0])) ? $thumb[0] : '';

  ?>
  <figure class="divide-20">
    <h6 class="post-tag divide-5"><?php echo get_first_tag(); ?></h6>
    <h5><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h5>
  </figure>
  <?php

  endwhile; wp_reset_postdata(); endif;
  
  exit();
}