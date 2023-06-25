<html>
    <title>Edit Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-metro.css">
    <body>
        <h2 style="text-align:center;">Edit Page</h2>
        <a href="#"><button class="w3-margin-top w3-red w3-button w3-margin-left w3-hover-black">Logout</button></a>
        <a href="/dashboard"><button class="w3-margin-top w3-button w3-green w3-hover-black w3-margin-left">Dashboard page</button></a>
        <div style="login-container">
            <form method="post" action="/save-edit" class="w3-padding" enctype="multipart/form-data">
                @csrf
                @foreach($edit as $val)
                <input type="hidden" name="data_id" value="{{$val->id}}"/>
                <span style="font-size:13.5px;">Name:</span>
                <input type="text" name="enter_name" placeholder="Enter user id" class="w3-input w3-border" style="font-size:13.5px;" value="{{$val->name}}"/>
                <span style="font-size:13.5px;">Gender:</span>
                <input type="radio" name="enter_gender" value="male" <?=(strcmp("male", $val->gender)==0)?"checked":""?>/> Male
                <input type="radio" name="enter_gender" value="female" <?=(strcmp("female", $val->gender)==0)?"checked":""?>/> Female
                <div class="w3-margin-top">
                    <span style="font-size:13.5px;">Education</span>
                    <input type="checkbox" name="enter_edu[]" value="10-th" <?=(in_array("10-th",explode(",",$val->education)))?"checked":""?>/> 10-th
                    <input type="checkbox" name="enter_edu[]" value="12-th" <?=(in_array("12-th",explode(",",$val->education)))?"checked":""?>/> 12-th
                    <input type="checkbox" name="enter_edu[]" value="degree" <?=(in_array("degree",explode(",",$val->education)))?"checked":""?>/> Degree
                    <input type="checkbox" name="enter_edu[]" value="master" <?=(in_array("master",explode(",",$val->education)))?"checked":""?>/> Master
                </div>
                <div class="w3-margin-top">
                    <span style="font-size:13.5px;">State</span>
                    <select name="enter_state">
                        <option value="">--select--</option>
                        <option value="West Bengal" <?=(strcmp("West Bengal", $val->state)==0)?"selected":""?>>West Bengal</option>
                        <option value="Tripura" <?=(strcmp("Tripura", $val->state)==0)?"selected":""?>>Tripura</option>
                        <option value="Tamil nadu" <?=(strcmp("Tamil nadu", $val->state)==0)?"selected":""?>>Tamil Nadu</option>
                        <option value="Uttar Pradesh" <?=(strcmp("Uttar Pradesh", $val->state)==0)?"selected":""?>>UP</option>
                        <option value="Rajastan" <?=(strcmp("Rajastan", $val->state)==0)?"selected":""?>>Rajastan</option>
                    </select>
                </div>
                <div class="w3-margin-top">
                    <input type="file" name="upload-photo"/>
                    <input type="hidden" name="default_photo" value="{{$val->photo}}"/>
                </div>
                @endforeach
                <div class="w3-margin-top">
                    <input type="submit" name="submit" value="Save" class="w3-button w3-blue w3-hover-black" style="font-size:13.5px;"/>
                </div>
            </form>
        </div>
    </body>
</html>