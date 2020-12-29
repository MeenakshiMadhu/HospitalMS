<?php
function displaytable($conn, $sql)
{
    $result = $conn->query($sql);

    // printing result
    if($result->num_rows<=0)
    {
        echo "<br><hr>No results.<hr>";
    }
    else 
    {
        //print
        // echo "<br><hr>Fetched results are... <br>";
        // print_r($result);        //returns object details
        
        //print each row
        echo '<table class="styled-table">';
        $columns = array();
        $resultset = array();
        while ($row = $result->fetch_assoc()) 
        {
            if (empty($columns)) 
            {
                $columns = array_keys($row);
                echo '<thead><tr><th>'.implode('</th><th>', $columns).'</th></tr></thead><tbody>';
                // echo "here?";
            }
            $resultset = array_values($row);
            // print_r ($resultset);
            echo '<tr><td>'.implode('</td><td>', $resultset).'</td></tr>';
        }
        echo '</tbody></table><hr>';
        
    }        
}

function log_in_manages($conn, $mindex, $au_id, $maction)
{
    $datetime = new DateTime();
    $timezone = new DateTimeZone('Europe/Bucharest');
    $datetime->setTimezone($timezone);
    // echo $datetime->format('Y-m-d H:i');
    // echo "<br>";
    $datetime->add(new DateInterval('PT3H30M'));
    // echo $datetime->format('Y-m-d H:i');

    $timeOfAccess = $datetime->format('Y-m-d H:i');

    // $timeOfAccess = STR_TO_DATE($timeOfAccess,'%Y/%d/%m %h:%i:%s');

    $sql = "INSERT INTO manages(mindex, au_id,  maction, timeOfAccess) 
            VALUES ('$mindex', '$au_id','$maction','$timeOfAccess')";
      
    if ($conn->query($sql) === TRUE) 
    {
        //echo "<br>Record saved in table Manages";
    } 
    else 
    {
        echo "<br>Error saving record to Manages: " . $conn->error;
    }

   $sql2 = "UPDATE manages SET timeOfAccess = STR_TO_DATE('$timeOfAccess', '%m/%d/%Y %h:%i') WHERE ";
   if ($conn->query($sql) === TRUE) 
    {
        // echo "<br>Time stored in table Manages";
    } 
    // else 
    // {
    //     echo "<br>Error saving time to Manages: " . $conn->error;
    // }

}

function PrintDepartments($conn)
{
    //____________print list of departments
    $sqld = "SELECT * FROM departments";
    $result = $conn->query($sqld);
    // printing result
    if($result->num_rows <=0) 
    {
        echo "<br><hr>No departments available. Please create some departments first.<hr>";
    }
    else 
    {
        $i=1;
        echo "<br><br><b>Existing departments:</b> "; 
        //print each row
        while($row = $result->fetch_assoc()) {
            echo "<br><b>".$i.": </b>                 ".$row["dept_Name"]."             . <b>".$row["dept_ID"]."</b>";
            $i = $i+1;
        }
        echo "<hr>";
    }
}

