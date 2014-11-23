<?php
include_once "php/headSection.php";
?>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
        <form class="form-signin" role="form" action="php/UserLogin.php" method="POST">
            <h2 class="form-signin-heading">Sign in to Continue</h2>
            <label for="inputUsername" class="sr-only">Username:</label>
            <input type="text" id="inputUsername" name="user" class="form-control" placeholder="Username" required autofocus>
            <label for="inputPassword" class="sr-only">Password:</label>
            <input type="password" id="inputPassword" name="pass" class="form-control" placeholder="Password" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit" value="Submit">Sign in</button>
        </form>
        </div>
    </div>
</div>
</body>
</html>
