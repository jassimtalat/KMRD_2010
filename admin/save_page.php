<?php 
include("common.php");
include $Path_Include."db.php";
include $Path_Include."lib.php";
	
	
	$sql="insert into pages(page_title,template_id) values ('".$_REQUEST["page_title"]."','".$_REQUEST["template"]."')";
	print $sql;
	$page_id=sql_insert($sql);
	
	header("location:add_page_step2.php?pageID=".$page_id);
?>