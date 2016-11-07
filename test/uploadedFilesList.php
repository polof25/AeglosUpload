<?php

$nb_fichier = 0;
echo '<ul>';

if ($dossier = opendir('myuploads')) {
  while(false !== ($fichier = readdir($dossier))){
    if($fichier != '.' && $fichier != '..' && $fichier != 'index.php') {
      $nb_fichier++; // On incrémente le compteur de 1
      echo '<li><a href="./myuploads/' . $fichier . '">' . $fichier . '</a> le ' . date ("d F Y H:i:s.", filemtime("./myuploads/" . $fichier)) . '</li>';
    }
  }
  echo '</ul>';
  echo 'Il y a <strong>' . $nb_fichier .'</strong> fichier(s) dans le dossier';

  closedir($dossier);
}
else
echo 'Le dossier n\' a pas pu être ouvert';
