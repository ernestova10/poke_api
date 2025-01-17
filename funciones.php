<?php
    function isLogin($email, $password,$usuarios=[]){
        
        $logged = false;

        foreach($usuarios as $usuario){
            if($email == $usuario["email"] && $password == $usuario["password"]){
                $logged = true;
                break;
            }
         }
        
        return $logged;
    }
?>