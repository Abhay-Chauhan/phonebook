<!DOCTYPE html>
<html>
<head>
    <title>Phone book </title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="admintitle">
        <h1>Welcome to Phone book Application</h1>
    </div> <br>
    <div class="contact-div" style="background-color: #e1f2fb;">
		<form action="add_data.php" method="post" enctype="multipart/form-data">
		<table align="center" class="student-table">
			<tr>
				<td>Name</td>
				<td><input type="text" name="name" required="required" placeholder="Enter your name"></td>
			</tr>
			<tr>
				<td>contact no</td>
				<td><input type="text" name="contact-no" placeholder="Enter your contact no" required="required"></td>
			</tr>
			<tr>
				<td>Email id</td>
				<td><input type="text" name="email_id" placeholder="Enter your email-id"></td>
			</tr>
			<tr>
				<td align="center" colspan="2"><input type="submit" name="submit" value="Add contact"></td>
			</tr>
		</table>
	</form>
	<button><a href="index.php" style="text-decoration: none; color: #222;">HOME</a></button>
</div>
</body>
</html>

<?php 
		if(isset($_POST['submit']))
		{
			include('./dbcon.php');
			$name=$_POST['name'];
			$phone=$_POST['contact-no'];
			$email=$_POST['email_id'];

			$query= "INSERT INTO `contacts`(`name`, `phone_no`, `email_id`) VALUES ('$name','$phone','$email')";
			$run= mysqli_query($connect, $query);

			if($run==true)
			{
				?>
					<script type="text/javascript">
						alert('contact has been added successfully');
						window.on('add_data.php', _self);
					</script>

				<?php
			}
		}
?>