<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Test</title>
        <link rel="stylesheet" href="css/test.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
    </head>

    <body>
        <div class="form">

        <h1>Registraion Form </h1>
        <form action='connect.php' method="POST">

            <label for="user">Name: </label><br>
            <input type="text" name="name" id="name" required/><br><br>
            
            <label for="email">Email:</label><br>
            <input type="email" name="email" id="email" required/> <br><br>

            <label for="phone">Phone:</label><br>
            <input type="text" name="phone" id="phone" required/> <br><br>

            <input type="submit" name="submit" id="submit"/>
        </form>

        </div>

    </body>
</html>