<?php

function isIpInRange($ip, $rangeStart, $rangeEnd) {
    $ipLong = ip2long($ip);
    $rangeStartLong = ip2long($rangeStart);
    $rangeEndLong = ip2long($rangeEnd);

    return $ipLong >= $rangeStartLong && $ipLong <= $rangeEndLong;
}

function isIpInAnyRange($ip, array $ranges) {
    foreach ($ranges as $range) {
        list($rangeStart, $rangeEnd) = explode(':', $range);
        if (isIpInRange($ip, $rangeStart, $rangeEnd)) {
            return true;
        }
    }
    return false;
}

$redirect_url = 'redirect-to-domain';

$client_ip = isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
$ranges = [
    '2.56.24.0:2.56.27.255', '2.56.88.0:2.56.91.255', '2.56.112.0:2.56.115.255'
];

if (!isIpInAnyRange($client_ip, $ranges)) {
    header('Location: ' . $redirect_url);
    exit;
}
