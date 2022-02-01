<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>


    <form action="secnd.php" method="post">
        <div id="input1" class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Ancien index :</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="inputPassword" placeholder="" name="ancienindex">
            </div>
        </div>
        <div id="input2" class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Nouvel index : </label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="inputPassword" placeholder="" name="nouvelindex">
            </div>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Calibre</label>
            <select class="form-control" id="exampleFormControlSelect1" name="calibre">
                <option>Choisir</option>
                <option>5-10</option>
                <option>15-20</option>
                <option>>30</option>
            </select>
        </div>

        <button type="submit" class="btn btn-dark mb-2" id="confirm">Confirm identity</button>
    </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="script.js"></script>
</body>

</html>