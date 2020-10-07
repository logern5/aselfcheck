var total = 0;
var cart_items = [];

function add_item(item_code){
	var x = new XMLHttpRequest();
	x.onreadystatechange = function(){
		if(this.readyState == 4){
			if(this.status == 200){
				/* Get JSON object returned from server and add to array of purchased items*/
				var obj = JSON.parse(this.responseText);
				if(obj == null){
					alert("Item not found");
					return;
				}
				var item_price = obj["product_price"];
				var item_desc = obj["product_name"];
				cart_items.push([item_code, item_price]);
				console.log("item_price, item_code:" + item_price + " " + item_code);

				/* Create row in products table */
				var tbl = document.getElementById("products-list");
				var tbl_row = document.createElement("tr");

				/* Create column for item description and add to row */
				var item_desc_col = document.createElement("td");
				item_desc_col.appendChild(document.createTextNode(item_desc + ""));
				tbl_row.appendChild(item_desc_col);

				/* Create column for item price and add to row */
				var item_price_col = document.createElement("td");
				item_price_col.appendChild(document.createTextNode(item_price + ""));
				tbl_row.appendChild(item_price_col);

				/* Add row to products table */
				tbl.appendChild(tbl_row);

				total += item_price * 100;
				document.getElementById("total").innerHTML = (total / 100).toFixed(2);
			}
			else{
				alert("Server error code: " + this.status);
			}
		}
	}
	x.open("POST","add_item.php",true);
	x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	x.send("id=" + item_code);
}

/* Code for numpad */
function add_num(a){
	var codebox = document.getElementById("codebox");
	codebox.value += a.innerHTML + "";
}

window.onload = function(){
	/* Add listeners for num keys */
	var num_keys = document.getElementsByClassName("num");
	for(var i = 0; i < num_keys.length; i++){
		var num = num_keys[i].innerHTML;
		console.log(num);
		num_keys[i].onclick = function(){add_num(this);};
	}
	/* Listener for clear key */
	var clear = document.getElementById("clear");
	clear.onclick = function(){
		document.getElementById("codebox").value = "";
	}
	/* Listener for enter key */
	var enter = document.getElementById("enter");
	enter.onclick = function(){
		console.log("enter clicked");
		var item_code = document.getElementById("codebox").value;
		add_item(item_code);
		document.getElementById("codebox").value = "";
	}
	/* Listen for finish/pay button */
	var finish = document.getElementById("finish");
	finish.onclick = function(){
		console.log("finish clicked");
		console.log(cart_items);
	}
}
