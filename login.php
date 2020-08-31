<?php
require 'config.php'
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Login | Devsbook_OO</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1"/>
    <link rel="stylesheet" href="<?= $base ?>/assets/css/login.css" />
    <link rel="shortcut icon" href="<?= $base ?>/assets/images/favicon.ico" type="image/x-icon">
</head>
<body>
    <header>
        <div class="container">
            <a href="<?= $base ?>"><img src="<?= $base ?>/assets/images/devsbook_logo.png" /></a>
        </div>
    </header>
    <section class="container main">
        <form method="POST" action="<?= $base; ?>/login_action.php">
            <?php if (!empty($_SESSION['flash'])) : ?>
                <div class="flash"><?= $_SESSION['flash'] ?></div>
                <?php $_SESSION['flash'] = ''; ?>
            <?php endif; ?>
            <input placeholder="Digite seu e-mail" class="input" type="email" name="email" />

            <input placeholder="Digite sua senha" class="input" type="password" name="password" />

            <input class="button" type="submit" value="Acessar o sistema" />

            <a href="<?= $base ?>/signup.php">Ainda não tem conta? Cadastre-se</a>
        </form>
    </section>
</body>
</html>