<?php
      include ("uploaddb.php");
      $foto = $_FILES['foto'];
      $fotoName = $_FILES['foto']['name'];
      $fotoTmpName = $_FILES['foto']['tmp_name'];
      $fotoSize = $_FILES['foto']['size'];
      $fotoError = $_FILES['foto']['error'];
      $fotoType = $_FILES['foto']['type'];

      $fotoExt = explode('.', $fotoName);
      $fotoActualExt = strtolower(end($fotoExt));
      $allowed = array('jpg', 'jpeg', 'png');

      if (in_array($fotoActualExt, $allowed)) {
        if ($fotoError === 0) {
          if ($fotoSize < 100000) {
            
            $image = file_get_contents($fotoTmpName);
            $image = base64_encode($image);


            $sql = "INSERT INTO imgbob (imgname, imgbob) VALUES ('{$fotoName}','{$image}');";
            $res = $conn->query($sql) or die("erro");
            //echo "<br><h2>Incluido com sucesso.</h2>";

            $sql = "SELECT * FROM imgbob;";
            $res = $conn->query($sql) or die("erro");

            $row = $res->fetch_object();
            $data = $row->imgbob;
            print $row->imgname."<br>";
            print '<img src="data:image/gif;base64,' . $data . '" />';

            
            //$fotoNameNew = uniqid('', true).".".$fotoActualExt; //uniqid for giving unique names for files regardless of uploaded name, avoid deletion of files
            //$fotoDestination = 'uploads/'.$fotoNameNew; //new upload location
            //move_uploaded_file($fotoTmpName , $fotoDestination);//in case of upload induced panic remember to check your actual permissions on files/folders :(
            //header("Location: upload_form.php?uploadsucess");
          } else {
            echo "Arquivo muito grande.";
          }
        } else {
          echo "Erro com o upload.";
        }
      } else {
        echo "Não suportado. Faça uploads de jpg, jpeg ou png.";
      }

?>