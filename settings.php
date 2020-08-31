<?php
require_once 'config.php';
require_once 'models/Auth.php';
require_once 'dao/UserDaoMysql.php';

$auth = new Auth($pdo, $base);
$userInfo = $auth->checkToken();
$activeMenu = 'settings';

$userDao = new UserDaoMysql($pdo);

require 'partials/header.php';
require 'partials/menu.php';
?>
<section class="feed mt-10">
<div class="row">
    <div class="column pr-5">
        <h1>Configurações</h1>
        <?php if (!empty($_SESSION['flash'])) : ?>
            <div class="flash"><?= $_SESSION['flash'] ?></div>
            <?php $_SESSION['flash'] = ''; ?>
        <?php endif; ?>
        <form method="POST" class="config-form" enctype="multipart/form-data" action="<?=$base;?>/settings_action.php">
        <label for="avatar">
            Novo Avatar:<br/>
            <input type="file" name="avatar" /><br/>
            <img class="mini"  src="<?=$base?>/media/avatars/<?=$userInfo->avatar;?>" alt="Avatar">
        </label>
        <label for="cover">
            Nova Capa:<br/>
            <input type="file" name="cover" /><br/>
            <img class="mini"  src="<?=$base?>/media/covers/<?=$userInfo->cover;?>" alt="Cover">
        </label>
        <hr/>
        <label for="name">
            Nome Completo:<br/>
            <input type="text" name="name" value="<?=$userInfo->name;?>" />
        </label>
        <label for="email">
            Email:<br/>
            <input type="email" name="email" value="<?=$userInfo->email;?>" />
        </label>
        <label for="birthdate">
            Data de Nascimento:<br/>
            <input type="text" name="birthdate" value="<?=date('d/m/Y', strtotime($userInfo->birthdate));?>" id="birthdate" />
        </label>
        <label for="city">
            Cidade:<br/>
            <input type="text" name="city" value="<?=$userInfo->city;?>" />
        </label>
        <label for="work">
            Trabalho:<br/>
            <input type="text" name="work" value="<?=$userInfo->work;?>" />
        </label>
        <hr/>
        <label for="password">
            Nova Senha:<br/>
            <input type="password" name="password" />
        </label>
        <label for="password">
            Confirmar Nova Senha:<br/>
            <input type="password" name="password_confirmation" />
        </label>
        <button class="button">Atualizar Cadastro</button>
        </form>
    </div>
    <div class="column side pl-5">
        <?php require 'partials/sponsors.php'; ?>
    </div>
</div>
</section>
    <script type="text/javascript" src="<?= $base; ?>/assets/js/imask.min.js"></script>
    <script>
        IMask(
            document.getElementById("birthdate"),
            {mask: '00/00/0000'}
        );
    </script>
<?php
require 'partials/footer.php';
?>