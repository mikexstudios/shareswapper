<?php defined('SYSPATH') or die('No direct script access.'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title><?php echo $search_keywords; ?> : Share Swapper - find files from online file hosting providers</title>
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

<?php echo $page_header; ?>

<div id="content">
	<div class="contentheader">
		<h2>Search results for <em class="highlight"><?php echo $search_keywords; ?></em> (<?php echo $number_records; ?> files found):</h2>
	</div>
	
	<div class="searchresults">
		<table class="searchresultstable" cellspacing="0">
		<thead>
			<tr>
				<td>Category</td>
				<td>Name</td>
				<td>Last Updated</td>
				<td>Accessed</td>
				<td>Relevance</td>
			</tr>
		</thead>
		<tbody>
		<?php foreach($search_results as $result): //Uses dumb ORM Iterator ?>
			<tr>
				<td><a href="<?php echo url::site('browse/'.$result->category); ?>"><?php echo category::full_name($result->category); ?></a></td>
				<td><a href="<?php echo url::site('show/'.url::int_to_short_id($result->id)); ?>"><?php echo $result->title; ?></a></td>
				<td><?php echo date('dS F Y g:i A', $result->updated_time); ?></td>
				<td></td>
				<td><?php $score = isset($result->score) ? $result->score : ''; if(is_numeric($score)) {printf('%01.2f', $score);} else {echo 'n/a';} ?></td>
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
