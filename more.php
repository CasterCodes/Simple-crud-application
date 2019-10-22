<?php
 include_once('./config/database.php');
  include('includes/header.php');
?>
<?php
  include('includes/navigation.php');
?>
 
  <section>
       <div class="container">
            <?php
            if(isset($_GET['post_id'])){
                $post_id = $_GET['post_id'];
                $query = "SELECT * FROM  posts WHERE id=:id";
                $stmt = $connection->prepare($query);
                $stmt->execute(['id'=>$post_id]);
                $post = $stmt->fetch();

            }
            ?>
            <div class="post-content">
              
              <h1><?php echo $post['title'];?></h1>
              <p>Created on <span><?php echo $post['created_at'];?></span> by <small><?php echo $post['author'];?></small></p>
              <p><?php echo $post['body'];?></p>
              <a class='edit' href="addpost.php?edit_id=<?php echo$post['id']?>">Edit</a> 
               <a class='back' href="index.php">Back</a>
              <a class='delete'href="process/delete.php?delete_id=<?php echo$post['id']?>">Delete</a>
            </div>
       </div>
  </section>
<?php
  include('includes/footer.php');
?>