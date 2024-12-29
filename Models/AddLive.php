<html>

<head>
    <link rel="stylesheet" href="../masstv/Assets/CSS/addLive.css">

    <style>
        .close-button {
            background-color: red;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 50%;
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }

        .close-button:hover {
            background-color: darkred;
        }
    </style>

    <script>
        function validateLiveForm() {
            let url = document.getElementById('url');
            let button = document.getElementById('liveupload');

            let urlPattern = /^https?:\/\/.+\.(m3u8)$/;

            if (urlPattern.test(url.value)) {
                button.disabled = false;
            } else {
                button.disabled = true;
            }
        }
    </script>
</head>

<body>
    <div
        class="modal-overlay" id="addLiveModel"
        style=" background-image: url('../masstv/Assets/images/masstvlogo.png')">
        <div class="modal-content" onclick="event.stopPropagation()">
            <button
                onclick="handleAddLiveModel('false')"
                class="close-button">
                X
            </button>
            <h2>Update Live Stream</h2>
            <form action="/addlive"  method="post" class="Form" oninput="validateLiveForm()">
                <div class="FormRow">
                    <label htmlFor="url">Paste Live Stream URL Here (.m3u8)</label>
                    <input
                        type="url"
                        name="url"
                        id="url" />
                </div>

                <button
                    type="submit"
                    disabled="true"
                    id="liveupload"
                    name="liveupload"
                    class="upload">
                    Upload
                </button>
            </form>
        </div>
    </div>

</body>


</html>