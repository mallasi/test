<main>
    <section class="auth-section">
        <h1>Вход</h1>
        <form action="login_handler.php" method="post">
            <div class="form-group">
                <label for="username">Имя пользователя:</label>
                <input type="username" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Пароль:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Войти</button>
        </form>
        <p>Нет аккаунта? <a href="register.php">Регистрация</a></p>
    </section>
</main>