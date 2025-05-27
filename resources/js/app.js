import './bootstrap';
import './confetti';
import './gallery';
import 'flowbite';
import intersect from '@alpinejs/intersect';

document.addEventListener('livewire:navigating', () => {
    // Mutate the HTML before the page is navigated away...
    initFlowbite();
});

document.addEventListener('livewire:navigated', () => {
    // Reinitialize Flowbite components
    initFlowbite();
});

import.meta.glob(['../images/**']);

window.Alpine.plugin(intersect);
