<?php
require_once dirname(__FILE__) . '/../../../config/config.php';
if (!$config) die('Fatal error: Cannot load config.php');
?>
<html>
<head>
    <meta name="msapplication-TileColor" content="#00aba9">
    <meta name="theme-color" content="#ffffff">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>ERROR-403</title>
    <style>
        html, body {
            height: 100%;
            width: 100%;
            margin: 0px;
        }

        .fit {
            display: block;
            margin-left: auto;
            margin-right: auto;
            max-width: 100%;
            max-height: 100%;
        }
    </style>
</head>
<body>
<a href="<?= $config['general']['site_url'] ?>">
    <img class="fit" src="/files/img/403.jpg">
</a>
</body>
</html>