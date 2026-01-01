<!-- src/Views/pages/ai.php -->
<div class="h-[calc(100vh-80px)] bg-gray-100 flex flex-col">
    <!-- Chat Header -->
    <div class="bg-white border-b border-gray-200 px-6 py-4 flex items-center justify-between shadow-sm">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-teal-100 rounded-full flex items-center justify-center text-teal-600 relative">
                <i class="fa-solid fa-robot"></i>
                <div class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 rounded-full border-2 border-white"></div>
            </div>
            <div>
                <h2 class="font-bold text-gray-900">MUMBSO AI Assistant</h2>
                <p class="text-xs text-green-600">Online</p>
            </div>
        </div>
        <button class="text-gray-400 hover:text-gray-600">
            <i class="fa-solid fa-ellipsis-vertical"></i>
        </button>
    </div>

    <!-- Chat Messages -->
    <div id="chatContainer" class="flex-1 overflow-y-auto p-6 space-y-4">
        <!-- Bot Welcome Message -->
        <div class="flex items-start gap-3">
            <div class="w-8 h-8 bg-teal-100 rounded-full flex-shrink-0 flex items-center justify-center text-teal-600 mt-1">
                <i class="fa-solid fa-robot text-sm"></i>
            </div>
            <div class="bg-white p-4 rounded-2xl rounded-tl-none shadow-sm max-w-[80%] text-gray-700">
                Hello! I'm here to assist you with medical inquiries, research summaries, or navigating the platform. How can I help you today?
            </div>
        </div>
    </div>

    <!-- Input Area -->
    <div class="bg-white p-4 border-t border-gray-200">
        <form id="chatForm" class="max-w-4xl mx-auto flex gap-4">
            <input type="text" id="userMessage" class="flex-1 border border-gray-300 rounded-full px-6 py-3 focus:outline-none focus:ring-2 focus:ring-teal-500" placeholder="Type your medical question..." autocomplete="off">
            <button type="submit" class="w-12 h-12 bg-teal-600 text-white rounded-full flex items-center justify-center hover:bg-teal-700 transition shadow-md">
                <i class="fa-solid fa-paper-plane"></i>
            </button>
        </form>
    </div>
</div>

<script>
    const chatContainer = document.getElementById('chatContainer');
    const chatForm = document.getElementById('chatForm');
    const userMessageInput = document.getElementById('userMessage');

    function appendMessage(sender, text) {
        const isUser = sender === 'user';
        const div = document.createElement('div');
        div.className = `flex items-start gap-3 ${isUser ? 'flex-row-reverse' : ''}`;

        const avatar = isUser
            ? `<div class="w-8 h-8 bg-medical-600 rounded-full flex-shrink-0 flex items-center justify-center text-white mt-1"><i class="fa-solid fa-user text-sm"></i></div>`
            : `<div class="w-8 h-8 bg-teal-100 rounded-full flex-shrink-0 flex items-center justify-center text-teal-600 mt-1"><i class="fa-solid fa-robot text-sm"></i></div>`;

        const bubble = document.createElement('div');
        bubble.className = `${isUser ? 'bg-medical-600 text-white rounded-tr-none' : 'bg-white text-gray-700 rounded-tl-none'} p-4 rounded-2xl shadow-sm max-w-[80%]`;
        bubble.textContent = text;

        const avatarDiv = document.createElement('div');
        avatarDiv.innerHTML = avatar; // avatar is safe HTML string defined in previous lines

        div.appendChild(avatarDiv.firstChild);
        div.appendChild(bubble);
        chatContainer.appendChild(div);
        chatContainer.scrollTop = chatContainer.scrollHeight;
    }

    chatForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        const message = userMessageInput.value.trim();
        if (!message) return;

        // User Message
        appendMessage('user', message);
        userMessageInput.value = '';

        // Simulate typing
        const typingDiv = document.createElement('div');
        typingDiv.id = 'typingIndicator';
        typingDiv.className = 'flex items-start gap-3';
        typingDiv.innerHTML = `<div class="w-8 h-8 bg-teal-100 rounded-full flex-shrink-0 flex items-center justify-center text-teal-600 mt-1"><i class="fa-solid fa-robot text-sm"></i></div>
                               <div class="bg-white p-4 rounded-2xl rounded-tl-none shadow-sm text-gray-500 text-sm">
                                    <i class="fa-solid fa-circle fa-beat-fade mx-0.5" style="font-size: 6px;"></i>
                                    <i class="fa-solid fa-circle fa-beat-fade mx-0.5" style="animation-delay: 0.1s; font-size: 6px;"></i>
                                    <i class="fa-solid fa-circle fa-beat-fade mx-0.5" style="animation-delay: 0.2s; font-size: 6px;"></i>
                               </div>`;
        chatContainer.appendChild(typingDiv);
        chatContainer.scrollTop = chatContainer.scrollHeight;

        try {
            const response = await fetch('/ai/chat', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ message })
            });
            const data = await response.json();

            // Remove typing indicator
            document.getElementById('typingIndicator').remove();

            appendMessage('ai', data.reply);
        } catch (error) {
            document.getElementById('typingIndicator').remove();
            appendMessage('ai', "Sorry, I'm having trouble connecting to the server.");
        }
    });
</script>
