# Blood-Bank-Management-System
## Overview

The Blood Bank Management System is a web-based application designed to manage blood donations and recipients. It allows users to donate blood, register as recipients, and keep track of blood inventory at various hospitals. This system is developed using HTML, CSS, JavaScript for the frontend and PHP for the backend, with XAMPP as the local server to handle database management.

---

## Features

- **Donor Registration**: Allows individuals to register as blood donors by providing necessary personal details.
- **Recipient Registration**: Allows individuals to register as blood recipients.
- **Blood Availability**: Displays the available blood types at different hospitals.
- **Admin Panel**: (Optional) Can be developed to allow hospital admins to manage the blood stock.

---

## Technologies Used

- **Frontend**:
  - HTML5
  - CSS3
  - JavaScript
- **Backend**:
  - PHP (For server-side scripting and database interaction)
- **Database**:
  - MySQL (Managed using XAMPP)
- **Local Server**:
  - XAMPP (Apache and MySQL)
  
---

## Prerequisites

- **XAMPP** (for running PHP and MySQL locally)
- A modern web browser (e.g., Chrome, Firefox, Edge)

---

## Installation

1. **Download and Install XAMPP**:
   - Download XAMPP from [XAMPP Official Website](https://www.apachefriends.org/index.html).
   - Install XAMPP on your computer and launch the XAMPP Control Panel.

2. **Clone or Download the Project**:
   - You can clone or download this project to your local system.
   - If using Git, run:
     ```bash
     git clone <repository-link>
     ```

3. **Setup Database**:
   - Open XAMPP Control Panel and start Apache and MySQL.
   - Go to [http://localhost/phpmyadmin](http://localhost/phpmyadmin).
   - Create a new database, e.g., `blood_bank`.
   - Import the provided SQL file (if available) to set up the necessary tables.

4. **Configure Database Connection**:
   - In the project folder, locate the database configuration file (usually `config.php` or similar).
   - Edit the database credentials (username, password, database name) to match your local XAMPP settings:
     ```php
     $servername = "localhost";
     $username = "root";  // default XAMPP username
     $password = "";      // default XAMPP password (empty)
     $dbname = "blood_bank"; // your database name
     ```

5. **Place Files in XAMPP's `htdocs` Directory**:
   - Move the project folder to the `htdocs` directory in your XAMPP installation directory. Typically, this is located at:
     ```bash
     C:\xampp\htdocs
     ```

6. **Access the Project**:
   - Open your web browser and go to:
     ```bash
     http://localhost/project-folder-name
     ```

---

## File Structure

```
/project-folder
    /css
        - styles.css
    /js
        - script.js
    /images
        - (image files)
    /includes
        - config.php (database connection)
    /templates
        - header.php
        - footer.php
    /index.html
    /donor_registration.html
    /recipient_registration.html
    /display_hospital.php
    /db_setup.sql (optional: includes SQL statements for creating the database and tables)
```

---

## How to Use

1. **Donor Registration**:
   - Navigate to the "Donor Registration" page and fill out the required details.
   - Submit the form to add the donor’s information to the database.

2. **Recipient Registration**:
   - Navigate to the "Recipient Registration" page and fill out the required information.
   - Submit the form to register the recipient’s details.

3. **Blood Availability**:
   - The available blood types from hospitals are displayed on the "Available Bloods" page.

---

## Known Issues

- Ensure that XAMPP is running before accessing the website locally.
- Some browsers may cache old files; clear the cache if you encounter issues with page loading or styles.

---

## Future Improvements

- **Admin Panel**: A full-fledged admin panel for managing blood donations and tracking inventory.
- **User Authentication**: Login/Sign-up functionality for donors and recipients.
- **Search and Filter**: Ability to search for available blood by type or location.
- **SMS/Email Notifications**: Integrating notifications to alert donors when blood is required.

---

## License

This project is open-source and available under the [MIT License](LICENSE).

---

## Contact

For any questions or support, please reach out to the developers:

- **S Shamanth**: 9482506390
- **Vidvath Gnanesh B N**: 7892739165

---

Feel free to modify and extend this project as needed. Happy coding!

---

This README file covers the essential information for setting up and running the project, including installation steps and feature explanations.
