// "lisk pay 2 download - key in reference" by korben3, released under the MIT license

$(document).ready(function() {
  init();
});

// removes the trailing space when amount is copied by user, else it will generate an invalid amount warning in lisk hub.
$(document).on('copy', '#amount', function(e){
	e.preventDefault();
	e.originalEvent.clipboardData.setData('text/plain', $("#amount").text());  
});
// same for the address
$(document).on('copy', '#address', function(e){
	e.preventDefault();
	e.originalEvent.clipboardData.setData('text/plain', $("#address").text());  
});
// and the reference field
$(document).on('copy', '#refKey', function(e){
	e.preventDefault();
	e.originalEvent.clipboardData.setData('text/plain', $("#refKey").text());  
});

function verifyTransaction(){
	$.ajax({
	  type:"post",
	  url:"check.php",
	  datatype:"html",
	  success:function(data)
	  {
		data=data.trim();
		if(data){
			var imageID=data.split(":"); console.log(imageID);
			for (var i in imageID){ 
				$("#hubLink"+imageID[i]).text(""); console.log(imageID[i]);
				$("#wait"+imageID[i]).text("");
				$("#instructions"+imageID[i]).html("<br/><a href='download.php?item="+imageID[i]+"'>Click here to download the high resolution image!</a>");
			}
		}
	}
	});
}

function init(){		
	verifyTransaction();	
	setInterval(verifyTransaction, 5000);// time in milliseconds between API calls
}