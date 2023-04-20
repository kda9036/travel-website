<?php
    $page = "Bay Drive-in Theatre";
    $path = "./";
    $heroimg = 'src="assets/images/drive-in-theater-5164482_1920.jpg" alt="Cars lined up in front of a drive-in movie screen"';
    $herotxt = '<h1>Bay Drive-in<br/>Theatre</h1>';
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