<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php 

		class Person {

			private $name;
			private $lastname;
			private $dateOfBirth;

			public function __construct($name, $lastname, $dateOfBirth) {
				$this -> setName($name);
				$this -> setLastname($lastname);
				$this -> setDateOfBirth($dateOfBirth);
			}

			public function __toString() {
				return 'Name: ' . $this -> getName() . '<br>'
					. 'Lastname: ' . $this -> getLastname(). '<br>'
					. 'Date of birth: ' . $this -> getDateOfBirth(). '<br>';
			}

			public function setName($name) {
				if (getType($name) == 'string') {
					$this -> name = $name;
				}
			}

			public function getName() {
				return $this -> name;
			}

			public function setLastname($lastname) {
				if (getType($lastname) == 'string') {
					$this -> lastname = $lastname;
				}
			}

			public function getLastname() {
				return $this -> lastname;
			}

			public function setDateOfBirth($dateOfBirth) {
				$this -> dateOfBirth = $dateOfBirth;
			}

			public function getDateOfBirth() {
				return $this -> dateOfBirth;
			}

		}

		class Employee extends Person {

			private $companyCode;
			private $companyRole;
			private $salary;

			public function __construct($name, $lastname, $dateOfBirth, $companyCode, $companyRole, $salary) {

				parent:: __construct($name, $lastname, $dateOfBirth);
				$this -> setCompanyCode($companyCode);
				$this -> setCompanyRole($companyRole);
				$this -> setSalary($salary);
			}

			public function __toString() {
				return parent:: __toString()
					. 'Company Code: ' . $this -> getCompanyCode() . '<br>'
					. 'Company Role: ' . $this -> getCompanyRole() . '<br>'
					. 'Salary: ' . $this -> getSalary() . '<br>';
			}

			public function setCompanyCode($companyCode) {
				if (getType($companyCode) == 'integer') {
					$this -> companyCode = $companyCode;
				}
			}

			public function getCompanyCode() {
				return $this -> companyCode;
			}

			public function setCompanyRole($companyRole) {
				if (getType($companyRole) == 'string') {
					$this -> companyRole = $companyRole;
				}
			}

			public function getcompanyRole() {
				return $this -> companyRole;
			}

			public function setSalary($salary) {
				if (getType($salary) == 'integer') {
					$this -> salary = $salary;
				}
			}

			public function getSalary() {
				return $this -> salary;
			}

		}

		class Boss extends Employee {

			private $sector;

			public function __construct($name, $lastname, $dateOfBirth, $companyCode, $companyRole, $salary, $sector) {

				parent:: __construct($name, $lastname, $dateOfBirth, $companyCode, $companyRole, $salary);
				$this -> setSector($sector);
			}

			public function __toString() {
				return parent:: __toString()
					. 'Head of: ' . $this -> getSector() . '<br>';
			}

			public function setSector($sector) {
				if (getType($sector) == 'string') {
					$this -> sector = $sector;
				}
			}

			public function getSector() {
				return $this -> sector;
			}

		}

		$person = new Person("Mario", "Rossi", "01/03/1991");
		echo 'Persona: <br>' . $person . '<br>';

		$employee = new Employee("Margherita", "Bianchi", "28/05/1988", 59159, "Secretary", 30000);
		echo 'Dipendente: <br>' . $employee . '<br>';

		$boss = new Boss("Lorenzo", "Verdi", "13/11/1963", 10063, "Boss", 200000, "Logistics");
		echo 'Boss: <br>' . $boss . '<br>';

	?>
</body>
</html>