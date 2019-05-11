var total = 0;

function prompt_item(){
	var item_num = prompt("Enter an item code");
	if(item_num != null){
		alert(item_num);
		get_item(item_num);
	}
}

function update_receipt(x){
	//alert(x.status);
	//alert(x.responseText);
	if(x.status != 200){
		alert("Server error");
		return;
	}
	if(x.responseText.includes("Error")){
		alert("DB Error");
		return;
	}
	var toks = x.responseText.split(";");
	var name = toks[0];
	var price = (toks[1] / 100).toFixed(2);
	var textarea = document.getElementById("items");
	textarea.value += name + "\t$" + price + "\n";
	total += toks[1] * 1;
	//alert(total);
	document.getElementById("total").innerHTML = (total / 100).toFixed(2);
}

function get_item(item_num){
	//alert(item_num);
	var x = new XMLHttpRequest();
	var params = "item_code=" + item_num;
	x.open("POST","inventory.php",true);
	x.onload = function(){update_receipt(this);};
	x.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	x.send(params);
}
