@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    @if(Auth::guest() )
        @include("auth.login")
    @else
    	<table id="videos" class="table">
    	<thead>
            <tr>
                <th>Thumbnail</th>
                <th>Title</th>
                <th>Views</th>
                <th>Comments</th>
            </tr>
        </thead>
    	</table>

    	<script >
    	$(document).ready(function(){

	 		$('#videos').DataTable( {
	 			"aoColumns": [
    			    { "mData": "thumbnail" },
        			{ "mData": "title" },
        			{ "mData": "views" },
        			{ "mData": "comments" }
    			],
	        	"processing": true,
	        	"serverSide": true,
	        	"ajax": "http://localhost:8000/videos/list",
	        	"order": [[ 2, "desc" ]]
	    	});

    	});
    		
    	</script>

    @endif
    </div>
</div>
@endsection



