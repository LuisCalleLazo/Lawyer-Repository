
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


document.addEventListener('DOMContentLoaded', function () {
    const previewModal = document.getElementById('previewModal');

    if (previewModal) {
        previewModal.addEventListener('click', function (event) {
            const modalContent = previewModal.querySelector('.modal-content');

            // Si el click es fuera del contenido del modal, cerramos el modal
            if (!modalContent.contains(event.target)) {
                previewModal.classList.remove('open');
                previewModal.classList.add('close');
                previewModal.addEventListener('animationend', () => {
                    previewModal.close();
                }, { once: true });
            }
        });
    }
});
