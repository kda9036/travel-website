<?php
    $page = "ABay Dining";
    $path = "./";
    $heroimg = 'src="assets/images/fabio-alves-tN3CDxTkx0Q-unsplash.jpg" alt="People raising a toast at a restaurant table"';
    $herotxt = '<h1>Dining</h1>';
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