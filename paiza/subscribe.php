<?php
$input_line  = fgets(STDIN);

$input_value = trim($input_line);

$input_ary = explode(" ", $input_value);

$type_count = intval($input_ary[0]);
$week_count = intval($input_ary[1]);

$data = [];

for($i = 0; $i < $type_count + 1; $i++) {
    $row = fgets(STDIN);
    $trim_row = trim($row);

    $row_ary = explode(" ", $trim_row);

    $data[] = [
        'interval' => intval($row_ary[0]),
        'amount' => intval($row_ary[1])
    ];
}


$sum_amount = 0;
$count = 0;
$result_amount = 0;

for($i = 0; $i < $week_count; $i++) {

    foreach($data as $value) {

        if ($i === 0) {
            $sum_amount += $value['amount'];
            $count += 1;
            continue;
        }

        if ($i % $value['interval'] === 0) {
            $sum_amount += $value['amount'];
            $count += 1;
        }
    }

    if ($count === 2) {
        $sum_amount = $sum_amount * 0.9;
    } elseif ($count >= 3) {
        $sum_amount = $sum_amount * 0.85;
    }
    $result_amount += $sum_amount;
    $sum_amount = 0;
    $count = 0;
}
echo $result_amount;
?>