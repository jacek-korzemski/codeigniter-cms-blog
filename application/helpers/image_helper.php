<?php 
// List images in uploads folder
function list_images() {

    // Declare variable to return
    $html = '';
    // Scan pagination folder with images
    $list = scandir(__DIR__.'/../../assets/uploads',1);
    // Build something like gallery
    foreach($list as $elem) {
        if ($elem == 'index.php') {} elseif ($elem == '..') {} elseif ($elem == '.') {} else {
            // Put html to returnable variable
            $html .= '<img src="assets/uploads/'.$elem.'" alt="image" />'; 
        }
    }
    return $html;
}