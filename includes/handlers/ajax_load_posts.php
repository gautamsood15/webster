<?php
include("../../config/config.php");
include("../../config/User.php");
include("../../config/Post.php");


$limit = 10; // Number pf posts to be loaded per call

$posts = new Post($con, $_REQUEST['userLoggedIn']);
$posts->loadPostsFriends();

?>