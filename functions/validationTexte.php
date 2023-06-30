<?php

function validationTexte($er, $data, $key, $min, $max)
{
    if(!empty($data)) {
        if(mb_strlen($data) < $min) {
            $er[$key] = 'Il faut minimum '.$min.' caractères.';
        } elseif(mb_strlen($data) >= $max) {
            $er[$key] = 'Il faut maximum '.$max.' caractères.';
        }
    } else{
        $er[$key] = 'Veuillez renseigner ce champ.';
    }
    return $er;
}