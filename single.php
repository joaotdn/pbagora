<?php
get_header();
?>
<div  id="post-content" class="row">
    <div class="small-12 large-9 left">

        <!-- publicidade -->
        <figure id="ads" class="divide-20 column big-ads text-center">
            <span class="divide-20"></span>
            <div class="small-12 left">
                <img src="http://www.shakeout.org/2008/downloads/ShakeOut_BannerAds_GetReady_728x90_v3.gif" alt=""/>
            </div>
        </figure>

        <header class="divide-20 column">
            <h6 class="post-tag divide-10"><?php echo get_first_tag(); ?></h6>
            <h3 class="divide-10"><?php the_title(); ?></h3>

            <time class="left font-small" pubdate><?php the_time('j \d\e F, Y'); ?> às <?php the_time('g:i a'); ?></time>
            <nav id="share-post" class="right">
                <ul class="inline-list">
                    <li>
                        <span>Compartilhe</span>
                    </li>
                    <li>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" class="d-iblock icon-social-facebook"></a>
                    </li>
                    <li>
                        <a href="whatsapp://send?text=<?php the_permalink(); ?>" target="_blank" class="d-iblock icon-whatsapp"></a>
                    </li>
                    <li>
                        <a href="https://twitter.com/home?status=<?php the_permalink(); ?>" target="_blank" class="d-iblock icon-twitter"></a>
                    </li>
                </ul>
            </nav>
            <div class="h-line"></div>
        </header>

        <article class="the-post divide-20 column">
            <?php
                if ( have_posts() ) : while ( have_posts() ) : the_post();
                    global $post;
                    $video = get_field('post_video',$post->ID);
                    if($video && !empty($video))
                        printf('<div class="flex-video divide-20">%s</div>',$video);
                    the_content();
                endwhile; endif;
            ?>
        </article>

        <footer id="comments" class="small-12 columns">
            <div id="disqus_thread"></div>
            <script type="text/javascript">
                /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
                var disqus_shortname = 'sergiojmatos'; // Required - Replace '<example>' with your forum shortname

                /* * * DON'T EDIT BELOW THIS LINE * * */
                (function() {
                    var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                    dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                })();
            </script>
            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
        </footer>
    </div>

    <!-- single sidebar -->
    <aside id="sidebar" class="small-12 large-3 right section-block">
        <?php
            include_once('includes/sections/sidebar.popular.php');

            include_once('includes/sections/sidebar.relacionadas.php');

            include_once('includes/sections/sidebar.enquete.php');
        ?>
    </aside>

</div>
<?php

get_footer();

?>
