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

$student_name = $_GET["studentName"];
$student_roll = $_GET["studentRoll"];
  


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
    background-color: #091420"
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

    
    <input type="text" id="myInput" onkeyup="searchFun()" placeholder="search..." style="position: absolute; right: 10px; padding: 5px;">
</div>


    <!-- firs horizontal line after first and second header ------------>
<hr class="first_hr">


<h1>Books</h1>
<hr class="second_hr" style="margin-bottom: 15px;">

<table id="myTable">
<tr>
    <th class="table_th">Book Name</th>
    <th class="table_th">Generation</th>
    <th class="table_th">Price</th>
    <th class="table_th">Author</th>
    <th class="table_th">Copy Right</th>
    <th class="table_th">Publisher</th>
    <th class="table_th">Edition Pages</th>
    <th class="table_th">ISBN</th>
    <th class="table_th">Department</th>
    <th class="table_th">Action</th>

</tr>


    <?php

    $sql="SELECT * FROM `book`";
    $result = mysqli_query($conn, $sql);
	              while($row = mysqli_fetch_array($result))
                  {
                    echo "<tr>";
                    
                    $book__Name = $row["book_name"];
                    $book__isbn = $row["ISBN"];
                    echo "<td class='table_td'>"; echo $row["book_name"];  echo "</td>";
                    echo "<td class='table_td'>"; echo $row["generation"];  echo "</td>";
                    echo "<td class='table_td'>"; echo $row["price"];  echo "</td>";
                    echo "<td class='table_td'>"; echo $row["author"];  echo "</td>";
                    echo "<td class='table_td'>"; echo $row["copy_right"];  echo "</td>";
                    echo "<td class='table_td'>"; echo $row["publisher"];  echo "</td>";
                    echo "<td class='table_td'>"; echo $row["edition_pages"];  echo "</td>";
                    echo "<td class='table_td'>"; echo $row["ISBN"];  echo "</td>";
                    echo "<td class='table_td'>"; echo $row["department"];  echo "</td>";

                    /////// talkign data to issue book .php
                    echo "<td class='table_td'>"; 
                        echo "<a class='table_btn' id='table_btnDelete' href='issueBook.php?
                        stuName=$student_name&
                        stuRoll=$student_roll&
                        bookName=$book__Name&
                        bookisbn=$book__isbn' >Confirm</a>";  
                    echo "</td>";
                    
                  
                    echo "</tr>";
                    
                  }
                   
                                
    ?>
    




</table>

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


////////////////////////////  search  ///////////////////////////////
function searchFun() {
    let Userinput, find, tableRow, mytable;

    Userinput = document.getElementById("myInput");
    find = Userinput.value.toUpperCase();
    mytable = document.getElementById("myTable");
    tableRow = mytable.getElementsByTagName("tr");

    let tableData, cells, i, j;

    for (i = 1; i < tableRow.length; i++) {
      // intial hide row
      tableRow[i].style.display = "none";
    
      tableData = tableRow[i].getElementsByTagName("td");
        for (let j = 0; j < tableData.length; j++) {
          cells = tableRow[i].getElementsByTagName("td")[j];
            if (cells) {
             if (cells.innerHTML.toUpperCase().indexOf(find) > -1) {
               tableRow[i].style.display = "";
               break;
          } 
        }
      }
    }
  }





</script>

</body>
</html>