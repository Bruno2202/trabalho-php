function validateForm() {
    var descricao = document.forms["cadForm"]["descricao"].value;
    var modelo = document.forms["cadForm"]["modelo"].value;
    var marca = document.forms["cadForm"]["marca"].value;
    var ano = document.forms["cadForm"]["ano"].value;
    var numCordas = document.forms["cadForm"]["numCordas"].value;
    var cor = document.forms["cadForm"]["cor"].value;
    var qtdeEstoque = document.forms["cadForm"]["qtdeEstoque"].value;
    var vlrVenda = document.forms["cadForm"]["vlrVenda"].value;
    var imagem = document.forms["cadForm"]["imagem"].value;

    if (descricao === "" || modelo === "" || marca === "" || ano === "" || numCordas === "" || cor === "" || qtdeEstoque === "" || vlrVenda === "" || imagem === "") {
        alert("Preencha todos os campos");
        return false;
    }
    
    function isNumber(value) {
        return !isNaN(value) && Number.isFinite(parseFloat(value));
    }

    if (!isNumber(ano)) {
        alert("Insira um ano válido");
        return false;
    }

    if (ano < 1900) {
        alert("O ano deve ser superior a 1900");
        return false;
    }

    if (!isNumber(numCordas)) {
        alert("Insira uma quantidade válida de cordas");
        return false;
    }

    if (numCordas < 6) {
        alert("Quantidade de cordas deve ser maior ou igual à 6");
        return false;
    }

    if (!isNumber(qtdeEstoque)) {
        alert("Insira uma quantidade válida de estoque");
        return false;
    }

    if (!isNumber(vlrVenda)) {
        alert("Insira um valor de venda válido");
        return false;
    }

    return true;
}