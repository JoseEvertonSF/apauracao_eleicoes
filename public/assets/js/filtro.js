function aplicaFiltroCards() {
    var input = document.getElementById("filtro-vereador");
    var filter = input.value.toLowerCase();
    var cardContainer = document.getElementById("candidatos");
    var cards = cardContainer.getElementsByClassName("cards-container");
    for (i = 0; i < cards.length; i++) {
        nome = cards[i].querySelector(".nome");
        numero = cards[i].querySelector(".numero")
        if (nome.innerText.toLowerCase().indexOf(filter) > -1 || numero.innerText.indexOf(filter) > -1) {
            cards[i].style.display = "";
        } else {
            cards[i].style.display = "none";
        }
    }
}