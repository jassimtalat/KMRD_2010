<?php 
include("common.php");
include $Path_Include."db.php";
include $Path_Include."lib.php";
	
	
	$sql="insert into template(title,source,enable) values ('".$_REQUEST["template_title"]."','".addslashes($_REQUEST["html_code"])."',1)";
	print $sql;
	sql_query($sql);
	
	header("location:template_listing.php");
?>