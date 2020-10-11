<?php
  $commentErrors =  array();
  $commentAuthor ='';
  $commentRate = 5;
  $commentText ='';

if (isset($_POST['action']) && 'add-comment' === $_POST['action'])
 {
  	$commentAuthor = trim((string)$_POST['author']);
  	$commentRate = (int)$_POST['rate'];
  	$commentText = trim((string)$_POST['comment']);
  	$commentDate = date('Y-m-d H:i:s');

      if ('' === $commentAuthor)
        $commentErrors['author'] = 'Author can not be empty';
      elseif (mb_strlen($commentAuthor) > 50)
        $commentErrors['author'] = 'Author can not be more than 50 characters';

      if ($commentRate < 1 || $commentRate > 5)
        $commentErrors['rate'] = 'Rate is invalid';

      if ('' === $commentText)
        $commentErrors['comment'] = 'Comment can not be empty';
      elseif (mb_strlen($commentText) < 3)
        $commentErrors['comment'] = 'Comment can not be less than 3 characters';
      elseif (mb_strlen($commentText) > 200)
        $commentErrors['comment'] = 'Comment can not be more than 200 characters';
  if (0 === count($commentErrors))
  {
          $result = $link->prepare("INSERT INTO comments (article_id, author, rate, text, created) VALUES (?, ?, ?, ?, ?)");
          $result->bindValue(1, $post['id'], PDO::PARAM_INT);
          $result->bindValue(2, $commentAuthor, PDO::PARAM_STR);
          $result->bindValue(3, $commentRate, PDO::PARAM_INT);
          $result->bindValue(4, $commentText, PDO::PARAM_STR);
          $result->bindValue(5, $commentDate);
          $result->execute();

          if (false === $result)
          {
            http_response_code(500);
            exit('Database Insert error');
          }
  header("Location: article.php?post={$post_id}");
  exit();
  }
}

$comments = $link->prepare("SELECT * from comments WHERE article_id= ?");
$comments->execute([$post['id']]);
if (false === $comments)
{
	http_response_code(500);
	exit('Database query error');
}

?>
