<?php
include "db.php"
?>

<h2>search student</h2>
<form method="POST">
    <input type="text" name="name" placeholder="enter name">
    <input type="submit" name="search" value="search">
</form>


<?php
if(isset($POST['search'])){
    $name=$_POST['name'];
    $result=mysqli_query($conn,"select * from student where name like '%$name'");
while($row=mysqli_fetch_assoc($result)){
    echo "id".$row['id']."<br>";
    echo "name".$row['name']."<br>";
    echo "email".$row['email']."<br>";
    echo "course".$row['course']."<br>";

}
}
?>