<?php
function convert($string) {
    $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
    $num = range(0, 9);
    $englishNumbersOnly = str_replace($persian, $num, $string);
    return $englishNumbersOnly;
}
function secs_to_str($duration) {
    $periods = [
        'روز' => 86400,
        'ساعت' => 3600,
        'دقیقه' => 60,
        'ثانیه' => 1
    ];
    $parts = [];
    foreach ($periods as $name => $dur) {
        $div = floor($duration / $dur);
        if ($div == 0) continue;
        else if ($div == 1) $parts[] = $div . " " . $name;
        else $parts[] = $div . " " . $name;
        $duration %= $dur;
    }
    $last = array_pop($parts);
    if (empty($parts)) return $last;
    //    else return join('، ', $parts) . " و " . $last;
    else return join(' و ', $parts) . " و " . $last;
}
function nextUpdate() {
    $now = time();
    $year = date('n') == 12 ? date('Y') + 1 : date('Y');
    $nextUpdate = date('j') > (date('t') / 2) ? mktime(9, 0, 0, date('n') + 1, 1, $year) : mktime(9, 0, 0, date('n'), 15, $year);

    return secs_to_str($nextUpdate - $now);
}