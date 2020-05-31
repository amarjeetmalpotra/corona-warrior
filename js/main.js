// Toast handler
let toast =(msg) => {
    let alertbox = document.getElementById("alert");
    alertbox.innerHTML = "<img src='https://upload.wikimedia.org/wikipedia/commons/1/17/Warning.svg' width=25 alt='warning' class='warn-img'> " + msg + " !";
	alertbox.style.transform = "translateY(0)";
	setTimeout(() => {
		alertbox.style.transform = "translateY(-100px)";
	}, 3000);
}
// Login Button
document.getElementById("login-btn").addEventListener("click", () => {
	let mail = document.getElementById("login-mail").value;
	let pass = document.getElementById("login-pass").value;
	if (mail === "" || pass.length < 6) {
        toast("Invalid credentials");
    }
    else {
        // Ajax
    }
});
// Request account/signup button
document.getElementById("signup-btn").addEventListener("click", () => {
    let name = document.getElementById("name").value;
    let phone = document.getElementById("phone").value;
	let mail = document.getElementById("signup-mail").value;
    let pass = document.getElementById("signup-pass").value;
    let cpass = document.getElementById("confirm-pass").value;
    let terms = document.getElementById("terms");
	if (name === "" || mail === "") {
        toast("Check values again");
    }
    else if(phone.length != 10 || isNaN(phone)) {
        toast("Enter valid phone number");
    }
    else if(pass.length < 6) {
        toast("Password must be atleast 6 characters");
    }
    else if(pass != cpass) {
        toast("Password doesn't match");
    }
    else if(!terms.checked) {
        toast("You must agree terms");
    }
    else {
        // Ajax
    }
});
// Signup panel
document.getElementById('open-signup').addEventListener("click", () => {
    document.getElementById('login-panel').style.display = 'none';
    document.getElementById('signup-panel').style.display = 'block';
});
// Login panel
document.getElementById('open-login').addEventListener("click", () => {
    document.getElementById('signup-panel').style.display = 'none';
    document.getElementById('login-panel').style.display = 'block';
});