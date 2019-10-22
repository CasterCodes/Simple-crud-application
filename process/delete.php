<?php
include_once('../config/database.php');
include_once('../functions.php');
if(isset($_GET['delete_id'])){
  deletePost($connection);
}