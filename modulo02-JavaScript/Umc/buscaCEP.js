//http://viacep.com.br/ws/COLOCAR CEP/json

const cep = document.getElementById("cep")
cep.addEventListener("change", (evento) => {
    let cepUsuario = evento.target
    buscaCEP(cepUsuario.value)
})

async function buscaCEP(cepUsuario){
    try{
        let consultaCEP = await fetch(`http://viacep.com.br/ws/${cepUsuario}/json`)
        let consultaCEPJson = await consultaCEP.json()
        
    }
    catch{

    }
}