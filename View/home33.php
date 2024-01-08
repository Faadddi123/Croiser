<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CKEditor with Image Upload in Text Input</title>
    <!-- CKEditor CSS -->
    <link rel="stylesheet" href="/path/to/ckeditor/skins/moono-lisa/editor.css">
</head>
<body>

    <!-- Classic Text Input -->
    <input type="text" id="textInput" placeholder="Type here...">

    <!-- File Input for Image Upload -->
    <input type="file" id="imageUpload" accept="image/*">

    <!-- CKEditor JavaScript -->
    <script src="/path/to/ckeditor/ckeditor.js"></script>

    <script>
        // Replace 'textInput' with the ID of your text input
        CKEDITOR.replace('textInput', {
            // Add any additional configurations or plugins here
        });

        // Replace 'imageUpload' with the ID of your file input
        document.getElementById('imageUpload').addEventListener('change', function (event) {
            const fileInput = event.target;
            const file = fileInput.files[0];

            if (file) {
                // Handle the file, e.g., upload it to a server
                console.log('Selected file:', file.name);
            }
        });
    </script>

</body>
</html>