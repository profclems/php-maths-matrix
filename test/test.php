<?php

use Profclems\MathsMatrix\Matrix;

include "../vendor/autoload.php";

$matrixA = [
	[1,2,3,3],
	[2,3,6,3],
	[4,7,6,3]
];
$matrixB = [
	[1,2,1],
	[2,1,2],
	[1,2,3],
];

$matrixC = [
	[1,2,3],
	[2,3,6],
	[2,3,6],
];

$matrixD = [
	[1,2,3],
	[2,3,6],
	[2,3,6]
];

$matrixE = [
	[4,1],
	[3,2]
];

$matrixF = [
	[1,3,2],
	[4,1,3],
	[2,5,2]
];

$Matrix = new Matrix;
$Matrix->displayAs("matrix");
$mul = $Matrix->multiply($matrixB, $matrixC);
$add = $Matrix->add($matrixB, $matrixC);
$sub = $Matrix->subtract($matrixB, $matrixC);

echo "Transpose of Matrix A <br/>";
echo($Matrix->transpose($matrixA));
echo "Transpose of Matrix B <br/>";
echo($Matrix->transpose($matrixB));
echo "Transpose of Matrix C <br/>";
echo($Matrix->transpose($matrixC));
echo "Transpose of Matrix D <br/>";
echo($Matrix->transpose($matrixD));


echo "multiplication of Matrices <br/>";
print_r($mul);

echo "Addition of Matrices <br/>";
print_r($add);

echo "determinant of Matrix F <br/>";
print_r($Matrix->determinant($matrixF));
echo "<br/>";

echo "Minor of Matrix F <br/>";
print_r($Matrix->minor($matrixE));

echo "Cofactor of Matrix F <br/>";
print_r($Matrix->cofactor($matrixE));

echo "Adjoint of Matrix F <br/>";
print_r($Matrix->adjoint($matrixE));

echo "Inverse of Matrix F <br/>";
print_r($Matrix->inverse($matrixE));

echo "Dividing Matrix B by Matrix B... We should get an identity matrix <br/>";
print_r($Matrix->divide($matrixE, $matrixE));
?>


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
