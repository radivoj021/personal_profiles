<?php
// Proveri da li su kolačići postavljeni
if (!isset($_COOKIE['username']) || !isset($_COOKIE['password'])) {
    // Ako nisu, preusmeri na stranicu za prijavu
    header('Location: login.php');
    exit;
} else {
    // Kolačići su postavljeni, korisnik je ulogovan
    $username = $_COOKIE['username'];
    $pwd = $_COOKIE['password'];
    header('Location: profil.php');;
}
?>