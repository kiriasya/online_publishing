<?php
require "db.php";
$data=$_POST;
if (isset($data['status'])){
    $id=$data['status'];
    $user=R::load('book',$id);
    $user->status="new";
    R::store($user);
}