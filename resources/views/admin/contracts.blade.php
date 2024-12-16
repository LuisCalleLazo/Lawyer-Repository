@extends('layouts.layout_admin')

@php
    $titles = ['Descripction', 'Estado', 'Tipo', 'Editar', 'Eliminar'];
    $fields = $admins->map(function($item) {
        return [
            $item->id,
            $item->description,
            $item->state,
            $item->type,
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
            <x-table :titles="$titles" :fields="$fields" :buttons="$buttons" :hasIcon=false
                :pageNumber="$pageNumber" link="admins" :totalPages="$totalPages" />
        </div>
    </div>

    {{-- FILTER --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('filter');
            const rows = document.querySelectorAll('tbody tr');

            searchInput.addEventListener('keyup', function () {
                const searchTerm = this.value.trim().toLowerCase();

                rows.forEach(row => {
                    const name = row.querySelector('td:nth-child(1)').textContent.trim().toLowerCase();
                    if (name.includes(searchTerm)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        });
    </script>
</div>
@endsection
