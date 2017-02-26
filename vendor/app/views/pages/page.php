<?php
/**
 * Sample layout
 */

use Core\Language;
use Helpers\Block;
?>
<?php if($data['page'] ){ ?>
<?php foreach ($data['page'] as $row) { ?>
<div class="content page-banner">
	<img src="<?php echo $row->pageBannerImg ?>" alt="">
</div>
<main class="content">
	<div class="wrapper wrapper-pad">




		<div class="page-header">
			<h1><?php echo $row->pageTitle ?></h1>

			<div class="content">
				<?php echo $row->pageContent ?>
			</div>
		</div>

	<?php }
} ?>



<a class="btn btn-md btn-success" href="<?php echo DIR;?>">
	<?php echo Language::show('back_home', 'Welcome'); ?>
</a>
