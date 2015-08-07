<?php include("includes/header.php");
if(isset($_POST['name'])){
	session_start();
	$name  =$_REQUEST['name'];
	$phone =$_REQUEST['phone'];
	$organization =$_REQUEST['organization'];
	$email =$_REQUEST['email'];
	
	
	if( $_SESSION['security_code'] == $_REQUEST['security_code'] && !empty($_SESSION['security_code'] ) ) {
		
		$sql = "INSERT INTO `checklist` (`added` , `name` , `phone` , `organization` , `email` , `whatisnotcovered` , `effectivelytransfer` , `contractuallytransferring` , `managementprogram` , `insurancequality` , `continuousimprovement` , `impact` )
VALUES (
 NOW( ) , '".$_REQUEST['name']."', '".$_REQUEST['phone']."', '".$_REQUEST['organization']."', '".$_REQUEST['email']."', '".$_REQUEST['r1']."', '".$_REQUEST['r2']."', '".$_REQUEST['r3']."', '".$_REQUEST['r4']."', '".$_REQUEST['r5']."', '".$_REQUEST['r6']."', '".$_REQUEST['r7']."'
)";
		
		mysql_query($sql);
		
		$Subject= "KMRD Webforms: Checklist";
		
		$headers = "From: info@kmrd.com\r\n";
		$headers .= "Reply-To: info@kmrd.com\r\n";
		$headers .= "Return-Path: info@kmrd.com\r\n";	
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: TEXT/HTML;\n";
		
		$msg ="";
		$msg .= "Following information has just been submitted,<BR><BR>";
		$msg .= "First & Last Name: <strong>".$_REQUEST['name']."</strong><BR>";
		$msg .= "Phone Number: <strong>".$_REQUEST['phone']."</strong><BR>";		
		$msg .= "Organization: <strong>".$_REQUEST['organization']."</strong><BR>";		
		$msg .= "Email Address: <strong>".$_REQUEST['email']."</strong><BR><BR>";				
		$msg .= "1. Do you understand what is not covered by your insurance program? <strong>".$_REQUEST['r1']."</strong><BR><BR>";
		$msg .= "2. Do you know how to effectively transfer your risks to others? <strong>".$_REQUEST['r2']."</strong><BR><BR>";
		$msg .= "3. Do you understand how your customers are contractually transferring their risk to you? <strong>".$_REQUEST['r3']."</strong><BR><BR>";
		$msg .= "4. Is your risk management program better now than a year ago? <strong>".$_REQUEST['r4']."</strong><BR><BR>";
		$msg .= "5. Do you have a documented insurance quality control process ensuring that your insurance contracts are delivered as expected? <strong>".$_REQUEST['r5']."</strong><BR><BR>";
		$msg .= "6. Do you have a process for continuous improvement of your risk management program? <strong>".$_REQUEST['r6']."</strong><BR><BR>";
		$msg .= "7. Do you understand the impact your losses could have on the cost of your insurance one minute from normal? <strong>".$_REQUEST['r7']."</strong><BR><BR>";	
		
		mail("nadeem.manzoor0@gmail.com", ''.$Subject.'',
				''.$msg.'',$headers);	
		mail("sjaved@xenopsi.com", ''.$Subject.'',
				''.$msg.'',$headers);	
		
		//header("location: checklist.php?sent=1");
		?>
		<script language="javascript">
        
			$(window.location).attr('href', 'checklist.php?sent=1');
		
        </script>
        <?php
		exit;
	}else{
		$error = "Please enter the correct security code";
	}
}else {
	
}
?>

<!-- /#HTML --> 
<body>
 
 
<!-- /#HEADER -->
<header class="headerbgtop">

<!-- /#NAVIGATION --> 
	<nav class="nav"> 
         
<!-- /#BANNER -->


<!-- /#HEADINGS -->
            
<!-- /#TOP NAVIGATION BUTTONS -->            
                 
