
// Adicionar evento de mudança ao campo select
const themeSelect = document.getElementById('themeSelect');

themeSelect.addEventListener('change', function() {
    const selectedTheme = this.value;
    const body = document.body;

    if (selectedTheme === 'dark') {
        body.classList.add('dark-mode');
        body.classList.remove('light-mode');
        setCookie('theme', 'dark', 7);
    } else if (selectedTheme === 'light') {
        body.classList.add('light-mode');
        body.classList.remove('dark-mode');
        setCookie('theme', 'light', 7);
    }
});

// Função para aplicar o tema salvo
