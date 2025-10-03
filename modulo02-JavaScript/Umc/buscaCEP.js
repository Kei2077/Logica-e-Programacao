//http://viacep.com.br/ws/COLOCAR CEP/json

const cep = document.getElementById("cep")
cep.addEventListener("change", (evento) => {
    let cepUsuario = evento.target
    buscaCEP(cepUsuario.value)
})

async function buscaCEP(cepUsuario){
    
    let erroCep = document.getElementById("erro")
    erroCep.innerHTML = ""
    try{
        let consultaCEP = await fetch(`http://viacep.com.br/ws/${cepUsuario}/json`)
        let consultaCEPJson = await consultaCEP.json()
        preencheCampos(consultaCEPJson)

        if (consultaCEPJson.erro){
            throw Error ("CEP inexistente")
        }
    }
    catch{
        erroCep.innerHTML = "CEP INVALIDO"
        rua.value = ""
        bairro.value = ""
        cidade.value = ""
        estado.value = ""


    }
}

function preencheCampos(cepJson){
    console.log(cepJson);
    console.log(cepJson.logradouro);

    let rua = document.getElementById("rua")
    let cidade = document.getElementById("cidade")
    let estado = document.getElementById("estado")
    let bairro = document.getElementById("bairro")

    rua.value = cepJson.logradouro
    bairro.value = cepJson.bairro
    cidade.value = cepJson.localidade
    estado.value = cepJson.uf


}