<?php

#Toutes les function pour l'affichage

function index() {
    // Va chercher le contenu de auth.php => affichage
    include __DIR__.'/../views/front/auth.php';
}