<html>
<head>
    <titel>employees form </titel>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="./registration.css" type="text/css">
</head>
<body>
    <?php
    $EMP_ID="";
    $EMP_NAME="";
    $SAL="";
    $ADDRESS="";
    $DEP="";
require_once 'DB_CONNECTION.PHP';
if(isset($_GET['EMP_ID'])){
    $query="select*from empolyees where EMP_ID=$_GET[EMP_ID]";
    //var_dump($query);
    if ($result = $mysqli->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $EMP_ID = $row ["EMP_ID"];
            $EMP_NAME = $row["EMP_NAME"];
            $SAL = $row["SAL"];
            $ADDRESS = $row["ADDRESS"];
            $DEP = $row["DEP"];
        }
        $result->free();
    }
}
?>
        <h2> Registration for employees </h2>
        <form name=myForm action ="./employees.php"  method="post">
            <div>
                <label for="EMP_NAME"> Employee Name: </label>
                <input type="text" name="EMP_NAME" placeholder="Employee Name" required value="<?php echo htmlspecialchars($EMP_NAME);?>">
            </div>
            <div>
            <label for="SAL"> salary: </label>
                <input type="number" name="SAL" placeholder="salary expected" required value="<?php echo htmlspecialchars($SAL);?>">
            </div>
            <div>
                <label for="ADDRESS"> Address: </label>
                <input type="text" name="ADDRESS" placeholder="Address" required value="<?php echo htmlspecialchars($ADDRESS);?>">
            </div>
            <div>
                <label for="DEP"> Department: </label>
                <input type="text" name="DEP" placeholder="department" required value="<?php echo htmlspecialchars($DEP);?>">
            </div>
            <div>
                <input type="hidden" name="EMP_ID" value="<?php echo htmlspecialchars($EMP_ID);?>">
            </div>
            <input type="submit" value="Submit">
        </form> 
</body>
</html>

