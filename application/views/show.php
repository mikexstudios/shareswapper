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
	
	<script type="text/javascript" src="<?php echo url::base(); ?>js/jquery.js"></script>   
	<script type="text/javascript">                                         
		// we will add our javascript code here   
		$(document).ready(function() {
			// do stuff when DOM is ready
			$("#content div.addlinkform p.form_add_another_link a").click(function(){
   			$("#content div.addlinkform div.form_link_wrapper").append('<p>Paste your <em>additional</em> link from the online file hosting service here.</p><input class="form_link" name="link[]" type="text" size="82" maxlength="255" tabindex="4" /><br />');
			});
		});                                  
	</script>  
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

</div>

<?php echo $this->load->view('page-footer'); ?>

</div> <!-- End div for wrap -->

</body>

</html>
