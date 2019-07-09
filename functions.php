<?php

function splitNumber($str){

        $number ='';
            for($i=0; $i<strlen($str); $i++)
            {
                is_numeric($str[$i]) ? $number .= $str[$i] : false;
            }

            return ($number);
}