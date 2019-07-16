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
	[4,1],
	[3,2]
];

$matrix6 = [
	[1,3,2],
	[4,1,3],
	[2,5,2]
];

$Matrix = new Matrix;
$Matrix->displayAs("matrix");
$mul = $Matrix->multiply($matrix2, $matrix3);
$add = $Matrix->add($matrix2, $matrix3);
$sub = $Matrix->subtract($matrix2, $matrix3);

echo "Transpose of Matrix 1 <br/>";
echo($Matrix->transpose($matrix1));
echo "Transpose of Matrix 2 <br/>";
echo($Matrix->transpose($matrix2));
echo "Transpose of Matrix 3 <br/>";
echo($Matrix->transpose($matrix3));
echo "Transpose of Matrix 4 <br/>";
echo($Matrix->transpose($matrix4));


echo "multiplication of Matrices <br/>";
print_r($mul);

echo "Addition of Matrices <br/>";
print_r($add);

echo "determinant of Matrix 6 <br/>";
print_r($Matrix->determinant($matrix6));
echo "<br/>";

echo "Minor of Matrix 5 <br/>";
print_r($Matrix->minor($matrix5));

echo "Cofactor of Matrix 5 <br/>";
print_r($Matrix->cofactor($matrix5));

echo "Adjoint of Matrix 5 <br/>";
print_r($Matrix->adjoint($matrix5));

echo "Inverse of Matrix 5 <br/>";
print_r($Matrix->inverse($matrix5));

echo "Dividing Matrix 2 by Matrix 2... We should get an identity matrix <br/>";
print_r($Matrix->divide($matrix5, $matrix5));
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