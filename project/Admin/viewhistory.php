<?php
    // echo "Search records";
    include '/Applications/XAMPP/xamppfiles/htdocs/project/db_connection.php';
    $conn = OpenCon();
    // echo "Connected Successfully";

    $au_id = "";

    //if some nonempty value has been entered as query..
    if(isset($_POST['au_id'])) 
    {
        $au_id = $_POST['au_id'];
        
        $sql = "SELECT * FROM MANAGES WHERE au_id = '$au_id'";
        $result = $conn->query($sql);

        // $query_array=explode(" ",$query);

        // echo "<br>Type of query : ".$query_array[0]; //SELECT, INSERT, UPDATE or DELETE
        // echo "<br>";

        // //IFF IT IS A SELECT QUERY
        // if ( strcasecmp($query_array[0], "SELECT")==0)
        // {

        // printing result
        if($result->num_rows<=0)
        {
            echo "<br><hr>No rows to be fetched.<hr>";
        }
        else 
        {
            //print
            echo "<br><hr>Fetched results are... <br>";
            // print_r($result);        //returns object details
            
            //print each row
            echo '<table>';
            $columns = array();
            $resultset = array();
            while ($row = $result->fetch_assoc()) 
            {
                if (empty($columns)) 
                {
                    $columns = array_keys($row);
                    echo '<tr><th>'.implode('</th><th>', $columns).'</th></tr>';
                    // echo "here?";
                }
                $resultset = array_values($row);
                // print_r ($resultset);
                echo '<tr><td>'.implode('</td><td>', $resultset).'</td></tr>';
            }
            echo '</table><hr>';
            
        }
        // }
        // else        // IFF IT IS A DELETION/UPDATE QUERY
        // {
        //     if($result === TRUE) 
        //     {
        //         echo "<br><hr>Operation completed.<hr>";    
        //     }
        //     else 
        //     {
        //         echo "<br><br>Error : ".$sql."<br>".$conn->error;
        //     }
        // }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Enter Query</h1>
    <br>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Admin ID: <input type="text" name="au_id" placeholder="AXXX" required>
        <button type="submit">Search</button>
    </form>

    <br>
    <h3><a href="adminmainpage.php">Back to Admin Mainpage</a></h3>
    <br>
</body>
</html>