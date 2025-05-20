
function togglePassword() {
    const passwordInput = document.getElementById("password");
    const icon = document.getElementById("toggleIcon");
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        icon.classList.remove("bi-eye-slash");
        icon.classList.add("bi-eye");
    } else {
        passwordInput.type = "password";
        icon.classList.remove("bi-eye");
        icon.classList.add("bi-eye-slash");
    }
}



document.getElementById("regForm").addEventListener("submit", function (e) {
    e.preventDefault();

    let name = document.getElementById("name").value.trim();
    let email = document.getElementById("email").value.trim();
    let phone = document.getElementById("phone").value.trim();
    let password = document.getElementById("password").value.trim();

    if (!name || !email || !phone || !password) {
        Swal.fire("All fields required!", "Please fill in all fields.", "warning");
        return;
    }

    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        Swal.fire("Invalid Email!", "Please enter a valid email.", "error");
        return;
    }

    if (!/^\d{10}$/.test(phone)) {
        Swal.fire("Invalid Phone!", "Phone number must be 10 digits.", "error");
        return;
    }

    if (password.length < 6) {
        Swal.fire("Weak Password!", "Password must be at least 6 characters long.", "error");
        return;
    }

    const formData = new FormData();
    formData.append("name", name);
    formData.append("email", email);
    formData.append("phone", phone);
    formData.append("password", password);

    fetch("backend/register.php", {
        method: "POST",
        body: formData
    })
        .then(res => res.json())
        .then(data => {
            if (data.status === "success") {
                Swal.fire("Success!", data.message, "success").then(() => {
                    document.getElementById("regForm").reset();
                    window.location.href = "login.php";
                });
            } else {
                Swal.fire("Error!", data.message, "error");
            }
        })
        .catch(err => {
            console.error(err);
            Swal.fire("Error!", "Something went wrong.", "error");
        });
});
