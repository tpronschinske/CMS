<?php
/**
 * Sample layout
 */

use Core\Language;

?>
<main class="content">
    <div class="container desktop-large">
		<section class="articles-listing--page">
<?php if($data['article_data'] ){
	foreach ($data['article_data'] as $row) { ?>
		<div class="row article-item">
			<div class="col-md-3 article-listing--image">
				<img class="img-responsive" src="<?php echo $row->articleImage ?>" alt="">
			</div>
			<div class="col-md-9 article-listing--content-wrap">
				<div class="article-header--item">
					<h3><?php echo $row->articleTitle ?></h3>
				</div>
				<div class="article-content--item">
					<p><?php echo $row->articleContent ?></p>
				</div>
				<div class="article-link--item">
					<a href="/articles/<?php echo $row->articleUrl ?> ">Read More...</a>
				</div>
			</div>
		</div>

	<?php } ?>
	<?php echo $data['pageLinks']; ?>
<?php } ?>
</section>