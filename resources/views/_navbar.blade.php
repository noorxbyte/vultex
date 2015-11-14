<!-- Navigation Bar -->
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('home') }}"><span class="glyphicon glyphicon-home"></span> Vultex</a>
        </div>
        <div>
            <ul class="nav navbar-nav">
                <!-- dropdown movies languages -->
                <li class="dropdown dropdown-hover">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="{{ route('videos', 'movies') }}">Movies
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @foreach($languages as $language)
                            <li><a href="{{ route('videos', 'movies') . '?language=' . $language->name }}">{{ $language->name }}</a></li>
                        @endforeach
                    </ul>
                </li>

                <!-- dropdown series languages -->
                <li class="dropdown dropdown-hover">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="{{ route('videos', 'series') }}">Series
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @foreach($languages as $language)
                            <li><a href="{{ route('videos', 'series') . '?language=' . $language->name }}">{{ $language->name }}</a></li>
                        @endforeach
                    </ul>
                </li>

                <!-- anime -->
                <li><a href="{{ route('videos', 'anime') }}">Anime</a></li>

                <!-- dropdown videos languages -->
                <li class="dropdown dropdown-hover">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="{{ route('videos', 'documentries') }}">Documentries
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @foreach($languages as $language)
                            <li><a href="{{ route('videos', 'documentries') . '?language=' . $language->name }}">{{ $language->name }}</a></li>
                        @endforeach
                    </ul>
                </li>

                @if(Auth::check())

                    <!-- dropdown new -->
                    <li class="dropdown dropdown-hover">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">New
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('languages.create') }}">Language</a></li>
                            <li><a href="{{ route('qualities.create') }}">Quality</a></li>
                        </ul>
                    </li>

                    <!-- dropdown new product -->
                    <li class="dropdown dropdown-hover">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">New Product
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('products.create') . '?type=movie' }}">Movie</a></li>
                            <li><a href="{{ route('products.create') . '?type=series' }}">Series</a></li>
                            <li><a href="{{ route('products.create') . '?type=anime' }}">Anime</a></li>
                            <li><a href="{{ route('products.create') . '?type=video' }}">Video</a></li>
                        </ul>
                    </li>

                    <li><a href="{{ route('languages.index') }}">Languages</a></li>
                    <li><a href="{{ route('qualities.index') }}">Qualities</a></li>

                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown dropdown-hover">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> {{ Auth::user()->name }}
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
                            <li><a href="{{ route('logout') }}"><span class="glyphicon glyphicon-log-out"></span> <strong>Logout</strong></a></li>
                        </ul>
                    </li>
                @endif
            </ul>
            </ul>
        </div>
    </div>
</nav><hr/>