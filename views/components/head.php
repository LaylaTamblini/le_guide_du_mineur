<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= parse_ini_file(".env")["APP_NAME"] ?> <?= $titre ?? "" ?></title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>