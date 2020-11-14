<?php
get_header();
the_post();
?>
	<div class="global-body">
		<div class="container">
			<?php
			echo Theme_Util::get_breadcrumb();
			the_content();
			?>
		</div>
	</div>
<?php
get_footer();
