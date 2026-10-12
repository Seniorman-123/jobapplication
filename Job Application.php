<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body {
            margin: 0px;
            padding: 0px;
        }

        h4 {
            font-size: 40px;
            margin: 0px;
            text-align: center;
            color: green;
        }

        h5 {
            font-size: 30px;
            margin: 0px;
            text-align: center;
            color: purple;
        }

        section {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        form {
            line-height: 20px;
            border: 1px solid gray;
            width: 40%;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        input.submit {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h4> Vacancies Available </h4>
    <h5> Apply Now! </h4>

    <section>
        <form method="POST" enctype="multipart/form-data">
            Full Name: <input type="text" name="name"> <br>
            E-mail Address: <input type="email" name="email"> <br>
            Phone Number: <input type="number" name="number"> <br>
            Address: <input type="text" name="address"> <br>
            Date Of Birth: <input type="date" name="date"> <br>
            Passport: <input type="file" name="passport"> <br>
            Letter: <textarea cols="50" rows="8" name="letter"> </textarea>
            <input class="submit" type="submit" name="submit" value="Submit Application">
        </form>
    <section>

    <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $targetFilePath = "uploads/" . basename($_Files["passport"]["name"]);
            move_uploaded_file($_FILES["passport"]
            ["tmp_name"], $targetFilePath);

            $user_1 = $_POST["name"] . " . " . $_POST["email"] . " . " . $_POST["number"] . " . " . $_POST["address"] . " . " . $_POST["date"] . " . " . $_FILES["passport"]["name"] . " . " . $_POST["letter"] . "/n";

            $newFile = fopen("newFile.txt", "a");

            if($newFile) {
                fwrite($newFile, $user_1);
                fclose($newFile);
                echo "<br>";
                echo "Application Submitted Successfully";
            } else {
                echo "Error: Could not open file.";
            }
        }
    ?>
</body>
</html>