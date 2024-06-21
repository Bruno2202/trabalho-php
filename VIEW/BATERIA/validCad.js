function validateForm() {
    var descricao = document.forms["cadForm"]["descricao"].value;
    var modelo = document.forms["cadForm"]["modelo"].value;
    var marca = document.forms["cadForm"]["marca"].value;
    var ano = document.forms["cadForm"]["ano"].value;
    var numPecas = document.forms["cadForm"]["numPecas"].value;
    var cor = document.forms["cadForm"]["cor"].value;
    var qtdeEstoque = document.forms["cadForm"]["qtdeEstoque"].value;
    var vlrVenda = document.forms["cadForm"]["vlrVenda"].value;
    var imagem = document.forms["cadForm"]["imagem"].value;

    if (descricao === "" || modelo === "" || marca === "" || ano === "" || numPecas === "" || cor === "" || qtdeEstoque === "" || vlrVenda === "" || imagem === "") {
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

    if (!isNumber(numPecas)) {
        alert("Insira uma quantidade válida de peças");
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