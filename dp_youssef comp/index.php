<html>
    <head>
       <titel> Employees table</titel>
       <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    </head>
    <body>
        <?php
   include 'DB_CONNECTION.PHP';
   if(isset($_GET['ID'])){
    $query="delete from empolyees where EMP_ID=$_GET[ID]";
    $result=mysqli_query($mysqli,$query);
}
        $query="select * from empolyees";
        echo
    '<table class="table table-striped table-dark">
    <thead class="thead-dark">
        <tr> 
          <th scope="col">#</font> </th> 
          <th scope="col">Employee Name</font> </th> 
          <th scope="col">salary</font> </th> 
          <th scope="col">Address</font> </th> 
          <th scope="col">Department</font> </th>
          <th scope="col">Edit</font> </th>
      </tr>
      </thead>';
      if ($result = $mysqli->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $EMP_ID = $row ["EMP_ID"];
            $EMP_NAME = $row["EMP_NAME"];
            $SAL = $row["SAL"];
            $ADDRESS = $row["ADDRESS"];
            $DEP = $row["DEP"]; 
            echo '<tr> 
                   <td>'.$EMP_ID.'</td>
                  <td>'.$EMP_NAME.'</td> 
                  <td>'.$SAL.'</td> 
                  <td>'.$ADDRESS.'</td> 
                  <td>'.$DEP.'</td>
                  <td><a href="./employeesform.php?EMP_ID='.$EMP_ID.'">update</a></td> 
                  <td><a href="./index.php?ID='.$EMP_ID.'">delet</a></td>   
              </tr>';
    }
    $result->free();
} 
        ?>
    </body>
</html>