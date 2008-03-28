<?php defined('SYSPATH') or die('No direct script access.'); ?>
<div id="header">
	<div class="logo">
		<h2><a href="<?php echo url::base(); ?>">Share Swapper</a></h2>
	</div>

	<div class="navigation">
		<p><strong><a href="<?php echo url::site('search'); ?>">Search Files</a></strong> | <a href="<?php echo url::site('browse'); ?>">Browse Files</a> | 
		<a href="<?php echo url::site('recent'); ?>">Most Recent Files</a> | <a href="<?php echo url::site('add'); ?>">Submit a File Link!</a></p>  
	</div>
	
	<div class="search">
		<form action="<?php echo url::site('search'); ?>" method="GET">
			<input type="text" name="keywords" class="searchbox" value="<?php echo isset($search_keywords) ? $search_keywords : '';?>" />
			<input type="submit" value="Search!" class="searchsubmit" />
		</form>
		<!-- TODO: Add checkboxes for categories -->
	</div>
</div>
