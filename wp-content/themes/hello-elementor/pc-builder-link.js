document.addEventListener('DOMContentLoaded', () => {
    const redirectTarget = window.pcBuilderLink?.url || '/?pc_builder_page=1';
    const matchesBuildButton = (text) => {
        if (!text) {
            return false;
        }
        const normalized = text.trim();
        return normalized === 'Build Your PC' || normalized.includes('Build Your PC');
    };

    const markBuildButtons = () => {
        document.querySelectorAll('a, button').forEach((element) => {
            if (matchesBuildButton(element.textContent || '')) {
                element.classList.add('pc-builder-text-yellow');
                element.style.cursor = 'pointer';
            }
        });
    };

    document.addEventListener('click', (event) => {
        const element = event.target.closest('a, button');
        if (!element || !matchesBuildButton(element.textContent || '')) {
            return;
        }

        event.preventDefault();
        window.open(redirectTarget, '_blank', 'noopener,noreferrer');
    });

    markBuildButtons();
    new MutationObserver(markBuildButtons).observe(document.body, { childList: true, subtree: true });
});
