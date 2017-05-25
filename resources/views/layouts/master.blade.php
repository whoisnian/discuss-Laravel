<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="/css/mystyle.css">
    </head>

    <body>
        <div class="wrapper">
            <div class="menu">
                <ul>
                    <li><a href="/">首页</a></li>
                    @if(Session::has('id'))
                    <li class="dropdown">
                        <a href="#">管理</a>
                        <div id="drop" class="drop-content">
                            <a href="/addmessage">新的留言</a>
                            @if(Session::get('id') != 2)
                            <a href="/userinfo/{{ Session::get('id') }}">个人信息</a>
                            <a href="/updatepassword">修改密码</a>
                            @endif
                            <a href="/logout">注销</a>
                        </div>
                    </li>
                    @else
                    <li><a href="/login">登录</a></li>
                    <li><a href="/register">注册</a></li>
                    <li><a href="/anonymous">匿名</a></li>
                    @endif
                </ul>
            </div>
            <br/>
            <br/>

@yield('content')
            
            <br/>
            <div class="push"></div>
	    </div>
        <footer class="footer">
            Copyright &copy; 2017 <a href="http://whoisnian.com" style="color:#FFFFFF;text-decoration:none;">nian</a> All Rights Reserved
        </footer>
    </body>
</html>