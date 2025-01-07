<html>

<head>
    <link rel="stylesheet" href="../masstv/Assets/CSS/footer.css">
</head>

<body>

    <div class="footer-container">
        <div class='footer'>
            <h3 class="footer-h3">Contact</h3>
            <p class="p home" onclick="window.location.href='https://masspro.ca/en/'">
                <img class="footerIcon" src="../masstv/Assets/images/home.svg" />Mass Production Limited
                <img style="width: 24px;" src="../masstv/Assets/images/forward.svg" />
            </p>
            <p class="p">
                <img class="footerIcon" src="../masstv/Assets/images/location.svg" />215 Mississauga Valley Blvd, Mississauga, ON, L5A1Y7
            </p>
            <p class="p">
                <img class="footerIcon" src="../masstv/Assets/images/call.svg" />+1-905-393-4080
            </p>
            <p class="p">
                <img class="footerIcon" src="../masstv/Assets/images/time.svg" />Mon - Fri &nbsp; 09:00Am - 06:00Pm
            </p>
            <p class="p">
                <img class="footerIcon" src="../masstv/Assets/images/letter.svg" /> info@masspro.ca
            </p>

        </div>

        <form action="/sendfeedback" method="post" class="feedback">
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
            <div class="feedback-row">
                <button type="submit" id="feedback-btn" name="feedback">Submit</button>
            </div>
        </form>



    </div>
    <div style="background-color: rgb(12, 12, 12); color: gray; padding: 10px;justify-content: center;display: flex;
">©&nbsp;Mass Productions Ltd</div>


</body>

</html>