

let caixa = document.getElementById("mouse")
function entradamouse() {
    console.log("Foi");
    caixa.style.backgroundColor = "blue"

}

function saidamouse(){
    caixa.style.backgroundColor = "red"
}

function mudarhtml(){
    let nome = document.querySelector("#nome").value
    caixa.innerHTML = nome
}