create or replace view v_employee_departement_manager as SELECT e.emp_no AS emp_no ,e.first_name,
e.last_name,e.gender,e.hire_date,de.emp_no as no_emp,
de.dept_no as no_dept,de.from_date,de.to_date,
d.dept_no as dept_no,d.dept_name FROM employees AS e 
        JOIN dept_manager AS de ON e.emp_no = de.emp_no 
        JOIN departments AS d ON d.dept_no = de.dept_no;

select * from v_employee_departement_manager where to_date ="9999-01-01";

create or replace view v_employee_current_manager as 
select * from v_employee_departement_manager where to_date ='9999-01-01';



create or replace view v_employee_departement as 
SELECT e.emp_no AS emp_no ,e.first_name,
e.last_name,e.gender,e.hire_date,de.emp_no as no_emp,
de.dept_no as no_dept,de.from_date,de.to_date,
d.dept_no as dept_no,d.dept_name FROM employees AS e 
        JOIN dept_emp AS de ON e.emp_no = de.emp_no 
        JOIN departments AS d ON d.dept_no = de.dept_no;

select * from v_employee_departement;

CREATE OR REPLACE VIEW v_employee_department_title AS
SELECT e.emp_no, e.first_name, e.last_name, e.gender, e.hire_date,
       de.from_date, de.to_date, t.title, t.from_date AS from_date_title,
       t.to_date AS to_date_title, d.dept_no, d.dept_name
FROM employees AS e
JOIN dept_emp AS de ON e.emp_no = de.emp_no
JOIN titles AS t ON t.emp_no = e.emp_no
JOIN departments AS d ON d.dept_no = de.dept_no;

select * from v_employee_department_title;

        CREATE OR REPLACE VIEW v_departement_manager_employes AS
SELECT 
    d.dept_name,
    m.first_name AS manager_first_name,
    m.last_name AS manager_last_name,
    COUNT(e.emp_no) AS employee_count
FROM departments as d
JOIN dept_manager dm ON dm.dept_no = d.dept_no AND dm.to_date = '9999-01-01'
JOIN employees m ON m.emp_no = dm.emp_no
LEFT JOIN current_dept_emp e ON e.dept_no = d.dept_no
GROUP BY d.dept_name, m.first_name, m.last_name;


CREATE OR REPLACE VIEW v_title_gender_salary AS
SELECT 
    t.title,
    SUM(CASE WHEN e.gender = 'M' THEN 1 ELSE 0 END) AS hommes,
    SUM(CASE WHEN e.gender = 'F' THEN 1 ELSE 0 END) AS femmes,
    ROUND(AVG(s.salary), 2) AS salaire_moyen
FROM titles t
JOIN employees e ON e.emp_no = t.emp_no
JOIN salaries s ON s.emp_no = t.emp_no
WHERE t.to_date = '9999-01-01' AND s.to_date = '9999-01-01'
GROUP BY t.title;

SELECT 
    title,
    DATEDIFF(IFNULL(to_date, CURDATE()), from_date) AS duree
FROM titles
WHERE emp_no = ?
ORDER BY duree DESC
LIMIT 1;

