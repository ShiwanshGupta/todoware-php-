<!DOCTYPE html>
<html lang="en">
<head>
	<title>Lister</title>
	<meta name="viewport" content="initial-scale=1, width=device-width, viewport-fit=cover, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="icons/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="appbar">Lister</div>
        <?php 
          echo "hi";
        ?>

	<div class="appbody">

		<input type="text" id="input" class="todo" autocomplete="off" placeholder="Type your todo..." onkeypress="keypress(event)">
		<input type="submit" class="add btn" id="add" value="Add Item">

		<div class="item" id="item"></div>
		
	</div>

	<script type="text/javascript">

		var input = document.getElementById('input');
		var add = document.getElementById('add');
		var items = document.getElementById('item');
		var number = 1;
		var storage = window.localStorage;
		var val = storage.getItem(number);
		var dltbtn = document.getElementById("dltbtn");
		var numArr = [];
		
		function keypress(event) {
			var x = event.charCode || event.keyCode;
			if (x == 13 || x == 13) {  // o is 111, O is 79
				add.click();
			}
		}

		add.onclick = function(){

			var list = document.createElement('div');
			list.setAttribute('class', 'items ' + number);
			list.setAttribute('class', 'items ');
			items.appendChild(list);

			list.innerHTML = number + ". " + input.value + "<button class='delete btn bi bi-trash-fill' id='dltbtn' onclick='window.localStorage.removeItem(" + number.toString() + "); window.location.reload();'></button>";
			
			storage.setItem(number, input.value);

			number++;

			input.value = "";
			input.focus();

		}

		window.onload = function(){
			
			for(var i = 0; i < storage.length; i++){

					numArr.push(storage.key(i));

			}

			numArr.sort();

			numArr.forEach(function(item){

				var lsItem = document.createElement("div");
				
				lsItem.setAttribute("class", "items");

				items.appendChild(lsItem);

				lsItem.innerHTML = number + ". " + storage.getItem(item) + "<button class='delete btn bi bi-trash-fill' id='dltbtn' onclick='window.localStorage.removeItem(" + item + "); window.location.reload();'></button>";

				number++;
					

			});
		}

	</script>
</body>
</html>
