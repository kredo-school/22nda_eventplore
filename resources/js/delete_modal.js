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


//delete modalを保持したままエラー表示
document.addEventListener('DOMContentLoaded', function() {
    const errorContainer = document.getElementById('error-container');
    const hasErrors = errorContainer.dataset.hasErrors === 'true';

    if (hasErrors) {
        $('#user-profile-delete').modal('show');
    }

    if (hasErrors) {
        $('#eventowner-profile-delete').modal('show');
    }
});
