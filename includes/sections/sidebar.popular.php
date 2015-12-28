<!-- publicidade -->
<!-- mais lidas -->
<nav id="popular" class="small-12 medium-6 large-12 columns">
<figure id="ads" class="divide-20 left text-center">
    <?php
        pba_show_ads('ads_lateral','ads_lateral_img','ads_lateral_html');
    ?>
</figure>

    <div class="no-bullet small-12 left section-block bg-dark popular-container">
        <header class="divide-20 column">
            <h4 class="white">Mais lidas</h4>
        </header>

        <ul id="list-popular" class="no-bullet small-12 left no-margin">
<?php
$popularpost = new WP_Query( array( 'posts_per_page' => 4, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'  ) );
while ( $popularpost->have_posts() ) : $popularpost->the_post();
?>
            <li>
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="d-block">
                    <span class="post-tag thin font-small d-block"><?php echo get_first_tag(); ?></span>
                    <span class="white"><?php the_title(); ?></span>
                </a>
            </li>
<?php
endwhile;

wp_reset_query();
?>
        </ul>

        <div id="popular-carousel" class="small-12 left show-for-medium-down"></div>
    </div>
    <div class="divide-20"></div>
</nav>