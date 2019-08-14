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
 
if(isset($term) AND strlen($term)>3){
    // Attempt select query execution
    $sql = "SELECT * FROM education_office WHERE name LIKE '" . $term . "%'";
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                echo "<p>" . $row['name'] . "</p>";
            }
            // Close result set
            mysqli_free_result($result);
        } else{
            echo "<p>No matches found</p>";
        }
    } else{
        echo "ERROR: Could not able to execute $sql";
    }
}

?>

</body>
</html>