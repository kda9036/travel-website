<?php
    $page = "Thousand Islands Winery";
    $path = "./";
    $heroimg = 'src="assets/images/kym-ellis-aF1NPSnDQLw-unsplash.jpg" alt="Glass of red wine on a ledge with vineyard in background"';
    $herotxt = '<h1>Thousand Islands<br/>Winery</h1>';
    // header, nav, and hero includes
    include($path."assets/inc/header.php");
    include($path."assets/inc/nav.php");
    include($path."assets/inc/hero.php");

    // main content from database
    // connect to db
    include('../../../dbCon.php');
    // build query
    $sql = "SELECT content FROM finalContent WHERE page= '".$page."'";
    // execute query
    $result = $mysqli->query($sql);
    while($row = $result->fetch_assoc()) {
        echo $row['content'];
    }
    // close connection
    $mysqli->close();

    // footer include
    include($path."assets/inc/footer.php");
?>