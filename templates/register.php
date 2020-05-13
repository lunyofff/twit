<!DOCTYPE html>
<html lang="en">
<head>
	<title><?=$title;?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	
    <form method="post">
        
        <span>
            Имя
        </span>
        <div data-validate = "Введите имя">
            <input type="text" name="reg_name" >
        </div>
    
        <span>
            Фамилия
        </span>
        <div data-validate = "Введите фамилия">
            <input type="text" name="reg_surname" >
        </div>
        
        <span>
            О себе
        </span>
        <div data-validate = "О себе">
            <input type="text" name="reg_description" >
        </div>
    
        <span>
            Email
        </span>
        <div data-validate = "Введите email">
            <input type="text" name="reg_email" >
        </div>

        <span>
            Пароль
        </span>
        <div data-validate = "Введите пароль">
            <input type="text" name="reg_pass" >
        </div>

        <button type="submit">
            Регистрация
        </button>
        
        <?php
            if ($errors)
                foreach($errors as $err) 
                    echo $err;
        ?>

</form>
    
</body>
</html>