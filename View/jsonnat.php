
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
    <div id="result-container"></div>
    <script>
    var wikis = [];

 // var wikies;
 function get_data() {
    var result;
    
    let myRequest = new XMLHttpRequest();
    myRequest.open("GET", "index.php?action=seepage", true);

    myRequest.onreadystatechange = function () {
        if (this.readyState === 4) {
            if (this.status === 200) {
                result = JSON.parse(this.responseText);
                console.log(result);
                wikis = result;
                // callback(result);
            } else {
                console.error("Failed to fetch data");
            }
        }
    };
   
    myRequest.send();
} 
get_data();
console.log(wikis);

// Usage
// get_data(function (wikies) {
//     document.addEventListener
// });

    </script>
</body>
</html>

