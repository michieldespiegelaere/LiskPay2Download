<? 
// "lisk pay 2 download - key in reference" by korben3, released under the MIT license
session_start();
include("config.php");

$itemKey=$_SESSION["itemKey"];

if($itemKey)
	{
		// the upcoming api request in 1.4 will make this easier and requires less code
		
		// retrieve a list of the latest transactions and check for the itemKey
		$fullApiUrl=$nodeUrl.":".$nodePort."/api/transactions?recipientId=".$mainLiskAddress."&limit=".$totalTX."&offset=0&sort=timestamp%3Adesc";

		$cSession = curl_init(); 
			curl_setopt($cSession,CURLOPT_URL,$fullApiUrl);
			curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
			curl_setopt($cSession,CURLOPT_HEADER, false); 
			$result=curl_exec($cSession);
		curl_close($cSession);

		$resultArray=json_decode($result,true); // decode the JSON data
		
		$itemAccess=$_SESSION["itemAccess"];
		$keysFound="";
		
		foreach($resultArray["data"] as $resultArray2)
		{
			for($i=1;$i<=$totalItems;$i++){
				if(($resultArray2["asset"]["data"])===$itemKey[$i])
				{
					$itemAccess[$i]=true;	//found users unique access key, user gains access to the file for the duration of the session
					$_SESSION["itemAccess"]=$itemAccess;
					$keysFound.=$i.":";
				}
			}
		}
		if($keysFound){
			echo substr($keysFound,0,-1);
		}
	}
	//print_r($itemKey);
?>