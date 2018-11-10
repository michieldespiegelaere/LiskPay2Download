<?
// "lisk pay 2 download - key in reference" by korben3, released under the MIT license

// retrieve or generate keys
function lp2d_getKeys(){
	
	global $totalItems, $keyStrenght; // we need to use these config variables inside our function
	if(empty($_SESSION["itemKey"])){
		for($i=1;$i<=$totalItems;$i++){
			$itemKey[$i]=bin2hex(random_bytes($keyStrenght));
			$itemAccess[$i]=false;
		}
		$_SESSION["itemKey"]=$itemKey;
		$_SESSION["itemAccess"]=$itemAccess;
	}
}

function lp2d_displayItems(){
	
	global $totalItems, $mainLiskAddress, $costToDownload;
	$itemKey=$_SESSION["itemKey"];
	if($itemKey){
		for($i=1;$i<=$totalItems;$i++){

			$is=str_pad($i, 3, "0", STR_PAD_LEFT);
			echo "	<div id='content".$is."' class='contentClass'>\n";
				echo "		<div id='image".$is."' class='imageClass'><img src='images/".$is."_lowRes.jpg'></div>\n";
				echo "		<div id='instructions".$i."' class='instructionsClass'>To download a high resolution version, send <div id='amount' class='amountClass'>".$costToDownload."</div> lisk (testnet) with reference <div id='refKey' class='refKeyClass'>".$itemKey[$i]."</div> to <div id='address' class='addressClass'>".$mainLiskAddress."</div> and wait until your transaction is verified. Do <strong>not</strong> close this page.</div>\n";
				echo "		<div id='hubLink".$i."' class='hubLinkClass'><a href='lisk://wallet?recipient=".$mainLiskAddress."&amount=".$costToDownload."&reference=".$itemKey[$i]."' id='hubLinkUrl'>Click to open lisk hub and send the transaction.</a></div>\n";
				echo "		<div id='wait".$i."' class='waitClass'><img src='images/lisk-loadingSL.gif' alt='lisk loading'></div>\n";
			echo "	</div>\n";	
		}
	}
}
?>