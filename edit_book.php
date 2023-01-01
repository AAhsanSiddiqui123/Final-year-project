<?php
require 'conn.php';

////////////////////////////////////////////////////// session

session_start();
$session_name  = $_SESSION["username"];

if (isset($_POST['lotout_btn'])){
    
    session_unset();
    session_destroy();
    header("Location: login.php");
  }


//////////////////////////////////// talking value from user and update

$book_isbn = $_GET["isbn"];


$form_title = "Add Book";
$conrirm = "";

   if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Edit'])){

    $form_title = "Update Book";
    $_bookname = $_POST["bookName"];
    $_generation = $_POST["generation"];
    $_price = $_POST["price"];
    $_author = $_POST["author"];
    $_copyright = $_POST["copyRigt"];
    $_publisher = $_POST["publisher"];
    $_editionpages = $_POST["editionPages"];
    $_isbn = $_POST["isbn"];
    $_dept = $_POST["dept"];

    if($_bookname!="" && $_generation!="" && $_price!="" && $_author!="" &&  $_copyright!="" && $_publisher!=""
    && $_editionpages!="" && $_isbn!="" ){
    
                $sql = "UPDATE `book` SET `book_name` = '$_bookname', `generation` = '$_generation', `price` = '$_price', `author` = '$_author', `copy_right` = '$_copyright', `publisher` = '$_publisher', `edition_pages` = '$_editionpages', `department` = '$_dept' WHERE `book`.`ISBN` = $_isbn;";
                
                $result = mysqli_query($conn, $sql);

            if ($result){
                header("Location: viewBook.php");
            }else{
                $conrirm = "Fail to add";
            }

                 }else{

                    $conrirm = "Please fill all fields";

                 }

    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <script src="logic.js"></script> ---------------->
    <style>

*{margin: 0; padding: 0; box-sizing: border-box;}

.first_header{
    height: 4rem;
    width: 100%;
    background-color: white;
    display: flex;
    justify-content: space-around;
    align-items: center;
    
}
.first_header img{
    height: 50px;
    width: 50px;
}



.second_header{
    height: 4rem;
    width: 100%;
    background-color: #F8F6F8;
    display: flex;
    align-items: center;

    
}


/* this is the div which is hold form------------- */

.mid_middle{
    width: 40%;
    /* height: 550px; */
    background-color: white;
    margin: auto;
    margin-top: 0px;
    border: 1px solid black;
    border-radius: 5px;
}
.mid_middle-header{
    width: 100%;
    height: 3rem;
    background-color: #F8F6F8;
    padding: 5px;
    border-radius: 5px;
}
.mid_middle-headerH2{
    text-align: center;
}
.form_input{
    width: 100%;
    margin-top: 5px;
}
.form_div{
    width: 90%;
    margin: auto;
    margin-bottom: 7px;
}
.inner_form-div{
    padding: 5px;
}
.form_btn{
    background-color: #0677F1;
    border: 0;
    padding: 4px;
    border-radius: 4px;
}
.form_btn:hover{
    background-color: #92bae6;
}


/* an = ancher------------------ */

.first_hr{
    width:100%;
    height: 5px;
    background-color: #8F7CDE;
}
.second_hr{
    width:10%;
    height: 3px;
    background-color: black;
    
}
.second_headerAn{
    margin-left: 2rem;
    text-decoration: none;
    color: black;
    border:0;
    background-color: transparent;
}
.second_headerAn:hover{
    color: orangered;
}


    /* logout buttone */
.logout_btn{
text-decoration: none;
padding: 8px;
background-color: #18A2B8;
color: white;
border-radius: 3px;
border:0;
}
.logout_btn:hover{
    background-color: #09616e;
}

 </style>
</head>
<body>

    <!-- This is the main div container ------------- -->
<div class="container" style="height: 750px;">


    <!-- first_header in which img name and logout button ------->
<div class="first_header">
    <img src="images/logo.png" alt="">
    <!-- //////////////////////////////////////////////////// h3 -->
<h3>Hello -- <?php 
     if($session_name == "admin"){
        echo "admin";
    }else{
        echo $session_name;
    }
     
     
     ?></h3>

    <form action="" method="post">
        <button  class="logout_btn" name="lotout_btn"> Logout</button>
    </form>
</div>


    <!-- secon header in which All ancher tag and search  is available ---------->
<div class="second_header">

<!--------------------- home btn logic --------------------->
<?php

// border:0;
// background-color: transparent;
    
    if (isset($_POST['home_btn'])){

        if($session_name == "admin"){
        header("Location: admin.php");
    }else{
        header("Location: Librarian.php");
      }
    }


    ?>
    <form action="" method="post" >
        <button name="home_btn" class="second_headerAn">    Home    </button>
    </form>
    
</div>


    <!-- firs horizontal line after first and second header ------------>
<hr class="first_hr">



<h1>Books</h1>
<hr class="second_hr"> 


    <!-- mid_middle is a center div which holds the form ------------>
<div class="mid_middle">
<div class="mid_middle-header">
<h2 class="mid_middle-headerH2">Edit Book</h2>
</div>


    <!-- form start from here------------->
<div class="form_div">
<form action="" method="post">
<div class="inner_form-div">
    <label for="">Book Name</label>
    <input type="text" class="form_input" name="bookName">
</div>
<div class="inner_form-div">
    <label for="">Generation</label>
    <input type="text" class="form_input" name="generation">
</div>
<div class="inner_form-div">
    <label for="">Price</label>
    <input type="text" class="form_input" name="price">
</div>
<div class="inner_form-div">
    <label for="">Author</label>
    <input type="text" class="form_input" name="author">
</div>
<div class="inner_form-div">
    <label for="">Copy Right</label> 
    <input type="text" class="form_input" name="copyRigt">
</div>
<div class="inner_form-div">
    <label for="">publisher</label>
    <input type="text" class="form_input" name="publisher">
</div>
<div class="inner_form-div">
    <label for="">Edition Pages</label>
    <input type="text" class="form_input" name="editionPages">
</div>
<div class="inner_form-div">
    <label for="">ISBN</label>
    <input type="text" class="form_input" value="<?php echo $book_isbn;?>" name="isbn">
</div>
<div class="inner_form-div">
<select name="dept" >
    <option value="CS">Computer Science</option>
    <option value="MA">Math</option>
    <option value="AR">Arts</option>
    <option value="ME">Medical</option>
  </select>
</div>


    <!-- form button ----------->
<div class="inner_form-div">
<!-- <button class="form_btn" name="save">Save</button> -->
<button class="form_btn" name="Edit">Update</button>
<button class="form_btn" id="cancle" name="cancle">Cancle</button>
</div>

<div class="inner_form-div">
<h4 style="color: rgb(240, 39, 39);"><?php echo($conrirm)?></h4>
</div>

</form>
</div>




</div>

</div>
<script>
document.querySelector("#cancle").addEventListener("click",function(e){

    e.preventDefault()
    let selectedInput = document.querySelectorAll(".form_input");
    for (let i = 0; i <= selectedInput.length;i++)
    {
        selectedInput[i].value = "";
    }
});


</script>

</body>
</html>