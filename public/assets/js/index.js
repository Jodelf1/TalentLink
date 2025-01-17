const notifications = document.getElementById('notifications-list');
const toggleButton = document.getElementById('notification-button');

// Abre ou fecha o modal de notificações
toggleButton.addEventListener('click', (event) => {
    event.stopPropagation(); // Evita que o clique se propague para o window
    notifications.classList.toggle('active');
});

// Fecha o modal ao clicar fora dele
window.addEventListener('click', (event) => {
    // Verifica se o clique foi fora do botão e do modal
    if (!notifications.contains(event.target) && event.target !== toggleButton) {
        notifications.classList.remove('active');
    }
});
