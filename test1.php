<?php




if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['confirm'])){

}

$sql = "INSERT INTO `librarian`(`lib_name`, `lib_email`, `lib_phone`, `lib_address`, `lib_password`, `lib_cPassword`) 
VALUES ('$_Name','$_email','$_phoneNo','$_address','$_password','$_cPassword')";
$result = mysqli_query($conn, $sql);


$sql = "UPDATE `book` SET `book_name` = '$_bookname', `generation` = '$_generation', `price` = '$_price', `author` = '$_author', `copy_right` = '$_copyright', `publisher` = '$_publisher', `edition_pages` = '$_editionpages', `department` = '$_dept' WHERE `book`.`ISBN` = $_isbn;";


$sql = "SELECT * FROM librarian where lib_name= '$_userName' AND lib_password='$_password'";

$sql="SELECT * FROM `book`";
    $result = mysqli_query($conn, $sql);

    
	              while($row = mysqli_fetch_array($result))


text-decoration: none;

?>