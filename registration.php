<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Nexora | Register</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(135deg, #ff3f6c, #ff8fa3);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .register-card {
      background: #fff;
      padding: 30px;
      border-radius: 18px;
      width: 100%;
      max-width: 420px;
      box-shadow: 0 20px 45px rgba(0,0,0,0.25);
    }
    .btn-nexora {
      background: #ff3f6c;
      border: none;
      color: #fff;
    }
    .btn-nexora:hover {
      background: #e6365f;
    }
  </style>
</head>

<body>

  <div class="register-card">
    <h3 class="text-center mb-4">Create Nexora Account</h3>

    <form action="#" method="post">
      <div class="mb-3">
        <label class="form-label">Full Name</label>
        <input type="text" class="form-control" placeholder="Enter your name" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" placeholder="Enter your email" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" class="form-control" placeholder="Create password" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Confirm Password</label>
        <input type="password" class="form-control" placeholder="Confirm password" required>
      </div>

      <button type="submit" class="btn btn-nexora w-100">Register</button>
    </form>

    <p class="text-center mt-3">
      Already have an account?
      <a href="login.php">Login</a>
    </p>
  </div>

</body>
</html>
