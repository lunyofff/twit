<!DOCTYPE html>
<html lang="en">
<head>
	<title><?=$title;?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	
    <form class="login100-form validate-form flex-sb flex-w" method="post">

        <span>
            Логин
        </span>
        <div data-validate = "Введите логин">
            <input type="text" name="email" >
        </div>

        <span>
            Пароль
        </span>
        <div data-validate = "Введите пароль">
            <input type="text" name="pass" >
        </div>

        <button type="submit">
            Войти
        </button>

        <a href="../register.php"><button type="button">Регистрация</button></a>

	</form>
    
</body>
</html>