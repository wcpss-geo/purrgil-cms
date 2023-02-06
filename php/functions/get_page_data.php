<?php
    function get_page_data($src, $page) {
        $page_data = array_values(
            array_filter($src, function($row) use($page) {
              return $row["page"] == $page;  
            })
        );
        
        return $page_data;
    }
?>