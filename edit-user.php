<?php
$user_id = $_GET['id'];

include_once('DBconnect.php');
include_once('DAO.php');
$userDao = new DAO($pdo);

$user = $userDao->getUser($user_id);
?>
<form method="POST" action="update-user.php">
<div class="modal-header">
	<h4 class="modal-title" id="myModalLabel">Edit</h4>
</div>
<div class="modal-body">
	    	<input type="hidden" name="id" value="<?php echo $user['id']; ?>">
		<label class="control-label">First Name</label>
	    	<input type="text" class="form-control" name="first_name" placeholder="<?php echo $user['first_name']; ?>">
		<label class="control-label">Last Name</label>
	    	<input type="text" class="form-control" name="last_name" placeholder="<?php echo $user['last_name']; ?>">
		<label class="control-label">Email</label>
	    	<input type="text" class="form-control" name="email" placeholder="<?php echo $user['email']; ?>">
	    <br>
	    <div class="modal-footer">
	    	<input class="btn btn-default" type="submit" value="Update User">
	    </div>
</div>
</form>