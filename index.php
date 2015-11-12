<?php
get_header();
require_once (dirname(__FILE__) . '/includes/sections/home.topo.php');
?>

<div class="row">
    <div class="small-12 large-9 left" data-section="home.content"></div>
    <!-- home sidebar -->
    <aside id="sidebar" class="small-12 large-3 right" data-section="home.sidebar"></aside>
</div>

<?php
get_footer();
?>
