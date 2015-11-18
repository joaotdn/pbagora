<?php
/**
 * CPT para Ofertas
 *
 * @since ModaBiz 1.0
 * @subpackage ModaBiz
 */

function ofertas_init() {
  $labels = array(
    'name'               => 'Ofertas',
    'singular_name'      => 'Oferta',
    'add_new'            => 'Adicionar Nova',
    'add_new_item'       => 'Adicionar nova Oferta',
    'edit_item'          => 'Editar Oferta',
    'new_item'           => 'Nova Oferta',
    'all_items'          => 'Todas as Ofertas',
    'view_item'          => 'Ver Oferta',
    'search_items'       => 'Buscar Ofertas',
    'not_found'          => 'N&atilde;o encontrada',
    'not_found_in_trash' => 'N&atilde;o encontrada',
    'parent_item_colon'  => '',
    'menu_name'          => 'Ofertas'
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'ofertas' ),
    //'menu_icon'           => get_stylesheet_directory_uri() . '/images/works.png',
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => true,
    'menu_position'      => 2,
    'supports'           => array( 'title','editor','thumbnail' )
  );

    register_post_type( 'oferta', $args );

    register_taxonomy('categoria', 'oferta', array(
        'hierarchical' => true,
        'labels' => array(
          'name' => _x( 'Categoria', '' ),
          'singular_name' => _x( 'Categoria', '' ),
          'search_items' =>  __( 'Buscar Categoria' ),
          'all_items' => __( 'Todos' ),
          'parent_item' => __( 'Categorias' ),
          'parent_item_colon' => __( 'Categoria:' ),
          'edit_item' => __( 'Editar Categoria' ),
          'update_item' => __( 'Atualizar Categoria' ),
          'add_new_item' => __( 'Adicionar novo Categoria' ),
          'new_item_name' => __( 'Novo' ),
          'menu_name' => __( 'Categorias' ),
        ),
        'rewrite' => array(
          'slug' => 'categoria',
          'with_front' => false,
          'hierarchical' => true
        ),
    ));
}
add_action( 'init', 'ofertas_init' );
?>