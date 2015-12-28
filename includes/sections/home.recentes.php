<?php
/**
 * Created by PhpStorm.
 * User: joao
 * Date: 21/10/15
 * Time: 12:51
 */
?>
<!-- mais recentes -->
<section id="home-middle-news" class="small-12 left">
    <ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-3">
<?php
 $args = array(
    'posts_per_page' => 9,
    'orderby' => 'date',
    'tax_query' => array(
        array(
            'taxonomy' => 'destaque',
            'field'    => 'slug',
            'terms'    => 'destaque-meio-pequena',
        ),
    ),
);
$the_query = new WP_Query( $args );

if ( $the_query->have_posts() ) :  while ( $the_query->have_posts() ) : $the_query->the_post();
    global $post;
    $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'destaque.pequeno');
    $th = (!empty($thumb[0])) ? $thumb[0] : '';
?>
    <li>
    <figure class="small-12 left small-news end <?php if($th == '') echo "not-img"; ?>">
        <?php if($th != ''): ?>
        <a href="<?php the_permalink(); ?>" class="d-block small-4 medium-6 columns" title="<?php the_title(); ?>">
            <img data-original="<?php echo $th; ?>" alt="<?php the_title(); ?>" class="lazy" />
        </a>
        <?php endif; ?>

        <figcaption class="<?php if($th == '') echo "small-12 d-table"; else echo "small-8 medium-6"; ?> columns">
            <?php if($th == '') echo "<div class=\"left small-12\">"; ?>
            <h6 class="post-tag divide-5"><?php echo get_first_tag(); ?></h6>
            <h6><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo substr(get_the_title( $post->ID ), 0, 60); ?></a></h6>
            <?php if($th == '') echo "</div>"; ?>
        </figcaption>

        <div class="dot-border small-12 columns">
            <div class="small-12 left"></div>
        </div>
    </figure>
    </li>
<?php
    endwhile; wp_reset_postdata(); endif;
?>
    </ul>

    <!-- publicidade -->
    <figure id="ads" class="small-12 columns big-ads text-center">
        <div class="small-12 left">
            <?php
                pba_show_ads('ads_home_a','ads_home_a_img','ads_home_a_html');
            ?>
        </div>
    </figure>

</section>
