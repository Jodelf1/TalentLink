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



function setCookie(name, value, days) {
    const date = new Date();
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    const expires = "expires=" + date.toUTCString();
    document.cookie = name + "=" + value + ";" + expires + ";path=/";
}

function getCookie(name) {
    const nameEQ = name + "=";
    const ca = document.cookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) === ' ') c = c.substring(1);
        if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

function applySavedTheme() {
    const savedTheme = getCookie('theme');
    const body = document.body;
    console.log("tema mudado")
    if (savedTheme === 'dark') {
        body.classList.add('dark-mode');
        body.classList.remove('light-mode');
    } else if (savedTheme === 'light') {
        body.classList.add('light-mode');
        body.classList.remove('dark-mode');
    } else {
        // Se não houver cookie, aplica a preferência do navegador
        if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
            body.classList.add('dark-mode');
            body.classList.remove('light-mode');
        } else {
            body.classList.add('light-mode');
            body.classList.remove('dark-mode');
        }
    }
}

// Aplicar o tema salvo ao carregar a página
window.addEventListener('load', applySavedTheme);

// Monitora mudanças na preferência do usuário no navegador
window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
    const newColorScheme = e.matches ? 'dark' : 'light';
    const body = document.body;

    if (newColorScheme === 'dark') {
        body.classList.add('dark-mode');
        body.classList.remove('light-mode');
    } else {
        body.classList.add('light-mode');
        body.classList.remove('dark-mode');
    }
});
