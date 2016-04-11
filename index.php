<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
<meta name="description" content="nocturnics wushu athlete entrepreneur latte art fanatic automotive tech web designer on the road to financial freedom phoenix-lights">
<title>nocturnics</title>
<!-- Icons -->
<link rel="icon" type="image/x-icon" href="favicon.ico" />
<!-- end icons -->
<?php 
require ('include.php');
?>
<!--end scripts-->
<!--<link href="http://nocturnics.com/rss.php" rel="alternate" type="application/rss+xml" title="nocturnics" />-->

</head>
<body>
<?php 
echo nav::GenerateMenu($menu);
echo smedia::navi();
?>
<!--Twitter Feed End -->
<div class="content">
<div class="container">
<div class="left">
</div>
<div class="column_left">
<br />
<br />
<?php 
E::display();
?>

<?php include ('eve.php'); ?>
</div>
<div class="column_center">
<audio src="audio/Juli.m4a" controls></audio>
<?php
A::display();
?>
</div>
<div class="column_right">
<span class="about"><a id="various6" href="frame/juli.php">family</a></span><br />
<span class="about"><a id="various7" href="frame/chicago.php">chicago</a></span><br />
<span class="about"><a id="various8" href="frame/nycsubway.php">Navigate the NYC Subway</a></span>
<?php include ('menu.php'); ?>
</div>
</div><!-- End Container-->



<!--Footer-->
<?php include('includes/footer.php');
 ?>
<!-- /Footer-->
</div>
</body>
</html>