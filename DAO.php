<?php
class DAO {
	private $db;

	public function __construct(PDO $db) {
		$this->datab = $db;
	}

	public function getAllUsers() {
		$sql = 'SELECT * FROM users';
		$sth = $this->datab->prepare($sql);
		$sth->execute();
		$users = $sth->fetchAll(PDO::FETCH_ASSOC);
		return $users;
	}

	public function getUser($user_id) {
		$sql = 'SELECT
					id,
					first_name,
					last_name,
					email
				FROM users
				WHERE
					id = :user_id';
		$sth = $this->datab->prepare($sql);
		$param = array(
			':user_id' => $user_id
		);
		$sth->execute($param);
		$user = $sth->fetch(PDO::FETCH_ASSOC);
		return $user;
	}

	public function addUser($user) {
		$sql = "INSERT INTO users
				SET
					first_name = :first_name,
					last_name = :last_name,
					email = :email,
					passwd = :passwd,
					created_at = CURRENT_TIMESTAMP";
		$sth = $this->datab->prepare($sql);
		$params = array(
			':first_name' => $user['first_name'],
			':last_name' => $user['last_name'],
			':email' => $user['email'],
			':passwd' => $user['passwd']
		);
		$sth->execute($params);
	}

	public function updateUser($user_id, $data) {
		$sql = "UPDATE users
				SET
					first_name = :first_name,
					last_name = :last_name,
					email = :email,
					passwd = :passwd
				WHERE
					id = :user_id";
		$sth = $this->datab->prepare($sql);
		// Bind data
		$params = array(
			':first_name' => $data['first_name'],
			':last_name' => $data['last_name'],
			':email' => $data['email'],
			':passwd' => $data['passwd'],
			':user_id' => $user_id
		);
		$sth->execute($params);
	}

	public function deleteUser($user_id) {
		$sql = "DELETE FROM users
				WHERE
					id = :user_id";
		$sth = $this->datab->prepare($sql);
		// Bind data
		$params = array(
			':user_id' => $user_id
		);
		$sth->execute($params);
	}
}