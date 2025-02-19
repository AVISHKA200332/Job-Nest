document.getElementById('password').addEventListener('input', function() {
    let passwordStrength = document.getElementById('passwordStrength');
    let passwordValue = this.value;
    let strength = 0;

    if (passwordValue.length >= 6) strength++;
    if (passwordValue.match(/[A-Z]/)) strength++;
    if (passwordValue.match(/[0-9]/)) strength++;
    if (passwordValue.match(/[\W]/)) strength++;

    let strengthText = "";
    switch(strength) {
		case 0:
			strengthText = "Include numbers, uppercase, special characters";
			passwordStrength.style.color = "Gray";
			passwordStrength.style.fontSize = "13px"
            break;
        case 1:
            strengthText = "Password Strength:Weak";
            passwordStrength.style.color = "red";
			passwordStrength.style.fontSize = "14px"
            break;
        case 2:
            strengthText = "Password Strength:Normal";
            passwordStrength.style.color = "Gold";
            break;
        case 3:
            strengthText = "Password Strength:Good";
            passwordStrength.style.color = "YellowGreen";
            break;
        case 4:
            strengthText = "Password Strength:Strong";
            passwordStrength.style.color = "MediumSeaGreen";
            break;
    }
    passwordStrength.textContent = strengthText;
});


document.getElementById('togglePassword').addEventListener('click', function() {
    let passwordField = document.getElementById('password');
    if (passwordField.type === "password") {
        passwordField.type = "text";
        this.textContent = "👁";
    } else {
        passwordField.type = "password";
        this.textContent = "👁️‍🗨️";
    }
});


document.querySelector('form').addEventListener('submit', function(event) {
    let username = document.getElementById('username').value;
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;
    let confirmPassword = document.getElementById('repassword').value;
    
    let emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

    if (username.length < 6) {
        alert("⚠️ Username must be at least 6 characters long");
        event.preventDefault();
    } else if (!email.match(emailPattern)) {
        alert("⚠️ Please enter a valid email address");
        event.preventDefault();
    } else if (password !== confirmPassword) {
        alert("⚠️ Passwords do not match");
        event.preventDefault();
    }
});
