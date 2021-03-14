<?php
   include_once('config/database.php');
   function addPost(){
    global $connection;
       
    $author = $_POST['author'];
      
    $title = $_POST['title'];
      
    $body = $_POST['body'];
      
    if(empty($author) && empty($title) && empty($body)){
          header('location:../addpost.php?error=emptyfields');
    }elseif(empty($author)){
          header('location:../addpost.php?error=emptyauthor&title='.$title.'&body='.$body);
          exit();
    }elseif(empty($title)){
       header('location:../addpost.php?error=emptytitle&author='.$author.'&body='.$body);
       exit();
    }elseif(empty($body)){
       header('location:../addpost.php?error=emptybody&author='.$author.'&title='.$title);
       exit();
    }else{
           $query = 'INSERT INTO posts(title,body,author) VALUES(:title,:body,:author)';
           $stmt = $connection->prepare($query);
           $run = $stmt->execute(['title'=>$title,'body'=>$body,'author'=>$author]);
           if(!$run){
               header('location:../addpost.php?error=sqlerror');
               exit();  
           }else{
               header('location:../addpost.php?success=postsubmitted');
               exit();   
           }
    }

   }

   function updatePost(){
    global $connection;
      
    $author = $_POST['author'];
      
    $title = $_POST['title'];
      
    $body = $_POST['body'];
      
    $updateid = $_POST['updateid'];
      
    if(empty($author) && empty($title) && empty($body)){
          header('location:../addpost.php?error=emptyfields');
    }elseif(empty($author)){
          header('location:../addpost.php?error=emptyauthor&title='.$title.'&body='.$body);
          exit();
    }elseif(empty($title)){
       header('location:../addpost.php?error=emptytitle&author='.$author.'&body='.$body);
       exit();
    }elseif(empty($body)){
       header('location:../addpost.php?error=emptybody&author='.$author.'&title='.$title);
       exit();
    }else{
           $query = 'UPDATE posts SET title=:title, body=:body,author=:author WHERE id = :id';
       
           $stmt = $connection->prepare($query);
       
           $run = $stmt->execute(['title'=>$title,'body'=>$body,'author'=>$author,'id'=>$updateid]);
       
           if(!$run){
               header('location:../addpost.php?error=sqlerror');
               exit();  
           }else{
               header('location:../addpost.php?success=postupdated');
               exit();   
           }
    }
   }
  
   function deletePost($connection){
      
      $deleteid = $_GET['delete_id'];
      
      $query = "DELETE FROM posts WHERE id = :id";
      
      $stmt =  $connection->prepare($query);
      
      if( $stmt->execute(['id'=>$deleteid])){
          header('Location:../index.php?success=delete');
      }else{
          header('Location:index.php?delete=failure'); 
      }
   }
   function displayErrors($connection){
        $error = $_GET['error'];
      
        if($error == 'emptyfields'){
                echo '<p>Please fill all the Fields</p>';
        }
        if($error == 'emptyauthor'){
        echo '<p>Author is empty</p>';
        }
        if($error == 'emptytitle'){
        echo '<p>Post title is Empty</p>';
        }
        if($error == 'emptybody'){
        echo '<p>Post body is empty</p>';
        }

   }
   function displaySuccess($connection){
    $success = $_GET['success'];
      
    if($success == 'postsubmitted'){
         echo '<p>Post Successfully Submitted</p>';
    }
      
    if($success == 'postupdated'){
        echo '<p>Post successfull Updated</p>';
    }
      
    if($success == 'delete'){
         echo '<p>Post was deleted successful</p>';
    }
   }
   
?>
