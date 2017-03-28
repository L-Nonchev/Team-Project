var singUpButton = document.getElementById('sing-up-button');

//-=-=-=-=-=-=--=---=-= Chech for e-mail exist=-=-=-=-=-=-=--=-=-==-=-=\\
var email = document.getElementById('e-mail');
email.onblur = function() {
	var currier = new XMLHttpRequest();
	currier.onreadystatechange = function(){
		if (this.readyState === 4 && this.status === 200) {
			console.log(this.responseText);
			var incomeData = JSON.parse(this.responseText);

			if(incomeData['haveMail'] === true){
				alert("Email "+ incomeData['mail'] + " alredy exist!");
			}
		}
	}
	var dataSend = 'data=' + JSON.stringify({
		mail : email.value
	});
	currier.open('POST', 
			'http://localhost/Project1/Team-Project/SmartMoney/php/checkForExistEmailJS.php', 
			true);
	currier.setRequestHeader("Content-Type", "application/json");
	currier.send(dataSend);
}

	//-=-=-=-=-=-=--=---=-= email end =-=-=-=-=-=-=--=-=-==-=-=\\


//-=-=-=-=-=-=--=---=-= Chech for password corect=-=-=-=-=-=-=--=-=-==-=-=\\
var password1 = document.getElementById('inputPassword1');
var password2 = document.getElementById('inputPassword2');
var divIcon = document.getElementById('divPassword2');
var img = document.createElement('img');
var paragrapfh = document.createElement('p');

// chek for same passord 1 and 2 
function check_password() {
	if (((password1.value.length) > 0 ) || ((password2.value.length) > 0)){
		// if password is not the same 
		if(password1.value != password2.value){
			// singUp button stop word
			singUpButton.onclick = function(event){
			    event.preventDefault()
			};
			paragrapfh.innerHTML = "  The password you entered does NOT match!";
			paragrapfh.style.color = 'red';
			paragrapfh.style.fontSize = 1 +'em';
			paragrapfh.style.float ="left";
			img.src="./images/icons/deniel.png";
			img.style.width = "30px";
			img.style.float ="left";
			
		}else {
			// is passwords is same 
			singUpButton.onclick = function(){ 
				if ((password1.value.length) < 8 && (password2.value.length) < 8){
					alert("You must enter at last 8 characters for your password");
					 event.preventDefault()
				}	
			};
			paragrapfh.innerHTML = "   Corect! ";
			paragrapfh.style.color = '#89c443';
			paragrapfh.style.fontSize = 1 +'em';
			paragrapfh.style.float ="left";
			img.src="./images/icons/Apply.png";
			img.style.width = "30px";
			img.style.float ="left";
		}
		divIcon.appendChild(img);
		divIcon.appendChild(paragrapfh 	);
	} else {
		paragrapfh.parentNode.removeChild(paragrapfh);
		img.parentNode.removeChild(img);
		singUpButton.onclick = function(){};
	}
}
password1.onblur =  check_password;
password2.onkeyup =  check_password;
//-=-=-=-=-=-=--=---=-= password end =-=-=-=-=-=-=--=-=-==-=-=\\
