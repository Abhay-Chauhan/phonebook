<?php
    include('./dbcon.php');
    $id = ''; 
if( isset( $_POST['id'])) {
    $id = $_POST['id']; 
} 
    $query= "SELECT * FROM `contacts` WHERE `id`='$id'";
    $run= mysqli_query($connect, $query);
    $data= mysqli_fetch_assoc($run);

?>
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
		<form action="updatedata.php" method="post" enctype="multipart/form-data">
		<table align="center" class="contact-table">
			<tr>
				<td>Name</td>
				<td><input type="text" name="name" required="required" value=<?php echo $data['name']; ?>></td>
			</tr>
			<tr>
				<td>contact no</td>
				<td><input type="text" name="contact-no" value=<?php echo $data['phone_no'];?> required="required"></td>
			</tr>
			<tr>
				<td>Email id</td>
				<td><input type="text" name="email_id" value=<?php echo $data['email_id']; ?>></td>
			</tr>
            <tr>
				<td><input type="hidden" name="id" value=<?php echo $data['id']; ?> ></td>
			</tr>
			<tr>
				<td align="center" colspan="2"><input type="submit" name="submit" value="Update contact"></td>
			</tr>
		</table>
        <button class="home"><a href="index.php" style="text-decoration: none; color: #222;">HOME</a></button>
    </form>
</div>

</body>
</html>

<?php    
            if(isset($_POST['submit']))
            {
                $name=$_POST['name'];
                $phone=$_POST['contact-no'];
                $email= $_POST['email_id'];
                $id= $_POST['id'];

                $sql= "UPDATE `contacts` SET `name`='$name', `phone_no`='$phone', `email_id`='$email' WHERE `id`='$id'";
                $runsql= mysqli_query($connect, $sql);

                if($run==true)
                {
                    ?>
                        <script type="text/javascript">
                            alert('data updated successfully');
                            window.on('updatedata.php', _self);
                        </script>
                    <?php
                }
            }
?>