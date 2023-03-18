
# Profiler

This is a web application that allows users to register and create profiles. The application uses PHP, AJAX jQuery, MongoDB and MySQL to store and manage user data.


## Features

- User registration
- Login authentication using MySQL database

- User profile display
- Ability to add and edit user profile data fields


## Installation

Clone the repository into your local machine

```bash
git clone https://github.com/your-username/user-registration-and-profile-website.git
```
    

- Create a database named 'user_registration' in MySQL.
- Import the database schema from the 'user_registration.sql' file in the project root directory to your newly created database. You can do this from the command line:

```bash 
mysql -u username -p user_registration < user_registration.sql
```

- Start your MongoDB server
- Open the config.php file in the project root directory and update the database and MongoDB credentials.
- Start the application by running the following command in the project root directory

```bash
php -S localhost:8080
```

- Navigate to http://localhost:8080 in your browser to access the web application
## License
This project is licensed under the [MIT](https://choosealicense.com/licenses/mit/) License - see the LICENSE.md file for details.



## Acknowledgements

 - This project was inspired by [Code Wall](https://www.codewall.co.uk/user-registration-and-login-script-with-php-mysql-and-ajax-jquery/)

