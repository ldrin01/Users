<?php
if (!empty($_POST)) {
	$user = array(
		'first_name' => $_POST['first_name'],
		'last_name' => $_POST['last_name'],
		'email' => $_POST['email'],
		'passwd' => $_POST['passwd']
	);

	include_once('DBconnect.php');
	include_once('DAO.php');
	$userDao = new DAO($pdo);

	$userDao->addUser($user);

	// redirect to list of users page
	header('Location: index.php');
}
exit;