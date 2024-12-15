
class AxiosInstance {
    constructor() {
        this.axios = axios.create({
            baseURL: '/api',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            },
        });

        this.msg_error = "";
        this.msg_sucess = "";

        this.modal = new ModalPrefab("loadModal");
        this.previewModal = new ModalPrefab("previewModal");

        // Interceptor para manejar modales de carga
        this.axios.interceptors.request.use((config) => {
            // Mostrar modal de carga
            this.showLoadingModal();
            return config;
        });

        this.axios.interceptors.response.use(
            (response) => {
                // Ocultar modal de carga
                this.hideLoadingModal();
                this.showSuccessMsg();
                this.hideAllModals();
                return response;
            },
            (error) => {
                // Ocultar modal de carga y manejar el error
                this.hideLoadingModal();
                this.showErrorMsg(error);
                this.hideAllModals();
                return Promise.reject(error);
            }
        );
    }

    setMessageError(msg)
    {
        this.msg_error = msg;
    }
    setMessageSuccess(msg)
    {
        this.msg_sucess = msg;
    }

    // Métodos para mostrar/ocultar modales
    showLoadingModal() {
        this.modal.openModal();
    }

    hideLoadingModal() {
        this.modal.closeModal();
    }


    hideAllModals()
    {
        document.querySelectorAll(".modal").forEach(element => {
            element.classList.remove('open');
            element.classList.add('close');
            element.addEventListener('animationend', () => {
                element.close();
            }, { once: true });
        });
    }

    showErrorMsg(error) {
        toastr.error(this.msg_error, {timeOut: 2000})
    }

    showSuccessMsg() {
        toastr.success(this.msg_sucess, {timeOut: 2000})
    }

    get(url, params = {}) {
        return this.axios.get(url, { params });
    }

    async getReport(url)
    {
        const response = await this.axios.get(url, { responseType: 'blob' });
        const blob = new Blob([response.data], { type: response.headers['content-type'] });
        const blobUrl = URL.createObjectURL(blob);
        document.getElementById('reportPreview').src = blobUrl;
        this.previewModal.openModal();
    }

    post(url, data) {
        return this.axios.post(url, data);
    }

    put(url, data) {
        return this.axios.put(url, data);
    }

    delete(url) {
        return this.axios.delete(url);
    }

    postFormData(url, formData) {
        return this.axios.post(url, formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
            },
        });
    }
}
