
window.displayPopup = function(popupId) {
    const popup = document.getElementById(popupId);
    if (popup) {
        popup.classList.add("show");
    }
}

window.closePopup = function(popupId) {
    const popup = document.getElementById(popupId);
    if (popup) {
        popup.classList.remove("show");
    }
}

window.handleWrongAnswer = function() {
    const answerInput = document.getElementById("answer");
    answerInput.classList.add("game__form-wrong", "shake");

    setTimeout(function() {
        answerInput.classList.remove("shake");
    }, 500);
}

window.resetSession = function() {
    sessionStorage.clear();
    localStorage.clear();

    fetch('reset_session.php', {
        method: 'POST',
    }).then(response => {
        if (response.ok) {
            window.location.href = 'index.php';
        } else {
            console.error('Error resetting session');
        }
    });
}


document.addEventListener('DOMContentLoaded', function() {
    const errorMessage = document.getElementById("txt__wrong");
    if (errorMessage && errorMessage.textContent.trim() !== "") {
        handleWrongAnswer();
        errorMessage.classList.add("wrong__txt--disp");
    }

    const funFact = document.getElementById('fun-fact');
    if (funFact) {
        funFact.textContent = "<?php echo $funFact; ?>";
    }
});
