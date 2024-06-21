function validateForm() {
    var email = document.forms["loginForm"]["email"].value;
    var password = document.forms["loginForm"]["password"].value;

    if (email === "" || password === "") {
        alert("Preencha todos os campos");
        return false;
    }

    // Validação de email simples
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        alert("Insira um email válido");
        return false;
    }

    // Validação de senha (mínimo 6 caracteres)
    if (password.length < 6) {
        alert("A senha deve ter no mínimo 6 caracteres");
        return false;
    }

    return true;
}