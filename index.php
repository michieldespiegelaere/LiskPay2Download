<?
// "lisk pay 2 download - key in reference" by korben3, released under the MIT license
session_start();
include("config.php");
include("lp2d.php"); //import functions

lp2d_getKeys();

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title><? echo $title; ?></title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script src="lp2d.js"></script>
  <link href="lp2d.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="mainContent">
	<div id="message" class="messageClass">Welcome to the Gallery!</div>

<? lp2d_displayItems(); ?>
		
</div>
</body>
</html>