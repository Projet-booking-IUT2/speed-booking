<?php
require_once '../Model/DAO.class.php';

session_start();
$booker = $_SESSION['id'];
session_write_close();

$dao = new DAO();
$data['AllDate'] = $dao->readDateFromBooker($booker);