<?php include("includes/menu.php")?>	
<!-- /#CONTENT -->    
				<article class="contentfull">

                              <section class="subheading">
                              <div class="lt">The <strong>One Minute From Normal</strong> Checklist</div>
                              </section>
                              
                              <div class="dottedfull"></div>
                              <div class="clearfloat"></div>
                              <section class="subcontenttextfull">
                              KMRD Partners provides risk management consulting and property &amp; casualty insurance to protect against potentially catastrophic losses that wait on the other side of one minute from normal. This quick checklist can help you to determine<br>
if your organization is ready.
      </section>
                              
                              <div class="clearfloat"></div>
                              <?php if(isset($error)){?>
                             	<p style="color:#F00"><?=$error?></p>
                              <?php }?>  
                              <?php if(isset($_REQUEST['sent']) and !isset($error)){?>
                             	<p style="color:#F00">Thank you, your checklist has been submitted.</p>
                              <?php }?>
                              <form name="frm" id="frm" method="post" action="checklist.php">
                              <section class="form">
                              	<label class="titlebox">First & Last Name</label>
                                <input name="name" type="text" id="name"  class="formfield" value="<?=@$_REQUEST['name']?>">
                                <label class="titlebox">Phone Number</label>
                                <input name="phone" type="text" id="phone"  class="formfield" value="<?=@$_REQUEST['phone']?>">
                                <div class="clearfloat"></div>
                                <div class="paraspacer">&nbsp;</div>
                                
                                <label class="titlebox">Organization</label>
                                <input name="organization" type="text" id="organization" class="formfield" value="<?=@$_REQUEST['organization']?>">
                                <label class="titlebox">Email Address</label>
                                <input name="email" type="text" id="email"  class="formfield" value="<?=@$_REQUEST['email']?>">
                                
                              </section>
                              <div class="clearfloat"></div>

                              
                              	<section class="questionsarea">
                                <ul>
                              	<li> 
								 <div class="radioright">
                                <label class="radioyesno"><input name="r1" type="radio" value="Yes"<?= checkChecked("r1","Yes")?>>Yes</label>
                                <label class="radioyesno"><input name="r1" type="radio" value="No" <?= checkChecked("r1","No")?>>No</label>
                                <label class="radiouncertain"><input name="r1" type="radio" value="Uncertain" <?= checkChecked("r1","Uncertain")?>>Uncertain</label>
                              	<div class="clear"></div>
								</div>
								<p class="question">Do you understand what is not covered by your insurance program?</p>
								
								</li>
                                
                                
                                <li>
								<div class="radioright">
                                <label class="radioyesno"><input name="r2" type="radio" value="Yes"<?= checkChecked("r2","Yes")?>>Yes</label>
                                <label class="radioyesno"><input name="r2" type="radio" value="No"<?= checkChecked("r2","No")?>>No</label>
                                <label class="radiouncertain"><input name="r2" type="radio" value="Uncertain"<?= checkChecked("r2","Uncertain")?>>Uncertain</label>
								</div>
								<p class="question">Do you know how to effectively transfer your risks to others?</p>
                                
								</li>
                                <div class="clear"></div>
								
                                <li>
                                <div class="radioright">
                                <label class="radioyesno"><input name="r3" type="radio" value="Yes"<?= checkChecked("r3","Yes")?>>Yes</label>
                                <label class="radioyesno"><input name="r3" type="radio" value="No"<?= checkChecked("r3","No")?>>No</label>
                                <label class="radiouncertain"><input name="r3" type="radio" value="Uncertain"<?= checkChecked("r3","Uncertain")?>>Uncertain</label>
                              	</div>
								<p class="question">Do you understand how your customers are contractually transferring <br>
								  their risk to you?</p>							
								</li>
                                
                                <li>
                                <div class="radioright">
                                <label class="radioyesno"><input name="r4" type="radio" value="Yes"<?= checkChecked("r4","Yes")?>>Yes</label>
                                <label class="radioyesno"><input name="r4" type="radio" value="No"<?= checkChecked("r4","No")?>>No</label>
                                <label class="radiouncertain"><input name="r4" type="radio" value="Uncertain"<?= checkChecked("r4","Uncertain")?>>Uncertain</label>
                              	</div>
								<p class="question">Is your risk management program better now than a year ago?</p>								
                                </li>
									
                                <li> 
                                <div class="radioright">
                                <label class="radioyesno"><input name="r5" type="radio" value="Yes"<?= checkChecked("r5","Yes")?>>Yes</label>
                                <label class="radioyesno"><input name="r5" type="radio" value="No"<?= checkChecked("r5","No")?>>No</label>
                                <label class="radiouncertain"><input name="r5" type="radio" value="Uncertain"<?= checkChecked("r5","Uncertain")?>>Uncertain</label>
                              	</div>
         						<p class="question">Do you have a documented insurance quality control process ensuring <br>
         						  that your insurance contracts are delivered as expected?</p>

								</li>
                                
                                <li> 
                                <div class="radioright">
                                <label class="radioyesno"><input name="r6" type="radio" value="Yes"<?= checkChecked("r6","Yes")?>>Yes</label>
                                <label class="radioyesno"><input name="r6" type="radio" value="No"<?= checkChecked("r6","No")?>>No</label>
                                <label class="radiouncertain"><input name="r6" type="radio" value="Uncertain"<?= checkChecked("r6","Uncertain")?>>Uncertain</label>
                              	</div>
								<p class="question">Do you have a process for continuous improvement of your risk <br>
								  management program?</p>
								
								</li>
                                
                                <li> 
                                <div class="radioright">
                                <label class="radioyesno"><input name="r7" type="radio" value="Yes"<?= checkChecked("r7","Yes")?>>Yes</label>
                                <label class="radioyesno"><input name="r7" type="radio" value="No"<?= checkChecked("r7","No")?>>No</label>
                                <label class="radiouncertain"><input name="r7" type="radio" value="Uncertain"<?= checkChecked("r7","Uncertain")?>>Uncertain</label>
                              	</div>
								<p class="question">Do you understand the impact your losses could have on the cost <br>
								  of your insurance one minute from normal?</p>
								
								</li>
                               
                                </ul>
                             </section>
                             
                             <div class="clearfloat"></div>
                             
                             <section>
                             <div class="captchatext">&nbsp;</div>
                             <div class="captchaimage"><img src="includes/CaptchaSecurityImages.php?width=309&height=59&characters=5" width="309" height="59" alt="CAPTCHA" /></div>
                             <div class="captchacode">
                             <label class="titlebox2">Please type the characters below</label><div class="clearfloat"></div><div class="paraspacer" style="height:10px;">&nbsp;</div>
                             <input name="security_code" type="text" id="security_code" value="" class="formfield">
                             </div>
                             </form>
                             <div class="captchasubmit"><a href="javascript: submitForm();">Submit</a><img style="margin: 10px 0 0 5px;" src="images/bigyellowarrow.gif" ></div>
                             </section>
                             
                             
                             
                             
                  
                </article>
                <div class="dottedfull"></div>

                <div class="clearfloat"></div>
<!-- /#FOOTER -->   
        <footer >
                 
<?php include("includes/footer.php");?>
        </footer> 
   </nav>
</header> 
<?php include("includes/beforebodyclose.php");?>       
</body>
</html>
<script language="javascript">
function submitForm(){
	if($('#name').val()==''){
		alert('Please enter your name');
		$('#name').focus();
		return;
	}
	if($('#email').val()==''){
		alert('Please enter your email address');
		$('#email').focus();
		return;
	}
	if($('#organization').val()==''){
		alert('Please enter your organization name');
		$('#organization').focus();
		return;
	}
	if($('#security_code').val()==''){
		alert('Please enter security code');
		$('#security_code').focus();
		return;
	}
	if($('#security_code').val().length!=5){
		alert('Security code must be 5 digits');
		$('#security_code').focus();
		return;
	}
	$('#frm').submit();
}
</script>
<?php 
function checkChecked($i,$value){
	if(isset($_REQUEST[$i])){
		if($_REQUEST[$i]==$value){
			return ' checked="checked"';
		}else{
			return '';
		}
	}else{
		if($value=='Uncertain'){
			return ' checked="checked"';
		}else{
			return '';
		}
	}
}
?>