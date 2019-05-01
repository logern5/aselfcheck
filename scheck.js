function prompt_item(){
	var item_num = prompt("Enter an item code");
	if(item_num != null){
		alert(item_num);
		get_item(item_num);
	}
}

function update_receipt(x){
	alert(x.status);
	alert(x.responseText);
}
function get_item(item_num){
	try{
	alert("OK0");
	var x = new XMLHttpRequest();
	var params = "item_code=" + item_num;
	x.open("POST","inventory.php",true);
	x.onload = function(){update_receipt(this);};
	x.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	}
	catch(e){alert(e);}
	alert("OK");
	x.send();
}
