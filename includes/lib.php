<?php
	function sql_connect() 
	{
     global $db_host, $db_user, $db_pass, $db_name;
		 $SQLID = @mysql_connect($db_host, $db_user, $db_pass) or die ("Unable to connect to MySQL Server");
     @mysql_select_db($db_name, $SQLID) or die ("Unable to get database. Please reload in a minute");
     return $SQLID;
	}
	
	function sql_query($sql) 
	{
		$sql=str_replace("\'","'",str_replace("\\\'","''",$sql));
		//print $sql;
		
		$result = @mysql_query($sql);
		return $result;
	}
	function sql_query_staff($sql) 
	{
		$sql=str_replace("\'","''",$sql);
		//print $sql;
		
		$result = @mysql_query($sql);
		return $result;
	}
	function sql_exist($sql)
	{
    $result  = mysql_query($sql);
    $numrows = mysql_num_rows($result);
    if($numrows>0) { return true; }
	}
	
	function sql_total($sql)
	{
	  $result  = mysql_query($sql);
    $numrows = mysql_num_rows($result);
    return $numrows;
	}
	
	function sql_insert($sql)
	{
		$result = @mysql_query($sql);
		// or die ("Unable to process MySQL query");
		return mysql_insert_id();
	}
	
	function sql_data($sql) 
	{
		$result = @mysql_query($sql);
		 //or die ("Unable to process MySQL query");
		$data   = mysql_fetch_array($result);
		return $data;
	}
	
	function check_email($email) 
	{
		  if ( eregi("(@.*@)|(\.\.)|(@\.)|(\.@)|(^\.)", $email, $arr_vars) or !eregi ("^.+\@(\[?)[a-zA-Z0-9\-\.]+\.([a-zA-Z]{2,3}|[0-9]{1,3})(\]?)$", $email, $arr_vars))
		  { return(false); } else  { return(true); }
	}
	function Head()
	{
		global $Path_Img,$Path_Root,$hselected;
		?>
		<!-- Header-->
		<div class="header">
		
			<div class="header_logo">

				<a href=""><img src="<?php print $Path_Img?>logo.png" height="75" width="284" /></a>

			</div>
			
			<div class="box_header">
				<div class="name">Welcome Jana Vetter</div>
				<div class="link">
					<img src="<?php print $Path_Img?>icon.png" /> <a href="#">Edit My Information</a>
						<br /><br />
							<select name="jump">
								<option value="Jump to Account Profile:">Jump to Account Profile:</option>
							</select>
				</div>
			</div>

			<div class="top_menu_handle">
				<ul>
					<li <?php if($hselected==1) print 'id="li_selected"';?>><a href="index.php">Home</a></li>
					<li <?php if($hselected==2) print 'id="li_selected"';?>><a href="#">My Accounts</a></li>
					<li <?php if($hselected==3) print 'id="li_selected"';?>><a href="activities.php">Add Activities</a></li>
					<li <?php if($hselected==4) print 'id="li_selected"';?>><a href="#">Review Activity Summaries</a></li>
					<li <?php if($hselected==5) print 'id="li_selected"';?>><a href="#">Resource Center</a></li>
					<li <?php if($hselected==6) print 'id="li_selected"';?>><a href="#">Calendar</a></li>
				</ul>
			</div>
			
		</div>
		<!-- // End Header-->
	<?php
	}
	function Footer()
	{
		global $Path_Img,$Path_Root,$hselected;
	?>
		<div class="footer">
			<div class="footer_logo">
				<a href="#"><img src="<?php print $Path_Img?>xenopsi-logo.png" height="63" width="186"/></a>
			</div>
		</div>
	<?php
	}
	
	function convertDateYMD($cdateYMD)
	{
		$dateArray=explode("-",$cdateYMD);
		$year=$dateArray[0];
		$month=$dateArray[1];
		$day=$dateArray[2];
		
		if($year<2000 or strlen($year)!=4 or substr($year,2)=="19")
			$year="20".substr($year,-2);
			
		return "$month/$day/$year";
	}
	
	function convertDateMDY($cdateMDY)
	{
		$cdateMDY=trim($cdateMDY);
		$dateArray=explode("/",$cdateMDY);
		$year=$dateArray[2];
		$month=$dateArray[0];
		$day=$dateArray[1];
		
		if($year<2000 or strlen($year)!=4 or substr($year,2)=="19")
		{
			$year="20".substr($year,-2);
			
			$pageURL = 'http'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
			$sql_systemLog="INSERT INTO `system_log` (`fmrID` ,`entryDate`,`browser` ,`invalid_date` ,`URL`)
			VALUES (".$_SESSION['UserID']." ,now(), '".$_SERVER["HTTP_USER_AGENT"]."', '$cdateMDY', '$pageURL')";
			//print $sql_systemLog;
			sql_query($sql_systemLog);
		}
		$newDate="$year-$month-$day";
		
		//$newDate="09-3-3";
		if(!preg_match('#^((20|20)?[0-9]{2}[- /.](0?[1-9]|1[012])[- /.](0?[1-9]|[12][0-9]|3[01]))*$#', $newDate))
		{
			//print "not valid";
			$newDate=date("Y")."-".date("m")."-".date("d");
			$pageURL = 'http'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
			$sql_systemLog="INSERT INTO `system_log` (`fmrID` ,`entryDate`,`browser` ,`invalid_date` ,`URL`)
			VALUES (".$_SESSION['UserID']." ,now(), '".$_SERVER["HTTP_USER_AGENT"]."', '$cdateMDY', '$pageURL')";
			//print $sql_systemLog;
			sql_query($sql_systemLog);
		}
		if (($month < 1 || $month > 12) or ($day < 1 || $day > 31))
		{
			$newDate=date("Y")."-".date("m")."-".date("d");
			$pageURL = 'http'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
			$sql_systemLog="INSERT INTO `system_log` (`fmrID` ,`entryDate`,`browser` ,`invalid_date` ,`URL`)
			VALUES (".$_SESSION['UserID']." ,now(), '".$_SERVER["HTTP_USER_AGENT"]."', '$cdateMDY', '$pageURL')";
			//print $sql_systemLog;
			sql_query($sql_systemLog);
		}
		/*else
			print "valid";
			print $newDate;
			exit;*/
		return $newDate;
	
	}
?>