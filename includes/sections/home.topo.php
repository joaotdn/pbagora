<?php
/**
 * Created by PhpStorm.
 * User: joao
 * Date: 21/10/15
 * Time: 12:48
 */
?>
<div id="home-top" class="row">

    <article class="small-12 left section-block">

        <aside class="small-12 large-9 columns">
<?php
 $args = array(
    'posts_per_page' => 1,
    'orderby' => 'date',
    'tax_query' => array(
        array(
            'taxonomy' => 'destaque',
            'field'    => 'slug',
            'terms'    => 'destaque-topo-manchete',
        ),
    ),
);
$posts = get_posts( $args );
if($posts):
foreach ($posts as $post): setup_postdata( $post );
global $post;
?>
            <h6 class="post-tag no-margin"><?php echo get_first_tag(); ?></h6>
            <h3 class="divide-10"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
<?php
endforeach; endif;

$args = array(
    'posts_per_page' => 1,
    'orderby' => 'date',
    'offset' => 1,
    'tax_query' => array(
        array(
            'taxonomy' => 'destaque',
            'field'    => 'slug',
            'terms'    => 'destaque-topo-manchete',
        ),
    ),
);
$posts = get_posts( $args );
if($posts):
foreach ($posts as $post): setup_postdata( $post );
global $post;
?>
            <h6><a href="<?php the_permalink(); ?>" title=""><span class="blue-dot"></span> <?php the_title(); ?></a></h6>
<?php endforeach; endif; wp_reset_postdata(); ?>
        </aside>

        <!-- publicidade -->
        <figure class="small-3 columns show-for-large-up">
            <header class="small-12 left">
                <p class="font-small divide-10 text-right text-up"><strong>Publicidade</strong></p>
            </header>
            <img src="http://www.eiseverywhere.com/image.php?acc=14&id=83558" alt=""/>
        </figure>

    </article>

    <aside class="small-12 large-9 left">
        <section class="small-12 left">

            <div class="d-block divide-20 column big-feature" title="">

<?php
 $args = array(
    'posts_per_page' => 1,
    'orderby' => 'date',
    'tax_query' => array(
        array(
            'taxonomy' => 'destaque',
            'field'    => 'slug',
            'terms'    => 'destaque-topo-grande',
        ),
    ),
);
$posts = get_posts( $args );
if($posts):
foreach ($posts as $post): setup_postdata( $post );
    global $post;
    $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'destaque.grande');
    $th = (!empty($thumb[0])) ? $thumb[0] : get_stylesheet_directory_uri() . '/images/imagem_padrao.jpg';
?>
                <figure class="small-12 left pba-th top-article-th rel">
                    <div class="small-12 abs img" data-thumb="<?php echo $th; ?>"></div>
                    <a href="<?php the_permalink(); ?>" class="mask-gradent small-12 abs"></a>
                    <figcaption class="small-12 abs">
                        <h6 class="post-tag no-margin"><?php echo get_first_tag(); ?></h6>
                        <h3 class="divide-10 large-8"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="white"><?php the_title(); ?></a></h3>

                                <span class="small-12 left show-for-large-up">
                                    <span class="d-block small-3 left text-up font-light white share-title">Compartilhe</span>
                                    <span class="d-block small-9 left white social-list">
                                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" title="<?php the_title(); ?>" target="_blank" class="icon-social-facebook font-xlarge white"></a>
                                        <a href="whatsapp://send?text=<?php the_permalink(); ?>" title="<?php the_title(); ?>" target="_blank" class="icon-whatsapp font-xlarge white"></a>
                                        <a href="https://twitter.com/home?status=<?php the_permalink(); ?>" title="<?php the_title(); ?>" target="_blank" class="icon-twitter font-xlarge white"></a>
                                    </span>
                                </span>
                    </figcaption>
                </figure>
