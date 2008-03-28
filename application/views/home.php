<?php defined('SYSPATH') or die('No direct script access.'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Share Swapper - find files from online file hosting providers</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<style type="text/css" media="screen">
	/* <![CDATA[ */
	@import url("<?php echo url::base(); ?>css/common.css");
	@import url("<?php echo url::base(); ?>css/home.css");
	/* ]]> */
	</style>
	
	<!-- <link rel="shortcut icon" href="favicon.ico" /> -->
</head>

<body>
<div id="wrap">

<div id="header">
	<h1><a href="<?php echo url::base(); ?>">Share Swapper</a></h1>
	<p>a large index of <strong>user submitted and verified files</strong> 
	from online file hosting providers that include <span class="highlight">rapidshare, 
	megaupload, mediafire, sendspace, and more</span>!</p>
</div>

<div id="content">
	
	<div class="navigation">
		<p>Search Files | <a href="<?php echo url::site('browse'); ?>">Browse Files</a> | 
		<a href="<?php echo url::site('recent'); ?>">Most Recent Files</a> | <a href="<?php echo url::site('add'); ?>">Submit a File Link!</a></p>  
	</div>
	
	<div class="search">
		<form action="<?php echo url::site('search'); ?>" method="GET">
			<input type="text" name="keywords" class="searchbox" />
			<input type="submit" value="Search!" class="searchsubmit" />
		</form>
		<!-- TODO: Add checkboxes for categories -->
	</div>
	
	<div class="usefullinks">
		<p><a href="add"><span class="highlight">Have a file link to share? Submit it here!</span></a></p>
	</div>
	
	<!-- TODO: Add list of recently added files or recently access files or recent searches -->
	
</div>

<?php echo $this->load->view('page-footer'); ?>

</div> <!-- End div for wrap -->

</body>

</html>
