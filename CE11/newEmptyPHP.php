
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

        <script>

            function letsAdventure(choice) {
                //creates the datafile with query string
                var data_file = "AdventureEX.php?AdvID=" + choice;
                //this is making the http request
                var http_request = new XMLHttpRequest();
                try {
                    // Opera 8.0+, Firefox, Chrome, Safari
                    http_request = new XMLHttpRequest();
                } catch (e) {
                    // Internet Explorer Browsers
                    try {
                        http_request = new ActiveXObject("Msxml2.XMLHTTP");
                    } catch (e) {
                        try {
                            http_request = new ActiveXObject("Microsoft.XMLHTTP");
                        } catch (e) {
                            // Something went wrong
                            alert("Your browser broke!");
                            return false;
                        }
                    }
                }
                http_request.onreadystatechange = function () {
                    if (http_request.readyState == 4)
                    {
                        var text = http_request.responseText;

                        //this is adding the elements to the HTML in the page
                        document.getElementById("AdvTable").innerHTML = text;
                    }
                }
                http_request.open("GET", data_file, true);
                http_request.send();
            }
        </script>
    </head>
    <body>
        <div id="AdvTable">
            <table>
                <tr>
                    <th></th>
                </tr>
                <tr>
                    <td><div id="advText">Are you ready to start?</div></td>
                    <tr>
                        <td><div id="button1"><button type="button" value="1" onclick="letsAdventure(this.value)">Lets Start</button></div></td>
                    </tr>
                </tr>

            </table>
        </div>
    </body>
</html>

