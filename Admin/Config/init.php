<?php



//fonction userConnect :
function userConnect(){

    if( !isset( $_SESSION['user']) ){ //Si la session user n'existe pas, cela signifie que l'on n'est pas connecté donc on retourne false

        return false;
    }
    else{ //sinon, on retourne true
        return true;
    }
}

//fonction adminConnect() :
function adminConnect(){

    if( userConnect() && $_SESSION['user'] == 'admin@admin.com' ){ //Si l'internaute est connecté ET qu'il est admin (user = 1)


        return true;
    }
    else{
        return false;
    }
}



?>