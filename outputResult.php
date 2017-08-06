<?php

include __DIR__ . '/src/GdGenerator.php';
include __DIR__ . '/src/RatingGenerator.php';

$ImageGenerator = new GdGenerator();
$RatingGenerator = new RatingGenerator();
$ratingText = 'Геннадий Юсупов: Тест пройден';

$ImageGenerator->generate($ratingText);
