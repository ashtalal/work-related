<?php

require '../connect.php'; //database connection

 
//successful processing

// $file = file_get_contents('users.json');
// $users = json_decode($file, true);
$id = $_GET['id'];

$sql = "select * users where id = '$id'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
extract($user);


echo '
<div class="form-group">
	<label>Username</label>
	<input name="username" class="form-control" type="text" value="'.$username.'">
	<label>Password</label>
	<input name="password" class="form-control" type="password" value="'.$password.'">
	<label>Confirm Password</label>
	<input name="confirm_password" class="form-control" type="password">
	<label>Email</label>
	<input name="email" class="form-control" type="email" value="'.$email.'">
';

	$roles = ['1', '2'];
	echo '
	<label>Role</label>
	<select class="form-control" name="user_role">';
		foreach ($roles as $role) {
			if ($role === $users[$id]['role'])
				echo '<option selected>' . $role . '</option>'; 
			else
				echo '<option>' . $role . '</option>';
			}
	echo'
	</select>
</div>';

