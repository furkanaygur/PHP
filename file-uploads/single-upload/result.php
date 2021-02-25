<?php
function fileUpload($file, $size = 1, $type = null)
{
    $result = [];
    if ($file["error"] == 4) {
        $result["err"] = "Please enter a file";
    } else {

        if (is_uploaded_file($file["tmp_name"])) {
            $file_types =  $type ? $type : [
                'image/jpeg',
                'image/png',
                'image/gif'
            ];
            $file_size = (1024 * 1014 * $size);
            $file_type = $file["type"];
            if (in_array($file_type, $file_types)) {
                if ($file_size >= $file["size"]) {
                    $upload = move_uploaded_file($file["tmp_name"], $file["name"]);
                    if ($upload) {
                        $result["file"] = $file["name"];
                    } else {
                        $result["err"] =  "an error your file could not uploading";
                    }
                } else {
                    $result["err"] = "Please enter a valid file size";
                }
            } else {
                $result["err"] = "Please enter a valid file type";
            }
        } else {
            $result["err"] = "an error when trying upload file";
        }
    }
    return $result;
}

$result = fileUpload($_FILES["file"]);

if (isset($result["err"])) {
    echo $result["err"];
    echo '<meta http-equiv="refresh" content="2;URL=\'http://localhost/project/upload.php\'">';
} else {
    echo  "<a href='" . $result["file"] . "' >Go to file </a>";
}

// copy($_FILES["file"]["tmp_name"],$_FILES["file"]["name"]);
