<HTML>
    <script>
        function postData() {
            const xhttp = new XMLHttpRequest();
            // xhttp.open("POST", "http://localhost:8000/src/gists/js-post/php-js-post.php");
            xhttp.open("POST", "js-post/php-js-post.php");
            xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            xhttp.onload = function () {
                document.getElementById("result-holder").innerHTML = this.responseText;
            }
            const name = document.getElementById("fname").value;
            xhttp.send("fname=" + name);
        }
    </script>

    <BODY>
        
        Name : <input id="fname" type="text" />
        <button onclick="postData()"> Submit Data </button>

        <h1 id="result-holder"></h1>
        
    </BODY>
</HTML>