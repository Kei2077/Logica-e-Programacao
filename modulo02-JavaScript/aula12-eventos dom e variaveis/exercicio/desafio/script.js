
function calcularmedia(){
    let numero = document.querySelector("#nota1").value
    let numero1 = document.querySelector("#nota2").value
    var soma = (parseInt(numero) + parseInt(numero1))
    var div = soma / 2

    let resultado = document.getElementById("resultado")
    resultado.innerHTML = div

}

 
