<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    {{-- BOOSTRAP ICONS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite('resources/css/app.css')
  </head>
  <body>
    <div class="flex justify-center h-screen items-center flex-col bg-cover"
      style="background-image: url('{{ asset('imgs/background2.jpg') }}')">
      {{-- Cabecera de pagina principal --}}
      <div>
        <p class="text-3xl font-bold text-white">
          CONTRATA UN ABOGADO
        </p>
      </div>
      <br>
      <div class="h-auto bg-slate-200 rounded-2xl">
        <div class="flex justify-around">
          @yield('content_main')
        </div>
      </div>
    </div>
  </body>
</html>
