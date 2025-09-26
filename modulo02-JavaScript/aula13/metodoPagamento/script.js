function calcularPagamento(){
    let valorgasto = parseFloat(document.getElementById("valorCompra").value)
    let formaPagamento = document.getElementById("formaPagamento").value
    let resultado = document.querySelector("#resultado")
    switch (formaPagamento){
        case "pix":
            let valorFinal = valorgasto * 0.9
            resultado.innerHTML = "valor a ser pago e de " + valorFinal.toFixed(2)
            break
        case "debito":
            let valorFinal2 = valorgasto * 0.95
            resultado.innerHTML = "valor a ser pago e de " + valorFinal2.toFixed(2)
            break
        case "credito":
            resultado.innerHTML = "valor a ser pago e de " + valorgasto.toFixed(2)
            break
        default:
            resultado.innerHTML = "Valor invalido"
            break
    }
    
}