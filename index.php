<?php
require_once 'config.php';
require_once 'models/Auth.php';
require_once 'dao/PostDaoMysql.php';

$auth = new Auth($pdo, $base);
$userInfo = $auth->checkToken();
$activeMenu = 'home';

$postDao = new PostDaoMysql($pdo);
$feed = $postDao->getHomeFeed($userInfo->id);

require 'partials/header.php';
require 'partials/menu.php';
?>
<section class="feed mt-10">
<div class="row">
    <div class="column pr-5">
        <?php require 'partials/feed-editor.php'; ?>
        <?php foreach($feed as $item): ?>
            <?php require 'partials/feed-item.php'; ?>
        <?php endforeach; ?>
    </div>
    <div class="column side pl-5">
    <div class="box banners">
            <div class="box-header">
                <div class="box-header-text">Patrocinios</div>
                <div class="box-header-buttons">
                </div>
            </div>
            <div class="box-body">
                <a href="https://b7web.com.br/fullstack/" target="_blank"><img src="<?= $base; ?>/media/sponsors/fullstack.jpg" /></a>
                <a href="https://alunos.b7web.com.br/curso/javascript" target="_blank"><img src="<?= $base; ?>/media/sponsors/javascript.jpg" /></a>
            </div>
        </div>
        <div class="box">
            <div class="box-body m-10 create">
                <a href="https://pedrocmsousa.dev" target="_blank">Criado com ❤️ por Pedro Sousa</a>
            </div>
        </div>
    </div>
</div>
</section>
<?php
require 'partials/footer.php';
?>