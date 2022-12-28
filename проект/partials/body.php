<?php
if (isset($_POST['sign-up'])) {
    header('Location: ../pages/login.php');
}
?>

<main>
    <div class="container">
        <div class="heading">Регистрация</div>
        <form action="" method="post" class="form">
            <div class="form__field">
                <input type="text" name="name" id="name" value="<?=@$name;?>">
                <label for="name">Введите ФИО</label>
                <div class="error"><?=@$nameError;?></div>
            </div>

            <div class="form__field">
                <input type="text" name="login" id="login" value="<?=@$login;?>">
                <label for=" login">Введите логин</label>
                <div class="error"><?=@$loginError;?></div>
            </div>

            <div class="form__field">
                <input type="email" name="email" id="email" value="<?=@$email;?>">
                <label for="email">Введите email</label>
                <div class="error"><?=@$emailError;?></div>
            </div>

            <div class="form__field">
                <input type="password" name="password" id="password" value="<?=@$password;?>">
                <label for="password">Придумайте пароль</label>
                <div class="error"><?=@$passwordError;?></div>
            </div>

            <div class="form__field">
                <input type="password" name="password-check" id="password-check" value="<?=@$passwordCheck;?>">
                <label for="password-check">Повторите пароль</label>
                <div class="error"><?=@$passwordCheckError;?></div>
            </div>

            <div class="form__field">
                <input type="tel" name="phone" id="phone" value="<?=@$phone;?>">
                <label for="phone">Введите номер телефона</label>
                <div class="error"><?=@$phoneError;?></div>
            </div>

            <div class="form__field-radio">
                <div class="text">Выберите ваш пол</div>
                <div class="options">
                    <input type="radio" checked name="gender" id="female" value="Женский" required>
                    <label for="gender">Женский</label>
                    <input type="radio" name="gender" id="male" value="Мужской" required>
                    <label for="gender">Мужской</label>
                </div>
            </div>

            <div class="form__field-captcha">
                <div class="captcha">
                    <img id="capcha-image" class="captcha__image" src="../captcha/captcha.php" width="172" height="78"
                        alt="Captcha">
                    <a href="javascript:void(0);" class="captcha__refresh"
                        onclick="document.getElementById('capcha-image').src='captcha/captcha.php?rid=' + Math.random();">Обновить
                        капчу</a>
                </div>
                <div class="text form__captcha">
                    <input type="text" name="captcha" id="captcha" value="<?=@$captcha;?>">
                    <label for="captcha">Код с картинки</label>
                    <div class="error"><?=@$captchaError;?></div>
                </div>
            </div>

            <div class="form__submit">
                <input type="hidden" name="go-reg" value="5">
                <input type="submit" value="Зарегистрироваться" name="registry">
            </div>

            <input type="submit" name="sign-up" value="Войти" class="login-button">
        </form>
    </div>
</main>

<script src="../js/script.js"></script>