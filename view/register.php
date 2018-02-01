<!doctype html>
<html lang="en">
  <head>
    <title>Hello, world!</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-md-10">

          <form method="POST" action="/index.php?r=/login" class="form">
              <input type="text" name="username" placeholder="username">
              <input type="password" name="password" placeholder="password">
              <input type="password" name="password_approve" placeholder="password_approve">
              <input type="submit" value="Register!">
          </form>
        </div>

      </div>
    </div>
  </body>
</html>
