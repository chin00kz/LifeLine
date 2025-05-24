# Lifeline Medical Portal

**Lifeline Medical Portal** is a comprehensive web-based platform designed to streamline healthcare services for patients, doctors, and administrators. It offers a robust set of features for appointment scheduling, user management, feedback collection, and prescription handling — all built to enhance the efficiency of healthcare delivery.

## 🚀 Features

### 👥 User Registration & Management

* **Patients** can register to book appointments and access healthcare services.
* **Administrators** can add and manage doctor accounts.
* User roles (Patient, Doctor, Admin) are managed with appropriate access levels.

### 📅 Appointment System

* Patients can book appointments with doctors through the portal.
* Doctors can:

  * View and respond to appointment requests
  * Issue prescriptions
  * View appointment history
* Appointment data is securely stored for both users and medical staff.

### 💬 Feedback System

* Guests can submit feedback about their experience.
* Administrators can review, manage, and take action on submitted feedback.

### 🛠️ Admin Panel

* Full access to user account management
* Ability to add, edit, or remove users
* Feedback moderation and access control configuration

## 🧑‍💻 Getting Started

### ✅ Prerequisites

* XAMPP (or any PHP/MySQL stack)
* Web browser

### 📥 Installation

1. Clone the repository:

   ```
   git clone https://github.com/your-username/lifeline-portal.git
   ```

2. Import the provided `.sql` file into MySQL (e.g., via phpMyAdmin).

3. Place the project folder inside `htdocs` if using XAMPP:

   ```
   C:/xampp/htdocs/lifeline
   ```

4. Configure database connection in the PHP files:

   ```
   $conn = mysqli_connect("localhost", "root", "", "lifeline_db");
   ```

### 🌐 Usage

* Launch XAMPP and start **Apache** and **MySQL**.
* In your browser, go to:

  ```
  http://localhost/lifeline
  ```

#### User Guide:

* **Patients**: Register, book appointments, view history, and provide feedback.
* **Doctors**: Log in to view and manage appointments and issue prescriptions.
* **Admins**: Manage all users, view feedback, and maintain system functionality.

## 👥 Developers

* Chanuka ([https://github.com/chin00kz](https://github.com/chin00kz))
* Romesh Gamadikari ([https://github.com/RomeshCG](https://github.com/RomeshCG))
* Prasad Wijesinghe ([https://github.com/PrasadWijesinghe](https://github.com/PrasadWijesinghe))
* Suneth Herath ([https://github.com/Suneth2220](https://github.com/Suneth2220))
* Ransarani ([https://github.com/ChCh200](https://github.com/ChCh200))

## 📜 License

**Educational Use Only:**
This project is intended strictly for educational and learning purposes. It is not licensed for commercial or university project submission use without explicit permission.

---
