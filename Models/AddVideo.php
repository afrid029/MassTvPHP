<html>

<head>
     <link rel="stylesheet" href="Assets/CSS/login.css">

   

    <script>
        function validateVideoForm() {
            let url = document.getElementById('videourl');
            let title = document.getElementById('title');
            let image = document.getElementById('image');
            let button = document.getElementById('videoupload');
            let category = document.getElementById('category');
            console.log(category.value);
            

            if (url.value && title.value && image.value && category.value !== 'none') {
                button.disabled = false;
            } else {
                button.disabled = true;
            }
        }

        function submitVideoform() {
            let button = document.getElementById('videoupload');
            let button2 = document.getElementById('videouploading');
            button.style.display = 'none';
            button2.style.display = 'block';
            //console.log('Form is sub');
        
            return true;
        }

        function testSubmit() {
            console.log('submitting');
        }
    </script>
</head>

<body>
    <div
        class="modal-overlay" id="addVideoModel"
        style="background-image: url('<?php echo $cover ?? 'Assets/images/masstvlogo.png'; ?>');">


        <div class="modal-content">
            <button
                onclick="handleAddVideoModel('false')"
                class="close-button">
                X
            </button>
            <h2>Update Live Stream</h2>
            <form action="/addvideo" method="post" class="Form" oninput="validateVideoForm()" enctype="multipart/form-data" onsubmit="return submitVideoform()">
                <div class="FormRow">
                    <label htmlFor="url">Paste Video URL Here (Youtube/Vimeo)</label>
                    <input
                        type="url"
                        name="videourl"
                        id="videourl"
                        required />
                </div>
                <div class="FormRow">
                    <label htmlFor="title">Title of the Video</label>
                    <input
                        type="name"
                        name="title"
                        id="title"
                        required />
                </div>

                <div class="FormRow">
                    <label htmlFor="category">Video Category</label>
                    <select id="category" name="category" required>
                        <option value="none" disabled selected hidden>Select a category</option>
                        <option value="Religious">Religious</option>
                        <option value="Community">Community Events</option>
                        <option value="Politics">Politics</option>
                        <option value="Stage">Stage Shows</option>

                    </select>
                </div>
                <div class="FormRow">
                    <label htmlFor="image">Upload Thumbnail</label>
                    <input
                        type="file"
                        name="image"
                        id="image"
                        accept="image/*"
                        required />
                </div>

                <button
                    type="submit"
                    id="videoupload"
                    name="videoupload"
                    class="upload">
                    Upload
                </button>

                <button
                    id="videouploading"
                    style="display: none;"
                    disabled="true"
                    class="upload">
                    Uploading...
                </button>
            </form>
        </div>
    </div>

</body>


</html>