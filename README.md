# Hollow-Mountains
Hollow Mountains Management System: an online system developed by third-year mboRijnland students. It records attractions, schedules maintenance, and generates daily task lists for technicians, ensuring the park runs safely and smoothly.

# Database Install

To use the website, you must first set up the database. Follow these steps and test the login to ensure everything works correctly.

1. **Verify Files** – Ensure all necessary files are located in the `htdocs` folder of XAMPP.
2. **Start XAMPP Services** – Open XAMPP and start both Apache and MySQL.
3. **Access phpMyAdmin** – Once MySQL has started, click the **Admin** button next to MySQL.
4. **Create the Database:**

   * In phpMyAdmin, click **New** on the left panel.
   * Name the new database **hollow-mountains** (make sure to spell it exactly like this, or the website will not connect!).
5. **Import the Database:**

   * Click on your newly created database.
   * Go to the **Import** tab.
   * Click **Choose File** and select `hollow_mountains.sql` from the MySQL folder.
   * Scroll down and press **Import**.
6. **Confirmation** – Once the import is complete, the database is ready.
7. **Create an Account** – Use the admin account to log in and then create your own new account.

   * Email: **test@gmail.com**
   * Password: **FAlpu7t8HHtfSJPNJvRF**
8. **Test the Website** – Delete the old admin account in phpMyAdmin and test the website by logging in.

🎉 Congratulations! Your database is now set up, and the website should function properly.

