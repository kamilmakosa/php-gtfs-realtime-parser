<?php
require_once '../src/gtfs-realtime-parser.php';

use kamilmakosa\transit_realtime_parser\GTFS_RealtimeParser;

$vehiclePositionsOptions = [
	'path' => __DIR__,
	'file' => 'vehicle_positions.pb',
	'output-file' => 'vehicle_positions.json',
];

$parser = new GTFS_RealtimeParser($vehiclePositionsOptions, null);

$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJ0ZXN0Mi56dG0ucG96bmFuLnBsIiwiY29kZSI6MSwibG9naW4iOiJtaFRvcm8iLCJ0aW1lc3RhbXAiOjE1MTM5NDQ4MTJ9.ND6_VN06FZxRfgVylJghAoKp4zZv6_yZVBu_1-yahlo';
$url = 'https://www.ztm.poznan.pl/pl/dla-deweloperow/getGtfsRtFile?token='.$token.'&file='.$vehiclePositionsOptions['file'];

$parser->pb_download($url, $vehiclePositionsOptions['path'].'/'.$vehiclePositionsOptions['file']);
$parser->vehicle_positions_parse();
$parser->display_json($vehiclePositionsOptions['path'].'/'.$vehiclePositionsOptions['output-file']);
?>
