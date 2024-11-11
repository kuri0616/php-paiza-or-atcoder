<?php
$input_line = fgets(STDIN);

$trim_value = trim($input_line);

$cards = explode( " ", $trim_value );

$card_line_up = $cards[0] . $cards[1] . $cards[2];

$sum_number = intval($card_line_up);

if ($sum_number % 4 === 0) {
    echo "YES";
} else {
    echo "NO";
}