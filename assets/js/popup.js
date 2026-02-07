const exit = e => {
    const shouldExit =
        [...e.target.classList].includes('exit-intent-popup') || // user clicks on mask
        e.target.className === 'close' || // user clicks on the close icon
        e.keyCode === 27; // user hits escape

    if (shouldExit) {
        document.querySelector('.exit-intent-popup').classList.remove('visible');
    }
};

const mouseEvent = e => {
    const shouldShowExitIntent = 
        !e.toElement && 
        !e.relatedTarget &&
        e.clientY < 10;

    if (shouldShowExitIntent) {
        document.removeEventListener('mouseout', mouseEvent);
        document.querySelector('.exit-intent-popup').classList.add('visible');

        CookieService.setCookie('exitIntentShown', true, 30);
    }
};

function getCookie(name) {
    return document.cookie.split('; ').find(row => row.startsWith(name + '='));
}

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

