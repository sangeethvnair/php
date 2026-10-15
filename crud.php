<?php
include "db.php";
if(isset($_POST['add']))
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	$course=$_POST['course'];
	mysqli_query($conn,"insert into students(name,email,course)values('$name','$email','$course')");
}
if(isset($_POST['update']))
{
	$id=$_POST['id'];
	$name=$_POST['name'];
	$email=$_POST['email'];
	$course=$_POST['course'];
	mysqli_query($conn,"update students set name='$name',email='$email',course='$course' where id='$id'");
}
if(isset($_GET['delete']))
{
	$id=$_GET['delete'];
	mysqli_query($conn,"delete from students where id=$id");
}
?>
<h2>ADD STUDENT</h2>
<form method="POST">
name:
	<input type="text" name="name" required><br>
email:
	<input type="email" name="email"><br>
course:
	<input type="course" name="course"><br>
	<input type="submit" name="add" value="add">
	</form>
	
<h2>update students</h2>
<form method="POST">
id:
	<input type="number" name="id">
name:
	<input type="text" name="name">
email:
	<input type="email" name="email">
course:
	<input type="course" name="course">
	<input type="submit" name="update" value="update">
</form>

<h2>students records</h2>
<?php
	$result=mysqli_query($conn,"select * from students");
	while($row=mysqli_fetch_assoc($result))
	{
		echo $row['id']."_";
		echo $row['name']."_";
		echo $row['email']."_";
		echo $row['course']."_";
		
		echo "<a href='crud.php?
			delete=".$row['id']."'>
			delete</a>";		
		echo "<br>";
	}
?>


	
