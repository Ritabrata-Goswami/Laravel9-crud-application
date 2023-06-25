<html>
    <title>Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-metro.css">
    <body>
        <h2 style="text-align:center;">Login form</h2>
        <div style="login-container">
            <form method="post" action="/login" class="w3-padding">
                @csrf
                <span style="font-size:13.5px;">User id:</span>
                <input type="text" name="enter_id" placeholder="Enter user id" class="w3-input w3-border" style="font-size:13.5px;"/>
                <span style="font-size:13.5px;">Password:</span>
                <input type="text" name="enter_pass" placeholder="Enter password" class="w3-input w3-border" style="font-size:13.5px;"/>
                <div class="w3-margin-top w3-center">
                    <input type="submit" name="submit" value="Login" class="w3-button w3-blue w3-hover-black" style="font-size:13.5px;"/>
                </div>
            </form>
        </div>
    </body>
</html>
