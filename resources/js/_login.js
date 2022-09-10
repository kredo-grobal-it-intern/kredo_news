function togglePassword() {
    var pass = document.getElementById('password');
    var toggleBtn = document.getElementById('toggleBtn');
    if (pass.type == "password") {
        pass.type = "text";
        toggleBtn.classList.toggle('fa-eye-slash');
        toggleBtn.classList.add('fa-eye');
    } else {
        pass.type = "Password";
        toggleBtn.classList.toggle('fa-eye-slash');
        toggleBtn.classList.add('fa-eye');
    }
}
