<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>

        body {
            position: relative;
            margin: 20px auto;
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
        global $correctAnswers, $correctAnswersString;
        if (isset($_GET['option'])) {
            $testNumber = (int)$_GET['option'];
            $f = FILTER_VALIDATE_INT;
            $options = ['options' => ['min_range' => 1, 'max_range' => 3]];
            if (filter_var($testNumber, $f, $options)) {
                $fileList = scandir('test');
                chdir('test');
                $testList = array_slice($fileList, 2);
                $testFileName = $testList[$_GET['option'] - 1];
                $json = file_get_contents($testFileName);
                $data = json_decode($json, true);
                $questionList = array_slice($data, 1);
                ?>

                <form action="testValidate.php" method="POST">
                    <label>Ваше имя <input name="user_name" type="text"></label>
                    <?php
                    foreach ($questionList as $key => $value) {
                        ?>
                        <p></p>
                        <fieldset>
                            <p></p>
                            <div><?= $value['question'] ?></div><p></p>
                            <?php
                            foreach ($value['options'] as $index => $item) {
                                ?>
                                <input type="radio" name="<?= $key + 1 ?>" value="<?= $index + 1 ?>"><span><?= $index + 1 . '. ' . $item ?></span><p></p>
                                <?php
                            }
                            ?>
                        </fieldset>
                        <?php
                        $correctAnswers[$key] = $value['answer'];
                    }
                    $correctAnswersString = implode(',', $correctAnswers);
                    ?>
                    <p></p>
                    <input type="hidden" name="correct_answers" value=<?= $correctAnswersString ?>>
                    <input type="submit" value="Отправить">
                </form>
                <?php

            } else {
                header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
                echo 'Неверно введен номер теста';
                exit;
            }
        }
        ?>

        <p></p>
        <a href="index.php">Перейти на главную страницу</a>
    </section>
</body>
</html>

