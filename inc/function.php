<?php
require('connection.php');

function getDepartement()
{
        $sql = "SELECT * FROM departments order by dept_no ASC";
        $sql = sprintf($sql);
        $result = mysqli_query(dbconnect(), $sql);
        return $result;
}

function getManagers($dept_no)
{
        $sql = "SELECT * FROM employees AS e JOIN dept_manager AS dm ON e.emp_no = dm.emp_no JOIN departments AS d
     ON d.dept_no = dm.dept_no WHERE d.dept_no = '%s'";
        $sql = sprintf($sql, $dept_no);
        $result = mysqli_query(dbconnect(), $sql);
        //      $row = array();
//     if($result){
//             while($r = mysqli_fetch_assoc($result)){
//                     $row[] = $r;
//             }
//             return $row;
//     }
        return $result;
}

function getCurrentManager($dept_no)
{
        $sql = "SELECT * FROM employees AS e 
        JOIN dept_manager AS dm ON e.emp_no = dm.emp_no 
        JOIN departments AS d ON d.dept_no = dm.dept_no 
        WHERE d.dept_no = '%s' 
        AND dm.to_date > CURRENT_TIMESTAMP";

        $sql = sprintf($sql, $dept_no);
        $result = mysqli_query(dbconnect(), $sql);
        $result = mysqli_fetch_assoc($result);
        return $result;

}

function getEmployes($dept_no)
{
        $sql ="SELECT *
         FROM employees e
         JOIN dept_emp de ON e.emp_no = de.emp_no
         JOIN titles t ON e.emp_no = t.emp_no
         WHERE de.dept_no = '%s'
         AND de.to_date > CURRENT_DATE ORDER by e.emp_no ASC";


        $sql = sprintf($sql, $dept_no);
        $res = mysqli_query(dbconnect(), $sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($res)) {
                $data[] = $row;
        }
        return $data;
}

function getInfoEmployes($emp_no){
        $sql = "SELECT * FROM employees WHERE emp_no = '%s'  ";
        $sql = sprintf($sql,$emp_no);
        $result = mysqli_query(dbconnect(),$sql);
        $result = mysqli_fetch_assoc($result);
        return $result;
}

function getTitle($emp_no){
        $sql = "SELECT * FROM titles WHERE emp_no = '%s'  ORDER BY from_date ASC";
        $sql = sprintf($sql,$emp_no);
        $result = mysqli_query(dbconnect(),$sql);
        return $result;
}

function getSalary($emp_no){
        $sql = "SELECT * FROM salaries WHERE emp_no = '%s' ORDER BY from_date ASC ";
        $sql = sprintf($sql,$emp_no);
        $result = mysqli_query(dbconnect(),$sql);
        return $result;
}




function getDepartRecherche($dep, $nom, $min, $max)
{
    $sql = "SELECT e.*, d.dept_name, TIMESTAMPDIFF(YEAR, e.birth_date, CURDATE()) AS age
            FROM departments AS d
            JOIN dept_emp AS de ON d.dept_no = de.dept_no
            JOIN employees AS e ON de.emp_no = e.emp_no
            WHERE d.dept_name = '%s'
            AND e.first_name = '%s'
            AND TIMESTAMPDIFF(YEAR, e.birth_date, CURDATE()) BETWEEN %d AND %d
            LIMIT 20,10";
    $sql = sprintf($sql, $dep, $nom, $min, $max);
    $result = mysqli_query(dbconnect(), $sql);
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    return $data;
}

{

}
?>