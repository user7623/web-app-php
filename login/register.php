<?php
$msg = '';
$pass = filter_input(INPUT_POST, 'password');
$pass_confirm = filter_input(INPUT_POST, 'password_confirm');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
//proveri dali e vnesen validen meil

if($email !== true && !empty($pass))
{
    $msg = 'Please input valid email';
}

//proveri dali e unikatno username

//proveri dali se sovpagjaad passwords
if($pass != $pass_confirm)
{
    $msg = 'password inputs not matching';
}

// ako se e vo red prati meil 

if($msg == '' && !empty($pass))
{
    $msg = 'cekam_avtentikacija';
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>#Site name#</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="asset_reg.css" />
        <div class="head_div">
            <h1>Register to # Site name #</h1>
        </div>
    </head>
    <body>
        <div class="wrapper">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <?php if($msg == 'cekam_avtentikacija') : ?>
                <p>Check inbox for conformation! NOW!!!</p>
                <div>
                    <!-- ova moze mn podobro -->
                    <a href="http://localhost:84/web_php/login" class="button">Back to log in</a>
                </div>
                <?php else : ?>
                    <?php if($msg != '') : ?>
                    <p class="error"><?php echo $msg ?></p>
                    <?php endif; ?>
                    <label>Username</label><br>
                    <input type="text" name="username" placeholder="username here" required autofocus><br>
                    <label>Password</label><br>
                    <input type="text" name="password" placeholder="password here" required><br><br>
                    <label>Confirm Password</label><br>
                    <input type="text" name="password_confirm" placeholder="repeat password here" required><br>
                    <label>Email</label><br>
                    <input type="text" name="email" placeholder="Your email" required><br>

                    <button class="basic_button" type="submit" name="register_new_user">Register</button>
                <?php endif; ?>
                   
            </form>
        </div>
    </body>
</html>
