<?php
    require_once("php/functions/read_pages_table.php");
    require_once("php/functions/get_page_categories.php");
    $ini = parse_ini_file("config.ini");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $ini["title"] ?> - Main</title>
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@1.*/css/pico.min.css">
</head>
<body>
    <main class="container">


        <h1><?php echo $ini["title"];?> - Main</h1>
        <?php

        $pages = read_pages_table("data/pages.csv");

        // Check for v parameter
        if(isset($_GET["p"])) {
            $p = $_GET["p"];
            // Redirect if p parameter is valid
            $p_redirect = array_values(
                array_filter($pages, function ($row) use($p){
                    return $row['page'] == $p;
                })
            );

            if (count($p_redirect) > 0) {
                $p_redirect = $p_redirect[0];
                $target = "pages/".$p_redirect['page']."/index.php";
                if ($p_redirect['page_type'] == "redirect") {
                    $target = $p_redirect['path'];
                }
                header("Location: $target");
                exit();
            }
        }

        // Get page_category values
        $page_categories = get_page_categories($pages, "page_category");

        // If no p parameter is given or v paramter is invalid render list of valid v parameters and links to their redirect page
        foreach($page_categories as $pc) {
            echo "<h2>$pc</h2>";
            $html = "<ul>";
            foreach($pages as $page) {
                if ($page['active'] == 1 && $page['page_category'] == $pc) {

                    // $target = "pages/".$p['page']."/index.php";
                    // if ($p['page_type'] == "redirect") {
                    //     $target = "redirect.php?redirect_url=".$p['path'];
                    // }
                    $p_route = "?p=".$page['page'];
                    $html .= "<li><b><a href=".$p_route." target='_".$page['a_target']."'>".$page['page_display_name']."</a> - </b>".$page['description']."</li>";
                }
            }
            $html .= "</ul>";
    
            echo $html;
        }


        ?>
    </main>
    <?php include_once("./php/includes/footer.php"); ?>
</body>
</html>