<?php
require_once 'config.php';
session_start();
$con = mysqli_connect(
    $config['db']['host'],
    $config['db']['login'],
    $config['db']['pass'],
    $config['db']['db']
)
/**
 * Created by PhpStorm.
 * User: Варвара
 * Date: 05.07.2018
 * Time: 18:55
 */
?>
