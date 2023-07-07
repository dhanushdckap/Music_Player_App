<?php

function dieAndDump($dump){
    echo "<pre>";
    var_dump($dump);
    echo "</pre>";
    die();
}
