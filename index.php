<?php  
include 'matrix.class.php';

$matrix1 = [
	[1,2,3,3],
	[2,3,6,3],
	[4,7,6,3]
];
$matrix2 = [
	[1,2,1],
	[2,1,2],
	[1,2,3],
];

$matrix3 = [
	[1,2,3],
	[2,3,6],
	[2,3,6],
];

$matrix4 = [
	[1,2,3],
	[2,3,6],
	[2,3,6]
];

$matrix5 = [
	[1,2],
	[2,3]
];

$matrix6 = [
	[1,3,2],
	[4,1,3],
	[2,5,2]
];

$Matrix = new Matrix;
$Matrix->displayAs("matrix");
?>
<!DOCTYPE html>
<html>
<head>
	<title>PHP Maths Matrix Solver</title>
	<script src="https://cdn.jsdelivr.net/gh/google/code-prettify@master/loader/run_prettify.js?autoload=true&amp;skin=sunburst&amp;lang=css" defer=""></script>
</head>
<body>

	<header>
		<div style="font-size: 3rem;">
			<span>PHP Maths Matrix Solver</span>
		</div>
		<div>
			Author: Clement Sam
		</div>
		<div>
			License: MIT License &#60;<a href="http://www.opensource.org/licenses/mit-license.php">http://www.opensource.org/licenses/mit-license.php</a>&#62;
		</div>
		<div>
			Github: <a href="http://github.com/profclems/">http://github.com/profclems/</a>
		</div>
	</header>	
	<hr>
	
	<div style="max-width: 800px; margin: 0 auto;">
		<div>
			<h1>About</h1>
			<div>This class basically can be used to perform the following operations on matrices:</div>
			<ol>
				<li>Find the transpose of a matrix</li>
				<li>Multiply two compatible matrices</li>
				<li>Multiply a matrice by a scalar</li>
				<li>Add matrices</li>
				<li>Subtract matrices</li>
				<li>Find the:
					<ul>
						<li>determinant of any square matrix</li>
						<li>inverse of a 2x2 matrix</li>
						<li>minor matrix of a 2x2 matrix</li>
						<li>cofactor matrix of a 2x2 matrix</li>
						<li>adjoint matrix of a 2x2 matrix</li>
					</ul>
				<li>Literally, divide 2x2 matrices by multiplying the divided by the inverse of the divisor.</li>
			</ol>
		</div>
		<div>
			<h1>Usage</h1>
		</div>
		<h2>Transpose of a Matrix</h2>

		<div>
			<div class="inl_block v_align_middle pad10">
				<span>Transpose of </span>
			</div>
			<div class="inl_block v_align_middle">
				<table class="matrix" cellspacing="4">
					<tbody>
						<tr align="center">
							<td><i>1</i></td> 
							<td><i>2</i></td> 
							<td>2</td> 
							<td>3</td> 
						</tr>
						<tr align="center">
							<td><i>1</i></td> 
							<td><i>2</i></td> 
							<td>2</td> 
							<td>3</td> 
						</tr>
						<tr align="center">
							<td><i>1</i></td> 
							<td><i>2</i></td> 
							<td>2</td> 
							<td>3</td> 
						</tr>
					</tbody>
				</table>
			</div>
			<div class="inl_block v_align_middle pad10">
				<span>=</span>
			</div>

			<div class="inl_block v_align_middle">
				<?=$Matrix->transpose($matrix1)?>
			</div>

			<div>
				
<pre class="prettyprint lang-php">
$matrix1 = [
	[1,2,3,3],
	[2,3,6,3],
	[4,7,6,3]
];
$Matrix = new Matrix;
$Matrix->displayAs("matrix"); //Display the results as matrix. Default Option is array..
$trans = $Matrix->transpose($matrix1);
echo $trans;
</pre>
			</div>
		</div>

		<h2>Addition of Matrices</h2>

		<div>
			<div class="inl_block v_align_middle">
				<table class="matrix" cellspacing="4">
					<tbody>
						<tr align="center">
							<td><i>1</i></td> 
							<td><i>2</i></td> 
							<td><i>1</i></td> 
						</tr>
						<tr align="center">
							<td><i>2</i></td> 
							<td><i>1</i></td> 
							<td><i>2</i></td> 
						</tr>
						<tr align="center">
							<td><i>1</i></td> 
							<td><i>2</i></td> 
							<td><i>3</i></td> 
						</tr>
					</tbody>
				</table>
			</div>
			<div class="inl_block v_align_middle pad10">
				<span>&plus;</span>
			</div>
			<div class="inl_block v_align_middle">
				<table class="matrix" cellspacing="4">
					<tbody>
						<tr align="center">
							<td><i>1</i></td> 
							<td><i>2</i></td> 
							<td><i>3</i></td> 
						</tr>
						<tr align="center">
							<td><i>2</i></td> 
							<td><i>3</i></td> 
							<td><i>6</i></td> 
						</tr>
						<tr align="center">
							<td><i>2</i></td> 
							<td><i>3</i></td> 
							<td><i>6</i></td> 
						</tr>
					</tbody>
				</table>
			</div>
			<div class="inl_block v_align_middle pad10">
				<span>=</span>
			</div>

			<div class="inl_block v_align_middle">
				<?=$Matrix->add($matrix2,$matrix3)?>
			</div>

			<div>
				
