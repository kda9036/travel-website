<?php
    $page = "Alexandria Bay, NY";
    $path = "./";
    $heroimg = 'src="assets/images/boldt_castle_panoramic_resized.jpg" alt="View of Boldt Castle"';
    $herotxt = '<h2>ABay: A+ Reasons to Visit</h2>
                    <h1>Alexandria Bay, NY</h1>
                    <h3>The <img id="heart" style="" src="assets/images/heart_plain.png" alt="heart icon" width="40"/>of the Thousand Islands</h3>';
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