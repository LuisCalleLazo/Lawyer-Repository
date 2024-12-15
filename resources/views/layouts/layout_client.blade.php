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


    <title>Abogados - Cliente</title>
</head>
<body>
    <div>
        @yield('layout_client')
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
