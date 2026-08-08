# Secure Login Page — PHP & PostgreSQL

A secure and responsive login authentication system developed using **HTML, CSS, JavaScript, PHP, and PostgreSQL**. The project demonstrates frontend form handling, backend authentication, database connectivity, password hashing, and API testing using Postman.

## Project Overview

This project is a simple full-stack login authentication system where users can enter their username and password through a web interface.

The frontend sends the login credentials to a PHP backend using a `POST` request. The PHP backend validates the input, connects to PostgreSQL, verifies the stored credentials, and returns a JSON response.

The project also implements **password hashing** so that user passwords are not stored as plain text in the database.

---

## Features

* Responsive login interface
* Username and password input validation
* JavaScript form submission
* Asynchronous API request using `fetch()`
* PHP backend authentication
* PostgreSQL database integration
* Password hashing for secure password storage
* Password verification during login
* JSON-based API responses
* Postman API testing
* Responsive UI design
* Git and GitHub version control

---

## Technologies Used

| Technology       | Purpose                                  |
| ---------------- | ---------------------------------------- |
| HTML5            | Login page structure                     |
| CSS3             | Styling and responsive design            |
| JavaScript       | Form handling and API communication      |
| PHP              | Backend authentication and API           |
| PostgreSQL       | User data storage                        |
| PDO              | PHP database connection                  |
| Password Hashing | Secure password storage and verification |
| XAMPP            | Local Apache/PHP development environment |
| Postman          | API testing                              |
| Git              | Version control                          |
| GitHub           | Source code hosting                      |

---

## System Architecture

```text
                 USER
                  |
                  v
        +-------------------+
        |   Login Page      |
        | HTML + CSS        |
        +-------------------+
                  |
                  v
        +-------------------+
        |    JavaScript     |
        |     fetch()       |
        +-------------------+
                  |
             POST Request
                  |
                  v
        +-------------------+
        |    PHP Backend    |
        |    login.php      |
        +-------------------+
                  |
                  v
        +-------------------+
        |    PostgreSQL     |
        |      Database     |
        +-------------------+
                  |
          Verify Credentials
                  |
                  v
        +-------------------+
        |   JSON Response   |
        +-------------------+
                  |
                  v
              User Alert
```

---

## Application Flow

The complete login process works as follows:

1. User opens the login page.
2. User enters username and password.
3. JavaScript captures the form submission.
4. JavaScript prevents the default browser form submission.
5. The credentials are converted into JSON.
6. A `POST` request is sent to `login.php`.
7. PHP receives the request.
8. PHP validates the username and password.
9. PHP connects to PostgreSQL using PDO.
10. The user record is retrieved from the database.
11. The entered password is verified against the stored hash.
12. PHP returns a JSON response.
13. JavaScript reads the response.
14. The result is displayed using an alert.

---

## Password Security

The project uses password hashing instead of storing passwords directly as plain text.

### Registration / Password Storage

When a password is stored, it is converted into a secure hash.

```php
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
```

The database stores the generated hash instead of the original password.

For example:

```text
Original Password:
mypassword123

Stored Value:
$2y$10$...
```

The original password cannot be obtained simply by reading the hash.

### Password Verification

During login, the entered password is checked against the stored hash.

```php
password_verify($password, $hashedPassword);
```

This allows the application to verify the password without storing the original password.

---

## API

### Login Endpoint

```text
POST /login.php
```

### Request

The frontend sends JSON data:

```json
{
    "username": "abc",
    "password": "123"
}
```

### Successful Response

```json
{
    "message": "Login successful"
}
```

### Invalid Credentials Response

```json
{
    "message": "Invalid username or password"
}
```

### Missing Input Response

```json
{
    "message": "Username and password are required"
}
```

---

## Frontend

The frontend consists of three main files.

### `index.html`

Responsible for:

* Login page structure
* Username input
* Password input
* Login button
* Linking CSS and JavaScript

### `style.css`

Responsible for:

* Dark login interface
* Login card design
* Input styling
* Button styling
* Hover effects
* Responsive layout
* Centering the login form

### `script.js`

Responsible for:

* Capturing form submission
* Reading username and password
* Sending API requests
* Receiving JSON responses
* Displaying login results

Example request:

```javascript
const response = await fetch(
    "login.php",
    {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            username: username,
            password: password
        })
    }
);
```

---

## Backend

The backend is implemented using PHP.

### `login.php`

Responsible for:

