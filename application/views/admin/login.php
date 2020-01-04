<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <style>
        * {font-family: 'Arial', sans-serif;}
        body, div {padding: 0; margin: 0;}
        body {position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center; width: 100%; min-height: 100vh; background: linear-gradient(135deg, #f3c5bd 0%,#e86c57 31%,#ff6600 89%,#ff6600 100%);}
        .login-form form {
            display: block;
            padding: 32px;
            border: 1px solid black;
            box-shadow: 2px 2px 5px black;
            background: white;
        }
        .forms-fields {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: stretch;
            margin-bottom: 32px;
        }
        .form-fields p {
            color: gray;
            font-size: 14px;
        }
        .form-fields input[type="text"], .form-fields input[type="password"] {
            border: none;
            outline: none;
            color: black;
            border-bottom: 1px solid black;
            width: 100%;
            padding: 8px 0 2px 0;
            font-size: 18px;
        }
        input[type="submit"] {
            padding: 8px 32px;
            background: blue;
            border: none;
            border-radius: 6px;
            box-shadow: 2px 2px 5px black;
            cursor: pointer;
            color: white;
            text-decoration: none;
            width: 100%;
            margin-top: 32px;
        }
    </style>
</head>
<body>
    <div class="login-form">
        <?php echo validation_errors(); ?>
        <?php if ($this->session->flashdata('login_failed')) : ?>
        <p> Błąd logowania, spróbuj ponownie. </p>
        <?php endif; ?>

        <?php echo form_open('admin/login'); ?>
            <div class="form-fields">
                <input type="text" name="username" /> 
                <p>Login</p>
            </div>
            <div class="form-fields">
                <input type="password" name="password" />
                <p>Hasło</p>
            </div>
            <div style="text-align: center;">
                <input type="submit" value="Zaloguj" />
            </div>
        <?php echo form_close(); ?>
    </div>
</body>
</html> 