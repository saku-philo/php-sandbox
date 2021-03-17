<?php
    $input_line = explode(" ", trim(fgets(STDIN)));
    $height = $input_line[0];
    $width = $input_line[1];

    for($i=0; $i<$height; $i++) {
        $line = trim(fgets(STDIN));
        $tmp_arr = str_split($line);
        $arr[] = $tmp_arr;

    }

    $num_ropes = 0;

    foreach($arr as $key => $nest_arr) {
        foreach($nest_arr as $nest_key => $val) {
            if ($val == '#') {
                // left
                if(!$nest_arr[$nest_key - 1] || $nest_arr[$nest_key - 1] == '.') {
                    $num_ropes++;
                }

                // right
                if(!$nest_arr[$nest_key + 1] || $nest_arr[$nest_key + 1] == '.') {
                    $num_ropes++;
                }

                // up
                if(!$arr[$key - 1] || $arr[$key - 1][$nest_key] == '.') {
                    $num_ropes++;
                }

                // down
                if(!$arr[$key + 1] || $arr[$key + 1][$nest_key] == '.') {
                    $num_ropes++;
                }
            }
        }
    }

    print_r($num_ropes."\n");
