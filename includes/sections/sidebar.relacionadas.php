<!-- publicidade -->
<figure id="ads" class="divide-20 column text-center">
    <div class="small-12 left">
        <?php
            pba_show_ads('ads_interna_lateral','ads_interna_lateral_img','ads_interna_lateral_html');
        ?>
    </div>
</figure>

<nav id="related-news" class="small-12 medium-6 large-12 left">
    <header class="divide-20 column">
        <h4 class="primary lh-1 divide-20">Notícias<br>Relacionadas</h4>
        <div class="h-line"></div>
    </header>

    <ul class="no-bullet divide-20 column list-related">
<?php
$orig_post = $post;
global $post;
$categories = get_the_category($post->ID);
if ($categories) {
$category_ids = array();
foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;

$args=array(
'category__in' => $category_ids,
'post__not_in' => array($post->ID),
'posts_per_page'=> 2, // Number of related posts that will be shown.
//'caller_get_posts'=>1
);

$my_query = new wp_query( $args );
if( $my_query->have_posts() ) {
while( $my_query->have_posts() ) {
$my_query->the_post();
?>
        <li>
            <article class="small-12 left">
                <h6 class="post-tag divide-5"><?php echo get_first_tag(); ?></h6>
                <h6 class="divide-10"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h6>
            </article>
            <footer class="share-this divide-20 font-small">
                <div class="small-12 left">
                    <span class="left">Compartilhe</span>

                    <span class="right">
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" class="d-iblock icon-social-facebook"></a>
                        <a href="whatsapp://send?text=<?php the_permalink(); ?>" target="_blank" class="d-iblock icon-whatsapp"></a>
                        <a href="https://twitter.com/home?status=<?php the_permalink(); ?>" target="_blank" class="d-iblock icon-twitter"></a>
                    </span>
                </div>
            </footer>
        </li>

 <?php
}
}
}
$post = $orig_post;
wp_reset_query();
?>
    </ul>

    <section id="carousel-related" class="small-12 left"></section>
</nav>