<?php
session_start();
/*
$visit=$_SESSION['visitor'];
$appli=$_SESSION['Appid'];
//echo $visit;echo"<br/>";echo $appli;
if($_SESSION['visitor']=='' && $_SESSION['Appid']=='')
{
	include_once('globle_url.php');
}
*/
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head><!-- Created by Artisteer v4.1.0.59861 -->
    <meta charset="utf-8">
    <title>Report</title>
    <meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">

    <!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="stylesheet" href="style_cs.css" media="screen">
    <!--[if lte IE 7]><link rel="stylesheet" href="style.ie7.css" media="screen" /><![endif]-->
    <link rel="stylesheet" href="style.responsive.css" media="all">


    <script src="jquery.js"></script>
    <script src="script.js"></script>
    <script src="script.responsive.js"></script>


<style>.art-content .art-postcontent-0 .layout-item-0 { margin-top: 20px;margin-bottom: 20px;  }
.art-content .art-postcontent-0 .layout-item-1 { padding-right: 10px;padding-left: 10px;  }
.ie7 .art-post .art-layout-cell {border:none !important; padding:0 !important; }
.ie6 .art-post .art-layout-cell {border:none !important; padding:0 !important; }

</style> </script></head>
 <?php include_once('main_header.php');?>
<div class="art-layout-wrapper">

                <div class="art-content-layout">
                <?php
				 
				include_once('month_check_in_out.php');
			 	?>
                
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-content"><article class="art-post art-article">
                                
                                                
                <div class="art-postcontent art-postcontent-0 clearfix"><div class="art-content-layout-wrapper layout-item-0">
                </div>
                </div></article></div></div>
  <?php include_once('foot.php');?>

    </div>
    
</div>


</body></html>