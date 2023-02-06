<?php

function read_pages_table($path) {
    $rows   = array_map('str_getcsv', file($path));
    $header = array_shift($rows);
    $pages    = array();
    foreach($rows as $row) {
        $pages[] = array_combine($header, $row);
    }

    return $pages;
}

?>