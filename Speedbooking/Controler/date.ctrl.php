<?php
require_once '../Model/DAO.class.php';
require_once '../Model/Date.php';



/*session_start();
$booker = $_SESSION['id'];
session_write_close();

$dao = new DAO();
$data['AllDate'] = $dao->readDateFromBooker($booker);
*/

$date =new Date();
$year = date('Y');
$dates=$date->getAll($year);
$days = $date->getDays();
$months= $date->getMonths();

include '../Views/view.interne.date.php';