<?php endforeach; endif; wp_reset_postdata(); ?>

            </div>

            <nav id="recent-features" class="small-12 left">
                <?php
                $args = array(
                    'posts_per_page' => 3,
                    'orderby' => 'date',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'destaque',
                            'field'    => 'slug',
                            'terms'    => 'destaque-topo-horizontal',
                        ),
                    ),
                );
                $posts = get_posts( $args );
                if($posts):
                foreach ($posts as $post): setup_postdata( $post );
                global $post;
                $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'destaque.medio');
                $th = (!empty($thumb[0])) ? $thumb[0] : '';
                ?>

                <figure class="small-12 medium-4 columns rel recent-feat-th <?php if($th == '') echo "not-img"; ?>">
                    <div class="small-12 left rel" data-thumb="<?php echo $th; ?>">
                        <?php if($th != ''): ?>
                        <a href="<?php the_permalink(); ?>" class="mask-gradent2 small-12 abs" title="<?php the_title(); ?>"></a>
                        <?php endif; ?>
                        <figcaption class="small-12 abs">
                            <h6 class="post-tag font-normal"><?php echo get_first_tag(); ?></h6>
                            <h4 class="font-xlarge divide-20"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
                            <?php if($th == ''): ?>
                            <p class="font-small no-margin post-excerpt hide-for-medium-only"><?php the_excerpt(); ?></p>
                            <div class="divide-10 show-for-medium-down"></div>
                            <?php endif; ?>

                            <p class="no-margin small-12 left font-light text-up font-small">
                                <span class="left">Compartilhe</span>
                                <span class="right font-large ">
                                   <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" title="<?php the_title(); ?>" target="_blank" class="icon-social-facebook font-xlarge white"></a>
                                    <a href="whatsapp://send?text=<?php the_permalink(); ?>" title="<?php the_title(); ?>" target="_blank" class="icon-whatsapp font-xlarge white"></a>
                                    <a href="https://twitter.com/home?status=<?php the_permalink(); ?>" title="<?php the_title(); ?>" target="_blank" class="icon-twitter font-xlarge white"></a>
                                </span>
                            </p>

                        </figcaption>
                    </div>
                </figure>

                <?php endforeach; endif; wp_reset_postdata(); ?>
            </nav>
        </section>
    </aside>

    <aside class="small-12 large-3 left">
        <?php
        $args = array(
            'posts_per_page' => 3,
            'orderby' => 'date',
            'tax_query' => array(
                array(
                    'taxonomy' => 'destaque',
                    'field'    => 'slug',
                    'terms'    => 'destaque-topo-lateral',
                ),
            ),
        );
        $posts = get_posts( $args );
        if($posts):
            foreach ($posts as $post): setup_postdata( $post );
                global $post;
                $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'destaque.medio');
                $th = (!empty($thumb[0])) ? $thumb[0] : '';
                ?>

                <figure class="small-12 medium-4 large-12 columns rel recent-feat-th <?php if($th == '') echo "not-img"; ?>">
                    <div class="small-12 left rel" data-thumb="<?php echo $th; ?>">
                        <?php if($th != ''): ?>
                            <a href="<?php the_permalink(); ?>" class="mask-gradent2 small-12 abs" title="<?php the_title(); ?>"></a>
                        <?php endif; ?>
                        <figcaption class="small-12 abs">
                            <h6 class="post-tag font-normal"><?php echo get_first_tag(); ?></h6>
                            <h4 class="font-xlarge divide-20"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
                            <?php if($th == ''): ?>
                                <p class="font-small no-margin post-excerpt hide-for-medium-only"><?php the_excerpt(); ?></p>
                                <div class="divide-10 show-for-medium-down"></div>
                            <?php endif; ?>

                            <p class="no-margin small-12 left font-light text-up font-small">
                                <span class="left">Compartilhe</span>
                                <span class="right font-large ">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" class="d-iblock icon-social-facebook"></a>
                                    <a href="whatsapp://send?text=<?php the_permalink(); ?>" target="_blank" class="d-iblock icon-whatsapp"></a>
                                    <a href="https://twitter.com/home?status=<?php the_permalink(); ?>" target="_blank" class="d-iblock icon-twitter"></a>
                                </span>
                            </p>

                        </figcaption>
                    </div>
                </figure>

            <?php endforeach; endif; wp_reset_postdata(); ?>
    </aside>

    <div class="divide-20 column">
        <div class="h-line"></div>
    </div>
</div> <!-- home.top -->
