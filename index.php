<?php # Script 17.3 - index.php
//  This is the main page for the site.

//  Include the HTML header:
include('restfulphp/headerapi.php');

//  The content on this page is introducty text
//  pulled from the database, based upon the 
//  selected language:

//  normal export:
//  echo $words['intro'];

//  json export
echo json_encode($words);

//  Include the HTML footer file:
//  include ('includes/footer.html');
