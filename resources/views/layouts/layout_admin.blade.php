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
<body class="bg-gray-900 text-white">
    <div class="h-screen flex flex-row">
        {{-- MENU LATERAL --}}
        <div class="bg-[var(--bg-color)] w-1/5 min-w-64 rounded-e-2xl">

            {{-- NAVEGACIÓN EN COMPUTADORA --}}
            <div class="bg-[var(--bg-color)] w-full h-screen flex flex-col justify-between rounded-e-2xl">

                {{-- CABECERA DE NAVEGACION --}}
                <div class="h-1/4">
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
</body>
</html>
