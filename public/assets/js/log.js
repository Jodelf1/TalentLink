const logcontainer = document.getElementById("log-container");


const clearLogs = () => {
    logcontainer.innerHTML = ""; // Remove todo conteúdo do container
};

const removeLog = (log) => {
    log.classList.add("off");
}

const createLog = (id, redirectUrl = null, message) => {
    clearLogs(); // Garante que só existe um log por vez

    let classTag = "";

    if (id === "success") {
        classTag = "sucess-log";
    } else if (id === "loading") {
        classTag = "process-log";
    } else if (id === "info") {
        classTag = "info-log";
    } else if (id === "error") {
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

