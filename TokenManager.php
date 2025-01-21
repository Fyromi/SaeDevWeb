<?php

class TokenManager {

    // Méthode pour générer un token unique
    public function genererToken($login) {
        $token = bin2hex(random_bytes(16)) . '_' . md5($login . time());

        $_SESSION['token'] = $token;
        
        return $token;
    }

    public static function validerToken($token) {
        if (isset($_SESSION['token']) && $_SESSION['token'] === $token) {
            return true;
        }
        return false;
    }

    public static function supprimerToken($token) {
        if (isset($_SESSION['token']) && $_SESSION['token'] === $token) {
            unset($_SESSION['token']);
            return true;
        }
        return false;
    }

}
?>
