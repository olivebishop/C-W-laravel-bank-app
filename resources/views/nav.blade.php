<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
            *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            nav{
                width: 100%;
                height: 100px;
                background-color: #333;
            }
            nav ul{
                width: 100%;
                height: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            nav ul li{
                list-style: none;
                margin: 0 10px;
                padding: 0 10px;
            }
            nav ul li a{
                text-decoration: none;
                color: #fff;
                font-size: 18px;
                font-weight: 500;
            }
            nav ul li a:hover{
                color: #4caf50;
            }
            </style>

</head>
<body>
    <div>
        <nav>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/about">About</a></li>
                <li><a href="/services">Services</a></li>
                <li><a href="/contacts">Contacts</a></li>
                <li><a href="/login">Login</a></li>
                <li><a href="/signup">Signup</a></li>
            </ul>
        </nav>
    </div>
</body>
</html>


