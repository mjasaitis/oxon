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


<script>
	$(document).ready(function(){

		$("#{{ $key }}").on('input', function(){

			var value = $(this).val()

			if( value.match(/[a-zA-Z0-9_-]{11}/g) ){

				$.ajax({
  					url: '{{ url('/videos/youtube-info') }}',
	  				dataType: 'json',
	  				data: {youtube_id: value, _token:  window.Laravel.csrfToken },
	  				type:'post',
	  				cache: false,
	  				success: function(data)
					{
						if( typeof data.items == "undefined" )
							return;

						var item = data.items[0];

						$("#title").val( item.snippet.title );
						$("#views").val( item.statistics.viewCount );
						$("#comments").val( item.statistics.commentCount );
						$("#thumbnail").val( item.snippet.thumbnails.default.url );


	  				},
				});
			}

			if( value == ''){
				$("#title").val( '' );
				$("#views").val( '' );
				$("#comments").val( '' );
				$("#thumbnail").val( '' );
			}


		});
	});

</script>