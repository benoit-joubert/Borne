<?php
$date = new DateTime('now');
;
?>
<html lang="fr-FR">
<head>
    <title>Borne</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="Application de gestion des recommandés" />
    <meta name="keywords" content="dnsii, mairie, urbanisme, aix-en-provence, recommandés" />

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <script type="text/javascript" src="javascript/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="javascript/script.js"></script>
</head>
<body>
<div id="currentDate">
    <?php echo $date->format('d-m-Y H:i');?>
</div>
<div id="centerLogo">
    <img src="images/blasonaix_officiel_2015.jpg">
</div>
<div id="searchDiv">
    <p>Tapez votre recherche :</p>
    <form id="searchInput">
        <input>
    </form>
</div>
</body>
</html>
