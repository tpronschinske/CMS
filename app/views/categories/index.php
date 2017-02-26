<?php
/**
 * Sample layout
 */

use Core\Language;

?>
<main class="content">
    <div class="container desktop-large">
		<section class="articles-listing--page">
<?php if($data['category_data'] ){
	foreach ($data['category_data'] as $row) { ?>
		<div class="row article-item">
			<div class="col-md-9">
				<div class="article-header--item">
					<h3><?php echo $row->categoryName ?></h3>
				</div>
				<div class="article-link--item">
					<a href="/cat/<?php echo $row->categoryUrl ?> ">View Category</a>
				</div>
			</div>
		</div>

	<?php } ?>
	<?php echo $data['pageLinks']; ?>
<?php } ?>
</section>