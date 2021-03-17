<?php
    $arr = explode(" ", trim(fgets(STDIN)));
    $num_taxi = (int) $arr[0];
    $distance = (int) $arr[1];

    for ($i = 0; $i < $num_taxi; $i++) {
        $tmp_arr = explode(" ", trim(fgets(STDIN)));

        $dis_first = (int) $tmp_arr[0];
        $first_fare = (int) $tmp_arr[1];

        $dis_add = (int) $tmp_arr[2];
        $add_fare = (int) $tmp_arr[3];

        if ($distance < $dis_first) {
            $fare_arr[] = $first_fare;
        } else {
            $calc_add = $distance - $dis_first;
            if ($calc_add < $dis_add) {
                $fare_arr[] = ($first_fare + $add_fare);
            } else {
                $num = (int) (floor($calc_add / $dis_add) + 1);
                $fare_arr[] = $first_fare + ($add_fare * $num);
            }
        }
    }

    asort($fare_arr);
    echo $fare_arr[0]." ";
    echo array_pop($fare_arr)."\n";
