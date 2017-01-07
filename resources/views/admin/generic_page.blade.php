@extends('layouts.app')
@section('content')
	<div class="container">
		<nav class="navbar navbar-default">
				<ol class="breadcrumb breadcrumb-left">
	  			<li><a href="/admin">Home</a></li>
	  			<li class="active" >{{ $pageTitle }}</li>
				</ol>
			<ul class="nav navbar-nav navbar-right">
				<li>
					 <button onclick="document.location='{{ $pageUrl }}/create'" type="button" class="btn btn-primary" aria-haspopup="true" aria-expanded="false">Create new</button>
				</li>
			</ul>
		</nav>

		@include( 'admin.table.table' )
	</div>
@stop

