<!-- ofertas de carro -->
<section id="offers-box" class="small-12  medium-6 large-12 columns cars">
<!-- publicidade -->
<figure id="ads" class="divide-20 text-center">
    <img src="http://icarusart.net/images/300x250.jpg" alt=""/>
</figure>

<div class="divide-20">
    <header class="small-12 left">
        <h3 class="lh-1 no-margin">Ofertas de carro</h3>
    </header>

    <nav class="list-offers small-12 left section-block">
        <ul id="list-bloggers" class="no-bullet small-12 left no-margin offers list-cars">
<?php
 $args = array(
    'posts_per_page' => 3,
    'orderby' => 'date',
    'post_type' => 'oferta',
    /*'tax_query' => array(
        array(
            'taxonomy' => 'category',
            'field'    => 'slug',
            'terms'    => $section->slug,
        ),
    ),*/
);
$the_query = new WP_Query( $args );

if ( $the_query->have_posts() ) :  while ( $the_query->have_posts() ) : $the_query->the_post();
    global $post;
    $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'destaque.pequeno');
    $th = (!empty($thumb[0])) ? $thumb[0] : '';
?>
            <li>
                <figure class="small-12 left">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="d-block left" data-thumb="<?php echo $th; ?>"></a>
                    <figcaption class="left">
                        <h5><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h5>
                    </figcaption>

                </figure>
            </li>
<?php
    endwhile; wp_reset_postdata(); endif;
?>
        </ul>

        <div id="cars-carousel" class="small-12 left show-for-medium-down"></div>
    </nav>
</div>
</section>