<?php 
$oldValue = old($key);

if( $oldValue !== null ){
	$value = $oldValue;
}
else{
	$value = '';
}

?>

<input id="{{ $key }}" type="password" class="form-control" name="{{ $key }}" value="{{ $value }}" autofocus>
