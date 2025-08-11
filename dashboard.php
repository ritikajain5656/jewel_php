<?php
require_once 'config.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];
$full_name = $_SESSION['full_name'];
$email = $_SESSION['email'];

// Get user details
try {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$user_id]);
    $user = $stmt->fetch();
} catch (PDOException $e) {
    $error = 'Failed to load user data.';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Shine Jewelry</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #9ad9e9, #e1f693);
            min-height: 100vh;
        }

        .navbar {
            background: white;
            padding: 15px 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar .logo {
            font-size: 24px;
            font-weight: bold;
            color: #f258b7;
        }

        .navbar .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .navbar .user-info span {
            color: #333;
        }

        .navbar a {
            color: #f258b7;
            text-decoration: none;
            padding: 8px 15px;
            border: 1px solid #f258b7;
            border-radius: 5px;
            transition: all 0.3s;
        }

        .navbar a:hover {
            background: #f258b7;
            color: white;
        }

        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .welcome-card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            margin-bottom: 30px;
            text-align: center;
        }

        .welcome-card h1 {
            color: #f258b7;
            margin: 0 0 10px 0;
        }

        .welcome-card p {
            color: #666;
            margin: 0;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-bottom: 30px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        .card h3 {
            color: #f258b7;
            margin: 0 0 15px 0;
            font-size: 18px;
        }

        .profile-info {
            display: grid;
            gap: 10px;
        }

        .profile-info .info-row {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid #eee;
        }

        .profile-info .info-row:last-child {
            border-bottom: none;
        }

        .info-label {
            font-weight: bold;
            color: #333;
        }

        .info-value {
            color: #666;
        }

        .quick-actions {
            display: grid;
            gap: 10px;
        }

        .action-btn {
            display: block;
            padding: 12px;
            background: #f258b7;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            text-align: center;
            transition: background 0.3s;
        }

        .action-btn:hover {
            background: #220bf2;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            gap: 15px;
        }

        .stat-item {
            text-align: center;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 10px;
        }

        .stat-number {
            font-size: 24px;
            font-weight: bold;
            color: #f258b7;
            margin-bottom: 5px;
        }

        .stat-label {
            font-size: 12px;
            color: #666;
            text-transform: uppercase;
        }

        .recent-activity {
            max-height: 200px;
            overflow-y: auto;
        }

        .activity-item {
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-time {
            font-size: 12px;
            color: #999;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="logo">Shine Jewelry</div>
        <div class="user-info">
            <span>Welcome, <?php echo htmlspecialchars($full_name); ?>!</span>
            <a href="index.html">Shop</a>
            <a href="logout.php">Logout</a>
        </div>
    </nav>

    <div class="container">
        <div class="welcome-card">
            <h1>Welcome to Your Dashboard</h1>
            <p>Manage your account and explore our beautiful jewelry collection</p>
        </div>

        <div class="dashboard-grid">
            <div class="card">
                <h3>Profile Information</h3>
                <div class="profile-info">
                    <div class="info-row">
                        <span class="info-label">Username:</span>
                        <span class="info-value"><?php echo htmlspecialchars($user['username']); ?></span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Full Name:</span>
                        <span class="info-value"><?php echo htmlspecialchars($user['full_name']); ?></span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Email:</span>
                        <span class="info-value"><?php echo htmlspecialchars($user['email']); ?></span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Phone:</span>
                        <span class="info-value"><?php echo htmlspecialchars($user['phone'] ?: 'Not provided'); ?></span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Member Since:</span>
                        <span class="info-value"><?php echo date('M j, Y', strtotime($user['created_at'])); ?></span>
                    </div>
                </div>
            </div>

            <div class="card">
                <h3>Quick Actions</h3>
                <div class="quick-actions">
                    <a href="index.html#products" class="action-btn">Browse Products</a>
                    <a href="index.html#contact" class="action-btn">Contact Support</a>
                    <a href="profile.php" class="action-btn">Edit Profile</a>
                    <a href="orders.php" class="action-btn">View Orders</a>
                </div>
            </div>

            <div class="card">
                <h3>Account Statistics</h3>
                <div class="stats">
                    <div class="stat-item">
                        <div class="stat-number">0</div>
                        <div class="stat-label">Orders</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">0</div>
                        <div class="stat-label">Wishlist</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">0</div>
                        <div class="stat-label">Reviews</div>
                    </div>
                </div>
            </div>

            <div class="card">
                <h3>Recent Activity</h3>
                <div class="recent-activity">
                    <div class="activity-item">
                        <div>Account created</div>
                        <div class="activity-time"><?php echo date('M j, Y g:i A', strtotime($user['created_at'])); ?></div>
                    </div>
                    <div class="activity-item">
                        <div>Last login</div>
                        <div class="activity-time"><?php echo date('M j, Y g:i A', $_SESSION['login_time']); ?></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <h3>Featured Products</h3>
            <p>Check out our latest jewelry collection! <a href="index.html#products" style="color: #f258b7;">Browse all products →</a></p>
        </div>
    </div>
</body>
</html>
