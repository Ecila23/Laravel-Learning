<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>PHP Learning</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
        <link href="/css/default.css" rel="stylesheet" type="text/css" media="all" />
        <link href="/css/fonts.css" rel="stylesheet" type="text/css" media="all" />
    </head>
    <body>
        <div id="header-wrapper">
            <div id="header" class="container">
                <div id="logo">
                    <ul>
                        @auth
                        <li>
                            <a class="dropdown-item" href="/logout"
                               onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"
                            >
                                Logout
                            </a>
                            <form id="logout-form" action="/logout" method="POST" style="display: none;">
                                @csrf
                            </form> 
                        </li>
                        @else
                        <li><a href="/login" title="">Log In</a></li>
                        <li><a href="/register" title="All Posts">Register</a></li>
                        @endauth
                    </ul>
                </div>
                <div id="menu">
                    <ul>
                        <li class="{{ Request::path() === '/' ? 'current_page_item' : ''}}"><a href="/" accesskey="1" title="">Homepage</a></li>
                        <li class="{{ Request::path() === 'posts' ? 'current_page_item' : ''}}"><a href="/posts" accesskey="2" title="All Posts">All Posts</a></li>
                        <li class="{{ Request::path() === 'posts/new' ? 'current_page_item' : ''}}"><a href="/posts/new" accesskey="3" title="New Post">New Post</a></li>
                        <li class="{{ Request::path() === 'email' ? 'current_page_item' : ''}}"><a href="/email" accesskey="4" title="Email">Email</a></li>
                        <li class="{{ Request::path() === 'notifications/new' ? 'current_page_item' : ''}}"><a href="/notifications/new" accesskey="5" title="Notification">Notification</a></li>
                    </ul>
                </div>
            </div>
        </div>
            @yield ('content')
        <div id="copyright" class="container">
            <p>I made this monstrosity. Me, Alice. </p>
        </div>
    </body>
</html>
