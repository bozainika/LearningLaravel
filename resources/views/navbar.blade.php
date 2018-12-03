

<nav class="navbar navbar-default">
<div class="container-fluid">
<!-- Brand and toggle get grouped for better mobile display -->
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="#">First site</a>
</div>
<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<ul class="nav navbar-nav">
<li><a href="/">Home <span class="sr-only">(current)</span></a></li>
<li><a href="/about">About</a></li>
<li><a href="/contacts">Contacts</a></li>
<li><a href="/tickets">Tickets</a></li>
<li><a href="/blog">Blog</a></li>
@if (Auth::check())
	@if(Auth::user()->hasRole('Manager'))
		<li><a href="/admin">Control Panel</a></li>
		<li><a href="/admin/posts">Posts</a></li>
	@endif	
<li><a href="/users/logout">Logout</a></li>
@else
<li><a href="/users/register">Register</a></li>
<li><a href="/users/login">Login</a></li>
@endif
</ul>
</div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>