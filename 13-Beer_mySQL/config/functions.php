<?php


function slugify($string){
    
    $newString = str_replace(' ', '-', $string);
    $newString = str_replace('\'', '', $newString);
    $newString = str_replace(['À','Á','Â','Ã','Ä','Å','Æ','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ð','Ñ','Ò','Ó','Ô','Õ','Ö','Ø','Ù','Ú','Û','Ü','Ý','ß','à','á','â','ã','ä','å','æ','ç','è','é','ê','ë','ì','í','î','ï','ñ','ò','ó','ô','õ','ö','ø','ù','ú','û','ü','ý','ÿ','A','a','A','a','A','a','C','c','C','c','C','c','C','c','D','d','Ð','d','E','e','E','e','E','e','E','e','E','e','G','g','G','g','G','g','G','g','H','h','H','h','I','i','I','i','I','i','I','i','I','i','?','?','J','j','K','k','L','l','L','l','L','l','?','?','L','l','N','n','N','n','N','n','?','O','o','O','o','O','o','Œ','œ','R','r','R','r','R','r','S','s','S','s','S','s','Š','š','T','t','T','t','T','t','U','u','U','u','U','u','U','u','U','u','U','u','W','w','Y','y','Ÿ','Z','z','Z','z','Ž','ž','?','ƒ','O','o','U','u','A','a','I','i','O','o','U','u','U','u','U','u','U','u','U','u','?','?','?','?','?','?'], ['A','A','A','A','A','A','AE','C','E','E','E','E','I','I','I','I','D','N','O','O','O','O','O','O','U','U','U','U','Y','s','a','a','a','a','a','a','ae','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','o','u','u','u','u','y','y','A','a','A','a','A','a','C','c','C','c','C','c','C','c','D','d','D','d','E','e','E','e','E','e','E','e','E','e','G','g','G','g','G','g','G','g','H','h','H','h','I','i','I','i','I','i','I','i','I','i','IJ','ij','J','j','K','k','L','l','L','l','L','l','L','l','l','l','N','n','N','n','N','n','n','O','o','O','o','O','o','OE','oe','R','r','R','r','R','r','S','s','S','s','S','s','S','s','T','t','T','t','T','t','U','u','U','u','U','u','U','u','U','u','U','u','W','w','Y','y','Y','Z','z','Z','z','Z','z','s','f','O','o','U','u','A','a','I','i','O','o','U','u','U','u','U','u','U','u','U','u','A','a','AE','ae','O','o'], $newString);

    $newString = strtolower($newString);


    return $newString;
}

function saveLastVisitedPage() {
    if(!isset($_SERVER['HTTP_REFERER'])) {
        return; //on ne fait rien si pas de dernière page visitée
    } else {
        $urlLastPage = $_SERVER['HTTP_REFERER'];
        $_SESSION['lastPage'] = $urlLastPage;
    }
}

saveLastVisitedPage();
    
// Renvoie true si qqn est connecté ou false si pas connecté

function userIslogged() {
    return isset($_SESSION['user']);
}

function cookieAuthentification() { // Si un cookie est présent
        global $db;
    if (isset($_COOKIE['id'])) { // on récup^ère l'id dans le cookie
        $idUser = $_COOKIE['id'];
        $query = $db->query('SELECT * FROM user WHERE id = ' . $idUser);
        $user = $query->fetch();

        $token = $_COOKIE['token'];

        if ($token = hash('sha256', $user['id'].$user['password'].$user['created_at'])) {
            unset($user['password']);
            $_SESSION['user'] = $user;
        }

        $_SESSION['user'] = $user; // On connecte le visiteur avec l'utilisateur correspondant à l'id dans le cookie
    }
}
cookieAuthentification();