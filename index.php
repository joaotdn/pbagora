<?php
get_header();
require_once (dirname(__FILE__) . '/includes/sections/home.topo.php');
?>

<div class="row">
    <div class="small-12 large-9 left">
    	<?php require get_template_directory()."/includes/sections/home.content.php"; ?>
    </div>
    <!-- home sidebar -->
    <aside id="sidebar" class="small-12 large-3 right">
    	<?php require get_template_directory()."/includes/sections/home.sidebar.php"; ?>
    </aside>
</div>

<?php
get_footer();
?>
