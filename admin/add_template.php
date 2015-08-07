<?php 
include("common.php");

?>
<body>



</body>
</html>

<?php include $Path_Include."header_admin.php";?>

<!-- /#HTML --> 
<body onLoad="MM_preloadImages('images/btnew_areuready2.png')">
 
 
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
				<form name="frm1" id="frm1" method="post" action="save_template.php">
				<table border="1" cellpadding="5" cellspacing="0">
					<tr>
						<Td>
							<?php //include $Path_Include."left_menu.php"?>
						</TD>
						<td>
							<table border=1>
								<tr>
								<Td>Template title:</TD>
								<td><input type="text" name="template_title" id="template_title" value=""></td>
								</tr>
								
								<tr>
									<Td>HTML Code:</TD>
									<td>
										<textarea name="html_code" id="html_code" rows="24" cols="55"></textarea>
									</td>
								</tr>
								
								<tr>
									<Td colspan="2" align="right"><input type="Submit" name="upload" value="Save"></TD>
								</tr>
							</table>
			
						</td>
					</tr>
				</table>
				</form>
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