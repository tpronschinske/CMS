<?php
/**
 * Home Page layout
 */

use Core\Language;
use Helpers\Block;
?>

	<?php
		if($data['home_page'] ){
			
			foreach ($data['home_page'] as $row) { ?>
				<h1><?php echo $row->pageTitle ?></h1>
				<?php echo $row->pageContent ?>
			<?php }
		}
	?>

	

</div>
