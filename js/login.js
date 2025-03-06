document.getElementById("loginForm").addEventListener("submit", function(event) {
    event.preventDefault();

    const username = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    if (authenticate(username, password)) {
        window.location.href = "sucess.html"
    } else {
        document.getElementById("errorMessage").style.display = "block";

    }
});


function authenticate(username, password) {
    return username == username && password === password;
}