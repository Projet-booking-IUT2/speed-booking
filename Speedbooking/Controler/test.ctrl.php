<?php

require_once '../Model/DAO.class.php';

$dao = new DAO();

$data['devs'] = $dao->readDev();

include("../Views/test.view.php");