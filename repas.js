function generer(){

    var randomItem = document.getElementById("valeurCachée").value;
    console.log(randomItem);//Pour avoir un suivi de la valeur (pas avoir de undefined)
    var span = document.getElementById("plat");
    span.innerHTML = randomItem;
    span.href = "https://www.google.com/search?q=recette+" + randomItem;
    //setTimeout(() => refresh(), 10000);
}

function refresh(){
    document.location.reload();
}

function toggler(){
    let togg1 = document.getElementById("boutonAfficherRecettes");
    let d1 = document.getElementById("afficherRecette");
    togg1.addEventListener("click", () => {
    if(getComputedStyle(d1).display != "none"){
        d1.style.display = "none";
    } else {
        d1.style.display = "block";
    }
    })
}