<pre class="prettyprint lang-php">
$matrix2 = [
	[1,2,1],
	[2,1,2],
	[1,2,3],
];

$matrix3 = [
	[1,2,3],
	[2,3,6],
	[2,3,6],
];
$Matrix = new Matrix;
$Matrix->displayAs("matrix"); //Display the results as matrix. Default Option is array..
$add = $Matrix->add($matrix2, $matrix3);
echo $add;
</pre>
			</div>
		</div>


		<h2>Subtration of Matrices</h2>

		<div>
			<div class="inl_block v_align_middle">
				<table class="matrix" cellspacing="4">
					<tbody>
						<tr align="center">
							<td><i>1</i></td> 
							<td><i>2</i></td> 
							<td><i>1</i></td> 
						</tr>
						<tr align="center">
							<td><i>2</i></td> 
							<td><i>1</i></td> 
							<td><i>2</i></td> 
						</tr>
						<tr align="center">
							<td><i>1</i></td> 
							<td><i>2</i></td> 
							<td><i>3</i></td> 
						</tr>
					</tbody>
				</table>
			</div>
			<div class="inl_block v_align_middle pad10">
				<span>&minus;</span>
			</div>
			<div class="inl_block v_align_middle">
				<table class="matrix" cellspacing="4">
					<tbody>
						<tr align="center">
							<td><i>1</i></td> 
							<td><i>2</i></td> 
							<td><i>3</i></td> 
						</tr>
						<tr align="center">
							<td><i>2</i></td> 
							<td><i>3</i></td> 
							<td><i>6</i></td> 
						</tr>
						<tr align="center">
							<td><i>2</i></td> 
							<td><i>3</i></td> 
							<td><i>6</i></td> 
						</tr>
					</tbody>
				</table>
			</div>
			<div class="inl_block v_align_middle pad10">
				<span>=</span>
			</div>

			<div class="inl_block v_align_middle">
				<?=$Matrix->subtract($matrix2,$matrix3)?>
			</div>

			<div>
				
<pre class="prettyprint lang-php">
$matrix2 = [
	[1,2,1],
	[2,1,2],
	[1,2,3],
];

$matrix3 = [
	[1,2,3],
	[2,3,6],
	[2,3,6],
];
$Matrix = new Matrix;
$Matrix->displayAs("matrix"); //Display the results as matrix. Default Option is array..
$add = $Matrix->subtract($matrix2, $matrix3);
echo $add;
</pre>
			</div>
		</div>



		<h2>Multiplication of Matrices</h2>

		<div>
			<div class="inl_block v_align_middle">
				<table class="matrix" cellspacing="4">
					<tbody>
						<tr align="center">
							<td><i>1</i></td> 
							<td><i>2</i></td> 
							<td><i>1</i></td> 
						</tr>
						<tr align="center">
							<td><i>2</i></td> 
							<td><i>1</i></td> 
							<td><i>2</i></td> 
						</tr>
						<tr align="center">
							<td><i>1</i></td> 
							<td><i>2</i></td> 
							<td><i>3</i></td> 
						</tr>
					</tbody>
				</table>
			</div>
			<div class="inl_block v_align_middle pad10">
				<span>&#215;</span>
			</div>
			<div class="inl_block v_align_middle">
				<table class="matrix" cellspacing="4">
					<tbody>
						<tr align="center">
							<td><i>1</i></td> 
							<td><i>2</i></td> 
							<td><i>3</i></td> 
						</tr>
						<tr align="center">
							<td><i>2</i></td> 
							<td><i>3</i></td> 
							<td><i>6</i></td> 
						</tr>
						<tr align="center">
							<td><i>2</i></td> 
							<td><i>3</i></td> 
							<td><i>6</i></td> 
						</tr>
					</tbody>
				</table>
			</div>
			<div class="inl_block v_align_middle pad10">
				<span>=</span>
			</div>

			<div class="inl_block v_align_middle">
				<?=$Matrix->multiply($matrix2,$matrix3)?>
			</div>

			<div>
				
<pre class="prettyprint lang-php">
$matrix2 = [
	[1,2,1],
	[2,1,2],
	[1,2,3],
];

$matrix3 = [
	[1,2,3],
	[2,3,6],
	[2,3,6],
];
$Matrix = new Matrix;
$Matrix->displayAs("matrix"); //Display the results as matrix. Default Option is array..
$add = $Matrix->multiply($matrix2, $matrix3);
echo $add;
</pre>
			</div>
		</div>
	</div>
	<p>Check the test.php for more usage examples</p>
</body>
<style type="text/css">
	.matrix td {
		text-align: center;
	}
	.inl_block {
		display: inline-block;
	}
	.v_align_middle {
		vertical-align: middle;
	}
	.pad10 {
		padding: 10px;
	}
	.matrix {
        position: relative;
    }
    .matrix:before, .matrix:after {
        content: "";
        position: absolute;
        top: 0;
        border: 1px solid #000;
        width: 6px;
        height: 100%;
    }
    .matrix:before {
        left: -6px;
        border-right: 0;
    }
    .matrix:after {
        right: -6px;
        border-left: 0;
    }

    .mat
</style>
</html>
