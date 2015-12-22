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
            <h1 class="divide-10 primary"><?php echo single_cat_title(); ?></h1>
            <!--<nav id="share-post" class="left no-pl no-margin">
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
            <div class="h-line"></div>-->
        </header>

        <figure class="divide-20 column post-video d-table rel">
<?php
$exclude_arr = array();
$args = array(
    'posts_per_page' => 1,
    'orderby' => 'date',
    'tax_query' => array(
        array(
            'taxonomy' => 'destaque',
            'field'    => 'slug',
            'terms'    => 'destaque-video',
        ),
    ),
);
$the_query = new WP_Query( $args );

if ( $the_query->have_posts() ) :  while ( $the_query->have_posts() ) : $the_query->the_post();
    global $post;
    $exclude_arr[] = $post->ID;
    $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'destaque.grande');
    $th = (!empty($thumb[0])) ? $thumb[0] : '';
    $video = get_field('post_video',$post->ID);
?>
    <a href="#" class="d-block" data-reveal-id="video-<?php echo $post->ID; ?>">
        <img data-original="<?php echo $th; ?>" alt="" class="small-12 left lazy">
    </a>
    
    <div class="small-12 columns">
        <figcaption class="small-12 abs">
            <h3><a href="#" data-reveal-id="video-<?php echo $post->ID; ?>" title="<?php the_title(); ?>" class="white"><?php the_title(); ?></a></h3>
        </figcaption>
    </div>

    <div id="video-<?php echo $post->ID; ?>" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
        <div class="flex-video">
            <?php echo $video; ?>
        </div>
        <a class="close-reveal-modal" aria-label="Close">&#215;</a>
    </div>
<?php
    endwhile; wp_reset_postdata(); endif;
?>           
        </figure>

        <nav id="content" class="small-12 left">
            <?php
                while (have_posts()) : the_post();
                    global $post;

                    if(in_array($post->ID, $exclude_arr))
                        continue;

                    $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'destaque.medio');
                    $th = (!empty($thumb[0])) ? $thumb[0] : '';
                    $video = get_field('post_video',$post->ID);
            ?>
            <figure class="small-12 medium-4 columns medium-news end">
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" data-reveal-id="video-<?php echo $post->ID; ?>" class="d-block divide-20">
                    <img data-original="<?php echo $th; ?>" alt="<?php the_title(); ?>" class="lazy" />
                </a>
                <figcaption class="small-12 left">
                    <h6 class="post-tag divide-5"><?php echo get_first_tag(); ?></h6>
                    <h5><a href="<?php the_permalink(); ?>" data-reveal-id="video-<?php echo $post->ID; ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h5>
                </figcaption>
                <div class="dot-border small-12 left">
                    <div class="small-12 left"></div>
                </div>

                <div id="video-<?php echo $post->ID; ?>" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
                    <div class="flex-video">
                        <?php echo $video; ?>
                    </div>
                    <a class="close-reveal-modal" aria-label="Close">&#215;</a>
                </div>
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
