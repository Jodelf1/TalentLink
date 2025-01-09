const logcontainer = document.getElementById("log-container"),
    buttons = document.querySelectorAll(".buttons .btn");


const clearLogs = () => {
    logcontainer.innerHTML = ""; // Remove todo conteúdo do container
};

const removeLog = (log) => {
    log.classList.add("off");
}

const createLog = (id, redirectUrl = null) => {
    clearLogs(); // Garante que só existe um log por vez

    let message = "";
    let classTag = "";

    if (id === "success") {
        message = "Login bem sucedido, redirecionando!";
        classTag = "sucess-log";
    } else if (id === "loading") {
        classTag = "process-log";
    } else if (id === "info") {
        message = "Informação relevante.";
        classTag = "info-log";
    } else if (id === "error") {
        message = `Email ou senha inválidos (Verifique se os inseriu corretamente)`;
        classTag = "error-log";
    }

    const log = document.createElement("div");
    log.className = `log-section ${classTag}`;

    if (id === "loading") {
        log.innerHTML = `<img src="/assets/img/gif/Animation - 1736328941889.gif" alt="Carregando...">`;
    } else {
        log.innerHTML = `<p>${message}</p>`;
    }

    logcontainer.appendChild(log); // Adiciona o log ao container

    // Redireciona após 3 segundos, se necessário
    if (id === "success" && redirectUrl) {
        setTimeout(() => {
            window.location.href = redirectUrl;
        }, 500); // 3 segundos
    }
};

buttons.forEach(btn => {
    btn.addEventListener("click", () => createLog(btn.id));
});

document.getElementById('login-form').addEventListener('submit', async (event) => {
    event.preventDefault(); // Evita o envio padrão do formulário

    const senha = document.getElementById('senha').value;
    const email = document.getElementById('email').value;

    createLog("loading");

    await login(email, senha);
});

const login = async (email, password) => {
    try {

        const response = await fetch("/login", {
            method: 'POST',
            body: new URLSearchParams({
                email: email,
                password: password,
            })
        });
        
        const data = await response.json();

        if (data.success) {
            createLog("success", data.destino); // Passa a URL de redirecionamento
            console.log(data.message);
            document.getElementById('login-form').reset();
        } else {
            createLog(data.type);
            console.log(data.message);
        }
    } catch (error) {
        createLog("error");
        console.log(error.message);
    }
}