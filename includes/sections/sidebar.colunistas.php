<!-- colunistas -->
<nav id="popular" class="small-12 medium-6 large-12 columns">
    <!-- publicidade -->
    <figure id="ads" class="divide-20 text-center">
        <?php
            pba_show_ads('ads_lateral_b','ads_lateral_b_img','ads_lateral_b_html');
        ?>
    </figure>

    <!-- publicidade -->
    <figure id="ads" class="divide-20 text-center">
        <?php
            pba_show_ads('ads_lateral_c','ads_lateral_c_img','ads_lateral_c_html');
        ?>
    </figure>

    <div class="no-bullet small-12 left section-block bg-dark popular-container bloggers-container">
        <header class="divide-20 column">
            <h4 class="white">Colunistas</h4>
        </header>

        <ul id="list-bloggers" class="no-bullet small-12 left no-margin">
<?php
$args = array( 'posts_per_page' => -1, 'post_type' => 'coluna', 'taxonomy' => 'colunistas' );
$term_exists = array();
$j = 0;
$the_query = new WP_Query( $args );

if ( $the_query->have_posts() ) :  while ( $the_query->have_posts() ) : $the_query->the_post();
    global $post;

    if(count($term_exists) == 3) break;
    $terms = get_the_terms($post->ID, 'colunistas');
    $i = 0;
    if($terms) {
      foreach ($terms as $term) {
        if(in_array($term->term_id, $term_exists)) continue 2;
        $i++;
        if(1 == $i) {
          $avatar = get_field('colunista_avatar',$term);
          $name = $term->name;
          $archive = get_term_link( $term, 'colunistas' );
          $term_id = $term->term_id;
        } else {
          break;
        }
      }
    }
?>
            <li>
                <figure class="small-12 left">
                    <a href="<?php echo $archive; ?>" title="<?php echo $name; ?>" class="blogger-avatar d-block left" data-thumb="<?php echo $avatar; ?>"></a>
                    <figcaption class="left">
                        <h6 class="post-tag thin font-small divide-5"><a href="<?php echo $archive; ?>" title="<?php echo $name; ?>" class="primary"><?php echo $name; ?></a></h6>
                        <h5><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="white"><?php the_title(); ?></a></h5>
                    </figcaption>

                </figure>
            </li>
<?php
   $term_exists[$j] = $term_id; $j++; endwhile; wp_reset_postdata(); endif;
?>
        </ul>

        <div id="bloggers-carousel" class="small-12 left show-for-medium-down"></div>
    </div>
    <div class="divide-20"></div>
</nav>