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
				<form name="frm1" id="frm1" method="post" action="save_page.php">
				<table border="1" cellpadding="5" cellspacing="0">
					<tr>
						<Td>
							<?php //include $Path_Include."left_menu.php"?>
						</TD>
						<td>
							<table border=1>
								<Tr>
									<td>Page Title</td>
									<td><input type="text" name="page_title" id="page_title"></td>
								</TR>
								<tr>
								<Td>Select Template</TD>
								<td>
								<select name="template" id="template">
									<?php
									$sql="select * from template";
									$result=sql_query($sql);
									while($row=mysql_fetch_array($result))
									{?>
										<option value="<?php print $row["id"]?>"><?php print $row["title"]?></option>
									<?php }
									?>
									
								</select></td>
								</tr>
								
								<tr>
									<Td colspan="2" align="right"><input type="Submit" name="upload" value="Next Step"></TD>
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