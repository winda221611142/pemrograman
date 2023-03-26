<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Web Pencarian Film</h1>
    <form method="post" action="index.php">
        <input type="text" name="judul"></input>
        <input type="submit" value="semoga beruntung" name="cari"></input>
    </form>
    
    <?php
        if(isset($_POST['cari'])){
            $judul = $_POST['judul'];
            echo "<h1>Hasil Pencarian</h1>";
        
            $url = 'https://github.com/deaaprizal/rdeafilms-react-js-basic.gits="'.$judul.'"';

           //Akses API dengan CURL
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $output = curl_exec($ch);
            curl_close($ch);

            // var_dump($output);
            $data = json_decode($output, TRUE);
            // $data = $data['Search'];
            
            foreach ($data['Search'] as $movies) {
                
                echo "\n <p>Judul: ".$movies["Title"]."</p>";
                echo "<p>Tahun: ".$movies["Year"]."</p>";
                echo '<img src= "'.$movies['Poster'].'">';
            }    
        }
        ?>
    
</body>
</html>