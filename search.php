<?php
get_header();
?>
<div  id="post-content" class="row">
    <div class="small-12 large-9 left">

        <!-- publicidade -->
        <figure id="ads" class="divide-20 column big-ads text-center">
            <span class="divide-20"></span>
            <div class="small-12 left">
                <img src="http://www.shakeout.org/2008/downloads/ShakeOut_BannerAds_GetReady_728x90_v3.gif" alt=""/>
            </div>
        </figure>

        <header class="divide-20 column">
            <h3 class="divide-10">Você buscou por: <span class="primary"><?php echo get_search_query(); ?></span></h3>
            <nav id="share-post" class="left">
                <ul class="inline-list no-margin">
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
                <div class="divide-10"></div>
            </nav>
            <div class="h-line"></div>
        </header>

        <nav id="content" class="small-12 columns">
            <?php
                while (have_posts()) : the_post();
                    global $post;
                    $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'destaque.medio');
                    $th = (!empty($thumb[0])) ? $thumb[0] : '';
            ?>
            <figure class="small-12 left post">
                <?php if($th != ''): ?>
                 <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="d-block small-12 medium-5 large-4 left">
                    <img data-original="<?php echo $th; ?>" alt="" class="lazy small-12 left">
                </a>
                <?php endif; ?>
                
                <figcaption class="small-12 medium-7 large-8 left <?php if($th == '') echo "no-th"; ?>">
                    <time class="font-small divide-10" pubdate><?php the_date('j \d\e F, Y'); ?> às <?php the_time('g:i a'); ?></time>
                    <h6 class="post-tag no-margin"><?php echo get_first_tag(); ?></h6>
                    <h4 class="divide-10"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>

                    <nav id="share-post" class="left small-12 no-pl no-margin">
                        <ul class="inline-list no-margin">
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
                        <div class="divide-10"></div>
                    </nav>
                </figcaption>
            </figure>
            <?php
                endwhile;
            ?>
        </nav>
        
        <!-- Pagination -->
        <footer id="nav-below" class="small-12 left text-center hide">
            <div class="divide-20"></div>
            <?php
              global $wp_query;

              $big = 999999999; // need an unlikely integer

              echo paginate_links( array(
                'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format' => '?paged=%#%',
                'current' => max( 1, get_query_var('paged') ),
                'total' => $wp_query->max_num_pages,
                'next_text'    => '&raquo;',
                'prev_text'    => '&laquo;',
                'type'         => 'list',
              ) );
            ?>
        </footer>
    </div>

    <!-- single sidebar -->
    <aside id="sidebar" class="small-12 large-3 right section-block">
        <?php
            include_once('includes/sections/sidebar.popular.php');

            include_once('includes/sections/sidebar.enquete.php');
        ?>
    </aside>

</div>

<?php
get_footer();
?>
