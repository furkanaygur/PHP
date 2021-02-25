<?php
function multi_upload($files)
{
    $result = [];
    foreach ($files["error"] as $index => $error) {
        if ($error == 4) {
            $result["err"] = "Please enter a file";
        } elseif ($error != 0) {
            $result["err"][] = "Incorrected file uploaded #" . $files["name"][$index];
        }
    }

    if (!isset($result["err"])) {
        global $file_types;

        foreach ($files["type"] as $index => $type) {
            if (!in_array($type, $file_types)) {
                $result["err"] = "Incorret file tpye #" . $files["name"][$index];
            }
        }

        if (!isset($result["err"])) {
            foreach ($files["tmp_name"] as $index => $tmp_name) {
                $file_name = $files["name"][$index];
                $upload = move_uploaded_file($tmp_name, $file_name);
                if ($upload) {
                    $result["file"][] = $file_name;
                } else {
                    $result["err"][] = "file couldn't uploading #" . $files["name"][$index];
                }
            }
        }

        if (!isset($result["err"])) {
            $maxSize = (1024 * 1024);
            foreach ($files["size"] as $index => $size) {
                if ($size > $maxSize) {
                    $result["err"][] = "Please enter valid file size #" . $files["name"][$index];
                }
            }
        }
    }

    return $result;
}

$file_types = [
    "image/jpeg"
];
$result = multi_upload($_FILES["file"]);

if (isset($result["file"])) {
    foreach ($result["file"] as $index => $file) {
        echo "<a href=" . $file . "> " . ($index + 1) . ".file => " . $file . "</a> <br>";
    }
    if (isset($result["err"])) {

        print_r($result["err"]);
    }
} elseif (isset($result["err"])) {
    if (is_array($result["err"])) {
        echo implode("<br>", $result["err"]);
    } else {
        echo $result["err"];
    }
}
