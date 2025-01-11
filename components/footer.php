<html>

<head>
    <link rel="stylesheet" href="Assets/CSS/footer.css">
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Text:ital@0;1&display=swap" rel="stylesheet">

</head>

<body>

    <div class="footer-container">
        <div class='footer'>
            <h3 class="footer-h3">Contact Us...</h3>
            <p class="p home" onclick="window.location.href='https://masspro.ca/en/'">
                <img class="footerIcon" src="Assets/images/home.svg" />Mass Production Limited
                <img style="width: 24px;" src="Assets/images/forward.svg" />
            </p>
            <p class="p">
                <img class="footerIcon" src="Assets/images/location.svg" />215 Mississauga Valley Blvd, Mississauga, ON, L5A1Y7
            </p>
            <p class="p">
                <img class="footerIcon" src="Assets/images/call.svg" />+1-905-393-4080
            </p>
            <p class="p">
                <img class="footerIcon" src="Assets/images/time.svg" />Mon - Fri &nbsp; 09:00Am - 06:00Pm
            </p>
            <p class="p">
                <img class="footerIcon" src="Assets/images/letter.svg" /> info@masspro.ca
            </p>

        </div>

        <form action="/sendfeedback" method="post" class="feedback" onsubmit="return submitFeedbackform()">
            <h3 class="footer-h3">We value your feedback</h3>
            <div class="feedback-row">
                <div class="feedback-col">
                    <input type="text" name="fname" id="fname" placeholder="First Name" required>
                </div>
                <div class="feedback-col">
                    <input type="text" name="sname" id="sname" placeholder="Last Name" required>
                </div>
            </div>
            <div class="feedback-row">
                <div class="feedback-col">
                    <input type="text" name="mobile" id="mobile" placeholder="Phone" required>
                </div>
                <div class="feedback-col">
                    <input type="email" name="feedemail" id="feedemail" placeholder="Email" required>
                </div>
            </div>
            <div class="feedback-row">
                <textarea name="message" id="message" placeholder="Message" required></textarea>
            </div>
            <div class="captcha">
                <label htmlFor="captcha">Enter the captcha</label>
                <div class="feedback-row">

                    <div class="feedback-col">

                        <input type="text" name="captcha" id="captcha" disabled placeholder="Loading...">
                    </div>
                    <div class="feedback-col">
                        <input style="text-align: center" oninput="CheckCaptcha(event)" type="text" name="captchValue" id="captchValue" placeholder="Enter Captcha Here" required>
                    </div>
                </div>
            </div>


            <div class="feedback-row">
                <button type="submit" id="feedback-btn" name="feedback" disabled>Submit</button>
                <button
                    disabled="true"
                    id="feedbackSending"
                    style="display: none;"
                    >
                    Submiting...
                </button>
            </div>
        </form>



    </div>
    <div style="background-color: rgb(12, 12, 12); color: gray; padding: 10px;justify-content: center;display: flex;
">©&nbsp;Mass Productions Ltd</div>


    <script>
        function generateRandomText(length) {
            const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            let randomText = '';

            for (let i = 0; i < length; i++) {
                const randomIndex = Math.floor(Math.random() * characters.length);
                randomText += characters[randomIndex];
            }

            return randomText;
        }

        // Example usage:
        // Specify the length of the random text
        const randomString = generateRandomText(6);
        document.getElementById('captcha').value = randomString
        //console.log(randomString);

        function CheckCaptcha(event) {
            // console.log(event.target.value === randomString);

            if (event.target.value === randomString) {
                document.getElementById('feedback-btn').disabled = false;
            } else {
                document.getElementById('feedback-btn').disabled = true;
            }


        }

        function submitFeedbackform(){
            let button = document.getElementById('feedback-btn');
            let button2 = document.getElementById('feedbackSending');
            button.style.display = 'none';
            button2.style.display = 'block';
              return true;
        }
    </script>


</body>

</html>