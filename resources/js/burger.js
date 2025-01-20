/**
 * Menu and DOM manipulation utilities
 * Provides functions for element selection, visibility control, and burger menu functionality
 */

/**
 * Retrieves an element by its ID
 * @param {string} id - The ID of the element to find
 * @returns {HTMLElement|null} The found element or null if not found
 */
const getElementById = function(id) {
    return document.getElementById(id);
};

/**
 * Shows an element by setting its display to "block"
 * @param {string} id - The ID of the element to show
 */
const showElement = function(id) {
    getElementById(id).style.display = "block";
};

/**
 * Hides an element by setting its display to "none"
 * @param {string} id - The ID of the element to hide
 */
const hideElement = function(id) {
    getElementById(id).style.display = "none";
};

/**
 * Initializes the burger menu functionality
 * Handles the toggle of menu visibility and burger icon state
 */
function initializeBurgerMenu() {
    const burgerMenu = getElementById("burger__menu");
    const overlay = getElementById("menu");

    if (burgerMenu && overlay) {
        burgerMenu.addEventListener("click", toggleBurgerMenu);
    }
}

/**
 * Toggles the burger menu state and overlay visibility
 * @param {Event} event - The click event object
 */
function toggleBurgerMenu() {
    this.classList.toggle("close");
    getElementById("menu").classList.toggle("overlay");
}

// Initialize burger menu when DOM is loaded
document.addEventListener("DOMContentLoaded", initializeBurgerMenu);

// Make utility functions globally available
window.$ = getElementById;
window.show = showElement;
window.hide = hideElement;
