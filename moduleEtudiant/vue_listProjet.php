<?php
class VueListProjet{
    
  public function __construct(){}

  public function afficherListProjet($list){

    foreach ($list as $data) {
      echo '<li>';
      echo '<ul>'. $data['idProjet'].' / '.$data['titre'] .'</ul>';  
      echo '</li>';
    }    
  } 
}
?>