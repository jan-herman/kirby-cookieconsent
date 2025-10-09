// Log consent
function logConsent(cookie) {
    fetch('/ajax/log-cookie-consent', {
        method: 'post',
        credentials: 'same-origin',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            cookie,
            url: window.location.href,
            user_agent: window.navigator.userAgent,
        }),
    });
    /* .then(response => response.json())
    .then(response => {
        console.log(response);
    }); */
}

// Add consent id to preferences modal
function showConsentId() {
    const { consentId } = window.CookieConsent.getCookie();

    if (!consentId) {
        return;
    }

    const preferencesModalBody = document.querySelector('#cc-main .pm__body');
    let consentIdElement = preferencesModalBody.querySelector('.pm__section--consent-id');

    if (consentIdElement) {
        consentIdElement.textContent = `ID: ${consentId}`;
    } else {
        consentIdElement = document.createElement('div');
        consentIdElement.className = 'pm__section pm__section--consent-id';
        consentIdElement.textContent = `ID: ${consentId}`;
        preferencesModalBody.appendChild(consentIdElement);
    }
}

// Init & add custom functionality
function init() {
    const { CookieConsent } = window;

    if (!CookieConsent) {
        return;
    }

    CookieConsent.reset();

    run();

    // Open settings via hash
    if (window.location.hash === '#cookie-settings') {
        CookieConsent.showPreferences();
    }

    // Open settings via button
    const cookieSettingsButtons = document.querySelectorAll('a[href="#cookie-settings"]');

    cookieSettingsButtons.forEach((button) => {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            CookieConsent.showPreferences();
        });
    });
}

// Event listeners
document.addEventListener('turbo:load', init);
document.addEventListener('swup:page:view', init);

window.addEventListener('cc:onFirstConsent', ({ detail }) => {
    logConsent(detail.cookie);
});

window.addEventListener('cc:onChange', ({ detail }) => {
    logConsent(detail.cookie);
});

window.addEventListener('cc:onModalShow', () => {
    showConsentId();
});

window.addEventListener('cc:onModalReady', ({ detail }) => {
    // Bugfix: Play nice with locomotive scroll
    detail.modal.addEventListener('wheel', (e) => {
        e.stopPropagation();
    });
});
