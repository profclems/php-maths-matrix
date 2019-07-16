<?php  
/**
 * @author           Clement <clementsam75@gmail.com>
 * @copyright        (c) 2019, Clement Sam. All Rights Reserved.
 * @license          MIT License <http://www.opensource.org/licenses/mit-license.php>
 * @link             http://github.com/profclems/
 */
class Matrix
{
	private $_displayAs = "array";
	private $_F_colsNum = 0; //Number of columns for first Matrix
	private $_S_colsNum = 0; //Number of columns for second Matrix
	private $_F_rowsNum = 0; //Number of rows for first Matrix
	private $_S_rowsNum = 0; //Number of rows for second Matrix
	private $Matrix1 = array();
	private $Matrix2 = array();

	
	function __construct(array $matrix = array())
	{
		# code...
	}

	public function displayAs($as="array")
	{
		$this->_displayAs = $as;
	}

	public function multiply($a, $b)
	{
		if (is_array($a) && is_array($b)) {
			
			$r=count($a);
			$c=count($b[0]);
			$p=count($b);
			if(count($a[0]) != $p){
				return "Incompatible matrices";
			}
			$result=array();
			for ($i=0; $i < $r; $i++){
				for($j=0; $j < $c; $j++){
					$result[$i][$j] = 0;
					for($k=0; $k < $p; $k++){
						$result[$i][$j] += $a[$i][$k] * $b[$k][$j];
					}
				}
			}
		}
		elseif (is_numeric($a) && is_array($b)) {
			$p=count($b);

			$result = array();
			for ($i=0; $i < $p; $i++) { 
				foreach ($b[$i] as $key=>$val) {
					$result[$i][$key] = $a*$val;
				}
			}
		}

		return $this->display($result);
	}

	public function divide($dividend=array(), $divisor=array())
	{
		//We cannot literally divide matrices
		//But we can find the inverse of the divisor and multiply the dividend with it
		
		//Finding the inverse of the divisor
		$divisor = $this->inverse($divisor,0);

		//Multiply the dividend by the inverse of the divisor
		$result = $this->multiply($dividend,$divisor);

		return $this->display($result);
	}

	public function inverse($matrix, $toMatrix=1)
	{
		
		if ($this->is_square($matrix)) {
			//First find the determinant of the matrix
			$determinant = $this->determinant($matrix);
			//Find the adjoint
			$matrix = $this->adjoint($matrix,0);
			$c=count($matrix);

			$result = array();
			for ($i=0; $i < $c; $i++) { 
				foreach ($matrix[$i] as $key=>$val) {
					$result[$i][$key] = (1/$determinant)*$val;
				}
			}
			if ($toMatrix) {
				return $this->display($result);
			}
			return $result;
		}
		else {
			throw new Exception("You can only find the inverse of a square matrix(A matrix with the same number of rows and columns)", 0);
			return ;
		}
	}

	public function add($a, $b)
	{
		if (is_array($a) && is_array($b)) {
			$r=count($a);
			$c=count($b[0]);
			$d=count($a[0]);
			$p=count($b);
			
			if (($r !== $p) || ($c !== $d)) {
				throw new Exception("You can only add Matrices with the same dimensions(the same number of rows and columns)", 0);
				return ;
			}
			else {

				$result=array();
				for ($i=0; $i < $r; $i++){
					for($j=0; $j < $c; $j++){
						$result[$i][$j] = $a[$i][$j] + $b[$i][$j];
					}
				}

				return $this->display($result);
			}
		}
		elseif (is_numeric($a) && is_numeric($b)) {
			return $a+$b;
		}
		else {

			throw new Exception("You can only add Matrices with the same dimensions(the same number of rows and columns)", 0);
			return ;
		}
	}

	public function subtract($a, $b)
	{
		if (is_array($a) && is_array($b)) {
			$r=count($a);
			$c=count($b[0]);
			$d=count($a[0]);
			$p=count($b);
			
			if (($r !== $p) || ($c !== $d)) {
				throw new Exception("You can only Subtract Matrices with the same dimensions(the same number of rows and columns)", 1);
				return ;
			}
			else {

				$result=array();
				for ($i=0; $i < $r; $i++){
					for($j=0; $j < $c; $j++){
						$result[$i][$j] = $a[$i][$j] - $b[$i][$j];
					}
				}

				return $this->display($result);
			}
		}
		elseif (is_numeric($a) && is_numeric($b)) {
			return $a+$b;
		}
		else {

			throw new Exception("You can only Subtract Matrices with the same dimensions(the same number of rows and columns)", 1);
			return ;
		}
	}

	public function transpose($Matrix, $toMatrix=1)
	{
		$r =count($Matrix);
		$c =count($Matrix[0]);
		
		$ir = $c;
		$jc = $r;
		$transpose = array();

		for ($i=0; $i < $ir; $i++) { 
			for($j=0; $j < $jc; $j++){
				if (isset($Matrix[$j][$i])) {
					$transpose[$i][$j] = $Matrix[$j][$i];
				}

			}
		}
		if ($toMatrix) {
			return $this->display($transpose);
		}
		return $transpose;
	}

