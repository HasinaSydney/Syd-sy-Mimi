<?php
require('connection.php');

function getDepartement(){
    $sql = "SELECT * FROM departments";
    $sql = sprintf($sql);
    $result = mysqli_query(dbconnect(),$sql);
    $row = array();
    if($result){
            while($r = mysqli_fetch_assoc($result)){
                    $row[] = $r;
            }
            return $row;
    }
}

function getManager(){
    $sql = "SELECT * FROM employees AS e JOIN dept_manager AS dm ON e.emp_no = dm.emp_no JOIN departments AS d
     ON d.dept_no = dm.dept_no";
     $sql = sprintf($sql);
     $result = mysqli_query(dbconnect(),$sql);
     $row = array();
    if($result){
            while($r = mysqli_fetch_assoc($result)){
                    $row[] = $r;
            }
            return $row;
    }
}


?>