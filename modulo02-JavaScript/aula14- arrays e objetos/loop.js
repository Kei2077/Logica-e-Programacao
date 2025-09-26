// for i in range (1, 10,1):
//      print(i)

for (let i = 0; i <= 10; i++){
    console.log(i);
}

let listaprodutos = ["Computador", "Notebook", "Teclado", "mouse"]

for (let i = 0; i < listaprodutos.length; i++){
    console.log(listaprodutos[i]);

}

listaprodutos.forEach((produto) => {
    console.log(produto);
})