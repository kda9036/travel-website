<?php
    $page = "Grading Page";
    $path = "./";
    $heroimg = 'src="assets/images/Alexandria_bay_saint_lawrence_castle_05.07.2012.jpg" alt="Saint Lawrence River with Boldt Castle in the Distance"';
    $herotxt = '<h1>Grading Page</h1>';
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