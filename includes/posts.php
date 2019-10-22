
<div class="posts">
               <h2>Posts</h2>
                  <?php
                   $query  = "SELECT * FROM posts ORDER BY id DESC";
                   $stmt = $connection->prepare($query);
                   $stmt->execute();
                   $rowCount = $stmt->rowCount();
                   $posts = $stmt->fetchAll();
                   ?>
                    <?php if($rowCount > 0) :?>

                        <?php foreach ($posts as  $post) :?>
                        <div class="post-content">
                              <h1><?php echo $post['title'];?></h1>
                              <p>Created on <span><?php echo $post['created_at'];?></span> by <small><?php echo $post['author'];?></small></p>
                              <p><?php echo substr($post['body'],0, 500);?></p>
                              <a class='more'href="more.php?post_id=<?php echo $post['id']?>">Read More</a>
                        </div>
                        <?php endforeach;?>
                    <?php else:?>
                     <p>No posts</p>
                    <?php endif;?>
  </div>