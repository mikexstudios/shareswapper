<?php defined('SYSPATH') or die('No direct script access.'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Successfully Added File Link : Share Swapper - find files from online file hosting providers</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<meta http-equiv='refresh' content='6; url=<?php echo $file_link_url; ?>'>

	<style type="text/css" media="screen">
	/* <![CDATA[ */
	@import url("<?php echo url::base(); ?>css/common.css");
	@import url("<?php echo url::base(); ?>css/common-page.css");
	@import url("<?php echo url::base(); ?>css/add.css");
	/* ]]> */
	</style>
	
	<!-- <link rel="shortcut icon" href="favicon.ico" /> --> 
</head>

<body>
<div id="wrap">

<?php echo $this->load->view('page-header'); ?>

<div id="content">
	<div class="contentheader">
		<h2>File Link Successfully Added!</h2>
	</div>

	<div class="addlinksuccessmessage">
		<p><strong>Thanks for sharing!</strong> <span class="highlight">Your link has been successfully
		added to the database</span>! You can actually view it right now at: 
		<strong><a href="<?php echo $file_link_url; ?>"><?php echo $file_link_url; ?></a></strong>
		(redirecting there in 5 seconds...)</p>
	</div>
	
</div>

<?php echo $this->load->view('page-footer'); ?>

</div> <!-- End div for wrap -->

</body>

</html>
