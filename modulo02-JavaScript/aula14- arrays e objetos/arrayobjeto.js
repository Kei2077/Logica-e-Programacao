let listaprodutos = [
    {nome: "computador", fabricante: "dell", valor: 5000},
    {nome: "notebook", fabricante: "acer", valor: 3000},
    {nome: "monitor", fabricante: "lg", valor: 900},
]

listaprodutos.forEach((produto) => {
    console.log(`O ${produto.nome} da ${produto.fabricante} e r$ ${produto.valor}`);
})

let listaprodutoscaros = listaprodutos.filter(produto => produto.valor > 1000)
console.log(listaprodutoscaros)
