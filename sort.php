<!doctype html>
<meta charset="utf-8" />

<?
/*$array = array();
$count = 200;
for ($i=0; $i < $count; $i++) {
	$array[] = mt_rand(0, 9999);
}*/

/*$f = fopen( "./array-9999.txt", "w+");
$ser = serialize( $array);
fputs( $f, $ser);*/


$f = fopen( "./array-400.txt", "r");
$array = unserialize(fgets( $f ));
//$array = array(9,8,7,5,6,2,3);
$selectionSort = $array;
$insSort = $array;
$mergeSort = $array;
$quickSort = $array;
$count = count( $array );


/*
// Selection Sort

$start = microtime(true);
for ($i = 0; $i < $count; $i++) {
	$smallest = $i;

	for ( $j = ($i+1); $j < $count; $j++) {
		if ( $selectionSort[$smallest] > $selectionSort[$j] ) {
			$smallest = $j;
		}

	}
	$tmp = $selectionSort[$smallest];
	$selectionSort[$smallest] = $selectionSort[$i];
	$selectionSort[$i] = $tmp;
}

$finish_time = microtime(true); 
$result_time = $finish_time - $start;
printf('<br />Затрачено %.4F сек. на сортировку выборкой, при размере массива %s', $result_time, $count);

// echo "<pre>"; print_r( $selectionSort);

// Insertion Sort
$start = microtime(true);
for ( $i = 1; $i < $count; $i++) { 
	$key = $insSort[$i];
//	$j = $i - 1;
	for( $j = $i - 1; $j >= 0 && $insSort[$j]> $key; $j-- ) {
		$insSort[$j+1] = $insSort[$j];
	}
	$insSort[$j+1] = $key;
}
$finish_time = microtime(true); 
$result_time = $finish_time - $start;
printf('<br />Затрачено %.4F сек. на сортировку вставкой, при размере массива %s', $result_time, $count);
// echo "<pre>"; print_r( $insSort);

// Merge Sort

$start = microtime(true);
mergeSort( $mergeSort, 0, $count - 1 );
$finish_time = microtime(true); 
$result_time = $finish_time - $start;
printf('<br />Затрачено %.4F сек. на сортировку слиянием, при размере массива %s', $result_time, $count);
//echo "<pre>"; print_r( $mergeSort);*/

quickSort( $quickSort, 0, $count - 1  );
echo "<pre>"; print_r( $quickSort);

function mergeSort( &$mergeSort, $p, $r ){
	if ( $p >= $r) {
		return true;
	}

	$q = floor( ($p + $r) / 2);
	mergeSort( $mergeSort, $p, $q );
	mergeSort( $mergeSort, $q + 1, $r );
	merge( $mergeSort, $p, $q, $r);

}

function merge( &$mergeSort, $p, $q, $r){
	$B = array();
	$C = array();
	for( $i = $p; $i <= $q; $i++ ){
		$B[] = $mergeSort[$i];
	}
	for( $i = $q + 1; $i <= $r; $i++ ){
		$C[] = $mergeSort[$i];
	}
	$B[] = INF;
	$C[] = INF;
	$i = 0;
	$j = 0;
	for ( $k = $p; $k <= $r; $k++) {
		if ( $B[$i] <= $C[$j] ) {
			$mergeSort[$k] = $B[$i];
			$i++;
		}
		else{
			$mergeSort[$k] = $C[$j];
			$j++;
		}
	}
}

function quickSort( &$quickSort, $p, $r){
	if( $p >= $r){
		return true;
	}
	$q = partition( $quickSort, $p, $r );
	quickSort( $quickSort, $p, $q -1 );
	quickSort( $quickSort, $q + 1, $r );
}
function partition( &$quickSort, $p, $r ){
	$q = $p;
	for( $u = $p; $u < $r; $u++ ){
		if($quickSort[$u] <= $quickSort[$r]){
			$tmp = $quickSort[$q];
			$quickSort[$q] = $quickSort[$u];
			$quickSort[$u] = $tmp;
			$q++;
		}
	}
	$tmp1 = $quickSort[$q];
	$quickSort[$q] = $quickSort[$r];
	$quickSort[$r] = $tmp1;
	return $q;
}
?>
