<footer id="footer" class="small-12 left">

    <div class="row">
        <figure class="small-12 large-3 small-text-center large-text-left left columns">
            <a href="<?php home_url(); ?>" title="Página principal" class="d-iblock icon-logo-footer"></a>
            <div class="divide-20"></div>
            <figcaption class="divide-20">
                        <span class="font-small lh-1">
                            <span class="d-block">&copy; 2015 PBAgora</span>
                            Todos os direitos reservados.
                        </span>
            </figcaption>
        </figure>

        <nav id="menu-footer" class="small-12 large-6 columns show-for-large-up">
            <ul class="inline-list small-12 left">
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
        </nav>

        <nav id="social-footer" class="small-12 large-3 columns small-text-center large-text-right">
            <ul class="inline-list right no-margin">
                <?php
                    $face = get_field('pba_facebook', 'option');
                    $tw = get_field('pba_twitter', 'option');
                    $ins = get_field('pba_instagram', 'option');

                    if($face)
                        printf('<li><h1><a href="%s" title="" class="icon-social-facebook white"></a></h1></li>',$face);

                    if($tw)
                        printf('<li><h1><a href="%s" title="" class="icon-twitter white"></a></h1></li>',$tw);

                    if($ins)
                        printf('<li><h1><a href="%s" title="" class="icon-instagram white"></a></h1></li>',$ins);
                ?>
            </ul>
        </nav>
    </div>

</footer>
</div><!-- //wrapper -->

<figure class="load-content small-12">
    <div class="d-table">
        <div class="d-table-cell small-12">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/loader.gif" alt="">
        </div>
    </div>
</figure>

<div id="mask-white">
    <nav id="search-results" class="small-12 left">
        <div class="row">
            <div class="divide-40"></div>
            <div class="the-results small-12 columns rel"></div>
        </div>
    </nav>
</div>

<?php echo get_field('pba_footer', 'option'); wp_footer(); ?>
</body>
</html>