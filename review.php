<?php include './db.php'?> //Include Your DB Php FIle 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Popup</title>
    <style>
        /* Popup styling */
        #reviewPopup {
            display: block;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            text-align: center;
        }

        .popup-content {
            background: white;
            padding: 20px;
            margin: 10% auto;
            width: 300px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        .popup-content h2 {
            margin-bottom: 20px;
        }

        /* Star rating styling */
        .star {
            font-size: 2em;
            color: #ccc;
            cursor: pointer;
            transition: color 0.3s;
        }

        .star:hover, .star.hovered, .star.selected {
            color: gold;
        }
    </style>
    <script>
        let selectedRating = 0;

        function highlightStars(rating) {
            const stars = document.querySelectorAll('.star');
            stars.forEach((star, index) => {
                if (index < rating) {
                    star.classList.add('hovered');
                } else {
                    star.classList.remove('hovered');
                }
            });
        }

        function setRating(rating) {
            selectedRating = rating;
            const stars = document.querySelectorAll('.star');
            stars.forEach((star, index) => {
                if (index < rating) {
                    star.classList.add('selected');
                } else {
                    star.classList.remove('selected');
                }
            });

            // After setting the rating, handle the review
            submitReview(rating);
        }

        function submitReview(rating) {
            if (rating >= 3) {
                // Redirect to Google Review Page if rating is 3 stars or more
                window.location.href = "https://www.google.com/maps/place/YOUR_BUSINESS_URL";
            } else {
                // Collect feedback if the rating is less than 3 stars
                let feedback = prompt("We noticed you gave us less than 3 stars. Could you tell us what went wrong?");
                if (feedback) {
                    // Submit feedback to the server via form post
                    document.getElementById('ratingInput').value = rating;
                    document.getElementById('feedbackInput').value = feedback;
                    document.getElementById('reviewForm').submit();
                }
            }
        }
    </script>
</head>
<body>

    <!-- Popup for star rating -->
    <div id="reviewPopup">
        <div class="popup-content">
            <h2>Please rate your experience</h2>
            <div id="stars">
                <span class="star" onmouseover="highlightStars(1)" onclick="setRating(1)">★</span>
                <span class="star" onmouseover="highlightStars(2)" onclick="setRating(2)">★</span>
                <span class="star" onmouseover="highlightStars(3)" onclick="setRating(3)">★</span>
                <span class="star" onmouseover="highlightStars(4)" onclick="setRating(4)">★</span>
                <span class="star" onmouseover="highlightStars(5)" onclick="setRating(5)">★</span>
            </div>
        </div>
    </div>

    <!-- Hidden form to submit feedback -->
    <form id="reviewForm" method="POST" style="display:none;">
        <input type="hidden" name="rating" id="ratingInput">
        <input type="hidden" name="feedback" id="feedbackInput">
    </form>

</body>
</html>
