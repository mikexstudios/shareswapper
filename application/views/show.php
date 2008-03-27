<?php defined('SYSPATH') or die('No direct script access.'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title><?php echo $file_title; ?> : Share Swapper - find files from online file hosting providers</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<style type="text/css" media="screen">
	/* <![CDATA[ */
	@import url("<?php echo url::base(); ?>css/common.css");
	@import url("<?php echo url::base(); ?>css/common-page.css");
	@import url("<?php echo url::base(); ?>css/show.css");
	/* ]]> */
	</style>
	
	<!-- <link rel="shortcut icon" href="favicon.ico" /> --> 
</head>

<body>
<div id="wrap">

<?php echo $this->load->view('page-header'); ?>

<div id="content">
	<div class="contentheader">
		<h2><?php echo $file_title; ?></h2>
	</div>
	
	<div class="fileinfo">
		<div class="fileinfo-left">
			<p><strong>Category</strong>: <?php echo $file_category; ?></p>
		</div>
		<div class="fileinfo-right">
			<p><strong>Last Updated</strong>: <?php echo $file_last_updated; ?></p>
		</div>
		
		<div class="fileinfo-description">
			<h3>Description:</h3>
			<div class="inner">
			<p><?php echo $file_description; ?></p>
			</div>
		</div>
	</div>
	
	<div class="filedownload">
		<h3><span class="highlight">Download this file</span>:</h3>
		<div>
			<ol>
				<?php foreach($file_links as $link_obj): //Uses dumb ORM Iterator ?>
				<li><a href="<?php echo $link_obj->value; ?>"><?php echo $link_obj->value; ?></a></li>
				<?php endforeach; ?>
			</ol>
		</div>
	</div>
	
	<div class="permalink">
		<h3>Link to this page:</h3>
		<p>Just <span class="highlight">copy and paste the link below</span> when sharing with your friends!</p>
		<form>
			<!-- Note: Javascript copy doesn't work with Firefox because of innate security -->
			<input class="permalink-input" type="text" name="permalink-input" value="<?php echo url::base().url::current(); ?>" size="90" readonly onclick="javascript:select();document.execCommand('copy');" />
		</form>
	</div>

</div>

<?php echo $this->load->view('page-footer'); ?>

</div> <!-- End div for wrap -->

</body>

</html>