function CreateTables($conn)
 {

    //--------------------------
    //create users = og
    $sql = "CREATE TABLE Users (
        u_id VARCHAR(30) NOT NULL PRIMARY KEY,
        uname VARCHAR(30) NOT NULL,
        uDOB DATE,
        emailID VARCHAR(30) NOT NULL,
        mobile_no CHAR(10)
        )";
      
    if ($conn->query($sql) === TRUE) 
    {
        // echo "<br>Table Users created successfully";
    } 
    // else 
    // {
    //     echo "<br>Error creating table Users: " . $conn->error;
    // }

    //create departments = og
    $sql = "CREATE TABLE Departments (
        dept_ID VARCHAR(30) NOT NULL PRIMARY KEY,
        dept_Name VARCHAR(30) NOT NULL
        )";

    if ($conn->query($sql) === TRUE) 
    {
        // echo "<br>Table Departments created successfully";
    } 
    // else 
    // {
    //     echo "<br>Error creating table Departments: " . $conn->error;
    // }


    //----------------------------
    //create doctors = users + departments
    $sql = "CREATE TABLE Doctors (
      du_id VARCHAR(30) NOT NULL PRIMARY KEY,
      dept_ID VARCHAR(30) NOT NULL,
      CONSTRAINT FOREIGN KEY (dept_ID) REFERENCES Departments(dept_ID),
      CONSTRAINT FOREIGN KEY (du_id) REFERENCES Users(u_id)
      )";

    if ($conn->query($sql) === TRUE) 
    {
        // echo "<br>Table Doctors created successfully";
    } 
    // else 
    // {
    //     echo "<br>Error creating table Doctors: " . $conn->error;
    // }
    
    //create admins = users
    $sql = "CREATE TABLE Admins (
      au_id VARCHAR(30) NOT NULL PRIMARY KEY,
      CONSTRAINT FOREIGN KEY (au_id) REFERENCES Users(u_id)
      )";

    if ($conn->query($sql) === TRUE)
    {
        // echo "<br>Table Admins created successfully";
    } 
    // else 
    // {
    //     echo "<br>Error creating table Admins: " . $conn->error;
    // }

    //create patients = users
    $sql = "CREATE TABLE Patients (
      pu_id VARCHAR(30) NOT NULL PRIMARY KEY,
      pstatus VARCHAR(10) NOT NULL,
      CONSTRAINT FOREIGN KEY (pu_id) REFERENCES Users(u_id)
      )";

    if ($conn->query($sql) === TRUE)
    {
        // echo "<br>Table Patients created successfully";
    }
    // else
    // {
    //     echo "<br>Error creating table Patients: " . $conn->error;
    // }

    //create manages = admins + patients
    $sql = "CREATE TABLE Manages (
      mindex INT NOT NULL PRIMARY KEY,
      au_id VARCHAR(30) NOT NULL,
      maction VARCHAR(50) NOT NULL,
      timeOfAccess DATETIME NOT NULL,
      CONSTRAINT FOREIGN KEY (au_id) REFERENCES Admins(au_id)
      )";

    if ($conn->query($sql) === TRUE) 
    {
        // echo "<br>Table Manages created successfully";
    } 
    // else 
    // {
    //     echo "<br>Error creating table Manages: " . $conn->error;
    // }

    //create payments = patients
    $sql = "CREATE TABLE Payments (
      paymentID VARCHAR(30) NOT NULL PRIMARY KEY,
      amount DECIMAL(15,2) NOT NULL,
      pu_id VARCHAR(30) NOT NULL,
      CONSTRAINT FOREIGN KEY (pu_id) REFERENCES Patients(pu_id)
      )";

    if ($conn->query($sql) === TRUE) 
    {
        // echo "<br>Table Payments created successfully";
    } 
    // else 
    // {
    //     echo "<br>Error creating table Payments: " . $conn->error;
    // }
  
    //create appointment = doctor + admin + patient
    $sql = "CREATE TABLE Appointments (
      app_id VARCHAR(30) NOT NULL PRIMARY KEY,
      au_id VARCHAR(30) NOT NULL,
      pu_id VARCHAR(30) NOT NULL,
      du_id VARCHAR(30) NOT NULL,

      appdateTime DATETIME NOT NULL,
      prescription VARCHAR(30),

      CONSTRAINT FOREIGN KEY (au_id) REFERENCES Admins(au_id),
      CONSTRAINT FOREIGN KEY (pu_id) REFERENCES Patients(pu_id),
      CONSTRAINT FOREIGN KEY (du_id) REFERENCES Doctors(du_id)
      )";

    if ($conn->query($sql) === TRUE) 
    {
        // echo "<br>Table Appointments created successfully";
    } 
    // else 
    // {
    //     echo "<br>Error creating table Appointments: " . $conn->error;
    // }

    return 1;
 } 
   
?>