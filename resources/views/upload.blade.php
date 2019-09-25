<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>File Upload</title>
</head>
<body>

<div class="container">

    <div class="py-5 text-center">
        <h1>File Upload</h1>
        <form action="save" method="post" enctype="multipart/form-data">
                    
            <input type="hidden" value="{{ csrf_token() }}" name="_token">

            <label for="file">Select file to upload : </label>
            <input type="file" name="file" id="file">
            <input class="btn btn-primary" type="submit" value="Upload" name="submit">
                    
        </form>
    </div>

</div>
    


</body>
</html>