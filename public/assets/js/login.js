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
            createLog("success", data.destino, data.message); // Passa a URL de redirecionamento
            console.log(data.message);
            document.getElementById('login-form').reset();
        } else {
            createLog(data.type, null, data.message);
            console.log(data.message);
        }
    } catch (error) {
        createLog("error");
        console.log(error.message);
    }
}