	public function display($Resulting_matrix)
	{
		if ($this->_displayAs=="matrix" && is_array($Resulting_matrix)) {
			$met = '<table class="matrix" cellspacing="4"><tbody><tr align="center">';
			foreach ($Resulting_matrix as $key => $val) {
				$met.= '<tr align="center">';
				foreach ($val as $m) {
					$met.= "<td><i>".$m."</i></td>";
				}
				$met.= "<tr/>";
			}
			$met.='</tbody></table>';
			return $met;
		}
		return $Resulting_matrix;
		
	}

	public function is_square($matrix)
	{
		if (count($matrix[0])==count($matrix)) {
			return true;
		}
		else {
			return false;
		}
	}



	public function determinant($matrix=array()) { 
		/*
		$matrix must be 2-dimensional n x n array in following format
		$matrix=array(array(1,2,3),array(1,2,3),array(1,2,3))
  		*/

  		// Check if it's a square matrix - n x n
		if (!$this->is_square($matrix)) {
			throw new Exception("Undefined: You can only find the determinant of square matrices)", 0);
			return ;
		}
  		//count 1x1 and 2x2 manually - rest by recursive function
		$dimension=sizeof($matrix);
		if ($dimension == 1) { 
			return $matrix[0][0]; 
		}   
		if ($dimension == 2) { 
			return ($matrix[0][0]*$matrix[1][1] - $matrix[0][1]*$matrix[1][0]); 
		} 

  		//cycles for submatrixes calculations
		$sum = 0;
		for ($i = 0; $i < $dimension; $i++) {
    	// for each "$i", you will create a smaller matrix based on the original matrix 
    	// by removing the first row and the "i"th column. 

			$smallMatrix=array(); 
			for ($j = 0; $j < $dimension-1; $j++) {
				$smallMatrix[$j]=array();
				for ($k = 0; $k < $dimension; $k++) {
					if ($k < $i) $smallMatrix[$j][$k] = $matrix[$j+1][$k]; 
					if ($k > $i) $smallMatrix[$j][$k - 1] = $matrix[$j+1][$k];
				} 
			}

			// after creating the smaller matrix, multiply the "i"th element in the first 
			// row by the determinant of the smaller matrix. 
			// Odd position is plus, even is minus - the index from 0 so it's oppositely

			if(($i%2)==0){
				$sum += ($matrix[0][$i])*($this->determinant($smallMatrix)); 
			} else {
				$sum -= ($matrix[0][$i])*($this->determinant($smallMatrix)); 
			}

		} 

		return $sum; 
	}

	public function adjoint(array $matrix = array(), $toMatrix = 1)
	{
		if (!$this->is_square($matrix)) {
			throw new Exception("Undefined: You can only find the cofactor of square matrices)", 0);
			return ;
		}
		$matrix = $this->cofactor($matrix,0);
		$matrix = $this->transpose($matrix,0);
		if ($toMatrix) {
			return $this->display($matrix);
		}
		return $matrix;
	}

	public function cofactor(array $matrix = array(), $toMatrix = 1)
	{
		if (!$this->is_square($matrix)) {
			throw new Exception("Undefined: You can only find the cofactor of square matrices)", 0);
			return ;
		}

		$matrix = $this->minor($matrix,0);
		for ($i=0; $i < count($matrix); $i++) { 
			for ($j=0; $j < count($matrix); $j++) { 
					$matrix[$i][$j] = pow(-1,(($i+1)+($j+1)))*$matrix[$i][$j];
			}
		}
		if ($toMatrix) {
			return $this->display($matrix);
		}
		return $matrix;
	}

	public function minor(array $matrix=array(), $toMatrix = 1)
	{
		// Check if it's a square matrix - n x n
		if (!$this->is_square($matrix)) {
			throw new Exception("Undefined: You can only find the minor of square matrices)", 0);
			return ;
		}
		//count 1x1 and 2x2 manually - rest by recursive function
		$dimension=sizeof($matrix);
		if ($dimension == 1) { 
			return $matrix[0][0]; 
		}   

		$result = array();
		if ($dimension == 2) { 
			$result[0][0]=$matrix[1][1]; 
			$result[0][1]=$matrix[1][0]; 
			$result[1][0]=$matrix[0][1]; 
			$result[1][1]=$matrix[0][0]; 
		} 
		else {
			return "The package only support 2x2 Matrix Minors";
		}
		if ($toMatrix) {
			return $this->display($result);
		}
		return $result;
	}

	public function equationSystem($leftMatrix=array(),$rightMatrix=array()){

		/*
		left side of equations - parameters:
		$leftMatrix must be 2-dimensional n x n array in following format
		$leftMatrix=a[[1,2,3],[1,2,3],[1,2,3]]

		right side of equations - results:
		$rightMatrix must be in format 
		$rightMatrix=[1,2,3];
  		*/

  		//matrixes and dimension check
		if(!is_array($leftMatrix) || !is_array($rightMatrix)){
			return false;
		}
		if(sizeof($leftMatrix)!=sizeof($rightMatrix)){
			return false;
		}

		if($M=$this->determinant($leftMatrix)){

		} else {
			return false;
		}


		$x=array();

		foreach($rightMatrix as $rk => $rv){
			$xMatrix=$leftMatrix;
			foreach($rightMatrix as $rMk => $rMv){
				$xMatrix[$rMk][$rk]=$rMv;
			}
			$x[$rk]=$this->determinant($xMatrix)/$M;
		}

		return $x;
	}

}

?>