<?php
if (!empty($_POST)) {
	$user_id = $_POST['id'];

	include_once('DBconnect.php');
	include_once('DAO.php');
	$userDao = new DAO($pdo);

	$userDao->deleteUser($user_id);

	// redirect to list of users page
	header('Location: index.php');
}
exit;