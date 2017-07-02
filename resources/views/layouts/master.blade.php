<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
        <link rel="stylesheet" type="text/css" href="/css/nian.css">
    </head>

    <body ontouchstart>
        <div class="wrapper">
        	<div class="menu">
				<a class="menu-title" href="/">Discuss</a>
				<nav class="other">
                    <a href="/">首页</a>
                    @if(Session::has('id'))
                </nav>
				<nav class="dropdown">
					<a href="#">管理</a><br/>
					<nav class="drop-content">
						<a href="/addmessage">新的留言</a>
                        @if(Session::get('id') != 2)
						<a href="/userinfo/{{ Session::get('id') }}">个人信息</a>
						<a href="/updatepassword">修改密码</a>
                        @endif
                        <a href="/logout">注销</a>
					</nav>
				</nav>
                    @else
                    <a href="/login">登录</a>
                    <a href="/register">注册</a>
                    <a href="/anonymous">匿名</a>
                </nav>
                    @endif
			</div>
            <br/>
            <br/>

@yield('content')
            
            <br/>
            <div class="push"></div>
	    </div>
        <footer class="footer">
            Copyright &copy; 2017 <a href="https://whoisnian.com">nian</a>
            All Rights Reserved
        </footer>
    </body>
</html>
