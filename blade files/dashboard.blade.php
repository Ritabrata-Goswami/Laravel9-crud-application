<html>
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-metro.css">
    <style type="text/css">
        table,tr,th,td{border:1px solid #000000;}
        td{
            padding:5px 3px;
            text-align:center;
            font-size:14px;
        }
        th{
            padding:5px 5px;
            text-align:center;
        }
    </style>
    <body>
        <h2 class="w3-margin-left">Dashboard</h2>
        <a href="/logout"><button class="w3-margin-top w3-red w3-button w3-margin-left w3-hover-black">Logout</button></a>
        <a href="/form"><button class="w3-margin-top w3-button w3-green w3-hover-black w3-margin-left">Form page</button></a>
        <table class="w3-margin-top w3-margin-left">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Education</th>
                <th>State</th>
                <th>Photo</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>

        @if(count($data)>0)
            @foreach($data as $item)
            
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->gender}}</td>
                <td>{{$item->education}}</td>
                <td>{{$item->state}}</td>
                <td><img src="./image_file/{{$item->photo}}" width="100px" height="100px" title="image" style="cursor:pointer;"/></td>
                <td><a href="/edit/{{$item->id}}"><button style="cursor:pointer; font-size:14px;" class="w3-button w3-blue w3-hover-green">Edit</button></a></td>
                <td>
                    <form action="/delete/{{$item->id}}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button style="cursor:pointer; font-size:14px;" class="w3-button w3-red w3-hover-orange">Delete</button>
                    </form>
                </td>
            </tr>

            @endforeach
        @else

            <tr>
                <td colspan="8" class="w3-text-red w3-padding w3-center" style="font-size:14px">No Records Found!</td>
            </tr>

        @endif

        </table>
    </body>
</html>
