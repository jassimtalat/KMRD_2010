<?php 
include("common.php");
include $Path_Include."db.php";
include $Path_Include."lib.php";
	
	$page_id=$_REQUEST["page_id"];
	$template_editable_id = $_REQUEST["template_editable_id"];
	
	$sql="select * from pageas_editable_content where page_id=$page_id and template_editable_id=$template_editable_id";
	print $sql;
	$data=sql_data($sql);
		
	
	if($_REQUEST["input_text_field_edit"]!="")
	{
		
		if($data["id"])
		{
			$sql="update pageas_editable_content set content='".$_REQUEST["input_text_field_edit"]."' where id=".$data["id"];
		}
		else{
			
			$sql="insert into pageas_editable_content(page_id,template_editable_id,content) values 
			('".$_REQUEST["page_id"]."','".$_REQUEST["template_editable_id"]."','".$_REQUEST["input_text_field_edit"]."')";
			
		}
	}
	else
	{
		if($data["id"])
		{
			$sql="update pageas_editable_content set content='".$_REQUEST["input_text_area_edit"]."' where id=".$data["id"];
		}
		else{
			$sql="insert into pageas_editable_content(page_id,template_editable_id,content) values 
			('".$_REQUEST["page_id"]."','".$_REQUEST["template_editable_id"]."','".$_REQUEST["input_text_area_edit"]."')";
		}
	}
	print $sql;
	$page_id=sql_insert($sql);
	
	
?>