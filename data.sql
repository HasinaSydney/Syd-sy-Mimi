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

create or replace view v_employee_departement_title as
SELECT e.emp_no AS emp_no ,e.first_name,
e.last_name,e.gender,e.hire_date,de.emp_no as no_emp,
de.dept_no as no_dept,de.from_date,de.to_date,t.emp_no as no_emp_title,
t.title,t.from_date as from_date_title,t.to_date as to_date_title,
d.dept_no as dept_no,d.dept_name FROM employees AS e 
        JOIN dept_emp AS de ON e.emp_no = de.emp_no 
        JOIN titles AS t ON t.emp_no = de.emp_no
        JOIN departments AS d ON d.dept_no = de.dept_no;