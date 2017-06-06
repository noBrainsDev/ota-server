<?php

ob_start();

ignore_user_abort(true);

//Including files
require_once dirname(__FILE__) . '/../config/config.php';
require_once dirname(__FILE__) . '/plugins/class.phpmailer.php';
require_once dirname(__FILE__) . '/plugins/class.smtp.php';
require_once dirname(__FILE__) . '/plugins/timeconvert.php';

//Getting the post "action"
switch ($_POST['action']) {
    case 'login':
        $email = mysqli_real_escape_string($config['mysqli'], $_POST['email']);
        $password = md5(mysqli_real_escape_string($config['mysqli'], $_POST['password'] . $config['general']['passwordSalt']));

        $get_user = $config['mysqli']->query("SELECT * FROM {$config['dbTables']['userAccounts']} WHERE email='$email' AND password='$password'");
        if ($email != '' || $password != '' || $email != null || $password != null) {
            if ($get_user->num_rows == 1) {
                $_SESSION['administrator'] = $email;
                header('Location: ../_admin/index.php');
            } else {
                header('Location: ../_admin/login.php?login=wrong');
            }
        } else {
            header('Location: ../_admin/login.php?login=fields');
        }
        break;
}
