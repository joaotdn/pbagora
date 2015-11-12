<?php
/**
 * CPT para Colunitas
 *
 * @since ModaBiz 1.0
 * @subpackage ModaBiz
 */

function colunistas_init() {
  $labels = array(
    'name'               => 'Colunas',
    'singular_name'      => 'Coluna',
    'add_new'            => 'Adicionar Nova',
    'add_new_item'       => 'Adicionar nova Coluna',
    'edit_item'          => 'Editar Coluna',
    'new_item'           => 'Nova Coluna',
    'all_items'          => 'Todas as Colunas',
    'view_item'          => 'Ver Coluna',
    'search_items'       => 'Buscar Coluna',
    'not_found'          => 'N&atilde;o encontrada',
    'not_found_in_trash' => 'N&atilde;o encontrada',
    'parent_item_colon'  => '',
    'menu_name'          => 'Colunas'
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'colunas' ),
    //'menu_icon'           => get_stylesheet_directory_uri() . '/images/works.png',
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => true,
    'menu_position'      => 2,
    'supports'           => array( 'title','editor','thumbnail' )
  );

    register_post_type( 'coluna', $args );

    register_taxonomy('colunistas', 'coluna', array(
        'hierarchical' => true,
        'labels' => array(
          'name' => _x( 'Colunista', '' ),
          'singular_name' => _x( 'Colunista', '' ),
          'search_items' =>  __( 'Buscar Colunista' ),
          'all_items' => __( 'Todos' ),
          'parent_item' => __( 'Colunistas' ),
          'parent_item_colon' => __( 'Colunista:' ),
          'edit_item' => __( 'Editar Colunista' ),
          'update_item' => __( 'Atualizar Colunista' ),
          'add_new_item' => __( 'Adicionar novo Colunista' ),
          'new_item_name' => __( 'Novo' ),
          'menu_name' => __( 'Colunistas' ),
        ),
        'rewrite' => array(
          'slug' => 'colunista',
          'with_front' => false,
          'hierarchical' => true
        ),
    ));
}
add_action( 'init', 'colunistas_init' );
?>