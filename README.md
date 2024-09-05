Google Reives
This project provides a webpage that allows users to submit a star rating via a popup interface. Based on the user's rating:

If the user selects 3 stars or more, they are redirected to a Google review page.
If the user selects less than 3 stars, they are prompted to provide feedback, which is then stored locally in a database.
Features
Responsive Popup Design: The star rating interface is displayed in a centered popup with smooth animations.
Interactive Star Rating: The stars light up as the user hovers over them, giving a visual indication of the rating selection.
Google Review Redirection: Users who rate 3 stars or more are redirected to your business's Google review page.
Feedback Collection: For ratings below 3 stars, the user is asked to provide feedback. This feedback is stored in a MySQL database for further review.
Technologies Used
HTML: Structuring the webpage content.
CSS: Styling the popup and stars, with smooth transitions and hover effects.
JavaScript: Handling user interactions such as star hover and click events, as well as submitting the form data.
PHP: Server-side logic for processing form submissions and interacting with the MySQL database.
MySQL: Storing the reviews locally for analysis.
Installation
1. Clone the Repository
bash
Copy code
git clone https://github.com/ayyapparaju7/Google-Review.git
2. Set Up MySQL Database
Create a MySQL database and a table to store reviews. Use the following SQL script to create the reviews table:

sql
Copy code
CREATE DATABASE reviews_db;

USE reviews_db;

CREATE TABLE reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    rating INT NOT NULL,
    feedback TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
3. Configure the Database Connection
In the index.php file, update the database connection credentials to match your local setup:

php
Copy code
$host = "localhost";
$dbname = "reviews_db";
$username = "root";  // Update to your MySQL username
$password = "";      // Update to your MySQL password
4. Host the Webpage
Place the index.php file on your web server (e.g., Apache, Nginx, or any hosting service that supports PHP).

5. Update Google Review URL
In the JavaScript section of index.php, replace the placeholder Google Maps URL with your business's actual Google review link:

javascript
Copy code
window.location.href = "https://www.google.com/maps/place/YOUR_BUSINESS_URL";
6. Access the Webpage
Visit the webpage in your browser. Users will see a popup asking them to rate their experience, and reviews will be handled according to the star rating.

Usage
Rating and Redirection: Users select a star rating in the popup. If they select 3 stars or more, they will be redirected to the Google review page.
Feedback for Lower Ratings: Users who select fewer than 3 stars will be prompted to provide feedback, which is stored in the database for future reference.
License
This project is licensed under the MIT License. See the LICENSE file for more information.

Notes:
Ensure that you have PHP and MySQL installed and running on your server.
For testing purposes, you can check the reviews table in your database to see if low-rated feedback is stored correctly.
