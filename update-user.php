<?php
if (!empty($_POST)) {
	$user_id = $_POST['id'];
	$new_data = array(
		'first_name' => $_POST['first_name'],
		'last_name' => $_POST['last_name'],
		'email' => $_POST['email']
	);

	include_once('DBconnect.php');
	include_once('DAO.php');
	$userDao = new DAO($pdo);

	$userDao->updateUser($user_id, $new_data);

	// redirect to list of users page
	header('Location: index.php');
}
exit;