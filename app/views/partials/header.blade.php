<header class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}">Sitename</a>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
            <ul class="nav navbar-nav">
                <li><a href="#">Link</a></li>
                <li><a href="#">Link</a></li>
            </ul>
            {{--@if( Session::get() ) --}}

            @if ( Auth::check() )
            	<p class="navbar-text navbar-right">
            		<a href="{{ route('user.getProfile', Auth::user()->id) }}" class="navbar-link">{{ Auth::user()->email }}</a>
            	</p>
            	<ul class="nav navbar-nav navbar-right">
            		<li><a href="{{ route('auth.getLogout') }}">Log out</a></li>
            	</ul> 
            @else
                <form method="POST" action="{{ route('auth.postLogin') }}" class="navbar-form navbar-right" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-default">Sign In</button>
                </form>
            @endif
        </div>
    </div>
</header>