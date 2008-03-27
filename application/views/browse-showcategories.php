<?php defined('SYSPATH') or die('No direct script access.'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Browse Categories : Share Swapper - find files from online file hosting providers</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<style type="text/css" media="screen">
	/* <![CDATA[ */
	@import url("<?php echo url::base(); ?>css/common.css");
	@import url("<?php echo url::base(); ?>css/common-page.css");
	@import url("<?php echo url::base(); ?>css/browse.css");
	/* ]]> */
	</style>
	
	<!-- <link rel="shortcut icon" href="favicon.ico" /> -->
</head>

<body>
<div id="wrap">

<?php echo $this->load->view('page-header'); ?>

<div id="content">
	<div class="contentheader">
		<h2>Browse Files by Category</h2>
	</div>
	
	<div class="categorylist">
		<div class="categorylist-left">
			<p><strong><a href="<?php echo url::site('browse/all'); ?>">All Files</a></strong></p>
			<p><a href="<?php echo url::site('browse/anime'); ?>">Anime</a></p>
			<p><a href="<?php echo url::site('browse/books'); ?>">Books</a></p>
			<p><a href="<?php echo url::site('browse/games'); ?>">Games</a></p>
			<p><a href="<?php echo url::site('browse/movies'); ?>">Movies</a></p>
			<p><a href="<?php echo url::site('browse/pictures'); ?>">Pictures</a></p>
		</div>
		<div class="categorylist-right">
			<p>&nbsp;</p>
			<p><a href="<?php echo url::site('browse/music'); ?>">Music</a></p>
			<p><a href="<?php echo url::site('browse/software'); ?>">Software</a></p>
			<p><a href="<?php echo url::site('browse/tv'); ?>">TV Shows</a></p>
			<p><a href="<?php echo url::site('browse/adult'); ?>">Adult</a></p>
			<p><a href="<?php echo url::site('browse/other'); ?>">Other</a></p>
		</div>
	</div>
	
	<div class="contentfooter">
		
	</div>

</div>

<?php echo $this->load->view('page-footer'); ?>

</div> <!-- End div for wrap -->

</body>

</html>
