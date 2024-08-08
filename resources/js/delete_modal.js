function togglePasswordVisibility() {
    const passwordInput = document.getElementById('password');
    const toggleIcon = document.querySelector('.toggle-password');

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleIcon.classList.replace('fa-eye-slash', 'fa-eye');
    } else {
        passwordInput.type = 'password';
        toggleIcon.classList.replace('fa-eye', 'fa-eye-slash');
    }
}
window.togglePasswordVisibility=togglePasswordVisibility;