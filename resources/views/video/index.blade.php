<!DOCTYPE html>
<html>
<head>
	<title>video</title>
</head>
<style>
	video::-internal-media-controls-download-button {
	    display:none;
	}
	 
	video::-webkit-media-controls-enclosure {
	    overflow:hidden;
	}
	 
	video::-webkit-media-controls-panel {
	    width: calc(100% + 30px); /* Adjust as needed */
	}
</style>
<body>
<form action="{{ route('video.store') }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	{{ csrf_field() }}
	 <input type="file" name="file">
	 <input type="submit" name="submit">
</form>

<table>
	<thead>
		<tr>
			<th>header</th>
		</tr>
	</thead>
	<tbody>
		@foreach($Video as $vd)
		<tr>
			<td>
				<video width="620" height="240" controls>
				  <source src="{{ asset('storage/'.$vd->name) }}" type="video/mp4">
				  {{-- <source src="movie.ogg" type="video/ogg"> --}}
				 
				</video>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
</body>
</html>