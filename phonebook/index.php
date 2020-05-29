<!DOCTYPE html>
<html>
<head>
    <title>Phone book </title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://kit.fontawesome.com/6262a67739.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="admintitle">
        <h1>Welcome to Phone book Application</h1>
    </div>
    <div class="div1" style="border: 1px solid black; margin-top: 8%">
        
        <table align="center" border="1" width="70%" style="margin-top: 1em">
		    <tr style="background-color: #a6b1e1">
                <th>S.no</th>
			    <th>Name</th>
			    <th>contact no</th>
			    <th>Email</th>
                <th>Edit Details</th>
                <th>Remove contact</th>
		    </tr>

            <?php
                include('./dbcon.php');
                //echo"hello";

                $query='SELECT * FROM `contacts` ORDER BY `name`';
                $run=mysqli_query($connect, $query);

                if(mysqli_num_rows($run)<1)
                {
                    echo "<h3>data not found</h3>";
                }
                else
                {
                    $count=0;
                    while($data=mysqli_fetch_assoc($run))
                    {
                        $count++;
                        ?>
                            <tr style="background-color: #e1f2fb;">
                                <td align="center"><?php echo $count;    ?></td>
                                <td align="center"><?php echo $data['name']    ?></td>
                                <td align="center"><?php echo $data['phone_no']    ?></td>
                                <td align="center"><?php echo $data['email_id']   ?></td>
                                <td align="center"><a href="updatedata.php?cid=<?php echo $data['id']; ?>"><?php echo "Edit contact";  ?></a></td>
                                <td align="center"><a href="deletedata.php?cid=<?php echo $data['id']; ?>"><?php echo "Remove contact";  ?></a></td>
                            </tr>
                        <?php
                    }
                }
            ?>
        </table>
        <button class="add-p"><a href="add_data.php"><i class="far fa-plus-square size:7x">Add new contact</i></button>   
    </div>
</body>
</html>



<!-- sir/mam when i am updating or deleting contact then its executing without any failure in my database as well as on my webpage 
    but after all this happening im getting error of undefined varaible dont know how but both my edit and removal is performing great
    and when u will again open index.php page then u will find updated or removed data. Thank you sir/mam -->