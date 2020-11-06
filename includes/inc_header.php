<?php
require_once 'app/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?= BASEPATH;?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS MASTER -->
    <link rel="stylesheet" href="<?=CSS;?>master.css">

    <!-- ANIMATE CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">

    <!-- BOOTTRAP 4 -->
    <link rel="stylesheet" href="<?=CSS;?>bootstrap.min.css">

    <!-- WAITME -->
    <link rel="stylesheet" href="assets/plugins/waitMe/waitMe.min.css">

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <title><?= (isset($data['title']) ? $data['title'] : 'Carrito');?></title>
    
</head>
<body>
 