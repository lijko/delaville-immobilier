<?php
	$num_pages = $wp_query->max_num_pages;
	if(function_exists('ts_pagination') && $num_pages > 1) :
?>

<div class="ts-paging clear">
    	
    <?php ts_pagination($num_pages); ?>

</div><!-- end ts-paging -->

<?php endif; // endif num_pages ?>