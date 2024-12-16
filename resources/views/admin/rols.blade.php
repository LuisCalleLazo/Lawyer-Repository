@extends('layouts.layout_admin')

@php
    $titles = ['Nombre', 'Descripcion', 'Editar'];
    $fields = $admins->map(function($item) {
        return [
            $item->id,  // Acceder a la propiedad id del objeto
            $item->name,  // Acceder a la propiedad photo
            $item->description,  // Concatenar first_name y last_name
        ];
    })->toArray();

    $buttons = [
        ['bi bi-pencil-square', '#278', '#fff', 'EditRolModal'],
    ];
@endphp

@section('layout_admin')
<div class="pl-11 pt-[30px] font-bold">
    <h1>ROLES</h1>
</div>
<div class="h-full">
    <div class="h-[20vh] flex justify-between items-center">
        <div class="flex-1 px-8">
            <input type="text" class="py-3 pl-4 w-full rounded-lg text-black outline-none"
                placeholder="Buscar por nombre" id="filter">
        </div>
    </div>
    <div class="h-[80vh] relative overflow-auto py-7 px-5">
        <div class="rounded-2xl">
            <x-table :titles="$titles" :fields="$fields" :buttons="$buttons" :hasIcon=false
                :pageNumber="$pageNumber" link="admins" :totalPages="$totalPages" />
        </div>
    </div>

    {{-- EDITAR --}}
    <x-modal width="400px" height="300px" title="Editar nombre del rol" idModal="editModal" idCloseModal="closeEditModal">

        <div class="flex justify-center items-center flex-col">
            <h3 class="py-4">Nombre de rol:</h3>
            <x-input-text placeholder="Nombre de rol" id="name_rol_up" width="280px" />
        </div>
        <x-slot name="btn_action">
            <x-button-text id="btnEditUser" color="#fff" bg="#007bff" text="Editar" function="EditRol"/>
        </x-slot>
    </x-modal>

    <script>
        function EditRolModal(param)
        {
            let array = JSON.parse(param);
            localStorage.setItem("idRolSystem", array[0])

            document.getElementById("name_rol_up").value = array[1];

            const modal = new ModalPrefab("editModal", "closeEditModal");
            modal.openModal();
        }

        async function EditRol() {
            const idRol = localStorage.getItem("idRolSystem");
            const name = document.getElementById("name_rol_up").value;

            const axiosInstance = new AxiosInstance();
            axiosInstance.setMessageSuccess("Se actualizo correctamente");
            axiosInstance.showSuccessMsg("Se actualizo correctamente");
            axiosInstance.hideAllModals();
        }
    </script>


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
