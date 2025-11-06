<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - BlueWave</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #007BFF, #6EC6FF);
      min-height: 100vh;
      overflow: hidden;
      position: relative;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    /* Aksen bulat lembut di background */
    .bubble {
      position: absolute;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.15);
      filter: blur(50px);
      animation: float 12s infinite ease-in-out alternate;
    }
    .bubble:nth-child(1) { width: 200px; height: 200px; top: 10%; left: 15%; }
    .bubble:nth-child(2) { width: 300px; height: 300px; bottom: 15%; right: 10%; }
    .bubble:nth-child(3) { width: 150px; height: 150px; bottom: 25%; left: 30%; }

    @keyframes float {
      from { transform: translateY(0px); }
      to { transform: translateY(-30px); }
    }

    .login-card {
      background: rgba(255, 255, 255, 0.95);
      border-radius: 20px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 480px;
      padding: 40px 35px;
      z-index: 2;
      text-align: center;
      animation: fadeInUp 0.8s ease;
    }

    .login-title {
      font-size: 1.8rem;
      font-weight: 700;
      color: #007BFF;
      margin-bottom: 10px;
    }

    .login-subtitle {
      color: #555;
      font-size: 0.95rem;
      margin-bottom: 25px;
    }

    .form-control {
      border-radius: 12px;
      border: 1px solid #cfe2ff;
      padding: 12px 15px;
    }

    .form-control:focus {
      border-color: #007BFF;
      box-shadow: 0 0 8px rgba(0, 123, 255, 0.3);
    }

    .btn-primary {
      background-color: #007BFF;
      border: none;
      border-radius: 12px;
      padding: 12px 25px;
      font-weight: 600;
      width: 100%;
      transition: all 0.3s ease;
    }

    .btn-primary:hover {
      background-color: #0056d2;
      transform: translateY(-2px);
    }

    .btn-link {
      color: #007BFF;
      text-decoration: none;
      font-weight: 500;
      display: inline-block;
      margin-top: 15px;
      transition: color 0.3s ease;
    }

    .btn-link:hover {
      color: #0056d2;
      text-decoration: underline;
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(40px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>
<body>

  <!-- Gelembung dekoratif -->
  <div class="bubble"></div>
  <div class="bubble"></div>
  <div class="bubble"></div>

  <div class="login-card">
    <div class="login-title">Welcome Back 👋</div>
    <div class="login-subtitle">Please log in to continue</div>

    <form action="#" method="POST">
      <div class="mb-3 text-start">
        <label for="email" class="form-label">Email Address</label>
        <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
      </div>

      <div class="mb-3 text-start">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" placeholder="Enter your password" required>
      </div>

      <div class="mb-3 form-check text-start">
        <input type="checkbox" class="form-check-input" id="remember">
        <label class="form-check-label" for="remember">Remember Me</label>
      </div>

      <button type="submit" class="btn btn-primary">Login</button>

      <a href="#" class="btn-link">Forgot Password?</a>
    </form>
    <div class="text-center mt-3">
    <span>Don’t have an account?</span>
    <a href="/register" class="btn-link">Create one</a>
</div>

  </div>

</body>
</html>
