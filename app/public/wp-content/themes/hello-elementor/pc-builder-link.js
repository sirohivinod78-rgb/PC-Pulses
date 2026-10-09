document.addEventListener('DOMContentLoaded', () => {
    const redirectTarget = '/pc-builder/';
    const matchesBuildButton = (text) => {
        if (!text) {
            return false;
        }
        const normalized = text.trim();
        return normalized === 'Build Your PC' || normalized.includes('Build Your PC');
    };

    const elements = Array.from(document.querySelectorAll('a, button'));
    elements.forEach((element) => {
        const text = element.textContent || '';
        if (!matchesBuildButton(text)) {
            return;
        }

        if (element.tagName === 'A') {
            element.setAttribute('href', redirectTarget);
            element.setAttribute('aria-label', 'Build Your PC');
            element.addEventListener('click', (event) => {
                if (!element.href || element.href.endsWith('#')) {
                    event.preventDefault();
                    window.location.href = redirectTarget;
                }
            });
        } else {
            element.addEventListener('click', () => {
                window.location.href = redirectTarget;
            });
            element.style.cursor = 'pointer';
        }
    });
});
