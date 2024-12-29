<html>
    <head>
    
    <link rel="stylesheet" href="../masstv/Assets/CSS/adminPanel.css">

    <script>
        function handleAddLiveModel(value) {
            let addLiveModel = document.getElementById('addLiveModel').style;
            addLiveModel.display = value === 'true' ? 'flex' : 'none';
            document.getElementById('url').value = '';
            document.getElementById('liveupload').disabled = true;
        }
    </script>
    </head>
    <body>
        
    <div class="adminPanel">
                <div onclick="handleAddLiveModel('true')" class='panel'>
                    Change Live Stream
                </div>
                <div class='panel'>
                    Add Video
                </div>
                <div class='panel'>
                    Update Logo
                </div>
            </div>
    </body>
</html>