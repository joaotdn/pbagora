<?php
include_once('header.php');
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
            <h6 class="post-tag divide-10">Disputa interna</h6>
            <h3 class="divide-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid beatae consequuntur eius eos</h3>

            <time class="left font-small" pubdate>24/09/2015 às 12:23h | Atualizada em 24/09/2015 às 12:30h</time>
            <nav id="share-post" class="right">
                <ul class="inline-list">
                    <li>
                        <span>Compartilhe</span>
                    </li>
                    <li>
                        <a href="#" title="" class="icon-social-facebook"></a>
                    </li>
                    <li>
                        <a href="#" title="" class="icon-whatsapp"></a>
                    </li>
                    <li>
                        <a href="#" title="" class="icon-twitter"></a>
                    </li>
                </ul>
            </nav>
            <div class="h-line"></div>
        </header>

        <article class="the-post divide-20 column">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad alias consequuntur cum cupiditate, dolore eaque, earum facere facilis fugit inventore nostrum perferendis quisquam recusandae rem tempore ullam unde vel. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad, asperiores atque autem blanditiis iure laudantium maiores modi molestiae molestias nesciunt non quas quidem quisquam recusandae, reiciendis similique soluta sunt velit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid animi aperiam aspernatur cumque debitis dolor dolorem ea error esse hic nulla quam quis, reiciendis reprehenderit repudiandae sapiente unde, velit voluptate! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor inventore laudantium libero natus praesentium quae, veritatis voluptatum! Ab, beatae ipsum iure labore magni maxime neque. Ad enim incidunt ipsa iste!</p>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad alias consequuntur cum cupiditate, dolore eaque, earum facere facilis fugit inventore nostrum perferendis quisquam recusandae rem tempore ullam unde vel. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad, asperiores atque autem blanditiis iure laudantium maiores modi molestiae molestias nesciunt non quas quidem quisquam recusandae, reiciendis similique soluta sunt velit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid animi aperiam aspernatur cumque debitis dolor dolorem ea error esse hic nulla quam quis, reiciendis reprehenderit repudiandae sapiente unde, velit voluptate! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor inventore laudantium libero natus praesentium quae, veritatis voluptatum! Ab, beatae ipsum iure labore magni maxime neque. Ad enim incidunt ipsa iste!</p>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad alias consequuntur cum cupiditate, dolore eaque, earum facere facilis fugit inventore nostrum perferendis quisquam recusandae rem tempore ullam unde vel. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad, asperiores atque autem blanditiis iure laudantium maiores modi molestiae molestias nesciunt non quas quidem quisquam recusandae, reiciendis similique soluta sunt velit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid animi aperiam aspernatur cumque debitis dolor dolorem ea error esse hic nulla quam quis, reiciendis reprehenderit repudiandae sapiente unde, velit voluptate! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor inventore laudantium libero natus praesentium quae, veritatis voluptatum! Ab, beatae ipsum iure labore magni maxime neque. Ad enim incidunt ipsa iste!</p>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad alias consequuntur cum cupiditate, dolore eaque, earum facere facilis fugit inventore nostrum perferendis quisquam recusandae rem tempore ullam unde vel. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad, asperiores atque autem blanditiis iure laudantium maiores modi molestiae molestias nesciunt non quas quidem quisquam recusandae, reiciendis similique soluta sunt velit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid animi aperiam aspernatur cumque debitis dolor dolorem ea error esse hic nulla quam quis, reiciendis reprehenderit repudiandae sapiente unde, velit voluptate! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor inventore laudantium libero natus praesentium quae, veritatis voluptatum! Ab, beatae ipsum iure labore magni maxime neque. Ad enim incidunt ipsa iste!</p>
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
        ?>

        <!-- publicidade -->
        <figure id="ads" class="divide-20 column text-center">
            <div class="small-12 left">
                <img src="https://lh4.ggpht.com/1Rw1DEbRB87sJ3sdx1g8yMrmx-Lt-VgYqhYolXv_y0hAZxbqoA1HAw1qT-JLk68-dHEL-QHmAA=w300" alt=""/>
            </div>
        </figure>

        <nav id="related-news" class="small-12 medium-6 large-12 left">
            <header class="divide-20 column">
                <h4 class="primary lh-1 divide-20">Notícias<br>Relacionadas</h4>
                <div class="h-line"></div>
            </header>

            <ul class="no-bullet divide-20 column list-related">
                <li>
                    <article class="small-12 left">
                        <h6 class="post-tag divide-5">Fora de órbita</h6>
                        <h6 class="divide-10"><a href="#" title="">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a></h6>
                    </article>
                    <footer class="share-this divide-20 font-small">
                        <div class="small-12 left">
                            <span class="left">Compartilhe</span>

                            <span class="right">
                                <a href="#" title="" class="icon-social-facebook"></a>
                                <a href="#" title="" class="icon-whatsapp"></a>
                                <a href="#" title="" class="icon-twitter"></a>
                            </span>
                        </div>
                    </footer>
                </li>

                <li>
                    <article class="small-12 left">
                        <h6 class="post-tag divide-5">Fora de órbita</h6>
                        <h6 class="divide-10"><a href="#" title="">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a></h6>
                    </article>
                    <footer class="share-this divide-20 font-small">
                        <div class="small-12 left">
                            <span class="left">Compartilhe</span>

                            <span class="right">
                                <a href="#" title="" class="icon-social-facebook"></a>
                                <a href="#" title="" class="icon-whatsapp"></a>
                                <a href="#" title="" class="icon-twitter"></a>
                            </span>
                        </div>
                    </footer>
                </li>

                <li>
                    <article class="small-12 left">
                        <h6 class="post-tag divide-5">Fora de órbita</h6>
                        <h6 class="divide-10"><a href="#" title="">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a></h6>
                    </article>
                    <footer class="share-this divide-20 font-small">
                        <div class="small-12 left">
                            <span class="left">Compartilhe</span>

                            <span class="right">
                                <a href="#" title="" class="icon-social-facebook"></a>
                                <a href="#" title="" class="icon-whatsapp"></a>
                                <a href="#" title="" class="icon-twitter"></a>
                            </span>
                        </div>
                    </footer>
                </li>
            </ul>

            <section id="carousel-related" class="small-12 left"></section>
        </nav>

        <?php
            include_once('includes/sections/sidebar.enquete.php');
        ?>

    </aside>

</div>
<?php

include_once('footer.php');

?>
