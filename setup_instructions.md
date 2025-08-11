# Shine Jewelry - PHP Authentication Setup Instructions

## Prerequisites
- PHP 7.4 or higher
- MySQL/MariaDB database
- Apache/Nginx web server (or use PHP built-in server for testing)

## Setup Steps

### 1. Database Setup
1. Create a MySQL database named `shine_jewelry`
2. Import the database structure using the provided SQL file:
   ```bash
   mysql -u root -p shine_jewelry < database_setup.sql
   ```

### 2. Configuration
1. Edit `config.php` and update database credentials:
   ```php
   define('DB_HOST', 'localhost');     // Your database host
   define('DB_NAME', 'shine_jewelry'); // Your database name
   define('DB_USER', 'root');          // Your database username
   define('DB_PASS', '');              // Your database password
   ```

### 3. Web Server Setup

#### Option A: PHP Built-in Server (for testing)
```bash
cd /path/to/shine-main
php -S localhost:8000
```
Then visit: http://localhost:8000

#### Option B: Apache/Nginx
- Copy all files to your web server's document root
- Ensure PHP is enabled
- Set proper file permissions

### 4. Test the Application
1. Visit your website
2. Click "Register" to create a new account
3. Use the demo credentials to login:
   - **Username:** admin
   - **Password:** admin123

## File Structure
```
Shine-main/
├── index.html          # Main homepage
├── config.php          # Database configuration
├── register.php        # User registration
├── login.php           # User authentication
├── logout.php          # Session termination
├── dashboard.php       # User dashboard
├── auth_check.php      # Authentication utilities
├── database_setup.sql  # Database schema
└── setup_instructions.md # This file
```

## Features Implemented
- ✅ User Registration with validation
- ✅ Secure login with password hashing
- ✅ Session management
- ✅ User dashboard
- ✅ Logout functionality
- ✅ SQL injection protection (PDO)
- ✅ XSS protection (htmlspecialchars)
- ✅ Password strength requirements

## Security Features
- Passwords are hashed using PHP's `password_hash()`
- Prepared statements prevent SQL injection
- Session-based authentication
- Input validation and sanitization
- CSRF protection ready

## Troubleshooting
1. **Database connection error**: Check your database credentials in `config.php`
2. **Session issues**: Ensure PHP sessions are enabled
3. **Permission errors**: Check file permissions on web server
4. **Login not working**: Verify database is set up correctly

## Next Steps (Optional Enhancements)
- Add email verification
- Implement password reset functionality
- Add shopping cart functionality
- Create order management system
- Add admin panel
- Implement CSRF tokens
- Add "Remember Me" functionality
- Create user profile editing
