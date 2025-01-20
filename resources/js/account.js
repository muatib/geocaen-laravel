/**
 * Password visibility toggle functionality
 * Handles the password field visibility toggling and icon switching
 */

// Wait for DOM to be fully loaded before initializing
document.addEventListener('DOMContentLoaded', initializePasswordToggles);

/**
 * Switches the password field between visible and hidden states
 * @param {string} inputId - The ID of the password input field
 */
function togglePassword(inputId) {
    const input = document.getElementById(inputId);
    const icon = input.nextElementSibling.querySelector('i');
    togglePasswordVisibility(input, icon);
}

/**
 * Initialize event listeners for all password toggle buttons
 */
function initializePasswordToggles() {
    // Make togglePassword available globally
    window.togglePassword = togglePassword;

    // Add click listeners to all toggle buttons
    document.querySelectorAll('.toggle-password').forEach(toggle => {
        toggle.addEventListener('click', function() {
            const input = this.previousElementSibling;
            const icon = this.querySelector('i');
            togglePasswordVisibility(input, icon);
        });
    });
}

/**
 * Toggle the visibility state of a password field and update its icon
 * @param {HTMLElement} input - The password input element
 * @param {HTMLElement} icon - The icon element to toggle
 */
function togglePasswordVisibility(input, icon) {
    if (input.type === "password") {
        input.type = "text";
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    } else {
        input.type = "password";
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    }
}
