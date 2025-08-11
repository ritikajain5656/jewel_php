<img width="1468" height="836" alt="Image" src="https://github.com/user-attachments/assets/0784d634-04df-481b-be3c-a0f6d5f446c9" />

<img width="1468" height="836" alt="Image" src="https://github.com/user-attachments/assets/b0a37e96-8dd1-496f-8605-4dadfeade4cd" /># ✨ Shine Jewelry - PHP Authentication System

A beautiful and modern jewelry e-commerce website with a complete PHP-based user authentication system, featuring secure login/registration, user dashboard, and responsive design.

![Shine Jewelry](https://img.shields.io/badge/Shine-Jewelry%20Shop-blue?style=for-the-badge&logo=gem)
![PHP](https://img.shields.io/badge/PHP-8.0+-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-00000F?style=for-the-badge&logo=mysql&logoColor=white)
![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)

## 🌟 Features

### 🔐 Authentication System
- **User Registration** with form validation
- **Secure Login** with password hashing
- **Session Management** with timeout protection
- **User Dashboard** with profile information
- **Logout Functionality** with session cleanup

### 🎨 User Interface
- **Responsive Design** that works on all devices
- **Modern Color Scheme** with beautiful gradients
- **Product Showcase** with jewelry images
- **Navigation Menu** with smooth transitions
- **Contact Information** and about section

### 🛡️ Security Features
- **Password Hashing** using PHP's `password_hash()`
- **SQL Injection Protection** with PDO prepared statements
- **XSS Protection** with `htmlspecialchars()`
- **Session Security** with proper validation
- **Input Validation** and sanitization

## 🚀 Quick Start

### Prerequisites
- PHP 7.4 or higher
- MySQL/MariaDB database
- Web server (Apache/Nginx) or PHP built-in server

### Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/yourusername/shine-jewelry.git
   cd shine-jewelry
   ```

2. **Set up the database**
   ```bash
   # Create database
   mysql -u root -e "CREATE DATABASE shine_jewelry;"
   
   # Import schema (optional - tables will be created automatically)
   mysql -u root shine_jewelry < database_setup.sql
   ```

3. **Configure database connection**
   ```bash
   # Copy sample config
   cp config.sample.php config.php
   
   # Edit config.php with your database credentials
   nano config.php
   ```

4. **Start the development server**
   ```bash
   php -S localhost:8000
   ```

5. **Visit your website**
   - Homepage: http://localhost:8000
   - Register: http://localhost:8000/register.php
   - Login: http://localhost:8000/login.php

## 🧪 Demo Credentials

Use these credentials to test the system:
- **Username:** `admin`
- **Password:** `admin123`

## 📁 Project Structure

```
shine-jewelry/
├── index.html              # Main homepage
├── config.php              # Database configuration (create from config.sample.php)
├── config.sample.php       # Sample configuration file
├── register.php            # User registration page
├── login.php               # User authentication page
├── logout.php              # Session termination
├── dashboard.php           # User dashboard
├── auth_check.php          # Authentication utilities
├── database_setup.sql      # Database schema
├── setup_instructions.md   # Detailed setup guide
├── .gitignore              # Git ignore file
└── README.md               # This file
```

## 🎯 Key Components

### Authentication Flow
1. **Registration** → User creates account with validation
2. **Login** → User authenticates with credentials
3. **Dashboard** → Personalized user experience
4. **Logout** → Secure session termination

### Database Schema
- **users** table: User accounts and profiles
- **user_sessions** table: Session management (optional)

### Security Implementation
- Password hashing with bcrypt
- Prepared statements for database queries
- Session-based authentication
- Input validation and sanitization

## 🌐 Live Demo

Visit the live website: [Shine Jewelry](https://yourdomain.com)

## 🛠️ Customization

### Adding New Features
- **Shopping Cart**: Extend with cart functionality
- **Payment Integration**: Add payment gateways
- **Admin Panel**: Create admin dashboard
- **Email Verification**: Implement email confirmation
- **Password Reset**: Add forgot password functionality

### Styling
- Modify `style.css` for custom themes
- Update color schemes in CSS variables
- Add animations and transitions
- Implement dark mode

## 📱 Responsive Design

The website is fully responsive and works on:
- 📱 Mobile devices
- 💻 Desktop computers
- 📱 Tablets
- 🖥️ All screen sizes

## 🔧 Troubleshooting

### Common Issues

1. **Database Connection Error**
   - Verify database credentials in `config.php`
   - Ensure MySQL service is running
   - Check database exists

2. **Session Issues**
   - Verify PHP sessions are enabled
   - Check file permissions
   - Clear browser cookies

3. **Login Not Working**
   - Verify database tables exist
   - Check user credentials
   - Review error logs

### Getting Help

- Check the `setup_instructions.md` file
- Review PHP error logs
- Verify database connectivity
- Test with demo credentials

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 🙏 Acknowledgments

- PHP community for excellent documentation
- MySQL for robust database system
- Modern CSS techniques for beautiful design
- Open source contributors

## 📞 Contact

- **Project Link:** [https://github.com/yourusername/shine-jewelry](https://github.com/yourusername/shine-jewelry)
- **Email:** shine@gmail.com
- **Phone:** 1234567890

---

