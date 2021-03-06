<!--
TODO: Reformular Contratos SW
TODO: Administrativo - stats
TODO: Admin - stats
TODO: change PW - bugged
TODO: logs
-->

<?php include_once 'php/session.php' ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SIGest | Início</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome Icons -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Theme style -->
    <link rel="stylesheet" href="css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <?php
    include 'header.php';
    if ($_SESSION["role"] == "comercial") include 'html/stats/com.php';
    if ($_SESSION["role"] == "tecnico") include 'html/stats/tec.php';
    if ($_SESSION["role"] == "admin") include 'html/stats/admin.php';
    if ($_SESSION["role"] == "administrativo") include 'html/stats/administrativo.php';
    include 'footer.php';
    ?>
</div>
<!-- ./wrapper -->

</body>
</html>