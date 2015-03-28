<!doctype html>
<meta charset="utf-8" />

<?
$array = array();
$count = 400;
for ($i=0; $i < $count; $i++) {
	$array[] = mt_rand(0, 999);
}

$selectionSort = $array;
$insSort = $array;


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
?>
