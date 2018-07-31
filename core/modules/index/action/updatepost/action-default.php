<?php
if(isset($_POST)){
$p = PostData::getById($_POST['id']);
$p->title = $_POST['title'];
$p->content = $_POST['content'];
$public =0;
if($_POST['is_public']){ $public=1; }

$p->is_public = $public;

$p->update();

setcookie("added",$p->title);

print "<script>window.location='index.php?view=editpost&id=$p->id';</script>";
}
?>