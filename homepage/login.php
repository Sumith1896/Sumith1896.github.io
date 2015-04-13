<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login form</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

  </head>
  <body>
  <div id="fb-root">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <center><h1>Greetings, human!</h1></center>
                <center><h3>Not all can trespass here, make sure you're the chosen one</h3></center>
                <hr>
                <form action="ldapauth.php" method="post">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 well">
                            <div class="form-group">
                                <p>LDAP Id</p>
                                <input type="text" name="user" placeholder="LDAP id" tabindex="3"><br>
                                <p>Password</p>
                                <input type="text" name="pass" placeholder="Password" tabindex="3"><br>
                            </div>
                            <center><button class="btn btn-primary btn-lg" type="submit" name="findbtn">Authenticate</button></center>
                        </div>
                    </div>
                </form>
                <br>
            </div>
        </div>
    </div>
  </body>
</html>