<?php
/**
 * Created by PhpStorm.
 * User: joao
 * Date: 21/10/15
 * Time: 12:34
 */
?>
<!doctype html>
<html class="no-js" lang="pt-br" ng-app="PBAapp">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php bloginfo('name'); ?> | <?php is_home()?bloginfo('description'):wp_title(''); ?></title>

    <link href='https://fonts.googleapis.com/css?family=Ubuntu:400,500,300,700' rel='stylesheet' type='text/css'>
    <script>
      //<![CDATA[
      var getData = {
        'urlDir':'<?php bloginfo('template_directory');?>/',
        'ajaxDir':'<?php echo stripslashes(get_admin_url()).'admin-ajax.php';?>'
      }
      //]]>
    </script>

    <?php echo get_field('pab_header', 'option'); wp_head(); ?>
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

<div id="wrapper" class="small-12 left rel">

    <div id="menu-offcanvas">
        <header class="small-12 left">
            <h4 class="text-up primary no-margin lh-1 small-12 left">
                <span class="left"><strong>PB</strong>Agora</span>
                <span class="right icon-close primary close-offcanvas"></span>
            </h4>
        </header>

        <form id="mobile-search" method="get">
            <input type="text" name="s" id="s" placeholder="Buscar" class="small-12 left"/>
            <span class="icon-search primary abs"></span>
        </form>

        <nav id="mo-menu" class="small-12 left"></nav>
    </div>
    <a href="#" class="close-offcanvas"></a>

    <nav id="mo-menu-scroll">
        <figure class="small-12 text-center columns logo">
            <a href="#" class="left d-iblock icon-menu scroll-offcanvas scroll"></a>

            <a href="<?php echo home_url(); ?>" title="Página principal" class="less-opacity">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" alt=""/>
            </a>
        </figure>
    </nav>

    <header id="header" class="small-12">
        <div class="row rel">

            <div class="d-table-cell small-12">
                <div class="small-12 left">

                    <figure class="small-12 large-2 small-text-center large-text-left columns logo">
                        <a href="#" class="left d-iblock icon-menu open-offcanvas"></a>

                        <a href="<?php echo home_url(); ?>" title="Página principal" class="less-opacity">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" alt=""/>
                        </a>
                    </figure>

                    <nav id="main-menu" class="small-8 columns end show-for-large-up" role="navigation">
                        <ul class="inline-list no-margin">
                            <?php
                              $defaults = array(
                                'theme_location'  => 'primary',
                                'menu'            => 'Menu principal',
                                'container'       => '',
                                'container_class' => '',
                                'container_id'    => '',
                                'menu_class'      => '',
                                'menu_id'         => '',
                                'echo'            => true,
                                'fallback_cb'     => 'primary',
                                'before'          => '',
                                'after'           => '',
                                'link_before'     => '',
                                'link_after'      => '',
                                'items_wrap'      => '%3$s',
                                'depth'           => 0,
                                'walker'          => '',
                              );
                              wp_nav_menu($defaults);
                            ?>
                        </ul>
                    </nav>

                </div>

                <!--<div id="wheather" class="abs small-1 small-pull-1">
                    <div class="d-table-cell small-12">
                        <span class="icon-cloud left"></span>
                      <span class="top-date left">
                        <strong>qui</strong><strong>27</strong><strong>24</strong>
                      </span>
                    </div>
                </div>-->

                <a href="#" id="pba-search" class="small-1 abs">
                  <span class="d-table-cell small-12 text-center">
                      <span href="#" class="d-iblock icon-search"></span>
                      <span href="#" class="d-iblock icon-close hidden"></span>
                  </span>
                </a>
                <form novalidate="novalidate" class="small-9 small-push-2 column abs search-portal" ng-controller="SearchController">
                    <div class="small-12 columns">
                        <input type="text" id="input-portal" placeholder="O que você procura?" ng-model="query.term" ng-keyup="search(query)">
                    </div>
                </form>
            </div>
        </div>
    </header>
