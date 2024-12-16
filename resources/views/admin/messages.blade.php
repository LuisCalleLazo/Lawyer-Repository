@extends('layouts.layout_admin')


@section('layout_admin')
<div class="pl-11 pt-[30px] font-bold">
    <h1>MENSAJES CONFIDENCIALES</h1>
</div>
<div class="h-[90vh] flex flex-col justify-between p-6">
    <div id="chatContainer" class="flex-grow overflow-y-auto p-4 border rounded-lg bg-gray-50 shadow">
        <div class="flex items-start space-x-4 mb-4">
            <div class="w-10 h-10 bg-blue-500 text-white flex items-center justify-center rounded-full">A</div>
            <div class="bg-blue-100 p-3 rounded-lg shadow max-w-lg">
                <p>Hola, ¿en qué puedo ayudarte?</p>
            </div>
        </div>
        <div class="flex items-start space-x-4 mb-4 justify-end">
            <div class="bg-gray-100 p-3 rounded-lg shadow max-w-lg">
                <p>Necesito más información sobre mi cuenta.</p>
            </div>
            <div class="w-10 h-10 bg-gray-500 text-white flex items-center justify-center rounded-full">T</div>
        </div>
    </div>

    <form id="chatForm" class="flex mt-4" onsubmit="sendMessage(event)">
        <input
            id="messageInput"
            type="text"
            class="flex-grow border rounded-l-lg p-2 focus:outline-none focus:ring focus:border-blue-300"
            placeholder="Escribe tu mensaje aquí..."
            required
        />
        <button
            type="submit"
            class="bg-blue-500 text-white px-4 rounded-r-lg hover:bg-blue-600 focus:ring focus:ring-blue-300"
        >
            Enviar
        </button>
    </form>
</div>

<script>
    const chatContainer = document.getElementById('chatContainer');
    const messageInput = document.getElementById('messageInput');

    function sendMessage(event) {
        event.preventDefault();

        const message = messageInput.value.trim();
        if (!message) return;

        const userMessage = `
            <div class="flex items-start space-x-4 mb-4 justify-end">
                <div class="bg-gray-100 p-3 rounded-lg shadow max-w-lg">
                    <p>${message}</p>
                </div>
                <div class="w-10 h-10 bg-gray-500 text-white flex items-center justify-center rounded-full">T</div>
            </div>
        `;
        chatContainer.innerHTML += userMessage;
        messageInput.value = '';

        chatContainer.scrollTop = chatContainer.scrollHeight;

        setTimeout(() => {
            const responseMessage = `
                <div class="flex items-start space-x-4 mb-4">
                    <div class="w-10 h-10 bg-blue-500 text-white flex items-center justify-center rounded-full">A</div>
                    <div class="bg-blue-100 p-3 rounded-lg shadow max-w-lg">
                        <p>Recibido: ${message}</p>
                    </div>
                </div>
            `;
            chatContainer.innerHTML += responseMessage;
            chatContainer.scrollTop = chatContainer.scrollHeight;
        }, 1000);
    }
</script>
@endsection