* Receiving login requests
* Reading JSON request data
* Validating username and password
* Querying PostgreSQL
* Verifying the password hash
* Returning JSON responses

### `database.php`

Responsible for establishing the connection between PHP and PostgreSQL.

The project uses **PDO (PHP Data Objects)** for database connectivity.

Example:

```php
$pdo = new PDO(
    $dsn,
    $username,
    $password
);
```

PDO provides a structured way to communicate with the PostgreSQL database.

---

## Database

The project uses **PostgreSQL** to store user authentication information.

A typical user record contains information such as:

```text
id
username
password
```

The password column stores the **hashed password**, not the original password.

---

## Local Development Environment

The project was developed and tested using:

* Windows
* XAMPP
* Apache
* PHP
* PostgreSQL
* Postman

### XAMPP

XAMPP provides the local Apache and PHP environment required to run the PHP application.

The project is placed inside the XAMPP `htdocs` directory.

Example:

```text
D:\XAMMP\htdocs\secure_login
```

The application can then be accessed through:

```text
http://localhost/secure_login/
```

---

## Project Structure

```text
secure_login/
│
├── screenshots/
│   ├── login-page.png
│   ├── login-success.png
│   └── postman-api.png
│
├── config.php
├── database.php
├── index.html
├── index.php
├── login.php
├── script.js
└── style.css
```

---

## Screenshots

### Login Page

The main authentication interface where the user enters their username and password.

![Login Page](screenshots/login-page.png)

---

### Login Successful

The application displays a successful login message when valid credentials are provided.

![Login Successful](screenshots/login-success.png)

---

### API Testing with Postman

The login API was tested independently using Postman to verify the backend response.

![Postman API Testing](screenshots/postman-api.png)

---

## Testing

The application was tested using both the browser and Postman.

### Browser Testing

Test cases included:

| Test Case                       | Expected Result        |
| ------------------------------- | ---------------------- |
| Valid username + valid password | Login successful       |
| Invalid username                | Authentication failure |
| Invalid password                | Authentication failure |
| Empty username                  | Validation message     |
| Empty password                  | Validation message     |

### Postman Testing

The login endpoint was tested using:

```text
Method: POST
Endpoint: /login.php
Content-Type: application/json
```

Example request:

```json
{
    "username": "abc",
    "password": "123"
}
```

The API response was verified through Postman.

---

## Security Considerations

The project implements several basic security practices:

* Passwords are hashed before storage.
* Password verification is performed using the password hash.
* Database communication uses PDO.
* Login requests use HTTP POST.
* Input validation is performed before authentication.
* Database credentials should not be exposed in public repositories.

For production deployment, additional security measures such as HTTPS, secure session management, CSRF protection, rate limiting, environment variables, and stronger authentication mechanisms should be implemented.

---

## Challenges Faced During Development

### 1. Database Driver Issue

Initially, PHP produced a database driver-related error:

```text
could not find driver
```

The PostgreSQL PDO driver was enabled in the PHP configuration.

### 2. PostgreSQL Connection String

A connection string formatting issue caused:

```text
missing "=" after "login"
```

The database connection parameters were corrected and the database was successfully connected.

### 3. Frontend and Backend Communication

The frontend initially experienced request and server errors.

The request flow was debugged using browser developer tools and backend logs.

### 4. Password Hashing

After implementing password hashing, the login verification logic was updated to compare the entered password with the stored hash using password verification.

### 5. API Testing

Postman was used to test the PHP endpoint independently from the frontend.

This helped verify whether the issue was in the frontend or backend.

---

## Future Improvements

The project can be extended with:

* User registration
* Logout functionality
* PHP sessions
* JWT authentication
* Role-based access control
* Forgot password functionality
* Email verification
* Login attempt rate limiting
* CSRF protection
* HTTPS deployment
* Environment-based configuration
* Docker deployment
* Production database hosting

---

## Learning Outcomes

Through this project, I gained practical experience in:

* Frontend development using HTML and CSS
* JavaScript asynchronous programming
* REST-style API communication
* PHP backend development
* PostgreSQL database connectivity
* Password hashing and verification
* API testing with Postman
* Debugging frontend and backend errors
* Running PHP applications using XAMPP
* Git and GitHub version control

---

## GitHub

This project is maintained using Git for version control and hosted on GitHub.

Repository:

**Secure Login Page — PHP**

---

## Author

**Balaji**

B.Tech Information Technology

Interested in software development, data analytics, backend development, and application security.

```
```
