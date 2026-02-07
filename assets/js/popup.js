// Set cookie
function setCookie(name, value, days) {
    const expires = new Date();
    expires.setTime(expires.getTime() + (days * 24 * 60 * 60 * 1000));
    document.cookie = name + "=" + value + ";expires=" + expires.toUTCString() + ";path=/";
}

// Get cookie
function getCookie(name) {
    return document.cookie
        .split('; ')
        .find(row => row.startsWith(name + '='));
}

// Close popup
const exit = e => {
    const popup = document.querySelector('.exit-intent-popup');
    if (!popup) return;

    const shouldExit =
        e.target.classList.contains('exit-intent-popup') || // click on overlay
        e.target.classList.contains('close') || // click close button
        e.keyCode === 27; // ESC key

    if (shouldExit) {
        popup.classList.remove('visible');
    }
};

// Show popup on exit intent
const mouseEvent = e => {
    const popup = document.querySelector('.exit-intent-popup');
    if (!popup) return;

    const shouldShowExitIntent =
        !e.toElement &&
        !e.relatedTarget &&
        e.clientY < 10;

    if (shouldShowExitIntent) {
        document.removeEventListener('mouseout', mouseEvent);
        popup.classList.add('visible');
        setCookie('exitIntentShown', true, 30);
    }
};

// Init
document.addEventListener('DOMContentLoaded', function () {
    if (!getCookie('exitIntentShown')) {
        document.addEventListener('mouseout', mouseEvent);
        document.addEventListener('keydown', exit);

        const popup = document.querySelector('.exit-intent-popup');
        if (popup) {
            popup.addEventListener('click', exit);
        }
    }
});
