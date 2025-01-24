const form = document.querySelector(".create-form");
const errorClass = "invalid-field";

const validateField = (field) => {
    // Remove erros antigos
    removeErrorMessage(field);
    field.classList.remove(errorClass);

    let isValid = true;
    let message = "";

    // Validações por tipo de campo
    if (field.id === "titulo" && field.value.trim() === "") {
        isValid = false;
        message = "O título da vaga é obrigatório.";
    } else if (field.id === "descricao" && field.value.trim() === "") {
        isValid = false;
        message = "A descrição da vaga é obrigatória.";
    } else if (field.id === "categoria" && field.value === "") {
        isValid = false;
        message = "Por favor, selecione uma categoria.";
    } else if (field.id === "localizacao" && field.value.trim() === "") {
        isValid = false;
        message = "A localização é obrigatória.";
    } else if (field.id === "data_expiracao" && field.value.trim() === "") {
        isValid = false;
        message = "A data de expiração é obrigatória.";
    }else if(field.id === "data_expiracao") {
        const hoje = new Date();
        const dataExpiracaoValue = new Date(field.value.trim());
        if (field.value.trim() === "" || dataExpiracaoValue <= hoje) {
            isValid = false;
            message = "A data de expiração deve ser uma data futura.";
        }
    }

    // Adiciona erro se inválido
    if (!isValid) {
        field.classList.add(errorClass);
        displayErrorMessage(field, message);
    }

    return isValid;
};

// Exibe a mensagem de erro abaixo do campo
const displayErrorMessage = (field, message) => {
    const errorElement = document.createElement("span");
    errorElement.className = "error-message";
    errorElement.textContent = message;
    field.parentNode.appendChild(errorElement);
};

// Remove mensagens de erro antigas
const removeErrorMessage = (field) => {
    const errorElement = field.parentNode.querySelector(".error-message");
    if (errorElement) {
        errorElement.remove();
    }
};

// Validação no envio do formulário
form.addEventListener("submit", async (event) => {
    event.preventDefault();
    const fields = form.querySelectorAll("input, textarea, select");
    let isValid = true;

    fields.forEach((field) => {
        if (!validateField(field)) {
            isValid = false;
        }
    });

    if (isValid) {
        createLog("loading");
        await createVaga(fields);
    }
});

// Validação ao sair de um campo
const createVaga = async (fields) => {
    try {
        const formData = new FormData();

        fields.forEach((field) => {
            // Se o campo for um input do tipo "file", pega o arquivo
            if (field.type === "file") {
                if (field.files.length > 0) {
                    formData.append(field.id, field.files[0]); // Adiciona o arquivo
                }
            } else {
                formData.append(field.id, field.value); // Adiciona valores de outros campos
            }
        });

        const response = await fetch("/c/create/vaga", {
            method: 'POST',
            body: formData
        });

        const data = await response.json();

        if (data.success) {
            createLog("success", data.destino, data.message); // Passa a URL de redirecionamento
            console.log(data.message);
            document.querySelector('.create-form').reset();
        } else {
            createLog(data.type, null, data.message);
            console.log(data.message);
        }
    } catch (error) {
        createLog("error", null, error.message);
        console.log(error.message);
    }
};

form.querySelectorAll("input, textarea, select").forEach((field) => {
    field.addEventListener("blur", () => validateField(field));
});