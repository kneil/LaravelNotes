@extends('layout')

@section('content')
<div class="large-container container note-posts">
	<div class="row">
		<table>
			@foreach ( $notes as $note)
			<tr>
				<td>
					<li></li>
				</td>
				<td>
					{!! $note->content !!}
				</td>
				@if ( Auth::check() )
				<td>
					<form method="get" action="/note/{{ $note->id }}">
						<input type="hidden" name=page value="{{ $page }}">
						<input type="submit" value="Edit">
					</form>
				</td>
				<td>
					<form method="post" action="/note/{{ $note->id }}?page={{ $page }}">
						<input type="submit" value="Delete">
    					{{ csrf_field() }}
    					{{ method_field('DELETE') }}
					</form>
				</td>
				@endif
			</tr>
			@endforeach
		</table>
	</div>
</div>
<p></p>
</div>
<div class="large-container container">
	<div class="row">
	</div>
<?php echo $notes->render(); ?>
	</div>
</div>

@if ( Auth::check() )
<div class="large-container container authorised-section">
	<div class="row">
Create a new entry:
	<p></p>
		<form method="post" action="/note">
			<input name=content>
				{{ csrf_field() }}
			<input type=submit value="Create">
		</form>
	</div>
</div>
@endif

@endsection
