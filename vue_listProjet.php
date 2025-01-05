<?php
 class VueListProjet{
    
    public function __construct() {}

    public afficherListProjet($list){
        foreach ($list as $data) {
            echo $data['id'];
        }
    }
 }
?>