<div class="login-form">
    <h2>Login</h2>
    <form action="/api/login.php" method="POST">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Login</button>
    </form>
    <div class="login-options">
        <a href="javascript:void(0);" onclick="openModal('/components/forms/forgot_password_form.php', 'Forgot Password')">Forgot Password?</a>
        <a href="javascript:void(0);" onclick="openModal('/components/forms/register_form.php', 'Register')">Create an Account</a>
    </div>
</div>
