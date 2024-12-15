
class ModalPrefab {
    constructor(modalId, closeModalButtonId) {
        this.modal = document.getElementById(modalId);
        this.closeModalButton = document.getElementById(closeModalButtonId);
        this.initialize();
    }

    initialize() {
        if (this.closeModalButton) {
            this.closeModalButton.addEventListener('click', () => this.closeModal());
        }
    }

    openModal() {
        this.modal.classList.remove('close');
        this.modal.classList.add('open');
    }

    closeModal() {
        this.modal.classList.remove('open');
        this.modal.classList.add('close');
        this.modal.addEventListener('animationend', () => {
            this.modal.close();
        }, { once: true });
    }
}
