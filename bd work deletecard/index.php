<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

<?php
$result = mysql_query("select * from first_table");
?>
<table class="table table-striped">
	<thead class="thead-dark">
	<tr>
		<th>User Id</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Email</th>
		<th>Company</th>
		<th>Phone Number</th>
		<th>City</th>
		<th>state</th>
		<th>Action</th>
	</tr>
	</thead>
	
	<?php
while($row = mysql_fetch_assoc($result))
{
	?>
	<tr>
		<td><?php echo $row['user_id'];?></td>
		<td><?php echo $row['first_name'];?></td>
		<td><?php echo $row['last_name'];?></td>
		<td><?php echo $row['email'];?></td>
		<td><?php echo $row['company'];?></td>
		<td><?php echo $row['phone'];?></td>
		<td><?php echo $row['city'];?></td>
		<td><?php echo $row['state'];?></td>
		<td>
			
<button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#myModal_<?php echo $row['user_id'];?>">Edit</button>
			
<input type="submit" value="delete" name="delete" class="btn btn-outline-danger" data-toggle="modal" data-target="#myModal2_<?php echo $row['user_id'];?>">
			
			<div id="myModal2_<?php echo $row['user_id'];?>" class="modal modal-lg">
      <div class="modal-content">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
	<h2>Delete Data the id =<?php echo $row['user_id'];?></h2>
		  <button onclick="myFunction()">Delete</button>
		  </div>
				</div>
			
<?php
$users= mysql_query("SELECT * FROM `first_table` WHERE `user_id`= '$_GET[$user_id]'");
	
while($results=mysql_fetch_assoc($users)){
	
$user_id = $results['user_id'];
$first_name =$results['first_name'];
$last_name =$results['last_name'];
$email =$results['email'];	
$company=$results['company'];
$phone=$results['phone'];
$city =$results['city'];
$state = $results['state'];	
}

	
$querys="DELETE FROM first_table WHERE user_id = $user_id";
mysql_query($querys);
?>
		  
</td>
</tr>
	
	<div id="myModal_<?php echo $row['user_id'];?>" class="modal modal-lg">
      <div class="modal-content container">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
	<h2>Edit Data</h2>

	<form method="POST">
		<div class="form-group">
			<label>Enter user Id</label>	
            <input type="text" class="form-control" name="user_id" value="<?php echo $row['user_id'];?>"><br><br>
        </div>
		<div class="form-group">
			<label>Enter First Name</label>
	        <input type="text" class="form-control" name="first_name" value="<?php echo $row['first_name'];?>"><br><br>
        </div>
		<div class="form-group">
			<label>Enter the Last Name</label>
	        <input type="text" class="form-control" name="last_name" value="<?php echo $row['last_name'];?>"><br><br>
        </div>
		<div class="form-group">
			<label>Enter the email Id</label>
	        <input type="text" class="form-control" name="email" value="<?php echo $row['email'];?>"><br><br>
        </div>
		<div class="form-group">
			<label>Enter the company name</label>
	        <input type="text" class="form-control" name="company" value="<?php echo $row['company'];?>"><br><br>
        </div>
		<div class="form-group">
			<label>Enter the Phone number</label>
	        <input type="text" class="form-control" name="phone" value="<?php echo $row['phone'];?>"><br><br>
        </div>
		<div class="form-group">
			<label>Enter the city name</label>
	        <input type="text" class="form-control" name="city" value="<?php echo $row['city'];?>"><br><br>
        </div>
		<div class="form-group">
			<label>Enter the state</label>
	        <input type="text" class="form-control" name="state" value="<?php echo $row['state'];?>"><br><br>
        </div>
	    <input type="submit" class="btn" name="edit" value="edit" >
			
<?php
	
if(isset($_POST['edit'])) {
	$userid =  $_POST['user_id'];
	$firstname =  $_POST['first_name'];
	$lastname =  $_POST['last_name'];
	$emailid =  $_POST['email'];
	$companyname = $_POST['company'];
	$phonenumber = $_POST['phone'];
	$cityname = $_POST['city'];
	$statename = $_POST['state'];
 
$editt = "UPDATE `first_table` SET `first_name`='$firstname',`last_name`='$lastname',`email`='$emailid',`company`='$companyname',`phone`='$phonenumber',`city`='$cityname',`state`='$statename' WHERE `user_id` = '$userid'";
	
	$qry = mysql_query($editt);
	
}
?>
<?php } ?>
		  
</form>
</div>
</div>			
</table>











<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
