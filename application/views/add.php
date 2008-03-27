<?php defined('SYSPATH') or die('No direct script access.'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Add File Link: Share Swapper - find files from online file hosting providers</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<style type="text/css" media="screen">
	/* <![CDATA[ */
	@import url("<?php echo url::site('css/common.css'); ?>");
	@import url("<?php echo url::site('css/common-page.css'); ?>");
	@import url("<?php echo url::site('css/add.css'); ?>");
	/* ]]> */
	</style>
	
	<!-- <link rel="shortcut icon" href="favicon.ico" /> -->
	
	<script type="text/javascript" src="<?php echo url::site('js/jquery.js'); ?>"></script>   
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
			<input type="text" name="keywords" class="searchbox" />
			<input type="submit" value="Search!" class="searchsubmit" />
		</form>
		<!-- TODO: Add checkboxes for categories -->
	</div>
</div>

<div id="content">
	<div class="contentheader">
		<h2>Add a File Link</h2>
	</div>
	
	<div class="addlinkinstructions">
		<h3>Instructions:</h3>
		<ol>
			<li>First, make sure your file is uploaded to one or more 
			<span class="highlight">online file hosting providers</span>. We 
			<strong>recommend</strong>
			using <a href="http://www.sharebee.com/">ShareBee</a> (which will help you 
			mirror your files automatically) or <a href="http://www.mediafire.com">MediaFire</a>
			(easy to download from). However, you can certainly use other file hosts such
			as <a href="http://www.megaupload.com">MegaUpload</a>, 
			<a href="http://www.rapidshare.com">Rapidshare</a>, 
			<a href="http://www.sendspace.com">Sendspace</a>, etc.</li>
			
			<li>Next, <span class="highlight">fill out the form below</span>. Try to
			be as <em>detailed as possible</em>. If you want to include an image in
			your description, a cool service to host images with is 
			<a href="http://allyoucanupload.webshots.com/">AllYouCanUpload</a>. If 
			your file has a password, please specify it!</li>
			
			<li><strong>That's it! Click submit! Thanks for sharing!</strong></li>
		</ol>
	</div>
	
	<div class="addlinkform">
	<p><strong class="highlight">All fields are required!</strong></p>
	<?php echo isset($error) ? $error : ''; ?>
		<form action="<?php echo url::site('add/submit'); ?>" method="POST">
			<div>
				<label>Category:</label><br />
  			<select name="category" class="form_category" tabindex="1"> 
					<option value="other"<?php echo ($form_category == 'other') ? ' selected="selected"' : ''; ?>>Other</option>
					<option value="anime"<?php echo ($form_category == 'anime') ? ' selected="selected"' : ''; ?>>Anime</option>
					<option value="books"<?php echo ($form_category == 'books') ? ' selected="selected"' : ''; ?>>Books</option>
					<option value="games"<?php echo ($form_category == 'games') ? ' selected="selected"' : ''; ?>>Games</option>
					<option value="movies"<?php echo ($form_category == 'movies') ? ' selected="selected"' : ''; ?>>Movies</option>
					<option value="music"<?php echo ($form_category == 'music') ? ' selected="selected"' : ''; ?>>Music</option>
					<option value="pictures"<?php echo ($form_category == 'pictures') ? ' selected="selected"' : ''; ?>>Pictures</option>
					<option value="software"<?php echo ($form_category == 'software') ? ' selected="selected"' : ''; ?>>Software</option>
					<option value="tv"<?php echo ($form_category == 'tv') ? ' selected="selected"' : ''; ?>>TV Shows</option>
				</select>
  		</div>
			<div>
				<label>Name / Title of File:</label>
				<p>What is the name of your file? (ie. Ubuntu Linux 8.04 Hardy Heron)</p>
  			<input class="form_title" name="title" type="text" size="70" maxlength="255" value="<?php echo isset($form_title) ? $form_title : ''; ?>" tabindex="2" /> 
  		</div>
			<div>
				<label>Description:</label>
				<p>Style your text, include links, and images with 
				<a href="http://en.wikipedia.org/wiki/BBCode">BBCode</a>. We recommend
				using <a href="http://allyoucanupload.webshots.com/">AllYouCanUpload</a>
				to host your images.</p>
  			<textarea class="form_description" name="description" rows="15" cols="80" tabindex="3"><?php echo isset($form_description) ? $form_description : ''; ?></textarea>
  		</div>  
			<div class="form_link_wrapper">
				<!-- Use this so the page doesn't scroll up when adding additional links: -->
				<a name="form_link_anchor"></a>
				<label>Link(s) to File:</label>
				<p>Paste your link from the online file hosting service here.</p>
  			<input class="form_link" name="link[]" type="text" size="82" maxlength="255" value="<?php echo isset($form_links[0]) ? $form_links[0] : ''; ?>" tabindex="4" /><br />
  			<?php 
				foreach($form_links as $index=>$each_link)
				{
					if($index!=0 && !empty($each_link)) //We ignore the first link
					{
				?>
						<p>Paste your <em>additional</em> link from the online file hosting service here.</p>
  					<input class="form_link" name="link[]" type="text" size="82" maxlength="255" value="<?php echo $each_link; ?>" tabindex="4" /><br />
				<?php
					}
				}
				?>
  		</div>
  		<p class="form_add_another_link"><a href="#form_link_anchor">Have more than one link? Click here to add another link 
				field.</a></p>
  		<div class="form_submit_wrapper">
  			<input class="form_submit" type="submit" value="Submit File Link!" tabindex="5" />
  		</div>
		</form>
	</div>

</div>

<?php echo $this->load->view('page-footer'); ?>

</div> <!-- End div for wrap -->

</body>

</html>
