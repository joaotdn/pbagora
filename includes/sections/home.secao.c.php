<?php
/**
 * User: joao
 * Date: 21/10/15
 * Time: 12:54
 */
$section = get_field('home_secao_c', 'option');
if($section):
?>
<!-- secao.c -->
<section class="small-12 left">
    <header class="divide-20 columns">
        <h2 class="primary"><?php echo $section->name; ?></h2>
    </header>

    <nav class="small-12 left special-news">
<?php
 $args = array(
    'posts_per_page' => 3,
    'orderby' => 'date',
    'tax_query' => array(
        array(
            'taxonomy' => 'category',
            'field'    => 'slug',
            'terms'    => $section->slug,
        ),
    ),
);
$the_query = new WP_Query( $args );

if ( $the_query->have_posts() ) :  while ( $the_query->have_posts() ) : $the_query->the_post();
    global $post;
    $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'destaque.editoria');
    $th = (!empty($thumb[0])) ? $thumb[0] : '';
?>
        <figure class="small-12 medium-4 columns">
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="d-block rel small-12 left">
                <div class="small-12 left th" data-thumb="<?php echo $th; ?>"></div>
                <div class="small-12 abs mask-gradent"></div>
                <figcaption class="small-12 abs">
                    <h6 class="post-tag"><?php echo get_first_tag(); ?></h6>
                    <h4 class="white"><?php the_title(); ?></h4>
                </figcaption>
            </a>
            <div class="divide-20"></div>
        </figure>
<?php
    endwhile; wp_reset_postdata(); endif;
?>
    </nav>
</section>
<?php endif; ?>
