<?php
include_once('../config/database.php');
include_once('../functions.php');
if(filter_has_var(INPUT_POST,'addpost') && $_SERVER['REQUEST_METHOD'] = 'POST'){
         addPost($connection) ;
}
if(filter_has_var(INPUT_POST,'updatepost') && $_SERVER['REQUEST_METHOD'] = 'POST'){
    updatePost($connection);
}