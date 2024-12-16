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
    <h1>ABOGADOS</h1>
</div>
<div class="h-full">
    <div class="h-[20vh] flex justify-between items-center">
        <div class="flex-1 px-8">
            <input type="text" class="py-3 pl-4 w-full rounded-lg text-black outline-none"
                placeholder="Buscar por nombre" id="filter">
        </div>

        {{-- <div class="flex-1 px-8 flex justify-end">
            <button class="bg-[#456] py-3 px-6 rounded-2xl">
                Agregar
            </button>
        </div> --}}
    </div>
    <div class="h-[80vh] relative overflow-auto py-7 px-5">
        <div class="rounded-2xl">
            <x-table :titles="$titles" :fields="$fields" :buttons="$buttons" :hasIcon=true
                :pageNumber="$pageNumber" link="admins" :totalPages="$totalPages" />
        </div>
    </div>
    {{-- EDITAR ADMIN --}}
    <x-modal width="700px" height="450px" title="Editar informacion del usuario" idModal="editModal" idCloseModal="closeEditModal">
        <div class="w-full p-4 flex justify-around">
            <div class="flex-1 flex flex-col justify-around">
                <div>
                    <h3 class="py-4">Email de usuario:</h3>
                    <x-input-email placeholder="Correo de usuario" id="email_user" width="300px" />
                </div>
                <div>
                    <h3 class="py-4">Nombre completo:</h3>
                    <x-input-text placeholder="Nombre completo" id="names_user"  width="300px"/>
                </div>
                <div>
                    <h3 class="py-4">Carnet de identidad:</h3>
                    <x-input-text placeholder="Carnet de identidad" id="ci_user"  width="300px"/>
                </div>
            </div>
            <div class="flex-1 flex flex-col justify-around">
                <div>
                    <h3 class="py-4">Apellido paterno:</h3>
                    <x-input-text placeholder="Apellido paterno" id="ap_fa_user"  width="300px"/>
                </div>
                <div>
                    <h3 class="py-4">Apellido materno:</h3>
                    <x-input-text placeholder="Apellido materno" id="ap_ma_user"  width="300px"/>
                </div>
                <div>
                    <h3 class="py-4">Edad:</h3>
                    <x-input-text placeholder="Edad" id="age_user"  width="300px"/>
                </div>
            </div>
        </div>
        <x-slot name="btn_action">
            <x-button-text id="btnEditUser" color="#fff" bg="#007bff" text="Editar" function="UpdateUser"/>
        </x-slot>
    </x-modal>

    {{-- ELIMINAR USUARIO --}}
    <x-modal width="600px" height="140px" title="¿Esta seguro de eliminar el abogado?" idModal="deleteModal" idCloseModal="closeDeleteModal">
        <x-slot name="btn_action">
            <x-button-text id="btnDeleteUser" color="#fff" bg="#007bff" text="Eliminar"/>
        </x-slot>
    </x-modal>

    <script>

        function UpdateUser()
        {
            const idUser = localStorage.getItem("idUserSystem");
            const axiosInstance = new AxiosInstance();

            axiosInstance.setMessageSuccess("Se actualizo correctamente");
            axiosInstance.showSuccessMsg();
            axiosInstance.hideAllModals();
        }
        function EditUserModal(param)
        {
            let array = JSON.parse(param);
            localStorage.setItem("idUserSystem", array[0])

            const modal = new ModalPrefab("editModal", "closeEditModal");
            modal.openModal();
        }
        function RolesUserModal(param)
        {
            let array = JSON.parse(param);
            localStorage.setItem("idUserSystem", array[0])
            const modal = new ModalPrefab("rolesModal", "closeRolesModal");
            modal.openModal();
        }
        function DeleteUserModal(param)
        {
            const modal = new ModalPrefab("deleteModal", "closeDeleteModal");
            modal.openModal();
        }
        function AddModal(param)
        {

            const modal = new ModalPrefab("addModal", "closeAddModal");
            modal.openModal();
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
