<?php 

define('CLASS_DIR', 'modeles/');	// Chemin vers les classes
define('LIB_DIR', 'lib/');	// Chemin vers les classes
define('VIEWS_DIR', 'vues/');
define('CRTL_DIR', 'controller/');
set_include_path(get_include_path().PATH_SEPARATOR.CLASS_DIR);	// Ajoute le chemin dans les "path"
set_include_path(get_include_path().PATH_SEPARATOR.LIB_DIR);	// Ajoute le chemin dans les "path"
set_include_path(get_include_path().PATH_SEPARATOR.CRTL_DIR);	// Ajoute le chemin dans les "path"
set_include_path(get_include_path().PATH_SEPARATOR.VIEWS_DIR);	// Ajoute le chemin dans les "path"
spl_autoload_extensions('.class.php');	// Défini l'extension de fichier ".class.php" = Personne.class.php
spl_autoload_register();	// Démarre la fonction autoload (chargement automatique de fichier sur appel de new NomClasse())

session_start();