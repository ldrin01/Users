<?php
$user_id = $_GET['id'];

include_once('DBconnect.php');
include_once('DAO.php');
$userDao = new DAO($pdo);

$user = $userDao->getUser($user_id);
?>
<div class="modal-header">
	<h4 class="modal-title" id="myModalLabel">Are you sure?</h4>
</div>
<div class="modal-body">
	<form method="POST" action="remove-user.php">
	    <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
    	<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
    	<input class="btn btn-default" type="submit" value="Yes">
    </form>
</div>