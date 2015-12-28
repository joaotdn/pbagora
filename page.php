<?php
get_header();
?>
<div  id="post-content" class="row">
    <div class="small-12 large-9 left">

        <!-- publicidade -->
        <figure id="ads" class="divide-20 column big-ads text-center">
            <span class="divide-20"></span>
            <div class="small-12 left">
                <?php
                    pba_show_ads('ads_interna_topo','ads_interna_topo_img','ads_interna_topo_html');
                ?>
            </div>
        </figure>

        <header class="divide-20 column">
            <h3 class="divide-10"><?php the_title(); ?></h3>
            <nav id="share-post" class="right">
                <ul class="inline-list">
                    <li>
                        <span>Compartilhe</span>
                    </li>
                    <li>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" class="d-iblock icon-social-facebook"></a>
                    </li>
                    <li>
                        <a href="whatsapp://send?text=<?php the_permalink(); ?>" target="_blank" class="d-iblock icon-whatsapp"></a>
                    </li>
                    <li>
                        <a href="https://twitter.com/home?status=<?php the_permalink(); ?>" target="_blank" class="d-iblock icon-twitter"></a>
                    </li>
                </ul>
            </nav>
            <div class="h-line"></div>
        </header>

        <article class="the-post divide-20 column">
            <?php
                if ( have_posts() ) : while ( have_posts() ) : the_post();
                    global $post;
                    $video = get_field('post_video',$post->ID);
                    if($video && !empty($video))
                        printf('<div class="flex-video divide-20">%s</div>',$video);
                    the_content();
                endwhile; endif;
            ?>
        </article>
    </div>

    <!-- single sidebar -->
    <aside id="sidebar" class="small-12 large-3 right section-block">
        <?php
            include_once('includes/sections/sidebar.popular.php');
            echo '<figure id="ads" class="divide-20 column text-center">';
            pba_show_ads('ads_interna_lateral','ads_interna_lateral_img','ads_interna_lateral_html');
            echo '</figure>';
            include_once('includes/sections/sidebar.enquete.php');
        ?>
    </aside>

</div>
<?php

get_footer();

?>
