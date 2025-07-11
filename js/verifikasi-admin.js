const username = "admin";
const password = "123";

const usernameInput = document.getElementById("username");
const passwordInput = document.getElementById("password");

function verifikasi(event) {
    event.preventDefault(); // Mencegah form submit default (optional)

    if (usernameInput.value === username && passwordInput.value === password) {
        window.location.href = "admin.php";
    } else {
        alert("Invalid username or password");
    }
}
