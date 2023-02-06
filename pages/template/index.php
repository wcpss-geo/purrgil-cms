<?php
    $ini = parse_ini_file("../../config.ini");
    require_once("../../php/functions/read_pages_table.php");
    require_once("../../php/functions/get_page_data.php");
    $table = read_pages_table("../../data/pages.csv");
    $page = pathinfo(dirname(__FILE__, ))["basename"];
    $page_data = get_page_data($table, $page);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $ini["title"]." - ".$page_data[0]["page_display_name"]?></title>
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@1.*/css/pico.min.css">

    <script type="module" src="https://md-block.verou.me/md-block.js"></script>
</head>
<body>
    <header class="container">
    <nav>
        <ul>
            <li><strong>
                <?php 
                    echo $ini["title"];
                ?>
            </strong></li>
        </ul>
        <ul>
            <li><?php echo "<a href='/".$ini['url_root']."'>Home</a>"; ?></li>
        </ul>
    </nav>
        <?php
            $table = read_pages_table("../../data/pages.csv");
            $page = pathinfo(dirname(__FILE__, ))["basename"];
            $page_data = get_page_data($table, $page);
            echo "<h1>".$page_data[0]["page_display_name"]."</h1>";
        ?>
    </header>
    <main class="container">
        <?php
        ?>
        <md-block src="content.md"></md-block>
    </main>
    <?php include_once("../../php/includes/footer.php"); ?>
</body>
</html>