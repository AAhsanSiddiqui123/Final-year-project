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


//////////////////////////////////// talking value from user and insert in to data base

$student__name = $_GET["stuName"];
$student__roll = $_GET["stuRoll"];
$book__Name = $_GET["bookName"];
$book__isbn= $_GET["bookisbn"];
  

$form_title = "Add Book";
$conrirm = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['confirm'])){

    $_stuName = $_POST["StudentName"];
    $_RollNO = $_POST["rollNo"];
    $_days = $_POST["days"];
    $_bookName = $_POST["bookName"];
    $_bookISBN = $_POST["bookISBN"];
  
///////////////////////////////////////////// storing issue and due date in data base


$new_date = date("Y-m-d");
$to_date = time();
$day_dif = $_days;
$from_date = strtotime($new_date. " + $day_dif days");

$cur_date  = date("Y-m-d",$to_date);
$due_date  = date("Y-m-d",$from_date);



    $sql = "INSERT INTO `issued_book`(`Student_name`, `roll_No`, `days`, `book_name`, `book_isbn`,`date`,`due_Date`) 
    VALUES ('$_stuName','$_RollNO','$_days','$_bookName','$_bookISBN', '$cur_date','$due_date')";
    $result = mysqli_query($conn, $sql);

    header("Location: view_issued_book.php");
    
    if ($result){
        header("Location: view_issued_book.php");
    }else{
        $conrirm = "Fail To add ";
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


/* this is the div thich is hild form------------- */

.mid_middle{
    width: 40%;
    height: 400px;
    background-color: white;
    margin: auto;
    margin-top: 2px;
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
    /* input field --------------------- */
.form_input{
    width: 100%;
    margin-top: 5px;
    height: 28px;
    
}
.form_div{
    width: 90%;
    margin: auto;
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

    /* logout button -----------------------*/

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
   /* table TD and TH and TR start here -------------*/
.table_td{
    text-align: center;
    padding: 10px;
}
.table_th{
    width: 100vw;
    text-align: center;
    padding: 5px;
    color: white;
    background-color: rgb(3, 63, 63);
    border-radius: 5px;
}
tr:hover{
    background-color: rgb(159, 179, 179);
}


/* table Button and logout button css start here -------------*/
.table_btn{
    padding: 5px;
    margin: 1px;
    color: rgb(255, 255, 255);
    text-decoration: none;
    border-radius: 5px;
}
#table_btnEdit{
    background-color: #0069D9;
}
#table_btnEdit:hover{
    background-color: #073d74;
}
#table_btnDelete{
    background-color: #C82333;
}
#table_btnDelete:hover{
    background-color: #911b27;
}

 </style>

 </style>
</head>

    <!-- HTML code start --------------------------------------------------------------------------------- -->
<body>

    <!-- This is the main div container ------------- -->
<div class="container">



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


    <!-- second header in which All ancher tag and search  is available ---------->

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



    <!-- mid_middle is a center div which holds the form ------------>
<div class="mid_middle">
<div class="mid_middle-header">
<h2 class="mid_middle-headerH2">ISSUE BOOKS</h2>
</div>


    <!-- form start from here------------->
<div class="form_div">
<form action="" method="post">
<div class="inner_form-div">
    <label for="">Student Name</label>
    <input type="text" class="form_input" name="StudentName" value="<?php echo $student__name; ?>">
</div>
<div class="inner_form-div">
    <label for="">Roll No</label>
    <input type="text" class="form_input" name="rollNo" value="<?php echo $student__roll; ?>">
</div>
<div class="inner_form-div">
    <label for="">Days</label>
    <input type="text" class="form_input" name="days">
</div>
<div class="inner_form-div">
    <label for="">Book Name</label>
    <input type="text" class="form_input" name="bookName" value="<?php echo $book__Name; ?>">
</div>
<div class="inner_form-div">
    <label for="">Book ISBN</label> 
    <input type="text" class="form_input" name="bookISBN" value="<?php echo $book__isbn; ?>">
</div>



    <!-- form button ----------->
<div class="inner_form-div">
<button class="form_btn" name="confirm">Confirm</button>
<button class="form_btn" id="cancle" name="cancle">Cancle</button>

</div>
<?php echo($conrirm)?>
</form>
</div>




</div>

</div>


<script>
//////////////////////////   cancle input   ////////////////////////
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