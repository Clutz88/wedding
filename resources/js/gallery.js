// set the modal menu element
import { Modal } from 'flowbite';

const $targetEl = document.getElementById('image-modal');

// options with default values
const options = {
    placement: 'center',
    backdrop: 'dynamic',
    backdropClasses: '-z-1',
    closable: true,
    onHide: () => {
        //
    },
    onShow: () => {
        document.body.classList.add('overflow-hidden');
    },
    onToggle: () => {
        //
    },
};

// instance options object
const instanceOptions = {
    id: 'modalEl',
    override: true,
};

/*
 * $targetEl: required
 * options: optional
 */
window.modal = new Modal($targetEl, options, instanceOptions);
