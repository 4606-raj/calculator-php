<?php 
	
	class Calculator {
		protected $result; // stores the result after every operation.
		protected $operation; // stores each operation one after onother.

		// assigning the operation by dependency injection, multiple classes are implementing OperatorInterface, thus operation is dynamically assigned.
		public function setOperation(OperatorInterface $operation) {
			$this->operation = $operation;
		}

		// calcutlating result by using previous result.
		public function calculate() {
			foreach (func_get_args() as $number) {
				$this->result = $this->operation->run($number, $this->result);
			}
		}

		public function getResult() {
			return $this->result;
		}
	}
 ?>