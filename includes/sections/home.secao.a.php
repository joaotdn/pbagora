<?php
/**
 * User: joao
 * Date: 21/10/15
 * Time: 12:54
 */
$section = get_field('home_secao_a', 'option');
if($section):
    $category_link = get_category_link( $section->term_id );
?>
<!-- secao.a -->
<section class="small-12 left">
    <div class="divide-20"></div>
    <header class="divide-20 columns">
        <h2><a href="<?php echo $category_link; ?>" class="primary"><?php echo $section->name; ?></a></h2>
    </header>

    <nav class="small-12 left" role="navigation">
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
    $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'destaque.medio');
    $th = (!empty($thumb[0])) ? $thumb[0] : '';
     if($th == '') continue;
?>
        <figure class="small-12 medium-4 columns medium-news">
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="d-block divide-20">
                <img data-original="<?php echo $th; ?>" alt="<?php the_title(); ?>" class="lazy" />
            </a>
            <figcaption class="small-12 left">
                <h6 class="post-tag divide-5"><?php echo get_first_tag(); ?></h6>
                <h5><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h5>
            </figcaption>
            <div class="dot-border small-12 left">
                <div class="small-12 left"></div>
            </div>
        </figure>
<?php
    endwhile; wp_reset_postdata(); endif;
?>
</nav>
        <!-- menores -->
<nav class="small-12 left" role="navigation">
<?php
 $args = array(
    'posts_per_page' => 3,
    'orderby' => 'date',
    'offset' => 3,
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
    $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'destaque.pequeno');
    $th = (!empty($thumb[0])) ? $thumb[0] : '';
?>
        <figure class="small-12 medium-4 left small-news <?php if($th == '') echo "not-img"; ?>">
            <?php if($th != ''): ?>
            <a href="<?php the_permalink(); ?>" class="d-block small-4 medium-6 columns" title="<?php the_title(); ?>">
                <img data-original="<?php echo $th; ?>" alt="<?php the_title(); ?>" class="lazy" />
            </a>
            <?php endif; ?>

            <figcaption class="<?php if($th == '') echo "small-12 d-table"; else echo "small-8 medium-6"; ?> columns">
                <?php if($th == '') echo "<div class=\"left small-12\">"; ?>
                <h6 class="post-tag divide-5"><?php echo get_first_tag(); ?></h6>
                <h6><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h6>
                <?php if($th == '') echo "</div>"; ?>
            </figcaption>

            <div class="divide-20"></div>
        </figure>
<?php
    endwhile; wp_reset_postdata(); endif;
?>
    </nav>
</section>
<?php endif; ?>
