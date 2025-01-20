/**
 * Game Utilities Module
 * Handles popup management, answer feedback, session management, and game initialization
 */

/**
 * Shows a popup by its ID
 * @param {string} popupId - The ID of the popup to display
 */
function displayPopup(popupId) {
    const popup = document.getElementById(popupId);
    if (popup) {
        popup.classList.add("show");
    }
}

/**
 * Hides a popup by its ID
 * @param {string} popupId - The ID of the popup to hide
 */
function closePopup(popupId) {
    const popup = document.getElementById(popupId);
    if (popup) {
        popup.classList.remove("show");
    }
}

/**
 * Handles wrong answer animation and visual feedback
 * Adds shake animation and wrong answer styling
 */
function handleWrongAnswer() {
    const answerInput = document.getElementById("answer");
    answerInput.classList.add("game__form-wrong", "shake");

    // Remove shake animation after 500ms
    setTimeout(() => {
        answerInput.classList.remove("shake");
    }, 500);
}

/**
 * Resets all game session data and redirects to home page
 * Clears both session and local storage, and calls server reset endpoint
 * @returns {Promise} Resolves when session is reset
 */
function resetSession() {
    sessionStorage.clear();
    localStorage.clear();

    return fetch('reset_session.php', {
        method: 'POST',
    }).then(response => {
        if (response.ok) {
            window.location.href = 'index.php';
        } else {
            console.error('Error resetting session');
        }
    });
}

/**
 * Initializes game components and error handling
 * Sets up error messages and fun facts display
 */
function initializeGame() {
    // Handle error message display if present
    const errorMessage = document.getElementById("txt__wrong");
    if (errorMessage && errorMessage.textContent.trim() !== "") {
        handleWrongAnswer();
        errorMessage.classList.add("wrong__txt--disp");
    }

    // Set fun fact if element exists
    const funFact = document.getElementById('fun-fact');
    if (funFact) {
        funFact.textContent = "<?php echo $funFact; ?>";
    }
}

// Initialize game when DOM is loaded
document.addEventListener('DOMContentLoaded', initializeGame);

// Make utility functions globally available
window.displayPopup = displayPopup;
window.closePopup = closePopup;
window.handleWrongAnswer = handleWrongAnswer;
window.resetSession = resetSession;
