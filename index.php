<?php
require_once dirname(__FILE__) . '/config/config.php';
if (!$config) die('Fatal error: Cannot load file config file');
if (isset($_SESSION['administrator'])) {
    header('Location: _admin/index.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>OTA Server</title>
</head>
<body>
<div style="text-align: center;">
    OTA server in development
</div>
</body>
</html>