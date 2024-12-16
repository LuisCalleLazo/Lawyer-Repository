@extends('layouts.layout_admin')

@php
    $titles = ['Imagen', 'Nombre completo', 'Correo', 'Editar', 'Eliminar'];
    $fields = $admins->map(function($item) {
        return [
            $item->id,  // Acceder a la propiedad id del objeto
            $item->photo,  // Acceder a la propiedad photo
            $item->first_name . " " . $item->last_name,  // Concatenar first_name y last_name
            $item->email,  // Acceder a la propiedad email
        ];
    })->toArray();

    $buttons = [
        ['bi bi-pencil-square', '#278', '#fff', 'EditUserModal'],
        ['bi bi-trash3-fill', '#700', '#fff', 'DeleteUserModal'],
    ];
@endphp

@section('layout_admin')
<div class="pl-11 pt-[30px] font-bold">
    <h1>CONTRATOS</h1>
</div>
<div class="h-full">
    <div class="h-[20vh] flex justify-between items-center">
        <div class="flex-1 px-8">
            <input type="text" class="py-3 pl-4 w-full rounded-lg text-black outline-none"
                placeholder="Buscar por nombre" id="filter">
        </div>

        <div class="flex-1 px-8 flex justify-end">
            <button class="bg-[#456] py-3 px-6 rounded-2xl">
                Agregar
            </button>
        </div>
    </div>
    <div class="h-[80vh] relative overflow-auto py-7 px-5">
        <div class="rounded-2xl">
            <x-table :titles="$titles" :fields="$fields" :buttons="$buttons" :hasIcon=true
                :pageNumber="$pageNumber" link="admins" :totalPages="$totalPages" />
        </div>
    </div>
</div>
@endsection
