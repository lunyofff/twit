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
        
    <a href="../index.php"><button>Главная</button></a> <br /> <br />
    
    <?php foreach ($table as $value): ?>

    <tr>
    <td> Имя: <?=strip_tags($value['name']);?> </td> <br />
    <td> Фамилия: <?=strip_tags($value['surname']);?> </td> <br />
    <td class="center"> О себе: <?=strip_tags($value['description']);?> </td> <br />
    <td class="center"> Email: <?=strip_tags($value['email']);?> </td>
    </tr>
    
    <br /> <br />
        
    <?php
        foreach ($is_sent as $value)
            if ($_SESSION['user']['id'] == $value['receiver_id']) {
                $can_accept = true;
            } else {
                $can_accept = false;
            };
    ?>  
        
        <?php if ($already_sent == true && $is_accepted == false): ?>
            <p>Вы читаете</p>
            <form method="post">
                <button name="unfollow" value="unfollow">Отписаться</button>
            </form>
        <?php endif; ?>
        
        <?php if ($already_sent == false): ?>
            <form method="post">
                <button name="friend_send" type="submit" value="friend_send">Читать</button>
            </form>
        <?php endif; ?>
        
        

    <br />

    <?php endforeach; ?>
    
    <?php if ($posts): ?>
        <p>Твиты<p>
            <?php foreach ($posts as $value): ?>
                <tr><td><?=strip_tags($value['text']);?></td></tr> <br />
            <?php endforeach; ?>
    <?php else: ?>
        <p>Твитов нет<p>
    <?php endif;?>
        
    </body>

</html>