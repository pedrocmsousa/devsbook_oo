<?php
require_once 'config.php';
require_once 'models/Auth.php';
require_once 'dao/UserDaoMysql.php';

$auth = new Auth($pdo, $base);
$userInfo = $auth->checkToken();
$activeMenu = 'settings';

$userDao = new UserDaoMysql($pdo);

$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$birthdate = filter_input(INPUT_POST, 'birthdate');
$city = filter_input(INPUT_POST, 'city');
$work = filter_input(INPUT_POST, 'work');
$password = filter_input(INPUT_POST, 'password');
$password_confirmation = filter_input(INPUT_POST, 'password_confirmation');

if($name && $email) {
    $userInfo->name = $name;
    $userInfo->city = $city;
    $userInfo->work = $work;

    // Validação de email
    if($userInfo->email != $email) {
        if($userDao->findByEmail($email) === false) {
            $userInfo->email = $email;
        } else {
            $_SESSION['flash'] = 'E-mail já existe!!!';
            header("Location: ".$base."/settings.php");
            exit;
        }
    }

    // Validação de birthdate
    $birthdate = explode('/', $birthdate);
    if(count($birthdate) != 3) {
        $_SESSION['flash'] = 'Data de Nascimento inválida!!';
        header("Location: ".$base."/settings.php");
        exit;
    }
    $birthdate = $birthdate[2].'-'.$birthdate[1].'-'.$birthdate[0];
    if(strtotime($birthdate) === false) {
        $_SESSION['flash'] = 'Data de Nascimento inválida!!';
        header("Location: ".$base."/settings.php");
        exit;
    }
    $userInfo->birthdate = $birthdate;

    // Troca de senha
    if($password === $password_confirmation) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $userInfo->password = $hash;
    } else {
        $_SESSION['flash'] = 'As senhas não batem!!';
        header("Location: ".$base."/settings.php");
        exit;
    }

    // Avatar
    if(isset($_FILES['avatar']) && !empty($_FILES['avatar']['tmp_name'])) {
        $newAvatar = $_FILES['avatar'];

        if(in_array($newAvatar['type'], ['image/jpeg', 'image/jpg', 'image/png'])) {
            $tmp_name = $newAvatar['tmp_name'];
            $avatarWidth = 200;
            $avatarHeight = 200;

            list($widthOrig, $heightOrig) = getimagesize($tmp_name);
            $ratio = $widthOrig / $heightOrig;

            $newWidth = $avatarWidth;
            $newHeight = $avatarHeight;

            if($newHeight < $avatarHeight) {
                $newHeight = $avatarHeight;
                $newWidth = $newHeight * $ratio;
            }

            $x = $avatarWidth - $newWidth;
            $y = $avatarHeight - $newHeight;
            $x = $x<0 ? $x/2 : $x;
            $y = $y<0 ? $y/2 : $y;

            $finalImage = imagecreatetruecolor($avatarWidth, $avatarHeight);
            switch($newAvatar['type']) {
                case 'image/jpeg':
                case 'image/jpg':
                    $image = imagecreatefromjpeg($tmp_name);
                break;
                case 'image/png':
                    $image = imagecreatefrompng($tmp_name);
                break;
            }

            imagecopyresampled(
                $finalImage, $image,
                $x, $y, 0, 0,
                $newWidth, $newHeight, $widthOrig, $heightOrig
            );

            $avatarName = md5(time().rand(0, 9999)).'.jpg';
            imagejpeg($finalImage, './media/avatars/'.$avatarName, 100);

            $userInfo->avatar = $avatarName;

        } 
    }

    // Cover
    if(isset($_FILES['cover']) && !empty($_FILES['cover']['tmp_name'])) {
        $newCover = $_FILES['cover'];

        if(in_array($newCover['type'], ['image/jpeg', 'image/jpg', 'image/png'])) {
            $tmp_name = $newCover['tmp_name'];
            $coverWidth = 850;
            $coverHeight = 313;

            list($widthOrig, $heightOrig) = getimagesize($tmp_name);
            $ratio = $widthOrig / $heightOrig;

            $newWidth = $coverWidth;
            $newHeight = $coverHeight;

            if($newHeight < $coverHeight) {
                $newHeight = $coverHeight;
                $newWidth = $newHeight * $ratio;
            }

            $x = $coverWidth - $newWidth;
            $y = $coverHeight - $newHeight;
            $x = $x<0 ? $x/2 : $x;
            $y = $y<0 ? $y/2 : $y;

            $finalImage = imagecreatetruecolor($coverWidth, $coverHeight);
            switch($newCover['type']) {
                case 'image/jpeg':
                case 'image/jpg':
                    $image = imagecreatefromjpeg($tmp_name);
                break;
                case 'image/png':
                    $image = imagecreatefrompng($tmp_name);
                break;
            }

            imagecopyresampled(
                $finalImage, $image,
                $x, $y, 0, 0,
                $newWidth, $newHeight, $widthOrig, $heightOrig
            );

            $coverName = md5(time().rand(0, 9999)).'.jpg';
            imagejpeg($finalImage, './media/covers/'.$coverName, 100);

            $userInfo->cover = $coverName;

        } 
    }   

    $userDao->update($userInfo);
}

header("Location: ".$base."/settings.php");
exit;