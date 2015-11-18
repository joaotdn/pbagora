<!-- enquete -->
<section id="offers-box" class="small-12  medium-6 large-12 columns">
<div id="pba-pool" class="divide-20">
    <header class="small-12 left">
        <h3 class="lh-1 no-margin">Enquete</h3>
    </header>
    <?php 
        if (function_exists('vote_poll') && !in_pollarchive()):
            get_poll();
        endif;
    ?>

    <!--<form action="">

        <h5>O que você acha do novo design do portal PBAGORA?</h5>
        <div class="divide-10"></div>

        <p class="divide-10"><label><input type="radio" name="e"/> Bonito</label></p>
        <p class="divide-10"><label><input type="radio" name="e"/> Lindo</label></p>
        <p class="divide-20"><label><input type="radio" name="e"/> Maravilhoso</label></p>

        <p class="text-center no-margin">
            <input type="submit" value="Votar"/>
        </p>
    </form>-->
</div>

<!-- publicidade -->
<figure id="ads" class="divide-20 text-center">
    <img src="http://gamejobs.com/files/virgingaming300x250.jpg" alt=""/>
</figure>
</section>