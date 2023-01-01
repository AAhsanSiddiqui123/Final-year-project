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




?>     



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

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

    /* First header and second Header css start here ------------*/

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
#table_btnissue{
    background-color: #0069D9;
}
#table_btnissue:hover{
    background-color: #073d74;
}
#table_btnDelete{
    background-color: #C82333;
}
#table_btnDelete:hover{
    background-color: #911b27;
}
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

    <!-- HTML ------------------------------------------------------------------------------------- -->
<div class="container">

         
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


    <a href="addStudent.php" class="second_headerAn">Add Student</a>
    <input type="text" id="myInput" onkeyup="searchFun()" placeholder="search..." style="position: absolute; right: 10px; padding: 5px;">
</div>



<hr class="first_hr">



<h1>Student</h1>
<hr class="second_hr" style="margin-bottom: 15px;">

    <!-- Table start here---------------------- -->
<div class="mid_middle"></div>
<table id="myTable" >
<tr>
    <th class="table_th">Name</th>
    <th class="table_th">Roll No</th>
    <th class="table_th">Email</th>
    <th class="table_th">Phone No</th>
    <th class="table_th">Address</th>
    <th class="table_th">Achtion</th>

</tr>


    <?php

    $sql="SELECT * FROM `student`";
    $result = mysqli_query($conn, $sql);
	              while($row = mysqli_fetch_array($result))
                  {
                    echo "<tr>";
                    $stu_name=$row["Studen_name"];
                    $stu_roll=$row["roll_No"];
                    echo "<td class='table_td'>"; echo $row["Studen_name"];  echo "</td>";
                    echo "<td class='table_td'>"; echo $row["roll_No"];  echo "</td>";
                    echo "<td class='table_td'>"; echo $row["email"];  echo "</td>";
                    echo "<td class='table_td'>"; echo $row["phone_No"];  echo "</td>";
                    echo "<td class='table_td'>"; echo $row["address"];  echo "</td>";
                    echo "<td class='table_td'>"; 
                    echo "<a class='table_btn' id='table_btnDelete' href='delete_stu.php?roll=$stu_roll' name='delete_btn' >Delete</a>"; 

                    echo "<a class='table_btn' id='table_btnissue' href='bookData_issue.php? studentName=$stu_name&studentRoll=$stu_roll' >Issue Book</a>"; 
                    echo "</td>";
                    
                    echo "</tr>";
                    
                  }
    
                  
    ?>
    




</table>

</div>
<script>
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
