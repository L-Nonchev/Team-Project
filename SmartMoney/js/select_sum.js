//-=-=-=-=-=-=-=-=-=-=-=-=-Event lisener for sum type options=-=-=--=-==-=-=-=-=-=-=-=\\

 function check_for_new() {
	var opt = document.getElementById('select_sum_type').selectedIndex;
	var value = document.getElementsByTagName("option")[opt].value;
	var ne = document.getElementById('Sum_type_new');
	
	console.log(value);
	console.log("haha");
	if (value == "new") {		
		ne.style.visibility = "visible";
	}else {
		ne.style.visibility = "hidden";
	}
}
 