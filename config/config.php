<?php

/* General config */

$config['general']['site_url'] = "localhost";
$config['general']['site_name'] = "OTA XAFF";
$config['general']['passwordSalt'] = "faofAUfsafuz74";

/* User data */

$config['user']['email'] = "sm1leua@ya.ru";
$config['user']['username'] = "iSm1le";
$config['user']['initPassword'] = md5("admin" . $config['general']['passwordSalt']);

/* DATABASE CONFIG */
$mysql = array(
    "host" => "localhost",
    "user" => "dbuser1",
    "pass" => "dbuser1",
    "db" => "otaserver",
    "dbPrefix" => "ota_",
);

/* DON`T CHANGE ANYTHING UNDER THIS LINE IF YOU DON`T KNOW WHAT YOU DO */

if (!isset($_SESSION)) {
    session_start();
}

$config['mysqli'] = new mysqli($mysql['host'], $mysql['user'], $mysql['pass']);

if (!$config['mysqli']->query("CREATE DATABASE IF NOT EXISTS {$mysql['db']}")) die("DB check error");
$config['mysqli'] = new mysqli($mysql['host'], $mysql['user'], $mysql['pass'], $mysql['db']);

function checkTable($table, $mysqli)
{
    if ($mysqli->query("SELECT * FROM $table")->num_rows > 0) return true;
    return false;
}

$config['dbTables']['userAccounts'] = $mysql['dbPrefix'] . 'accounts';

if (!checkTable($config['dbTables']['userAccounts'], $config['mysqli'])) {
    $config['mysqli']->query("CREATE TABLE {$config['dbTables']['userAccounts']} (
                                    user_id INT NOT NULL AUTO_INCREMENT,
                                    email VARCHAR(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
                                    username VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
                                    password CHAR(41) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
                                    PRIMARY KEY (user_id),
                                    UNIQUE INDEX (email)
                                    ) ENGINE=INNODB;") or die("ERROR CREATING TABLE");
    $config['mysqli']->query("INSERT INTO `{$config['dbTables']['userAccounts']}` (`user_id`, `email`, `username`, `password`) VALUES (NULL, '{$config['user']['email']}', '{$config['user']['username']}', '{$config['user']['initPassword']}')");
};
