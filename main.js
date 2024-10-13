/* document.getElementById("myForm").addEventListener("submit", function(event){
    event.preventDefault();

    let username = document.getElementById("username").value;
    let password = document.getElementById("password").value;

    let unesiteIme = document.getElementById("unesiteIme");
    let unesitePassword = document.getElementById("unesitePassword");

    if(username === "" && password === ""){
        unesiteIme.style.visibility = "visible";
        unesitePassword.style.visibility = "visible";
    }
    else if(username === ""){
        unesiteIme.style.visibility = "visible";
    }
    else if(password === ""){
        unesitePassword.style.visibility = "visible";
    }
    else if(username !== "" && password !== ""){
        this.action = "logIn.php";
        this.submit();
    }

}) */

/* let checkInputs = function(event){
    
    let username = document.getElementById("username").value;
    let unesiteIme = document.getElementById("unesiteIme");

    if(username === ""){
        unesiteIme.style.visibility = "visible";
        unesite
    }

    event.preventDefault();
} */

/* document.getElementById("myForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Sprečava podrazumevano slanje forme
    
    let username = document.getElementById("username").value;
    
    if (username !== "") {
        // Postavi action atribut forme dinamički
        this.action = "somePage.php";
        this.submit(); // Ručno pošalji formu nakon postavljanja action atributa
    } else {
        alert("Unesite korisničko ime pre slanja!");
    }
}); */