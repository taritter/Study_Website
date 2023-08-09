<?php
$phpSelf = htmlspecialchars($_SERVER['PHP_SELF']);
$pathParts = pathinfo($phpSelf);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Tess and Freyja's Study Site</title>
        <link rel="icon" href="images/tessbucketlist.png">
        <meta name="author" content="Tess Ritter">
        <meta name="description" content="This site is to help you study and has many study tips.">
        <link rel="stylesheet" href="css/custom.css?version=<?php print time(); ?>" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet"
            media="(max-width:800px)"
            href="css/custom-tablet.css?version=<?php print time(); ?>"
            type="text/css">
        <link rel="stylesheet"
            media="(max-width:600px)"
            href="css/custom-phone.css?version=<?php print time(); ?>"
            type="text/css">
    </head>

    <?php
        print '<body class = "grid-layout positioning" 
                id="' . $pathParts['filename'] . '">';
        print '<!-- ###############   Start of Body element   ################### -->';
        include 'connect-DB.php';
        print PHP_EOL;
        include 'header.php';
        print PHP_EOL;
        include 'nav.php';
    ?>