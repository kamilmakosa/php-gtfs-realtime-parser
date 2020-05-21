<?php
require_once '../src/gtfs-realtime-parser.php';

use kamilmakosa\transit_realtime_parser\GTFS_RealtimeParser;

$tripUpdatesOptions = [
	'path' => __DIR__,
	'file' => 'trip_updates.pb',
	'output-file' => 'trip_updates.json',
];

$parser = new GTFS_RealtimeParser(null, $tripUpdatesOptions);

$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJ0ZXN0Mi56dG0ucG96bmFuLnBsIiwiY29kZSI6MSwibG9naW4iOiJtaFRvcm8iLCJ0aW1lc3RhbXAiOjE1MTM5NDQ4MTJ9.ND6_VN06FZxRfgVylJghAoKp4zZv6_yZVBu_1-yahlo';
$url = 'https://www.ztm.poznan.pl/pl/dla-deweloperow/getGtfsRtFile?token='.$token.'&file='.$tripUpdatesOptions['file'];

$parser->pb_download($url, $tripUpdatesOptions['path'].'/'.$tripUpdatesOptions['file']);
$parser->trip_updates_parse();
$parser->display_json($tripUpdatesOptions['path'].'/'.$tripUpdatesOptions['output-file']);

?>
