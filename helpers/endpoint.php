<?php
// Get the full request URI
$request_uri = $_SERVER['REQUEST_URI'];

// Parse the URL to get the path
$parsed_url = parse_url($request_uri);
$path = $parsed_url['path'];

// Split the path into an array by '/'
$path_parts = explode('/', $path);

// Get the last part of the path, which is the file name
$last_part = end($path_parts);

// Remove the file extension from the last part
$last_part_without_extension = pathinfo($last_part, PATHINFO_FILENAME);


?>
