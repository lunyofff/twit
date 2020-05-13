<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title><?=$title;?></title>
    </head>
    <body>
        
    <button onclick="window.location.href='/myprofile.php'">Мой профиль</button>
    <button onclick="window.location.href='/logout.php'">Выйти</button>
        
    <p>Профили пользователей</p>
        
    <?php foreach ($table as $value): ?>
        
    <tr>
    <td> Имя: <?=strip_tags($value['name']);?> </td>
    <td> Фамилия: <?=strip_tags($value['surname']);?> </td>
    <td class="center"> О себе: <?=strip_tags($value['description']);?> </td>
    </tr>
    
    <button onclick="window.location.href='/profile.php/?id=<?=$value['id'];?>'">Профиль</button>
        
    <br />

    <?php endforeach; ?>
        
    </body>

</html>