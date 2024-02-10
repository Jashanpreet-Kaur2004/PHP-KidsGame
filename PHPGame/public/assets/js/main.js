var inactivityTimeout = 10 * 60 * 1000;

function startInactivityTimer() {
    setTimeout(logoutUser, inactivityTimeout);
}

function resetInactivityTimer() {
    clearTimeout(logoutUser);
    startInactivityTimer();
}

function logoutUser() {
    // Redirect or perform logout actions
    window.location.href = './../../src/features/signout.php';
}

// Start the timer when the page loads
startInactivityTimer();

// Reset the timer on user activity (e.g., mouse move, key press)
document.addEventListener('mousemove', resetInactivityTimer);
document.addEventListener('keypress', resetInactivityTimer);
