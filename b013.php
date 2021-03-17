<?php
    $input_line = trim(fgets(STDIN));
    $necessary_times = explode(" ", $input_line);
    $walk_time = $necessary_times[0];
    $ride_time = $necessary_times[1];
    $walk_time_to_office = $necessary_times[2];
    $after_boarding_time = $ride_time + $walk_time_to_office;

    $start_time = new DateTime();
    // 始業時間を9:00に設定
    $start_time->setTime(9, 0, 0);
    // 所用時間を引く
    $target_time = $start_time->sub(new DateInterval("P0MT{$after_boarding_time}M"));

    $num_of_trains = (int) trim(fgets(STDIN));
    for ($i = 0; $i < $num_of_trains; $i++) {
        $str = trim(fgets(STDIN));
        $tmp_arr = explode(" ", $str);
        $now = new DateTime();
        $now->setTime($tmp_arr[0], $tmp_arr[1], 00);
        $time_table[] = $now;
    }

    foreach ($time_table as $time_obj) {
        if ($time_obj < $target_time) {
            $target_train = $time_obj;
        }
    }

    $target_train->sub(new DateInterval("P0MT{$walk_time}M"));
    $departure_time = $target_train->format("H:i");

    echo $departure_time."\n";
