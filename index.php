<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>výpis adresára</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>

<body>
    <h1>Adresár files</h1>
    <table class="table table-striped" id="sortMe">
        <thead>
            <tr>
                <th class="table__header">Názov</th>
                <th class="table__header">Dátum</th>
                <th data-type="number" class="table__header">Veľkosť</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $a = $_GET['param'];
            $_path = "/home/xbaranecd/files";
            var_dump($_path);

            function move($path, $file)
            {
                $new = substr($path, 21);
                if ($file == "..") {
                    $new = substr($new, 0, strrpos($new, '/'));
                    return "https://site38.webte.fei.stuba.sk/zadanie1/index.php?param=$new";
                }

                return "https://site38.webte.fei.stuba.sk/zadanie1/index.php?param=$new/$file";
            }
            var_dump($_path);
            if(isset($a) && $a != "files"){
                $_path = $_path . "$a";
            }
            if(!str_contains($_path, "..")){
                $files = scandir($_path);
            }
            var_dump($_path);

            //$pole = scandir($path);
            foreach ($files as $file) {
              
                if($file == "."){
                    continue;
                }
                if ($file == ".." && $_path == "/home/xbaranecd/files"){
                    continue;
                }
                if((is_dir($_path . "/" . $file)|| $file == ".." )) {
                    echo "<tr><td><a href=" . move($_path,$file) . ">$file</td><td></td><td></td></tr>";
                } else /* {
                    echo "<tr><td>$file</td>
                        <td>" . gmdate("d.m.Y H:i:s ", filemtime("$path/$file")) . "</td>
                        <td>" . filesize("$path/$file") . "</td></tr>";
                }*/
                {
                    $size = filesize($_path . "/" . $file);
                    $created = date ("d.m.Y H:i:s", filemtime($_path . "/" . $file));
                    echo "<tr><td>$file</td><td>$created</td><td>". $size . "</td></tr>";
                    
                }
            }

            ?>
        </tbody>
    </table>
    <form class="form-group" action="upload.php" method="post" enctype="multipart/form-data">
        Choose file:
        <input type="file" name="fileToUpload" id="fileToUpload" onChange='getFileNameWithExt(event)'>
        Filename for saving <input id='outputfile' type='text' name='outputfile'>
        <input id='extension' type='text' name='extension'>
        <button type="submit" class="btn btn-primary mb-2" value="Upload" name="submit">Upload</button>
    </form>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>