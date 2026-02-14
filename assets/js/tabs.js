document.addEventListener('DOMContentLoaded', () => {
  const instances = document.querySelectorAll('.ctp-tabs');
  if (!instances.length) return;

  instances.forEach((root) => {
    const buttons = root.querySelectorAll('[data-ctp-tab]')
    const panels = root.querySelectorAll('[data-ctp-panel]');

    if (!buttons.length || !panels.length) return;

    // Transition settings (keep in sync with CSS if you add it)
    const FADE_MS = 120;

    const setActive = (nextIndex) => {
      const nextBtn = root.querySelector(`[data-ctp-tab="${nextIndex}"]`);
      const nextPanel = root.querySelector(`[data-ctp-panel="${nextIndex}"]`);
      const currentPanel = root.querySelector('.ctp-tabs__panel.is-active');

      if (!nextBtn || !nextPanel) return;
      if (currentPanel === nextPanel) return;

      // Update buttons (ARIA + active class)
      buttons.forEach((btn) => {
        const isActive = btn.dataset.ctpTab === String(nextIndex);
        btn.classList.toggle('is-active', isActive);
        btn.setAttribute('aria-selected', isActive ? 'true' : 'false');
      });

      // Fade out current, then swap, then fade in next
      if (currentPanel) {
        currentPanel.classList.add('is-fading');
        window.setTimeout(() => {
          currentPanel.classList.remove('is-active', 'is-fading');
          nextPanel.classList.add('is-active', 'is-fading');

          // Force reflow so the fade-in reliably starts
          void nextPanel.offsetWidth;

          window.setTimeout(() => {
            nextPanel.classList.remove('is-fading');
          }, FADE_MS);
        }, FADE_MS);
      } else {
        // No active panel yet (edge case)
        nextPanel.classList.add('is-active', 'is-fading');
        void nextPanel.offsetWidth;
        window.setTimeout(() => {
          nextPanel.classList.remove('is-fading');
        }, FADE_MS);
      }
    };

    // Click handling
    buttons.forEach((btn) => {
      btn.addEventListener('click', () => {
        setActive(btn.dataset.ctpTab);
      });
    });

    // Ensure first panel is active if none is
    if (!root.querySelector('.ctp-tabs__panel.is-active')) {
      setActive(buttons[0].dataset.ctpTab);
    }
  });
});
