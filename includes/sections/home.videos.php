<?php
/**
 * Created by PhpStorm.
 * User: joao
 * Date: 21/10/15
 * Time: 12:53
 */
?>
<!-- videos -->
<section id="videos" class="small-12 left columns">

    <header class="divide-20">
        <h2 class="primary">Vídeos</h2>
    </header>

    <div class="small-12 left bg-dark">
<?php
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
    $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'destaque.grande');
    $th = (!empty($thumb[0])) ? $thumb[0] : '';
    $video = get_field('post_video',$post->ID);
?>
        <div class="small-12 left">
            <figure class="divide-20 big-video rel">
                <a href="#" data-reveal-id="video-<?php echo $post->ID; ?>" class="d-block small-12 video-th" title="<?php the_title(); ?>" data-thumb="<?php echo $th; ?>">
                    <div class="mask-gradent abs small-12"></div>
                    <div class="mask abs small-12"></div>
                </a>
                <figcaption class="small-12 abs">
                    <a href="#" data-reveal-id="video-<?php echo $post->ID; ?>" class="big-play d-table left" title="<?php the_title(); ?>">
                      <span class="d-table-cell small-12">
                          <span class="icon-play white"></span>
                      </span>
                    </a>
                    <article class="left">
                        <h6 class="post-tag thin font-normal"><?php echo get_first_tag(); ?></h6>
                        <h3><a href="#" data-reveal-id="video-<?php echo $post->ID; ?>" class="white"><?php the_title(); ?></a></h3>
                    </article>
                </figcaption>
            </figure>

            <div id="video-<?php echo $post->ID; ?>" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
                <div class="flex-video">
                    <?php echo $video; ?>
                </div>
                <a class="close-reveal-modal" aria-label="Close">&#215;</a>
            </div>
        </div>
<?php
    endwhile; wp_reset_postdata(); endif;
?>

        <nav class="small-12 columns nav-videos">
<?php
 $args = array(
    'posts_per_page' => 3,
    'orderby' => 'date',
    'offset' => 1,
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
    $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'destaque.medio');
    $th = (!empty($thumb[0])) ? $thumb[0] : '';
    $video = get_field('post_video',$post->ID);
?>
            <figure class="small-12 columns item">
                <a href="#" data-reveal-id="video-<?php echo $post->ID; ?>" title="<?php the_title(); ?>" class="divide-10 d-table small-video" data-thumb="<?php echo $th; ?>">
                    <span class="d-table-cell small-12 text-center">
                        <span class="small-play d-iblock">
                            <span class="icon-play white"></span>
                        </span>
                    </span>
                </a>
                <figcaption class="small-12 left">
                    <h5><a href="#" data-reveal-id="video-<?php echo $post->ID; ?>" title="<?php the_title(); ?>" class="white"><?php the_title(); ?></a></h5>
                </figcaption>

                <div id="video-<?php echo $post->ID; ?>" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
                    <div class="flex-video">
                        <?php echo $video; ?>
                    </div>
                    <a class="close-reveal-modal" aria-label="Close">&#215;</a>
                </div>
            </figure>
<?php
    endwhile; wp_reset_postdata(); endif;
?>
        </nav>
    </div>

</section>
