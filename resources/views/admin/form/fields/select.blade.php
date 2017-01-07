<?php 

$modelClass = $item['params']['model'];
$model = new $modelClass();
$options = $model->orderBy('title')->get();

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

<select name="{{ $key }}" >
	<option value="" >---</option>
@foreach( $options as $option )
	<option value="{{ $option->id }}" @if( $value==$option->id ) selected @endif >{{ $option->title }}</option>
@endforeach
</select>