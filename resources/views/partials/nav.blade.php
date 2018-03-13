<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="#">Note entries</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#note-navbar" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="note-navbar">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        @if ( Auth::check())
        <form style="display:none;" id=logoutform name="logoutform" method="post" action="/logout">
        {{ csrf_field() }}
        </form>
        <a class="nav-link" href="javascript:$('#logoutform').submit();">Logout</a>
        @else
        <a class="nav-link" href="/login">Login</a>
        @endif
      </li>
      <li>
	  <form onsubmit="$('#searchform').attr('action', '/search/' + $('#searchString').val());" id="searchform" name="searchform" method="get">
	      <input type=text  style="float:left;"  id=searchString name=searchString value="">
		<span style="float:left;margin-left=:30px;" >&nbsp;&nbsp;</span>
	      <a style="float:left;" class="nav-link" href="javascript:$('#searchform').attr('action', '/search/' + $('#searchString').val()); $('#searchform').submit();">Search</a>
	  </form>
      </li>
    </ul>
  </div>
</nav>
