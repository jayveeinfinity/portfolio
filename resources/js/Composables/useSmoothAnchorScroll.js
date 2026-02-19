// composables/useSmoothAnchorScroll.js
export function useSmoothAnchorScroll(headerOffset = 80) {
    const scrollToHash = (hash) => {
        if (!hash || !hash.startsWith('#')) return;

        const target = document.querySelector(hash);
        if (!target) return;
        console.log(`Scrolling to ${hash} with offset ${headerOffset}px`);

        const y = target.getBoundingClientRect().top + window.scrollY - headerOffset;

        window.scrollTo({ top: y, behavior: 'smooth' });
        history.pushState(null, '', hash);
    };

    const onAnchorClick = (e) => {
        const a = e.target.closest('a[href^="#"]');
        if (!a) return;

        const hash = a.getAttribute('href');
        if (!hash || hash === '#') return;

        // optional: ignore if user is holding ctrl/cmd/middle click
        if (e.metaKey || e.ctrlKey || e.shiftKey || e.button === 1) return;

        e.preventDefault();
        scrollToHash(hash);
    };

    return { onAnchorClick, scrollToHash };
}