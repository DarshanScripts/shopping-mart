# 🛒 Shopping Mart

## 🌍 Overview

The **Shopping Mart** is a web-based system that allows users to browse, filter, and manage products dynamically. It supports **product entry**, **file uploads**, **filtering by criteria**, and **database management** to ensure an efficient shopping experience.

---

## ⭐ Features

### 📥 Product Management
- Add new products using the **Product Entry Form**.
- Upload **product images** with specific format and size constraints.
- Display all products dynamically from the **database**.

### 🔎 Product Filtering & Search
- Filter products based on **price range, category, and brand**.
- Supports real-time AJAX-based filtering for a seamless experience.
- Display sorted products dynamically using **DisplayProduct.php**.

### 🛠 Database Integration
- Database structure is defined in **DBSchema.txt**.
- **CustomerShopping.txt** stores shopping data for transactions.
- Secure database connection handled via **SQLConnection.php**.

### ⚡ Optimized Performance
- Uses **AJAX and jQuery** for real-time updates.
- Implements **prepared statements** to prevent SQL injection.
- Efficient **session management** for logged-in users.

---

## 📥 Installation Guide

### Step 1: Clone the Repository
```sh
git clone https://github.com/DarshanScripts/shopping-mart.git
```

### Step 2: Set Up the Database
1. Open **phpMyAdmin** (or any MySQL database manager).
2. Create a new database (e.g., `shopping_mart`).
3. Import the provided SQL structure from `DBSchema.txt`.
4. Open `SQLConnection.php` and update the database credentials.

### Step 3: Run the Application
1. Move the project folder to `htdocs` (for XAMPP) or `www` (for WAMP/LAMP).
2. Start **Apache** and **MySQL** services.
3. Open a browser and go to:
   ```sh
   http://localhost/shopping-mart/
   ```

---

## 📂 Project Structure

```
shopping-mart/
│── CommonFunctions.php         # Reusable functions
│── CustomerShopping.txt        # Stores shopping data
│── DBSchema.txt                # Database schema
│── DisplayProduct.php          # Displays product list dynamically
│── FilterProduct.php           # Filters products based on criteria
│── Index.php                   # Main entry page
│── ProductEntryForm.php        # Form to add products
│── SQLConnection.php           # Database connection handler
│── jquery.js                   # JavaScript functions
│
├── UploadStuffs/               # Product images folder
```

---

## 💻 Technologies Used
- **PHP & MySQL** – Backend logic and database handling.
- **AJAX & jQuery** – Real-time filtering and dynamic updates.
- **HTML, CSS, JavaScript** – Frontend development.
- **Bootstrap** – Enhances UI and responsiveness.
- **File Handling** – Secure image uploads and management.

---

## 📜 License
This project is licensed under the **MIT License**.

---

## 👨‍💻 Author
Developed by **Darshan Shah**. Connect with me:

- **LinkedIn**: [Darshan Shah](https://www.linkedin.com/in/darshan-shah-tech/)
- **Facebook**: [DarshanScripts](https://www.facebook.com/DarshanScripts)
- **GitHub**: [DarshanScripts](https://github.com/DarshanScripts)
- **Quora**: [Darshan Shah](https://www.quora.com/profile/Darshan-Shah-1056)
- **Medium**: [DarshanScripts](https://medium.com/@DarshanScripts)
- **Fiverr**: [DarshanScripts](https://www.fiverr.com/darshanscripts)
