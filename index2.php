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
			protected $securyLvl;

			public function __construct($name, $lastname, $dateOfBirth, $securyLvl) {
				$this -> setName($name);
				$this -> setLastname($lastname);
				$this -> setDateOfBirth($dateOfBirth);
				$this -> setSecuryLvl($securyLvl);
			}

			public function getName() {
				return $this -> name;
			}

			public function setName($name) {
				if (strlen($name) <= 3) {
					$e = new tooShortName('Name must have at least 4 characters');
					throw $e;
				}
				$this -> name = $name;
			}

			public function getLastname() {
				return $this -> lastname;
			}

			public function setLastname($lastname) {
				if (strlen($lastname) <= 3) {
					$e = new tooShortLastname('Lastname must have at least 4 characters');
					throw $e;
				}
				$this -> lastname = $lastname;
			}

			public function getFullname() {
				return $this -> getName() . ' ' . $this -> getLastname();
			}

			public function getDateOfBirth() {
				return $this -> dateOfBirth;
			}

			public function setDateOfBirth($dateOfBirth) {
				$this -> dateOfBirth = $dateOfBirth;
			}

			public function getSecuryLvl() {
				return $this -> securyLvl;
			}

			public function setSecuryLvl($securyLvl) {
				if ($securyLvl != 0) {
					$e = new wrongSecuryLvl('Person secury level must be 0');
					throw $e;
				}
				$this -> securyLvl = $securyLvl;
			}

			public function __toString() {
				return 
					'name: ' . $this -> getName() . '<br>'
					. 'lastname: ' . $this -> getLastname() . '<br>'
					. 'dateOfBirth: ' . $this -> getDateOfBirth() . '<br>'
					. 'securyLvl: ' . $this -> getSecuryLvl();
			}

		}


		class Employee extends Person {

			private $ral;
			private $mainTask;
			private $idCode;
			private $dateOfHiring;

			public function __construct($name, $lastname, $dateOfBirth, $securyLvl,
										$ral, $mainTask, $idCode, $dateOfHiring) {
				parent::__construct($name, $lastname, $dateOfBirth, $securyLvl);
				$this -> setRal($ral);
				$this -> setMainTask($mainTask);
				$this -> setIdCode($idCode);
				$this -> setDateOfHiring($dateOfHiring);
			}

			public function getRal() {
				return $this -> $ral;
			}
			
			public function setRal($ral) {
				if ($ral < 10000 || $ral > 100000) {
					$e = new ralNotValid('ral must be between 10000 and 100000');
					throw $e;
				}
				$this -> ral = $ral;
			}

			public function getMainTask() {
				return $this -> $mainTask;
			}

			public function setMainTask($mainTask) {
				$this -> mainTask = $mainTask;
			}

			public function getIdCode() {
				return $this -> $idCode;
			}

			public function setIdCode($idCode) {
				$this -> idCode = $idCode;
			}

			public function getDateOfHiring() {
				return $this -> $dateOfHiring;
			}

			public function setDateOfHiring($dateOfHiring) {
				$this -> dateOfHiring = $dateOfHiring;
			}

			public function __toString() {
				return parent::__toString() . '<br>'
					. 'ral: ' . $this -> ral . '<br>'
					. 'mainTask: ' . $this -> mainTask . '<br>'
					. 'idCode: ' . $this -> idCode . '<br>'
					. 'dateOfHiring: ' . $this -> dateOfHiring;
			}

			public function setSecuryLvl($securyLvl) {
				if ($securyLvl < 1 || $securyLvl > 5) {
					$e = new wrongSecuryLvl('Employee secury level must be between 1 and 5');
					throw $e;
				}
				$this -> securyLvl = $securyLvl;
			}

		}


		class Boss extends Employee {

			private $profit;
			private $vacancy;
			private $sector;
			private $employees;

			public function __construct($name, $lastname, $dateOfBirth, $securyLvl,
										$ral, $mainTask, $idCode, $dateOfHiring,
										$profit, $vacancy, $sector, $employees = []) {
				parent::__construct($name, $lastname, $dateOfBirth, $securyLvl,
									$ral, $mainTask, $idCode, $dateOfHiring);
				$this -> setProfit($profit);
				$this -> setVacancy($vacancy);
				$this -> setSector($sector);
				$this -> setEmployees($employees);
			}

			public function getProfit() {
				return $this -> profit;
			}

			public function setProfit($profit) {
				$this -> profit = $profit;
			}

			public function getVacancy() {
				return $this -> vacancy;
			}

			public function setVacancy($vacancy) {
				$this -> vacancy = $vacancy;
			}

			public function getSector() {
				return $this -> sector;
			}

			public function setSector($sector) {
				$this -> sector = $sector;
			}

			public function getEmployees() {
				return $this -> employees;
			}

			public function setEmployees($employees) {

				if ($employees == [] || !is_array($employees)) {
					$e = new noEmployees('Boss must have an array of employees');
					throw $e;
				}

				$this -> employees = $employees;
			}

			public function __toString() {
				return parent::__toString() . '<br>'
						. 'profit: ' . $this -> getProfit() . '<br>'
						. 'vacancy: ' . $this -> getVacancy() . '<br>'
						. 'sector: ' . $this -> getSector() . '<br>'
						. 'employees:<br>' . $this -> getEmpsStr();
			}

			private function getEmpsStr() {
				$str = '';
				for ($x=0;$x<count($this -> getEmployees());$x++) {
					$emp = $this -> getEmployees()[$x];
					$fullname = $emp -> getName() . ' ' . $emp -> getLastname();
					$str .= ($x + 1) . ': ' . $fullname . '<br>';
				}
				return $str;
			}      

			public function setSecuryLvl($securyLvl) {
				if ($securyLvl < 6 || $securyLvl > 10) {
					$e = new wrongSecuryLvl('Boss secury level must be between 6 and 10');
					throw $e;
				}
				$this -> securyLvl = $securyLvl;
			}


		}


		class tooShortName extends Exception {}
		class tooShortLastname extends Exception {}
		class ralNotValid extends Exception {}
		class noEmployees extends Exception {}
		class wrongSecuryLvl extends Exception {}


		// TRY DI PERSON
		try {
			echo 'Person: <br>';
			$p1 = new Person(
				'(p)name',
				'(p)lastname',
				'(p)dateOfBirth',
				0, //securyLvl
			);
			echo $p1;
		} catch (tooShortName $e) {
			echo 'Error: Name is not valid!<br>';
		} catch (tooShortLastname $e) {
			echo 'Error: Lastname is not valid!<br>';
		} catch (wrongSecuryLvl $e) {
			echo 'Error: ' . $e -> getMessage();
		} finally {
			echo '<br><br>';
		}


		// TRY DI EMPLOYEE
		try {
			echo 'Employee: <br>';
			$e1 = new Employee(
				'(e)name',
				'(e)lastname',
				'(e)dateOfBirth',
				4, //securyLvl
				15000, //ral
				'(e)mainTask',
				'(e)idCode',
				'(e)dateOfHiring',
			);
			echo $e1;
		} catch (tooShortName $e) {
			echo 'Error: ' . $e -> getMessage();
		} catch (tooShortLastname $e) {
			echo 'Error: ' . $e -> getMessage();
		} catch (ralNotValid $e) {
			echo 'Error: ' . $e -> getMessage();
		} catch (wrongSecuryLvl $e) {
			echo 'Error: ' . $e -> getMessage();
		} finally {
			echo '<br><br>';
		}


		// TRY DI BOSS
		try {
			echo 'Boss: <br>';
			$b1 = new Boss(
				'(b)name',
				'(b)lastname',
				'(b)dateOfBirth',
				7, //securyLvl
				90000, //ral
				'(b)mainTask',
				'(b)idCode',
				'(b)dateOfHiring',
				'(b)profit',
				'(b)vacancy',
				'(b)sector',
				[
					$e1,
					$e1,
					$e1,
					$e1
				]
			);
			echo $b1;
		} catch (tooShortName $e) {
			echo 'Error: ' . $e -> getMessage();
		} catch (tooShortLastname $e) {
			echo 'Error: ' . $e -> getMessage();
		} catch (ralNotValid $e) {
			echo 'Error: ' . $e -> getMessage();
		} catch (noEmployees $e) {
			echo 'Error: ' . $e -> getMessage();
		} catch (wrongSecuryLvl $e) {
			echo 'Error: ' . $e -> getMessage();
		} finally {
			echo '<br><br>';
		}

	?>
</body>
</html>