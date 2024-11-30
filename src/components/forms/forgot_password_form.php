<div class="forgot-password-form">
    <h2>Forgot Password</h2>
    <form action="/api/forgot_password.php" method="POST">
        <label for="email">Enter your email:</label>
        <input type="email" id="email" name="email" required>

        <button type="submit">Send Reset Link</button>
    </form>
</div>
