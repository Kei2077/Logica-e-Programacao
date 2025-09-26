let listastimes = ["santos", "sao paulo", "Palmeiras"]

console.log(listastimes[0]);
console.log(listastimes[1]);
console.log(listastimes[2]);
console.log(listastimes[3]);

listastimes.push("ponte preta")
listastimes.push("flamengo")
console.log(listastimes);

listastimes.shift()
console.log(listastimes);

listastimes.pop()
console.log(listastimes);

console.log(listastimes.indexOf("santos"))

let listanomes = ["Marcos", "Diego", "Camila", "Matheus"]

listanomes.splice(0,1)
console.log(listanomes);

listanomes.splice(1,2, "Robson", "edivan")
console.log(listanomes);

listanomes.splice(2,package, "Gabriel", "Diogo")
console.log(listanomes);