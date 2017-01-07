<?php 
$oldValue = old($key);

if( $oldValue !== null ){
	$value = $oldValue;
}
else{
	if(isset($data)){
		$value = $data->$key;
	}
	else
		$value = '';
}

?>


<input id="{{ $key }}" type="text" class="form-control" name="{{ $key }}" value="{{ $value }}" autofocus>
