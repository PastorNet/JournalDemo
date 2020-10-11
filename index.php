<?php
require_once('includes/database.php');
require_once('includes/functions.php');
?>
<?php
try
{
    $posts=get_posts();
    if(!$posts)
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
$currentPage = 'home';
?>
<?php require('includes/header.php') ?>
		<h2 class="beauty_margin">Main Feed</h2>
		<article class="pageContent">
			<article>
          <?php foreach($posts as $post): ?>
					       <div class="item sizer4">
					          <a href="article.php?post_id=<?=$post['id']?>"><h2 class="item_h2"><?=$post['title']?></h2></a>
					          <img src="<?=$post['image']?>" alt="image-post">
					          <div class="cover-item">
					               <a href="article.php?post_id=<?=$post['id']?>">
					                 <p><?=mb_substr($post['content'],0,10,'utf-8')."..."?></p>
                         </a>
					          </div>
                    <ul class="icon">
                        <li><a href="" ><p><?=$post['category']?></p></a></li>
                        <li><a href="" ><p><?=$post['author']?></p></a></li>
                        <li><a href="" ><i class="fa fa-heart" aria-hidden="true"></a></i></li>
                    </ul>
					       </div>
          <?php endforeach; ?>
			</article>

		</article>
			<?php include('includes/footer.php') ?>
