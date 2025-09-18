/* window.document.body.style.backgroundColor = "black"
document.body.style.color = "white"
window,alert("bem vindo")

window.prompt("login")
window.prompt("senha")
    
window.confirm("e te jooj") */

let paragrafo = document.getElementsByTagName("p")[0]
paragrafo.innerHTML = "USANDO O TAG NAME"
paragrafo.style.backgroundColor = "red"
let paragrafo1 = document.getElementById("paragrafo1")
paragrafo1.innerHTML = "USANDO O ID"
paragrafo1.style.backgroundColor = "green"
let paragrafo2 = document.getElementsByClassName("paragrafo2") [0]
paragrafo2.innerHTML = "USANDO A CLASSE"
paragrafo2.style.backgroundColor = "blue"

let paragrafo3 = document.querySelector("#paragrafo3")
paragrafo3.innerHTML = "USAND SELECTOR"
paragrafo3.style.backgroundColor = "pink"

let paragrafo4 = document.querySelectorAll("p") [4]
paragrafo4.innerHTML = "USANDO O QUERY SELECTOR ALL"
paragrafo4,Style.backgroundColor = "purple"