<?php

function get_posts()
{
  global $link;
  $sql = "SELECT * FROM  posts ";
  $result = $link->prepare($sql); 
  $result->execute();
  $posts =$result->fetchAll();
  return  $posts;
}

function get_current_post($post_id)
{
  global $link;
  $sql = "SELECT * FROM posts WHERE id = ?";
  $result = $link->prepare($sql);
  $result->execute([$post_id]);
  $current_post = $result->fetch();
  return  $current_post;
}
function get_comments($post_id)
{
  global $link;
  $sql = "SELECT * FROM comments WHERE article_id= ?";
  $result = $link->prepare($sql);
  $result->execute([$post_id]);
  $comments = $result->fetchAll();
  return  $comments;
}


?>
