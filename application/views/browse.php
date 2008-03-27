<?php defined('SYSPATH') or die('No direct script access.'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Browse File Links : Share Swapper - find files from online file hosting providers</title>
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
		<h2>Browsing the <span class="highlight"><?php echo $category_name; ?> category</span> (<?php echo $number_records; ?> files found):</h2>
	</div>
	
	<div class="searchresults">
		<table class="searchresultstable" cellspacing="0">
		<thead>
			<tr>
				<td>Category</td>
				<td>Name</td>
				<td>Last Updated</td>
				<td>Accessed</td>
			</tr>
		</thead>
		<tbody>
		<?php foreach($category_records as $record_obj): //Uses dumb ORM Iterator ?>
			<tr>
				<td><a href="<?php echo url::site('browse/'.$record_obj->category); ?>"><?php echo category::full_name($record_obj->category); ?></a></td>
				<td><a href="<?php echo url::site('show/'.url::int_to_short_id($record_obj->id)); ?>"><?php echo $record_obj->title; ?></a></td>
				<td><?php echo date('dS F Y g:i A', $record_obj->updated_time); ?></td>
				<td></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
		</table>
	</div>
	
	<div class="pages">
	</div>

</div>

<?php echo $this->load->view('page-footer'); ?>

</div> <!-- End div for wrap -->

</body>

</html>
