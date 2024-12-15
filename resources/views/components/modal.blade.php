

<style>
    /* Definir la animación para abrir el modal */
    @keyframes slideIn {
        from {
            transform: translateY(-100%);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    /* Definir la animación para cerrar el modal */
    @keyframes slideOut {
        from {
            transform: translateY(0);
            opacity: 1;
        }
        to {
            transform: translateY(-100%);
            display: none;
            opacity: 0;
        }
    }

    .modal {
        visibility: hidden;
        opacity: 0;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
        transition: visibility 0s linear 0.5s, opacity 0.5s;
    }

    .modal-content {
        padding: 20px;
        border-radius: 5px;
    }

    .modal.open {
        visibility: visible;
        opacity: 1;
        transition-delay: 0s;
        animation: slideIn 0.5s forwards;
    }

    .modal.close {
        animation: slideOut 0.5s forwards;
    }
</style>

<div>
    <dialog id={{$idModal}} class="modal">
        <div class="modal-content flex justify-between flex-col text-white"
            style="background: {{$bg ?? '#202355dd'}}; width: {{$width}}; height: {{$height}}">
            <div>
                <h1 class="text-2xl font-semibold">{{$title}}</h1>
            </div>
            <div>
                {{ $slot }}
            </div>
            <div class="flex justify-end">
                <div class="mx-2 flex justify-around h-10">
                    @isset($btn_action)
                        {{ $btn_action }}
                    @endisset
                </div>
                <div class="mx-2">
                    @php
                        $isClose = $isClose ?? false;
                    @endphp
                    @if (!$isClose)
                        <x-button-text id="{{$idCloseModal}}" color="#fff" bg="#700" text="Cerrar"/>
                    @endif
                </div>
            </div>
        </div>
    </dialog>
</div>
