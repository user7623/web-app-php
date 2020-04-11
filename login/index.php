<?php
$msg = '';
//proveri dali se postaveni username i password i dali e stegnato login
if(isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password']))
{
    //proveri dali se tocnni
    //ova treba pokasno so funckii za proverka od databaza i da se koristat klasi
    if($_POST['username'] == 'username' && $_POST['password'] == 'password')
    {
         $_SESSION['valid'] = true;
         $_SESSION['timeout'] = time();
         $_SESSION['username'] = $_POST['username'];
        $msg = 'login success';
    }
    else
    {
        $msg = 'invalid username or password';
    }
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title>#Site name#</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="asset.css" />
        <div class="head_div">
            <h1>Welcome to # Site name #</h1>
        </div>
    </head>
    <body>
        <div class="wrapper">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <?php if($msg != '') : ?>
                <p class="error"><?php echo $msg ?></p>
                <?php endif; ?>
                <label>Username</label><br>
                <input type="text" name="username" placeholder="username here" required autofocus><br>
                <label>Password</label><br>
                <input type="text" name="password" placeholder="password here" required><br><br>
                
                <button class="basic_button" type="submit" name="login">Log in</button>
            </form>
            <form method="post" action="register.php">
            <div>
                <button class="basic_button_2" type="submit" name="register">Register</button>
            </div>
            </form>
        </div>
    </body>
</html>