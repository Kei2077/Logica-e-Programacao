produto.armazenamento = "256 gb"
produto['memoria-RAM'] = "8 gb"
console.log(produto);

delete produto.armazenamento
delete produto["memoria-RAM"]
console.log(produto);
