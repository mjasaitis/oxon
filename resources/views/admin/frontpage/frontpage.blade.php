@extends('layouts.app')
@section('content')
	<div class="container">

		<div class="bs-glyphicons">
			<ul class="bs-glyphicons-list">
				<li>
					<a href="/admin/videos">
						<span class="glyphicon glyphicon-play-circle" aria-hidden="true"></span>
						<span class="glyphicon-class">Videos</span>
					</a>
				</li>
			</ul>

			<?php 

			/*

			$video_url = 'https://www.youtube.com/watch?v=bHQqvYy5KYo';
			$url = 'http://www.youtube.com/oembed?format=json&url=' . $video_url;

			$curl = curl_init($url);
 			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
 			$response = curl_exec($curl);
 			curl_close($curl);
 			$response = json_decode($response, true);
 			print_r( $response );

 			*/

 			/*

 			$url = 'https://www.googleapis.com/youtube/v3/videos?part=statistics,snippet&id=9YEyuRlSieg&key=AIzaSyA_96zWJldGgdSelH27-3gJ7ah1FUyHE3Q';

 			 $curl = curl_init($url);
 			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
 			$response = curl_exec($curl);
 			curl_close($curl);
 			$response = json_decode($response, true);
 			print_r( $response );

 			*/


			?>


		</div>

	</div>
@stop