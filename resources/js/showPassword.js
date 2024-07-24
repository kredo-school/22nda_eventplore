// パスワードの表示切り替え
function togglePasswordVisibility(id) {
    const passwordInput = document.getElementById('password' + id);
    const toggleIcon = document.getElementById('toggle-password' + id);

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleIcon.classList.replace('fa-eye-slash', 'fa-eye');
    } else {
        passwordInput.type = 'password';
        toggleIcon.classList.replace('fa-eye', 'fa-eye-slash');
    }
}
window.togglePasswordVisibility=togglePasswordVisibility;