<?php 
include("database.php");
ob_start();
?>
<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("p").hover(function(){
        $(this).css("color", "#cc6633");
        }, function(){
        $(this).css("color", "white");
    });
});
</script>
</head>
<body>



<?php

$database = new Database();
$link = $database ->connection;
$term = mysqli_real_escape_string($link, $_REQUEST['term']);
global $xx;
if(isset($term)){
    // Attempt select query execution
    $sql = "SELECT * FROM teacher WHERE nic LIKE '%" . $term . "%' LIMIT 10";
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                echo "<p>" . $row['nic'] . "</p>";
                echo "<p>" . $row['first_name'] ." ".$row['last_name'] ." ". "</p>";
                echo $row['division'];
                $division = $database -> table_by_id($row['division'],'education_office','office_no');
                echo "<p>" . $division['name'] . "</p>";
                echo "<p>" . $row['race'] . "</p>";
                echo "<p>" . $row['religion'] . "</p>";
                echo "<p>" . $row['civil_status'] . "</p>";
                echo "<p>" . $row['medium'] ." "."medium". "</p>";
                echo "<p>" . $row['edu_quali'] . "</p>";
                echo "<p>" . $row['prof_quali'] . "</p>";
                echo "<p>" . $row['cur_function'] . "</p>";
                echo "<p>" . $row['main_sub'] . "</p>";
                echo "<p>" . $row['sec_sub'] . "</p>";
                echo "<p>" . $row['third_sub'] . "</p>";
                echo "<p>" . $row['forth_sub'] . "</p>";
                $xx = $row['fifth_sub'];
                
            }
            // Close result set
            mysqli_free_result($result);
        } else{
            echo "";
        }
    } else{
        echo "ERROR: Could not able to execute $sql";
    }
}

?>

</body>
</html>