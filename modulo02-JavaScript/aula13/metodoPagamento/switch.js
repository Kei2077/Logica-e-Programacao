let formapagamento = "pix"
let valorgasto = 1000

switch (formapagamento) {
    case "pix":
        console.log(valorgasto * 0.9);
        break
    case "debito":
        console.log(valorgasto * 0,95);
        break
    case "credito":
        console.log(valorgasto);
        break

}

