<?php
// verfifica que el servidor permita subir archivos
//if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Verifica errores en los archivos a subir
    if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];
    
        // verfica la extencion
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Por favor seleccione un formato valido");
    
        // verifica tama帽o maximo - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: el archivo es demaciado grande");
    
        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            if(file_exists("upload/" . $filename)){
                echo $filename . "el archivo ya existe";
            } else{
                //move_uploaded_file($_FILES["photo"]["tmp_name"], "upload/" . $filename);
                echo "su archivo se cargo correctamente";
            } 
        } else{
            echo "Error: Ocurrio un error durante la carga por favor intente de nuevo"; 
        }
    } else{
        echo "Error: " . $_FILES["photo"]["error"];
    }
/*}
else{
    echo "el server no permite post";
}*/
?>