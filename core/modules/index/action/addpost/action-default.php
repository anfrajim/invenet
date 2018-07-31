<?php
if(isset($_POST)){
$p = new PostData();
$p->title = $_POST['title'];
$p->content = $_POST['content'];
$public =0;
if(isset($_POST['is_public'])){ $public=1; }

$p->is_public = $public;
$p->user_id = 1;
$p->add();


 print "<script>window.location='index.php?view=newpost';</script>";
}
?>