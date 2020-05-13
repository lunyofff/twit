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
        
    <br />

    <?php endforeach; ?>
        
    <br />
        
    <form method="post">

        <span>
            Оставить сообщение
        </span>
        <div data-validate = "Оставить сообщение">
            <input type="text" name="tweet" >
        </div>

        <button type="submit">
            Твитнуть
        </button>

	</form>
        
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