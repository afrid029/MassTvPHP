<html>

<head>
    <link rel="stylesheet" href="../masstv/Assets/CSS/login.css">

    <script>
        // function submitform() {
        //     console.log('submit');

        // }

        function validateForm() {
            let email = document.getElementById('email');
            let password = document.getElementById('password');
            let button = document.getElementById('submit');

            let emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

            if (emailPattern.test(email.value) && password.value.length > 0) {
                button.disabled = false;
            } else {
                button.disabled = true;
            }
            console.log(email);

            // let emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            // if (!emailPattern.test(email)) {
            //     event.target.style.border = '1px solid red';
            // } else {
            //     event.target.style.border = '1px solid green';
            // }
        }
    </script>
</head>



<body>
    <div
        class="modal-overlay" id="loginModel" onclick="handleLoginModel('false')"
        style=" background-image: url('../masstv/Assets/images/masstvlogo.png')">
        <div class="modal-content" onclick="event.stopPropagation()">
            <div class="banner">
                <h2> <span style="color:red">WWW.</span>MASSTV<span style="color:red">.CA</span></h2>
            </div>
            <h4>Login</h4>

            <form action="/login" method="post" oninput="validateForm()">
                <div class="Form">
                    <div class="FormRow">
                        <label htmlFor="email">Email</label>
                        <input
                            type="email"
                            name="email"
                            id="email" default="afrid@gmail.com" required />
                    </div>
                    <div class="FormRow">
                        <label htmlFor="password">Password</label>
                        <input
                            type="password"
                            name="password"
                            id="password" default="sdsad" required />
                    </div>

                    <button

                        type="submit"
                        id="submit"
                        name="submit"
                        disabled="true"
                        class="upload" req> Login

                    </button>
            </form>
        </div>
    </div>
    </div>
</body>

</html>