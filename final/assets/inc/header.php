<!-- Kelly Appleton, ISTE-240, 2205 -->
<!-- Individual Project -->
<!-- Alexandria Bay, NY -->
<!-- Spring 2021 -->

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $page; ?></title>
    <!-- load favicon image in browser tab-->
    <link rel="icon" href="<?php echo $path; ?>assets/images/heart_plain.png">
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto+Slab&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo $path; ?>./assets/css/styles.css">
</head>
<body onresize="showNav()">

    <div class="wrapper">
        
        <!-- Header/Nav Logo -->
        <div id="header" class="sticky">
        <div class="logo">
            <img src="<?php echo $path; ?>assets/images/abaylogo_transparent_noBG.png" alt="Logo of Alexandria Bay" />
        </div>