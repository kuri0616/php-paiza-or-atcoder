<?php
$input_line = fgets(STDIN);
$input_value = trim($input_line);
$input_ary = explode(" ", $input_value);

$type_count = intval($input_ary[0]);
$week_count = intval($input_ary[1]);

$data = [];

for ($i = 0; $i < $type_count; $i++) {
    $row = fgets(STDIN);
    $row_ary = array_map('intval', explode(" ", trim($row)));
    $data[] = [
        'interval' => $row_ary[0],
        'amount' => $row_ary[1]
    ];
}

$result_amount = 0;

for ($week = 0; $week < $week_count; $week++) {
    $weeklyTotal = 0;
    $purchaseCount = 0;

    foreach ($data as $item) {
        if ($week % $item['interval'] === 0) {
            $weeklyTotal += $item['amount'];
            $purchaseCount++;
        }
    }

    // 割引計算を関数化すると見やすい
    $weeklyTotal = applyDiscount($weeklyTotal, $purchaseCount);
    $result_amount += $weeklyTotal;
}

// 割引を適用する関数
function applyDiscount($amount, $count) {
    if ($count === 2) {
        return $amount * 0.9;
    } elseif ($count >= 3) {
        return $amount * 0.85;
    }
    return $amount;
}

echo $result_amount;
?>
