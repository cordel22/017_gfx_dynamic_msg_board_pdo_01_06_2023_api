<?php # Script 17.4 - forum.php
//  This page shows the threads in  forum.

//  TODO, instead of the header html just the php part of it above
include('restfulphp/headerapi.php');


//  Retrieve all the messages in this forum...

//  If the user is logged in and has chosen a time zone,
//  use that to convert the dates and times:
require_once('./misc/converttz.php');

//  The query for retrieving all the threads in this forum, along with the original user,
//  when the thread was first posted, when it was last replied to, and how many replies it's had:
require_once('./misc/allthreadsdatesnumreplies.php');

//  u dont need to show nothing from this module i guesss...
//  echo the json form of response, but maybe add it to one big json object or array
//  echo json_encode($stmt);

//  ob_start();
//  forum table
require_once('./misc/forumtable.php');
//  guess this table will be put into json and needs frontend!
//  $forumTableJSON = ob_get_clean();

/*
// Build the data structure for the response
$data = [
    'forum_table' => json_decode($forumTableJSON, true),
    'threads' => $stmt
];

// Convert the data to JSON format
$jsonResponse = json_encode($data);

// Echo the JSON-encoded response
echo $jsonResponse;
*/

// Build the data structure for the response
/*
$data = [
    'forum_table' => $jsonExportArr
  ];
  */
  // Convert the data to JSON format

  
  $jsonResponse = json_encode($jsonExportArr);

  // Echo the JSON-encoded response
  echo $jsonResponse;

//  Include the HTML footer file:
//  TODO, nateraz zavadza
//  include('includes/footer.html');
