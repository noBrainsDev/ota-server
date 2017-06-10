<?php

ob_start();

ignore_user_abort(true);

//Including files
require_once dirname(__FILE__) . '/../config/config.php';
require_once dirname(__FILE__) . '/plugins/class.phpmailer.php';
require_once dirname(__FILE__) . '/plugins/class.smtp.php';
require_once dirname(__FILE__) . '/plugins/timeconvert.php';

//Getting the post "action"
if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'login':
            $email = mysqli_real_escape_string($config['mysqli'], $_POST['email']);
            $password = mysqli_real_escape_string($config['mysqli'], $_POST['password']);

            if ($email != '' || $password != '' || $email != null || $password != null) {
                $password = md5(mysqli_real_escape_string($config['mysqli'], $_POST['password'] . $config['general']['passwordSalt']));
                $get_user = $config['mysqli']->query("SELECT * FROM {$config['dbTables']['userAccounts']} WHERE email='$email' AND password='$password'");
                if ($get_user->num_rows == 1) {
                    $_SESSION['administrator'] = $email;
                    header("Location: ../{$config['path']['admin_interface']}/index.php");
                } else {
                    header("Location: ../{$config['path']['admin_interface']}/login.php?login=wrong");
                }
            } else {
                header("Location: ../{$config['path']['admin_interface']}/login.php?login=fields");
            }
            break;
    }
}
if (isset($_GET)) {
    switch ($_GET['action']) {
        case 'logout':
            session_destroy();
            header("Location: ../{$config['path']['admin_interface']}/login.php");
            break;
    }
}
