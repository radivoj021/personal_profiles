  // Postavljanje kolačića
  document.cookie = "myCookie=aaaaaaaaa; path=/";

  // Čitanje kolačića
  function getCookie(name) {
      const value = `; ${document.cookie}`;
      const parts = value.split(`; ${name}=`);
      if (parts.length === 2) return parts.pop().split(';').shift();
  }

  // Ispisivanje vrednosti kolačića u konzolu
  const cookieValue = getCookie("myCookie");
  console.log(cookieValue); // Ovo će ispisati "aaaaaaaaa"