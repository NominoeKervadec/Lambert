<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<title>La boite à Lambert</title>
    </head>
    <body>
        <div class="jumbotron">
            <div class="container-fluid">
                <h1>La boite à Lambert</h1>
                <p>Et ça fait peur aux chiens.</p>
                <a onclick="random()" type="button" aria-pressed="true" class="btn btn-danger btn-lg active btn-block">Random</a>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row mt-4">
                <?php
                $i = 0;
                $to_replace = array("_" => " ", "-" => " ", "sounds/" => "", ".mp3" => "");
                $color = array("primary", "secondary", "success", "danger", "warning", "info", "light", "dark");
                foreach(glob("sounds/*.mp3") as $file) {
                    if($i % 4 == 0 && $i != 0){
                        echo "</div>\n";
                        echo "<div class=\"row mt-4\">\n";
                    }
                    $id = md5($file);
                    echo "<div class=\"col\">\n";
                    echo "<audio id=\"$id\" src=\"$file\" preload=\"none\"></audio>\n";
                    echo "<a href=\"#$id\" onclick=\"document.getElementById('$id').play();\" type=\"button\" aria-pressed=\"true\" class=\"btn btn-".$color[$i%(count($color))]." btn-lg active btn-block\">\n";
                    $title = $file;
                    foreach($to_replace as $key => $value) {
                        $title = str_replace($key, $value, $title);
                    }
                    echo $title;
                    echo "</a>\n";
                    echo "</div>\n";
                    $i = $i+1;
                }
                ?>
            </div>
        </div>
    </body>
    <script>
     var url = window.location.hash.substr(1);
     if(url) document.getElementById(url).play();

     function random() {
         var files = document.getElementsByTagName("audio");
         var random = files[Math.floor(Math.random()*files.length)];
         location.href = "#"+random.id;
         random.play();
     }
    </script>
</html>
