<?php
	include_once('DBconnect.php');
	include_once('DAO.php');
	$userDao = new DAO($pdo);
	$users = $userDao->getAllUsers();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Users</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-theme.css">
</head>
<body>
<div class="container">
	<h1>
        <i class="glyphicon glyphicon-user"></i>
        Users
        <a class="btn btn-primary" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#add"><i class="glyphicon glyphicon-plus"></i></a>
    </h1>
    <table class="table table-striped table-condense table-hover">
    	<tr>
    		<th>Table #</th>
    		<th>ID</th>
    		<th>Full Name</th>
    		<th>Email</th>
    		<th>Date Created</th>
    		<th>Options</th>
    	</tr>
    	<?php $first = 0; ?>
    	<?php foreach ($users as $user): ?>
	    	<tr>
		        <td>
			        <?php
				        $current = $user['id'];
				        if ($first < 1){
					        if ($current != 1) {
					        	echo 1;
					        	$first = 2;
					        } else {
					        	echo $user['id'];
					        	$first = 2;
					        }
					    } elseif ($first > 1) {
					    	echo $first;
					    	$first++;
					    }
			        ?>
		        </td>	<!--Table #-->
		        <td>
		        	<?php echo $user['id']; ?>
		        </td>
		        <td>
		        	<?php
				    $full_name = $user['first_name'];
				    $full_name .= ' ' . $user['last_name'];
				    echo $full_name;
				    ?>
				</td>	<!--FULL NAME-->
		        <td><?php echo $user['email'] ?></td>	<!--EMAIL-->
		        <td><?php echo $user['created_at'] ?></td>	<!--TIME-->
		        <td>
		            <a class="btn btn-xs btn-primary" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#edit" href="edit-user.php?id=<?php echo $user['id']; ?>"><i class="glyphicon glyphicon-pencil"></i></a>
		            <a class="btn btn-xs btn-danger" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#del" href="delete-user.php?id=<?php echo $user['id']; ?>"><i class="glyphicon glyphicon-trash"></i></a>
		        </td>
    		</tr>
    	<?php endforeach; ?>

    </table>

<!-- Modal Delete-->
	<div class="modal fade" id="del" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
			</div>
		</div>
	</div>
<!-- Modal Edit-->
	<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			</div>
		</div>
	</div>
<!-- Modal Add-->
	<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
		    <div class="modal-header">
		    	<h4 class="modal-title" id="myModalLabel">Add User</h4>
		    </div>
		    <div class="modal-body">
				<form method="POST" action="add-user.php">
					<label class="control-label">First Name</label>
				    	<input type="text" class="form-control" name="first_name" placeholder="Juan">
					<label class="control-label">Last Name</label>
				    	<input type="text" class="form-control" name="last_name" placeholder="Dela Cruz">
					<label class="control-label">Email</label>
				    	<input type="text" class="form-control" name="email" placeholder="gmail@chucknorris.com">
					<label class="control-label">Password</label>
				    	<input type="password" class="form-control" name="passwd" placeholder="abc123">
				    <br>
				    <div class="modal-footer">
				    	<input class="btn btn-default" type="submit">
				    </div>
			    </form>
		    </div>
			</div>
		</div>
	</div>

</div>
<script type="text/javascript" src="jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="bootstrap.js"></script>
</body>
</html>