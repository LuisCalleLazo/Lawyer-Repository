
@extends('../layouts.layout_main')

@section('content_main')

<div class="m-auto w-96">
    <form method="POST" action="{{ route('login_send') }}">
        @csrf
        <div class="pt-5">
            <h1 class="text-3xl font-extrabold text-center">Login</h1>
        </div>
        <br>
        <div class="flex justify-around flex-col px-10">
            <div class="py-3">
            <div class="pb-3">
                <label for="user_name" class="font-mono font-bold">Nombre o Correo:</label>
            </div>
            <div class="text-center">
                <input type="text" name="user_name" id="user_name" placeholder="Ingrese su nombre o correo"
                class="py-1.5 pl-5 w-72 rounded-lg outline-neutral-500 font-mono">
            </div>
            </div>
            <div class="py-3">
            <div class="pb-3">
                <label for="user_pass" class="font-mono font-bold">Contraseña:</label>
            </div>
            <div class="text-center">
                <input type="password" name="user_pass" id="user_pass" placeholder="Ingrese su contraseña"
                class="py-1.5 pl-5 w-72 rounded-lg outline-neutral-500 font-mono">
            </div>
            </div>
            <div>

            </div>
        </div>
        <br>
        <div class="flex justify-center flex-col pb-5 px-10">
            <div class="p-1">
                <button class="text-center bg-slate-300 py-2 px-1 w-full rounded-xl border-spacing-0.5 broder-black
                hover:bg-slate-700 hover:text-white active:bg-slate-900
                transition-colors duration-150 ease-in-out" type="submit">
                    Login
                </button>
            </div>
        </div>
    </form>
  </div>

@endsection
