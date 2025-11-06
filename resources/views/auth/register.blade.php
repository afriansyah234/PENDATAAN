<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register</title>
  <style>
    body {
      margin: 0;
      font-family: "Poppins", sans-serif;
      background: linear-gradient(135deg, #2b6cb0, #63b3ed);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background-attachment: fixed;
    }

    .wrapper {
      background: rgba(255, 255, 255, 0.2);
      backdrop-filter: blur(14px);
      padding: 2rem 3rem;
      border-radius: 18px;
      box-shadow: 0 6px 25px rgba(0, 0, 0, 0.2);
      text-align: center;
      width: 380px;
      max-width: 90%;
      color: #fff;
      animation: fadeIn 0.5s ease forwards;
    }

    h2 {
      margin-bottom: 1.5rem;
      color: #fff;
      font-weight: 600;
      letter-spacing: 1px;
    }

    input {
      width: 100%;
      padding: 0.75rem 1rem;
      margin-bottom: 1rem;
      border: none;
      border-radius: 10px;
      background: rgba(255, 255, 255, 0.95);
      font-size: 1rem;
      color: #1a365d;
      transition: all 0.2s ease;
    }

    input:focus {
      outline: none;
      box-shadow: 0 0 5px #63b3ed;
      transform: scale(1.02);
    }

    input::placeholder {
      color: #4a5568;
    }

    button {
      width: 100%;
      background: linear-gradient(90deg, #3182ce, #63b3ed);
      border: none;
      color: white;
      padding: 0.75rem;
      border-radius: 10px;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    button:hover {
      background: linear-gradient(90deg, #2b6cb0, #4299e1);
      transform: translateY(-2px);
    }

    .bottom-text {
      margin-top: 1rem;
      color: #edf2f7;
      font-size: 0.9rem;
    }

    .bottom-text a {
      color: #bee3f8;
      font-weight: 600;
      text-decoration: none;
    }

    .bottom-text a:hover {
      text-decoration: underline;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>
<body>
  <div class="wrapper">
    <h2>Create Account</h2>
    <form method="POST" action="{{ route('register') }}">
      <input type="text" name="name" placeholder="Full Name" required />
      <input type="email" name="email" placeholder="Email Address" required />
      <input type="password" name="password" placeholder="Password" required />
      <input type="password" name="password_confirmation" placeholder="Confirm Password" required />
      <button type="submit">Register</button>
    </form>
    <div class="bottom-text">
      <span>Already have an account?</span>
      <a href="/">Login here</a>
    </div>
  </div>
</body>
</html>
