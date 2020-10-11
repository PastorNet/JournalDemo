<?php
require_once('includes/database.php');
require_once('includes/functions.php');

?>

<?php $post_id = $_GET[htmlspecialchars("post_id",ENT_QUOTES)];
	$link->quote($post_id); // экранирование строки
 	if(empty($post_id))
	{
		header('Location: index.php');
		die();
	}
	?>
<?php

try
{
		$post = get_current_post($post_id);
		if(!$post)
		{
			throw new Exception('Page not found');
		}

}
catch (Exception $e)
{
		print "Error!: " . $e->getMessage() . "<br/>";
		http_response_code(500);
		die();
}
$pageTitle = $post['title'];
$currentPage = 'article';
 ?>
 <?php require('includes/header.php');
 				require('includes/comment.php');
 ?>
			<article class="pageContent">
					<div class="container">
						<div class="post">
							<header class="post-header">
								<h1 align="center"><?=$post['title']?></h1>
						</header>
						<div class="post-image">
							<img src="<?=$post['image']?>" alt="">
						</div>
						<div class="post-content">
							<p><?=$post['content']?></p>

						</div>
					</div>

					<footer class="post-footer">
							<div class="post-meta">
								<time datetime="<?=$post['datetime']?>"><?=$post['datetime']?></time>
								<span class="author"><?=$post['author']?></span>
								<span class="category"><?=$post['category']?></span>
							</div>
						</footer>
					</div>

					<div class = "comment-form">
					<?php require_once('includes/comment_form.php'); ?>
					</div>

			</article>

	<?php include('includes/footer.php') ?>
