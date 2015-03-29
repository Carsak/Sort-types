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
//$array = array(9,8,7,5,6,2,3);

$f = fopen( "./array-400.txt", "r");
$array = unserialize(fgets( $f ));

$selectionSort = $array;
$insSort = $array;
$mergeSort = $array;
$count = count( $array );



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
	$j = $i - 1;
	while ( $j >= 0 && $insSort[$j]> $key ) {
		$insSort[$j+1] = $insSort[$j];
		$j--;
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
echo "<pre>"; print_r( $mergeSort);


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

?>
