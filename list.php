<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>

        body {
            position: relative;
            margin: 100px auto;
        }

        section {
            max-width: 768px;
            margin: 0 auto;
        }

    </style>
</head>
<body>
    <section>
        <?php
        $fileList = scandir('test');
        chdir('test');
        $testList = array_slice($fileList, 2);
        foreach ($testList as $key => $value) {
            $json = file_get_contents($value);
            $data = json_decode($json, true);
            $testNumber = $data[0]['test_number'];
            $testName = $data[0]['test_name'];
            ?>
            <div> <?= $testNumber . '. ' . $testName ?> </div><p></p>
            <?php
        }
        ?>

        <form action="test.php" method="GET">
            <label>Номер теста <input name="option" type="text"></label>
            <input type="submit" value="Отправить">
        </form>

        <p></p>
        <a href="index.php">Перейти на главную страницу</a>
    </section>
</body>
</html>



