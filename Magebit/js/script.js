function validateForm() {
	var x = document.forms["form1"]["emailbox"].value;
	var z = document.forms["form1"]["emailbox"].value;
	var y = document.getElementById("checktos").checked;
	var error = document.getElementById("errormessage");
	var button = document.getElementById("buttonarrow");
    var splitter; 
	var splitterdot;
	var emailinput = document.getElementById("emailform");
	/*Input empty check*/
	if (z == "") {
		error.innerHTML = "Email address is required";
		return false;

	}

	/*Accept terms of service*/
	if (y == false){
		error.innerHTML = "You must accept the terms and conditions";
		return false;
	}

	/*Check valid email*/
	if (/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(z)) {	
    	/*Check Colombia emails*/
    	splitter = x.split("@");
    	splitterdot = splitter[1].split(".");
    	if (splitterdot[1] == "co") {
	    	error.innerHTML = "We are not accepting subscriptions from Colombia emails";
	    	return (false)
	    }
	    emailinput.style.display = "none";
    	return (true)

	}
    error.innerHTML = "Please provide a valid e-mail address";
    return (false)


}

function validateFormMobile() {
	var x = document.forms["form1_mobile"]["emailbox"].value;
	var z = document.forms["form1_mobile"]["emailbox"].value;
	var y = document.getElementById("checktos_mobile").checked;
	var error = document.getElementById("errormessage_mobile");
	var button = document.getElementById("buttonarrow_mobile");
    var splitter; 
	var splitterdot;
	var emailinput = document.getElementById("emailform_mobile");
	/*Input empty check*/
	if (z == "") {
		error.innerHTML = "Email address is required";
		return false;

	}

	/*Accept terms of service*/
	if (y == false){
		error.innerHTML = "You must accept the terms and conditions";
		return false;
	}

	/*Check valid email*/
	if (/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(z)) {	
    	/*Check Colombia emails*/
    	splitter = x.split("@");
    	splitterdot = splitter[1].split(".");
    	if (splitterdot[1] == "co") {
	    	error.innerHTML = "We are not accepting subscriptions from Colombia emails";
	    	return (false)
	    }
	    emailinput.style.display = "none";
    	return (true)

	}
    error.innerHTML = "Please provide a valid e-mail address";
    return (false)


}


