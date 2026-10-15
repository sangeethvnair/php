<?php
include "db.php";
if(isset($_GET['delete']))
{
    $id=(int)$_GET['delete'];
    mysqli_query($conn,"delete from products where id='$id'");
}
?>

<h2>product list</h2>

<?php
$result=mysqli_query($conn,"select * from products");
while($row=mysqli_fetch_assoc($result)){
    echo "product:".$row['name']."<br>";
    echo "price:". $row['price']."<br>";
    echo "<a href='product.php?delete=".$row['id']."'>delete</a>";
    echo "<br>";
    }
    ?>
