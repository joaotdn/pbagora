<!-- editorias -->
<section class="small-12 left section-block">
    <header class="divide-20 columns">
        <h2 class="primary">Editoria</h2>
    </header>

    <nav class="small-12 left" role="navigation">
<?php
 $args = array(
    'posts_per_page' => 3,
    'orderby' => 'date',
    'tax_query' => array(
        array(
            'taxonomy' => 'destaque',
            'field'    => 'slug',
            'terms'    => 'destaque-editoria',
        ),
    ),
);
$the_query = new WP_Query( $args );

if ( $the_query->have_posts() ) :  while ( $the_query->have_posts() ) : $the_query->the_post();
    global $post;
    $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'destaque.editoria');
    $th = (!empty($thumb[0])) ? $thumb[0] : '';
?>
        <figure class="small-12 medium-4 columns medium-news">
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="d-block divide-20">
                <img data-original="<?php echo $th; ?>" alt="<?php the_title(); ?>" width="<?php echo $thumb[1]; ?>" height="<?php echo $thumb['2']; ?>" class="lazy" />
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
        <!-- menores -->
        <div class="small-12 left">
<?php
 $args = array(
    'posts_per_page' => 3,
    'orderby' => 'date',
    'tax_query' => array(
        array(
            'taxonomy' => 'destaque',
            'field'    => 'slug',
            'terms'    => 'destaque-editoria-menor',
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
            <?php if($th == '') echo "<div class=\"d-table-cell small-12\">"; ?>
            <h6 class="post-tag divide-5"><?php echo get_first_tag(); ?></h6>
            <h6><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h6>
            <?php if($th == '') echo "</div>"; ?>
        </figcaption>

        <div class="divide-20"></div>
    </figure>
<?php
    endwhile; wp_reset_postdata(); endif;
?>
    </div>
    </nav>

    <!-- publicidade -->
    <figure id="ads" class="small-12 columns big-ads text-center">
        <div class="small-12 left">
            <img src="http://www.shakeout.org/2008/downloads/ShakeOut_BannerAds_GetReady_728x90_v3.gif" alt=""/>
        </div>
    </figure>
</section>
