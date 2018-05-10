<?php

/*Template Name: About Us V2*/

get_header();

?>

<div id="primary" class="content-area">
	<section class="title-header" style="background-image:url(<?php echo get_field('hero_image');?>);">
		<h1><?php echo get_field('page_title');?></h1>
		<p><?php echo get_field('title_description');?></p>
	</section>
	<section>
		<div class="row">
			<div class="col-sm-6">
				<p><?php echo get_field('text_left');?></p>
			</div>
			<div class="col-sm-6">
				<p><?php echo get_field('text_right');?></p>
			</div>
		</div>
	</section>

</div>






<?php

get_footer();
