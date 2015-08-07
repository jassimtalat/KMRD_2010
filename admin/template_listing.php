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
				<tr><Td colspan="2">Template Listing</TD></tr>
				<tr><Td colspan="2">&nbsp;</TD></tr>
					<?php
					$sql="select * from template";
					$result=sql_query($sql);
					while($row=mysql_fetch_array($result))
					{?>
						<Tr>
							<Td><?php print $row["title"]?></TD>
							<td><a href="add_template.php?id=<?php print $row["id"]?>" style="color:#ffffff">Edit</a></td>
						</TR>
					<?php 
					}
					?>
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