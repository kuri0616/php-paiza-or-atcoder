<?php

$input_line = fgets(STDIN);

$input_str = trim($input_line);

$number_of_games = intval($input_str);

$win_count = 0;

for($i = 0; $i < $number_of_games + 1; $i++) {
    $input = fgets(STDIN);
    $player_hands = trim($input);
    $player_hand_ary = explode(" ", $player_hands);

    $player_alice = $player_hand_ary[0];
    $player_bob = $player_hand_ary[1];

    if ($player_alice === 'G' && $player_bob === 'C') {
        $win_count++;
    }

    if ($player_alice === 'C' && $player_bob === 'P') {
        $win_count++;
    }

    if ($player_alice === 'P' && $player_bob === 'G') {
        $win_count++;
    }
}
echo $win_count;
?>