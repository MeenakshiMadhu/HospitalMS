<?php
    include '/Applications/XAMPP/xamppfiles/htdocs/project/db_connection.php';
    $conn = OpenCon();
    echo "Connected Successfully";
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
        echo "<br>Table Users created successfully";
    } 
    else 
    {
        echo "<br>Error creating table Users: " . $conn->error;
    }

    //create departments = og
    $sql = "CREATE TABLE Departments (
        dept_ID VARCHAR(30) NOT NULL PRIMARY KEY,
        dept_Name VARCHAR(30) NOT NULL
        )";

    if ($conn->query($sql) === TRUE) 
    {
        echo "<br>Table Departments created successfully";
    } 
    else 
    {
        echo "<br>Error creating table Departments: " . $conn->error;
    }


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
        echo "<br>Table Doctors created successfully";
    } 
    else 
    {
        echo "<br>Error creating table Doctors: " . $conn->error;
    }
    
    //create admins = users
    $sql = "CREATE TABLE Admins (
      au_id VARCHAR(30) NOT NULL PRIMARY KEY,
      CONSTRAINT FOREIGN KEY (au_id) REFERENCES Users(u_id)
      )";

    if ($conn->query($sql) === TRUE)
    {
        echo "<br>Table Admins created successfully";
    } 
    else 
    {
        echo "<br>Error creating table Admins: " . $conn->error;
    }

    //create patients = users
    $sql = "CREATE TABLE Patients (
      pu_id VARCHAR(30) NOT NULL PRIMARY KEY,
      pstatus VARCHAR(10) NOT NULL,
      CONSTRAINT FOREIGN KEY (pu_id) REFERENCES Users(u_id)
      )";

    if ($conn->query($sql) === TRUE)
    {
        echo "<br>Table Patients created successfully";
    }
    else
    {
        echo "<br>Error creating table Patients: " . $conn->error;
    }

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
        echo "<br>Table Manages created successfully";
    } 
    else 
    {
        echo "<br>Error creating table Manages: " . $conn->error;
    }

    //create payments = patients
    $sql = "CREATE TABLE Payments (
      paymentID VARCHAR(30) NOT NULL PRIMARY KEY,
      amount DECIMAL(15,2) NOT NULL,
      pu_id VARCHAR(30) NOT NULL,
      CONSTRAINT FOREIGN KEY (pu_id) REFERENCES Patients(pu_id)
      )";

    if ($conn->query($sql) === TRUE) 
    {
        echo "<br>Table Payments created successfully";
    } 
    else 
    {
        echo "<br>Error creating table Payments: " . $conn->error;
    }
  
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
        echo "<br>Table Appointments created successfully";
    } 
    else 
    {
        echo "<br>Error creating table Appointments: " . $conn->error;
    }

  ?>