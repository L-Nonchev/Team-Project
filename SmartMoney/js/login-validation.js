		//-=-=-=-=-=-=--=---=-=real E-mail validation=-=-=-=-=-=-=--=-=-==-=-=\\

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var result = re.test(email);
    return result;
}

document.getElementById('email').onblur = function() {
	var mailbox = document.getElementById('email');
	var email = document.getElementById('email').value;
	var test = validateEmail(email);
	if (test === false) {		
		mailbox.style.border = 'solid 1px red'
		if (!(document.getElementById('email-warning'))) {
			var warning = document.createElement('p');
			warning.innerHTML = 'Please enter valid E-mail!';
			warning.style.color = 'red';
			warning.style.fontSize = 11 +'px'
			warning.style.marginBottom = 5 +'px'
			warning.id = 'email-warning'
			var parent = document.getElementById('email-label');
			parent.appendChild(warning);
		}
	}else{
		if ( (document.getElementById('email-warning'))) {
			var warning = document.getElementById('email-warning');
			warning.parentNode.removeChild(warning);
			mailbox.style.border = 'solid 1px black'
		}
		
	}
}

			//-=-=-=-=-=-=--=---=-=END of real E-mail validation=-=-=-=-=-=-=--=-=-==-=-=\\

				//-=-=-=-=-=-=--=---=-=Login validation=-=-=-=-=-=-=--=-=-==-=-=\\

document.getElementById('login-form').onsublit = function() {
	var email = document.getElementById('email').value;
	var password = document.getElementById('password').value;
	
	
}