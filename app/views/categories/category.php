<?php
/**
 * Sample layout
 */

use Core\Language;

?>

<main class="content">
    <div class="container desktop-large">
		<?php if($data['article_data'] ){ ?>
						<div class="category-return">
								<a class="return-link" href="/cat"> &#10096; Back To Categories</a>
						</div>

		<?php	foreach ($data['article_data'] as $row) { ?>
				<article class="cat-post--article">
					<div class="cat-article-image">
						<img class="img-responsive" src="<?php echo $row->articleImage ?>" alt="">
					</div>
					<div class="cat-article--content-wrap">
						<div class="cat-article--header">
							<h1><?php echo $row->articleTitle ?></h1>
						</div>
						<div class="cat-article--content">
							<p><?php echo $row->articleContent ?></p>
							<a href="/articles/<?php echo $row->articleUrl ?>">Read More</a>
						</div>
					</div>
			<?php } ?>

<?php } ?>
</section>