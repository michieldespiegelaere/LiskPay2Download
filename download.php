<?
ob_start(); // don't output any headers or content yet

session_start();

$itemAccess=$_SESSION["itemAccess"];
$imageID=$_GET["item"];
$is=str_pad($imageID, 3, "0", STR_PAD_LEFT);

if($itemAccess[$imageID]){
	include("config.php");
	$newFilename="image".$is."_hires_korben3.jpg";
	$itemUrl="images/".$hiResImageDir."/".$is."_hiRes.jpg";

	header("Content-Description: File Transfer");
	header("Content-Type: image/jpeg");
	header("Content-Disposition: attachment; filename=".$newFilename.";");
	header("Content-Transfer-Encoding: binary");
	header("Expires: 0");
	header("Cache-Control: must-revalidate");
	header("Pragma: public");

	ob_clean(); flush(); // clean and flush those headers, we want to output a binary file
	echo file_get_contents($itemUrl);
}Else{
	header("Location: /"); // access denied, returning to index
	die();	
}
?>