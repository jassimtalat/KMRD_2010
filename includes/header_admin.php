<?php 
//Menu Activation functions
include('db.php');
include('lib.php');
include('Browser.php');
// Browser detection 	
$browser = new Browser();
$browsername =  $browser->getBrowser();
$browserversion = $browser->getVersion();
$browserplatform = $browser->getPlatform();
//Current folder and php script name
$cfolder = curPageFolder();
$scriptname = $_SERVER["SCRIPT_NAME"];
$phpname = substr($scriptname,strripos($scriptname,"/")+1,strlen($scriptname)-strripos($scriptname,"/")-1);
function curPageFolder(){
	$path = curPageURL();
	$last = strripos($path,"/");
	$new = substr($path,0,$last);
	$start =  strripos($new,"/")+1;
	return substr($path,$start,$last-$start);
}
function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>KMRD</title>
<link href="<?php print $Path_Root?>css/style.css" rel="stylesheet" type="text/css">	
<script type="text/javascript" src="<?php print $Path_Root?>js/jquery.min.js"></script> 
<!-- <link href="fonts/fonts.css" rel="stylesheet" type="text/css"> -->
<link href="<?php print $Path_Root?>css/banner.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php print $Path_Root?>js/jquery-1.2.6.min.js"></script>
<script type="text/javascript" src="<?php print $Path_Root?>js/jquery-easing-1.3.pack.js"></script>
<script type="text/javascript" src="<?php print $Path_Root?>js/jquery-easing-compatibility.1.2.pack.js"></script>
<script type="text/javascript" src="<?php print $Path_Root?>js/coda-slider.1.1.1.pack.js"></script>

<!--[if IE]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

<!--[if lt IE 7]>
<link rel="stylesheet" type="text/css" media="all" href="css/ie6.css"/><![endif]-->

	<script type="text/javascript">
	
		var theInt = null;
		var $crosslink, $navthumb;
		var curclicked = 0;
		
		theInterval = function(cur){
			clearInterval(theInt);
			
			if( typeof cur != 'undefined' )
				curclicked = cur;
			
			$crosslink.removeClass("active-thumb");
			$navthumb.eq(curclicked).parent().addClass("active-thumb");
				$(".stripNav ul li a").eq(curclicked).trigger('click');
			
			theInt = setInterval(function(){
				$crosslink.removeClass("active-thumb");
				$navthumb.eq(curclicked).parent().addClass("active-thumb");
				$(".stripNav ul li a").eq(curclicked).trigger('click');
				curclicked++;
				if( 6 == curclicked )
					curclicked = 0;
				
			}, 1000000);
		};
		
		$(function(){
			
			$("#main-photo-slider").codaSlider();
			
			$navthumb = $(".nav-thumb");
			$crosslink = $(".cross-link");
			
			$navthumb
			.click(function() {
				var $this = $(this);
				theInterval($this.parent().attr('href').slice(1) - 1);
				return false;
			});
			
			theInterval();
		});
	</script>

<script type="text/javascript"> // Autoload images 
	function MM_swapImgRestore() { //v3.0
	  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
	}
	function MM_preloadImages() { //v3.0
	  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
		var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
		if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
	}
	function MM_findObj(n, d) { //v4.01
	  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
		d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
	  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
	  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
	  if(!x && d.getElementById) x=d.getElementById(n); return x;
	}
	
	function MM_swapImage() { //v3.0
	  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
	   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
	}
</script>
<script type="text/javascript"> // Image rotation script
	function theRotator() {
		//Set the opacity of all images to 0
		$('div#rotator ul li').css({opacity: 0.0});
		
		//Get the first image and display it (gets set to full opacity)
		$('div#rotator ul li:first').css({opacity: 1.0});
			
		//Call the rotator function to run the slideshow, 6000 = change to next image after 6 seconds
		setInterval('rotate()',7000);
	}
	function rotate() {	
		//Get the first image
		var current = ($('div#rotator ul li.show')?  $('div#rotator ul li.show') : $('div#rotator ul li:first'));
	
		//Get next image, when it reaches the end, rotate it back to the first image
		var next = ((current.next().length) ? ((current.next().hasClass('show')) ? $('div#rotator ul li:first') :current.next()) : $('div#rotator ul li:first'));	
		
		//Set the fade in effect for the next image, the show class has higher z-index
		next.css({opacity: 0.0})
		.addClass('show')
		.animate({opacity: 1.0}, 3000);
	
		//Hide the current image
		current.animate({opacity: 0.0}, 3000)
		.removeClass('show');
	};
	$(document).ready(function() {		
		//Load the slideshow
		theRotator();
	});
</script>

</head>