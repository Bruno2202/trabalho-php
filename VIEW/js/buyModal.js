function showModal(id) { 
    document.getElementById(id).style.display = 'flex';
}

function hideModal(id) {
    document.getElementById(id).style.display = 'none';
}

function updateTotal(vlrVenda, idInputQtdeCompra, idTotalCompra) {
    var qtdeCompra = document.getElementById(idInputQtdeCompra).value;
    var vlrCompra = vlrVenda * qtdeCompra;

    document.getElementById(idTotalCompra).innerText = `Total: R$ ${vlrCompra}`;
}

function getQtdeCompra(idInputQtdeCompra) {
    var qtdeCompra = document.getElementById(idInputQtdeCompra).value;
    
    return qtdeCompra;
}