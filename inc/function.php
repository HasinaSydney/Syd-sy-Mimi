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

function getEmployes($dept_name)
{
        $sql ="SELECT *
         FROM employees AS e
         JOIN dept_emp AS de ON e.emp_no = de.emp_no
         JOIN titles AS t ON e.emp_no = t.emp_no 
         JOIN departments AS d ON de.dept_no = d.dept_no 
         WHERE d.dept_name = '%s'
         AND de.to_date > CURRENT_DATE ORDER by e.emp_no ASC";


        $sql = sprintf($sql, $dept_name);
        $res = mysqli_query(dbconnect(), $sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($res)) {
                $data[] = $row;
        }
        return $data;
}

function getInfoEmployes($last_name){
      $sql = "SELECT e.*, d.dept_name
            FROM employees AS e
            JOIN dept_emp AS de ON e.emp_no = de.emp_no
            JOIN departments AS d ON de.dept_no = d.dept_no
            WHERE e.last_name = '%s'
            AND de.to_date > CURRENT_DATE";
        $sql = sprintf($sql,$last_name);
        $result = mysqli_query(dbconnect(),$sql);
        $result = mysqli_fetch_assoc($result);
        return $result;
}

function getTitle($emp_no){
        $sql = "SELECT * FROM titles AS t JOIN employees AS e ON e.emp_no = t.emp_no WHERE e.last_name = '%s'  ORDER BY from_date ASC";
        $sql = sprintf($sql,$emp_no);
        $result = mysqli_query(dbconnect(),$sql);
        return $result;
}

function getSalary($emp_no){
        $sql = "SELECT * FROM salaries AS s JOIN employees AS e ON e.emp_no = s.emp_no WHERE e.last_name = '%s' ORDER BY from_date ASC ";
        $sql = sprintf($sql,$emp_no);
        $result = mysqli_query(dbconnect(),$sql);
        return $result;
}




function getDepartRecherche($nom,$dep,$min, $max,$offset,$limit)
{
$sql = "SELECT e.*, d.dept_name, TIMESTAMPDIFF(YEAR, e.birth_date, CURDATE()) AS age
        FROM departments AS d
        JOIN dept_emp AS de ON d.dept_no = de.dept_no
        JOIN employees AS e ON de.emp_no = e.emp_no
        WHERE (e.first_name LIKE '%%%s%%' OR d.dept_name LIKE '%%%s%%')
        AND TIMESTAMPDIFF(YEAR, e.birth_date, CURDATE()) BETWEEN %d AND %d
        LIMIT %d,%d";
    $sql = sprintf($sql, $dep,$dep,  $min, $max,$offset,$limit);
    $result = mysqli_query(dbconnect(), $sql);
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    return $data;
}

function getNbrEmployes(){
$sql = "SELECT COUNT(*) FROM employees AS e
        JOIN dept_emp AS de ON e.emp_no = de.emp_no
        JOIN departments AS d ON de.dept_no = d.dept_no
        GROUP BY de.dept_no";
$result = mysqli_query($sql);
}

?>