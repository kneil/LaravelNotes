@extends('layout')

@section('content')

<div class="large-container container note-posts">
	<div class="row">
</div>

<p></p>

@if ( Auth::check() )

<div class="large-container container authorised-section">
	<div class="row">
		Update the entry:
		<p></p>

		<form method="post" action="/note/{{ $note->id }}">
			<input name=content value="{{ $note->content }}">
			<input type=hidden name=page value="{{ $page }}">
			{{ csrf_field() }}
			{{ method_field('PUT') }}
			<input type=submit value="Update">
		</form>
	</div>
</div>

@endif

</div>

@endsection
