<?php
require_once 'src/gtfs-realtime-parser.php';

use kamilmakosa\transit_realtime_parser\GTFS_RealtimeParser;

$tripUpdatesOptions = [
	'path' => realpath(__DIR__.'/../transit-monitor-api/storage/gtfs-rt'),
	'file' => 'trip_updates.pb',
	'output-file' => 'trip_updates.json',
];

$vehiclePositionsOptions = [
	'path' => realpath(__DIR__.'/../transit-monitor-api/storage/gtfs-rt'),
	'file' => 'vehicle_positions.pb',
	'output-file' => 'vehicle_positions.json',
];

$parser = new GTFS_RealtimeParser($vehiclePositionsOptions, $tripUpdatesOptions);

$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJ0ZXN0Mi56dG0ucG96bmFuLnBsIiwiY29kZSI6MSwibG9naW4iOiJtaFRvcm8iLCJ0aW1lc3RhbXAiOjE1MTM5NDQ4MTJ9.ND6_VN06FZxRfgVylJghAoKp4zZv6_yZVBu_1-yahlo';
$url = 'https://www.ztm.poznan.pl/pl/dla-deweloperow/getGtfsRtFile?token='.$token.'&file='.$tripUpdatesOptions['file'];

$parser->pb_download($url, $tripUpdatesOptions['path'].'/'.$tripUpdatesOptions['file']);
$parser->trip_updates_parse();
// $parser->display_json($tripUpdatesOptions['path'].'/'.$tripUpdatesOptions['output-file']);

$url = 'https://www.ztm.poznan.pl/pl/dla-deweloperow/getGtfsRtFile?token='.$token.'&file='.$vehiclePositionsOptions['file'];

$parser->pb_download($url, $vehiclePositionsOptions['path'].'/'.$vehiclePositionsOptions['file']);
$parser->vehicle_positions_parse();
// $parser->display_json($vehiclePositionsOptions['path'].'/'.$vehiclePositionsOptions['output-file']);
?>
