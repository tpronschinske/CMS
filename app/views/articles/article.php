<?php
/**
 * Sample layout
 */

use Core\Language;

?>
<main class="content">
    <div class="container desktop-large">
				 
<?php if($data['article_data'] ){ ?>
	<ol class="breadcrumb breadcrumb--white">
	<li class="breadcrumb-item"><a href="/articles">Articles</a></li>
	<li class="breadcrumb-item active"><?php echo $data['article_data'][0]->articleName; ?></li>
	</ol>
			

<?php	foreach ($data['article_data'] as $row) { ?>
		<article class="post-article">

			<div class="article-image">
				<img class="img-responsive" src="<?php echo $row->articleImage ?>" alt="">
			</div>
			<div class="article-content-wrap">
				<div class="article-header">
					<h1><?php echo $row->articleTitle ?></h1>
				</div>
				<div class="article-content">
					<p><?php echo $row->articleContent ?></p>
				</div>
				<div class="article-link">
					<a class="btn btn-primary" href="/articles"><span class="article-return--link-arrow">&#8249;</span> Return To Articles</a>
				</div>
			</div>
			
					
				
		

	<?php } ?>

<?php } ?>
</section>