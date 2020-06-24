var total = 0;

function submit_item_code(item_code){
	return 1234;
}

/* Code for numpad */
function add_num(a){
	var codebox = document.getElementById("codebox");
	codebox.value += a.innerHTML + "";
}

window.onload = function(){
	var num_keys = document.getElementsByClassName("num");
	for(var i = 0; i < num_keys.length; i++){
		var num = num_keys[i].innerHTML;
		console.log(num);
		num_keys[i].onclick = function(){add_num(this);};
	}
	var clear = document.getElementById("clear");
	clear.onclick = function(){
		document.getElementById("codebox").value = "";
	}
	var enter = document.getElementById("enter");
	enter.onclick = function(){
		var item_code = document.getElementById("codebox").value;
		var item_data = submit_item_code(item_code);
		console.log("item_data: " + item_data);
	}
}
