<?php
  if(isset($_GET['edit_id'])){
   $editid = $_GET['edit_id'];
   $query = "SELECT * FROM  posts WHERE id=:id";
   $stmt = $connection->prepare($query);
   $stmt->execute(['id'=>$editid]);
   $post = $stmt->fetch();
   $title = $post['title'];
   $author = $post['author'];
   $body = $post['body'];
   $updateid = $post['id'];
   $update = true;
  }else{
   $title = '';
   $author = '';
   $body = '';
   $updateid = '';
   $update = false;
  }
?>