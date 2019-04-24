function prompt_item(){
	var item_num = prompt("Enter an item code");
	if(item_num != null){
		get_item(item_num);
	}
}

function get_item(item_num){
	var x = new XMLHttpRequest();
	x.onreadystatechange = function(){
		if(x.readyState == 4){
			alert(x.status);
		}
	}
	var params = "item_code=" + item_num;
	x.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	x.open("POST","inventory.php",true);
	x.send();
}
