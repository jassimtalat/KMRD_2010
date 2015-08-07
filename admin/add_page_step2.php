<?php 
include("common.php");

?>

<?php include $Path_Include."header_admin.php";?>
<script>
$(document).ready(function() {		
		$("#input_text_field_edit").hide();
		$("#input_text_area_edit").hide();
	});
	
function display_textfield(counter,template_editable_id)
{
	$("#input_text_field_edit").show();
	$("#input_text_area_edit").val("");
	$("#setCounter").val(counter);
	$("#template_editable_id").val(template_editable_id);
	
	if($("#show_text"+counter).text()!="")
		$("#input_text_field_edit").val($("#show_text"+counter).text());
	else	
		$("#input_text_field_edit").val("");
	
}
function display_text_keypress(val)
{
	counter = $("#setCounter").val();
	
	$("#show_text"+counter).text(val);
}

function display_textarea(counter,template_editable_id)
{
	$("#input_text_area_edit").show();
	//$("#show_textarea"+counter).text("");
	$("#setCounter").val(counter);
	$("#input_text_field_edit").val("");

	$("#template_editable_id").val(template_editable_id);
	if($("#show_textarea"+counter).text()!="")
		$("#input_text_area_edit").val($("#show_textarea"+counter).text());
	else	
		$("#input_text_area_edit").val("");
}
function display_text_area_keypress(val)
{
	counter = $("#setCounter").val();
	
	$("#show_textarea"+counter).text(val);
}
function set_uploaded_contents()
{
	$("#uploaded_contents").val($("#main_container").text());
}

function save_contents()
{
	$.ajax({
		url: 'save_page_detail.php',
		data:$("#frm1").serialize(),
		success: function(data) {
			
			alert('Load was performed.'+data);
			//$('.result').html(data);
			
		}
	});
}
</script>
<!-- /#HTML --> 
<body onLoad="MM_preloadImages('images/btnew_areuready2.png')">

<form name="frm1" id="frm1" method="post" action="">
	<input type="text" name="page_id" id="page_id" value="<?php print $_REQUEST["pageID"]?>">
	<input type="text" name="template_editable_id" id="template_editable_id" value="">
	
	<input type="text" name="setCounter" id="setCounter" value="">
 
	<input type="text" name="input_text_field_edit" id="input_text_field_edit" value="" onkeyup="javascript:display_text_keypress(this.value)">
	<textarea name="input_text_area_edit" id="input_text_area_edit" rows="15" cols="35" onkeyup="javascript:display_text_area_keypress(this.value)"></textarea>
 	
	<input type="button" name="btn_save" id="btn_save" value="Save" onclick="javascript:save_contents()">
 </form>
<!-- /#HEADER -->
<header class="headerbgtop">

<!-- /#NAVIGATION --> 
	<nav class="nav"> 
         
<!-- /#BANNER -->

<!-- /#HEADINGS -->
            
<!-- /#TOP NAVIGATION BUTTONS -->            
                 
<?php include $Path_Include."menu_admin.php";?>
	
<!-- /#CONTENT -->    
				<article class="contentleft">
				<form name="frm1" id="frm1" method="post" action="add_page_setp2.php">
				<div id="main_container">
				<?php 
				$sql="select * FROM `pages` where id=".$_REQUEST["pageID"];
				$data=sql_data($sql);
				
				
				$sql_template="select * FROM `template` where id=".$data["template_id"];
				$data_template=sql_data($sql_template);
				$template_contents=$data_template["source"];
				
				$sql="select * from template_editable_contents where template_id=".$data["template_id"]." order by id";
				//print $sql;
				$result=sql_query($sql);
				$edit_counter=1;
				while($row=mysql_fetch_array($result))
				{
					$sql_type="select * from editable_type where id=".$row["type_id"];
					$data_type=sql_data($sql_type);
					$display_editable_area = $data_type["display_editable_area"];
					
					
					$template_contents=str_replace("<%--template_editable_contents.id=".$row["id"]."--%>",$display_editable_area,$template_contents);
					
					$sql_page_content="select * from pageas_editable_content where page_id=".$_REQUEST["pageID"]."  and template_editable_id=".$row["id"];
					
					$data_page_content=sql_data($sql_page_content);
					if($data_page_content["content"])
					{
						$template_contents = str_replace('<span id="show_textedit_counter"></span>','<span id="show_textedit_counter">'.$data_page_content["content"].'</span>',$template_contents);
						$template_contents = str_replace('<span id="show_textareaedit_counter"></span>','<span id="show_textareaedit_counter">'.$data_page_content["content"].'</span>',$template_contents);
					}
					
					$template_contents=str_replace("edit_counter",$edit_counter,$template_contents);
					$template_contents=str_replace("template_editable_content.id",$row["id"],$template_contents);
					
					$edit_counter++;
				}
				
				print $template_contents;
				//print str_replace("edit_counter","12",$template_contents);
				//print $data["source"];
				?>
				</div>
				
				
                </article>
          
				<?php include("left_menu.php");?>
                
                <div class="dottedfull"></div>

                <div class="clearfloat"></div>
<!-- /#FOOTER -->   
        <footer >
<?php include $Path_Include."footer_admin.php";?>                 
        </footer> 
   </nav>
</header> 
<?php include $Path_Include."beforebodyclose.php"?>        
</body>
</html>