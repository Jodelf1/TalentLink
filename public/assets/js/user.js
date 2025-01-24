const option = document.getElementById('user-options-container');
const userCard = document.getElementById('user-card');

// Abre ou fecha o modal de notificações
userCard.addEventListener('click', (event) => {
    event.stopPropagation(); // Evita que o clique se propague para o window
    option.classList.toggle('active');
});

// Fecha o modal ao clicar fora dele
window.addEventListener('click', (event) => {
    // Verifica se o clique foi fora do botão e do modal
    if (!option.contains(event.target) && event.target !== userCard) {
        option.classList.remove('active');
    }
});