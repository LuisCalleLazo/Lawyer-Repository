<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    {{-- BOOSTRAP ICONS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    @vite('resources/css/app.css')
    @vite('resources/js/modal_handle.js')
    @vite('resources/js/axios_handle.js')

    <title>Abogados - Admin</title>
</head>
<body class="bg-white">
    <div class="h-screen flex flex-row">
        {{-- MENU LATERAL --}}
        <div class="bg-[var(--bg-color)] w-1/5 min-w-64 rounded-e-2xl text-white">

            {{-- NAVEGACIÓN EN COMPUTADORA --}}
            <div class="bg-[var(--bg-color)] w-full h-screen flex flex-col justify-between rounded-e-2xl">

                {{-- CABECERA DE NAVEGACION --}}
                <div class="h-1/4" onclick="location.href='/admin'">
                    <div class="flex-grow h-full">
                        <img src="{{asset('imgs/law.png')}}" class="object-contain w-full h-full">
                    </div>
                </div>

                {{-- CONTENIDO DE NAVEGACION --}}
                <div class="h-3/4 relative overflow-auto">
                    <div>
                        <h3 class="py-5 pl-10 font-bold">Usuarios</h3>
                        <x-nav-item
                            link="admins"
                            title="Administradores"
                            icon="bi bi-people-fill"
                        />
                        <x-nav-item
                            link="lawyers"
                            title="Abogados"
                            icon="bi bi-people-fill"
                        />
                        <x-nav-item
                            link="clients"
                            title="Clientes"
                            icon="bi bi-person-circle"
                        />
                        <x-nav-item
                            link="messages"
                            title="Mensajes"
                            icon="bi bi-person-circle"
                        />
                    </div>


                    <div>
                        <h3 class="py-5 pl-10 font-bold">Trabajos</h3>
                        <x-nav-item
                            link="contracts"
                            title="Contratos"
                            icon="bi bi-person-circle"
                        />
                    </div>

                    <div>
                        <h3 class="py-5 pl-10 font-bold">Seguridad</h3>
                        <x-nav-item
                            link="rols"
                            title="Roles"
                            icon="bi bi-person-circle"
                        />
                    </div>


                    <form class="py-10 text-red-600" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="flex justify-around hover:bg-gray-900 py-1 rounded-e-3xl w-full">
                            <div class="flex justify-center items-center h-8 w-20 min-w-20
                            group-hover:scale-110 duration-75 ease-linear hover:cursor-pointer">
                                <i class="bi bi-backspace-reverse-fill"></i>
                            </div>
                            <div class="flex justify-start items-center h-8 flex-grow
                            group-hover:text-lg duration-100 ease-linear hover:font-semibold">
                                <h2 class="w-full text-left">Cerrar session</h2>
                            </div>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        {{-- CONTENIDO QUE TENDRA POR CADA UNO --}}
        <div class="w-4/5 relative overflow-auto">
            @yield('layout_admin')
        </div>
    </div>

    {{-- LOADING DE OPERACIONES --}}
    <x-modal width="250px" height="140px" title="" bg="#0000" idModal="loadModal" isClose="true">
        <x-loader width="250px"/>
    </x-modal>


    {{-- PREVIEW REPORTS --}}
    <x-modal width="800px" height="500px" title="" bg="#0000" idModal="previewModal" isClose="true">
        <iframe id="reportPreview" style="width:100%; height:500px;"></iframe>
    </x-modal>

    <script>
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

    </script>
</body>
</html>
