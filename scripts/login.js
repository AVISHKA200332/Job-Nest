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
    let password = document.getElementById('password').value;
    if (username === "" || password === "") {
        alert("⚠️ Both fields are required!");
        event.preventDefault();
    }
});