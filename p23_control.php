<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('p99_funcs.php');
session_start();
loginCheck();

require_once('p21_model.php');
$pdo = db_connect();
//$view = get_all_posts($pdo);

require_once('p22_view.php');
get_all_chat($pdo);
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    get_post_chat($pdo);
}

require'p99_footer.php';
?>