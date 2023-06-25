<html>
    <title>Form Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-metro.css">
    <body>
        <h2 style="text-align:center;">Form Page</h2>
        <a href="/logout"><button class="w3-margin-top w3-red w3-button w3-margin-left w3-hover-black">Logout</button></a>
        <a href="/dashboard"><button class="w3-margin-top w3-button w3-green w3-hover-black w3-margin-left">Dashboard page</button></a>
        <div style="login-container">
            <form method="post" action="/send-data" class="w3-padding" enctype="multipart/form-data">
            @csrf
                <span style="font-size:13.5px;">Name:</span>
                <input type="text" name="enter_name" placeholder="Enter user id" class="w3-input w3-border" style="font-size:13.5px;"/>
                <span style="font-size:13.5px;">Gender:</span>
                <input type="radio" name="enter_gender" value="male"/> Male
                <input type="radio" name="enter_gender" value="female"/> Female
                <div class="w3-margin-top">
                    <span style="font-size:13.5px;">Education</span>
                    <input type="checkbox" name="enter_edu[]" value="10-th"/> 10-th
                    <input type="checkbox" name="enter_edu[]" value="12-th"/> 12-th
                    <input type="checkbox" name="enter_edu[]" value="degree"/> Degree
                    <input type="checkbox" name="enter_edu[]" value="master"/> Master
                </div>
                <div class="w3-margin-top">
                    <span style="font-size:13.5px;">State</span>
                    <select name="enter_state">
                        <option value="">--select--</option>
                        <option value="West Bengal">West Bengal</option>
                        <option value="Tripura">Tripura</option>
                        <option value="Tamil nadu">Tamil Nadu</option>
                        <option value="Uttar Pradesh">UP</option>
                        <option value="Rajastan">Rajastan</option>
                    </select>
                </div>
                <div class="w3-margin-top">
                    <input type="file" name="upload-photo"/>
                </div>
                <div class="w3-margin-top">
                    <input type="submit" name="submit" value="Submit" class="w3-button w3-blue w3-hover-black" style="font-size:13.5px;"/>
                </div>
            </form>
        </div>
    </body>
</html>