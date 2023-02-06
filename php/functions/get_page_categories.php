<?php
    function get_page_categories($pages_table, $col) {
        $page_categories = array();
        foreach($pages_table as $page) {
            $page_category = $page[$col];
            if (!in_array($page_category, $page_categories)) {
                $page_categories[] = $page_category;
            }
        }
        return $page_categories;
    }
?>