<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Nexora | Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap (optional but clean UI) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
  body {
    background: linear-gradient(135deg, #ffe1e8, #ff9fb2);
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: 'Segoe UI', sans-serif;
  }

  .login-card {
    width: 100%;
    max-width: 400px;
    border-radius: 16px;
    padding: 35px;
    background: #fff;
    box-shadow: 0 15px 35px rgba(255, 63, 108, 0.25);
  }

  .login-card h3 {
    text-align: center;
    margin-bottom: 25px;
    font-weight: 700;
    color: #ff3f6c;
  }

  .form-label {
    font-weight: 600;
    color: #444;
  }

  .form-control {
    border-radius: 10px;
    padding: 10px;
    border: 1px solid #ddd;
  }

  .form-control:focus {
    border-color: #ff3f6c;
    box-shadow: 0 0 0 0.15rem rgba(255, 63, 108, 0.25);
  }

  .btn-primary {
    background-color: #ff3f6c;
    border: none;
    border-radius: 10px;
    font-weight: 600;
    padding: 10px;
  }

  .btn-primary:hover {
    background-color: #e91e63;
  }

  .login-card a {
    color: #ff3f6c;
    font-weight: 600;
    text-decoration: none;
  }

  .login-card a:hover {
    text-decoration: underline;
  }
</style>

</head>

<body>

  <div class="login-card">
    <h3>Nexora Login</h3>

    <form action="login.php" method="POST">
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required>
      </div>

      <button type="submit" name="login" class="btn btn-primary w-100">
        Login
      </button>
    </form>

    <p class="text-center mt-3">
      Don’t have an account? <a href="registration.php">Register</a>
    </p>
  </div>

</body>
</html>
