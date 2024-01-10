
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <?php var_dump($wikis); ?>
    <div id="result-container"></div>
    <script>
    var wikies;
    function get_data(callback) {
    var result;

    let myRequest = new XMLHttpRequest();
    myRequest.open("GET", "index.php?action=seepage", true);

    myRequest.onreadystatechange = function () {
        if (this.readyState === 4) {
            if (this.status === 200) {
                result = JSON.parse(this.responseText);
                wikies = result;
                callback(result);
            } else {
                console.error("Failed to fetch data");
            }
        }
    };

    myRequest.send();
}

// Usage
get_data(function (wikies) {
    console.log(wikies);
});

 

    </script>
</body>
</html>

