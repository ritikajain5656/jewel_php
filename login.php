<?php
require_once 'config.php';

$error = '';

// Redirect if already logged in
if (isset($_SESSION['user_id'])) {
    header('Location: dashboard.php');
    exit();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    
    if (empty($username) || empty($password)) {
        $error = 'Username and password are required!';
    } else {
        try {
            // Check user credentials
            $stmt = $pdo->prepare("SELECT id, username, email, password, full_name FROM users WHERE username = ? OR email = ?");
            $stmt->execute([$username, $username]);
            $user = $stmt->fetch();
            
            if ($user && password_verify($password, $user['password'])) {
                // Login successful
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['full_name'] = $user['full_name'];
                $_SESSION['login_time'] = time();
                
                // Optional: Update last login time
                $stmt = $pdo->prepare("UPDATE users SET updated_at = NOW() WHERE id = ?");
                $stmt->execute([$user['id']]);
                
                header('Location: dashboard.php');
                exit();
            } else {
                $error = 'Invalid username or password!';
            }
        } catch (PDOException $e) {
            $error = 'Login failed. Please try again.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Shine Jewelry</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #9ad9e9, #e1f693);
            min-height: 100vh;
        }

        .container {
            max-width: 400px;
            margin: 80px auto;
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            color: #f258b7;
            margin: 0;
        }

        .header p {
            color: #666;
            margin: 10px 0 0 0;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #f258b7;
        }

        .btn {
            width: 100%;
            padding: 12px;
            background: #f258b7;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background: #220bf2;
        }

        .error {
            background: #ffe6e6;
            color: #d00;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            border: 1px solid #ffcccc;
        }

        .links {
            text-align: center;
            margin-top: 20px;
        }

        .links a {
            color: #f258b7;
            text-decoration: none;
            margin: 0 10px;
        }

        .links a:hover {
            color: #220bf2;
        }

        .remember-me {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .remember-me input[type="checkbox"] {
            margin-right: 8px;
        }

        .demo-credentials {
            background: #f0f8ff;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            border: 1px solid #b8dff5;
        }

        .demo-credentials h4 {
            margin: 0 0 10px 0;
            color: #2c5aa0;
        }

        .demo-credentials p {
            margin: 5px 0;
            font-size: 14px;
            color: #2c5aa0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Welcome Back</h1>
            <p>Login to your Shine account</p>
        </div>

        <div class="demo-credentials">
            <h4>Demo Credentials:</h4>
            <p><strong>Username:</strong> admin</p>
            <p><strong>Password:</strong> admin123</p>
        </div>

        <?php if ($error): ?>
            <div class="error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="form-group">
                <label for="username">Username or Email</label>
                <input type="text" id="username" name="username" value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="remember-me">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Remember me</label>
            </div>

            <button type="submit" class="btn">Login</button>
        </form>

        <div class="links">
            <a href="register.php">Don't have an account? Register</a> | 
            <a href="index.html">Back to Home</a>
        </div>
    </div>
</body>
</html>
