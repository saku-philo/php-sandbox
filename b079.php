<?php
    $input_line = trim(fgets(STDIN));
    $names = explode(" ", $input_line);
    $name_a = $names[0];
    $name_b = $names[1];

    $alfa_arr = [
        'a' => 1,
        'b' => 2,
        'c' => 3,
        'd' => 4,
        'e' => 5,
        'f' => 6,
        'g' => 7,
        'h' => 8,
        'i' => 9,
        'j' => 10,
        'k' => 11,
        'l' => 12,
        'm' => 13,
        'n' => 14,
        'o' => 15,
        'p' => 16,
        'q' => 17,
        'r' => 18,
        's' => 19,
        't' => 20,
        'u' => 21,
        'v' => 22,
        'w' => 23,
        'x' => 24,
        'y' => 25,
        'z' => 26,
    ];

    $ans_a = checkAffinity($name_a, $name_b, $alfa_arr);
    $ans_b = checkAffinity($name_b, $name_a, $alfa_arr);

    if ($ans_a >= $ans_b) {
        $answer = $ans_a;
    } else {
        $answer = $ans_b;
    }
    echo $answer."\n";

    function checkAffinity($name1, $name2, $arr) {
        $names = str_split($name1.$name2);
        foreach ($names as $char) {
            $res_arr[] = $arr[$char];
        }

        $num = count($res_arr);
        for ($i = 0; $i < $num - 1; $i++) {
            $res_arr = convertArray($res_arr);
        }
        return $res_arr[0];
    }

    function convertArray($arr) {
        for ($i = 0; $i < (count($arr) -1); $i++) {
            $tmp_num = $arr[$i] + $arr[$i +1];
            if ($tmp_num > 101) {
                    $tmp_arr[] = $tmp_num - 101;
                } else {
                    $tmp_arr[] = $tmp_num;
                }
        }
        $arr = $tmp_arr;
        return $arr;
    }
