<?php

function is_empty($var, $text, $location, $massage, $data){
    if (empty($var)) {
         # Error message
         $errormassage = "The ".$text." is required";
         header("Location: $location?$massage=$errormassage&$data");
         exit;
    }
    return 0;
 }
