<?php 
session_start();
?>
<!DOCTYPE html>

<html>

    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        <title>Formular firide</title>


        <!-- load Zebra_Form's stylesheet file -->
        <link rel="stylesheet" href="public/css/zebra_form.css">
        <script type="text/javascript" src="examples/libraries/highlight/public/javascript/highlight.js"></script>
        <script type="text/javascript" src="examples/public/javascript/jquery-1.12.0.js"></script>
        <script type="text/javascript" src="public/javascript/zebra_form.js"></script>
        <script type="text/javascript" src="examples/public/javascript/core.js"></script>
    </head>

    <body>

    <!-- the PHP code below goes here -->
<?php


    // include the Zebra_Form class
    require 'Zebra_Form.php';
    require '../Zebra_Image-master/Zebra_Image.php';
    // instantiate a Zebra_Form object
    $form = new Zebra_Form('form');

    // the label for the "name" element
    $form->add('label', 'label_name', 'name', 'Adresa:');

    // add the "name" element
    $obj = $form->add('text', 'name');

    // set rules
    $obj->set_rule(array(

        // error messages will be sent to a variable called "error", usable in custom templates
        'required' => array('error', 'Adresa este obligatorie!')

    ));

     //"image"
    
        $form->add('label', 'label_file', 'file', 'Incarca o imagine');
        $obj = $form->add('file', 'file');

    // set rules
    $obj->set_rule(array(   
        // error messages will be sent to a variable called "error", usable in custom templates
        'required'  =>  array('error', 'An image is required!'),
        'upload'    =>  array('tmp', ZEBRA_FORM_UPLOAD_RANDOM_NAMES, 'error', 'Could not upload file!<br>Check that the "tmp" folder exists inside the "examples" folder and that it is writable'),

        // notice how we use the "image" rule instead of the "filetype" rule (used in previous example);
        // the "image" rule does a thorough checking aimed specially for images
        'image'  =>  array('error', 'File must be a jpg, png or gif image!'),
        'filesize'  =>  array(102400, 'error', 'File size must not exceed 100Kb!'),
        'convert' => array(
        'jpg',                          // type to convert to
        85,                             // converted file quality
        false,                          // preserve original file?
        false,                          // overwrite if converted file already exists?
        'error',                        // variable to add the error message to
        'File could not be uploaded!'   // error message if value doesn't validate
        ),
        'resize' => array(
        'thumb_',                           // prefix
        '400',                              // width
        '281',                              // height
        true,                               // preserve aspect ratio
        ZEBRA_IMAGE_BOXED,                  // method to be used
        'FFFFFF',                           // background color
        true,                               // enlarge smaller images
        85,                                 // jpeg quality
        'error',                            // variable to add the error message to
        'Thumbnail could not be created!'   // error message if value doesn't validate
     ),
            ));
    $form->add('note', 'note_file', 'file', 'File must have the .jpg, .jpeg, png or .gif extension, and no more than 100Kb!');


/*
    // "room"
    $form->add('label', 'label_room', 'room', 'Which room would you like to reserve:');
    $obj = $form->add('radios', 'room', array(
        'A' =>  'Room A',
        'B' =>  'Room B',
        'C' =>  'Room C',
    ));
    $obj->set_rule(array(
        'required' => array('error', 'Room selection is required!')
    ));
*/
    // "extra"
    $form->add('label', 'label_extra', 'extra', 'Executat:');
    $obj = $form->add('checkboxes', 'extra[]', array(
        'inscriptionat'     =>  'Inscriptionare',
        'securizat'        =>  'Securizare',
        'autocolant'     =>  'Autocolant',
    ));
    $obj->set_rule(array(

        // error messages will be sent to a variable called "error", usable in custom templates
        'required' => array('error', 'Trebuie selectata minim o optiune!')

    ));
/*
    // "date"
    $form->add('label', 'label_date', 'date', 'Reservation date');
    $date = $form->add('date', 'date');
    $date->set_rule(array(
        'required'      =>  array('error', 'Date is required!'),
        'date'          =>  array('error', 'Date is invalid!'),
    ));

    // date format
    // don't forget to use $date->get_date() if the form is valid to get the date in YYYY-MM-DD format ready to be used
    // in a database or with PHP's strtotime function!
    $date->format('M d, Y');

    // selectable dates are starting with the current day
    $date->direction(1);

    $form->add('note', 'note_date', 'date', 'Date format is M d, Y');

    // "time"
    $form->add('label', 'label_time', 'time', 'Reservation time :');
    $form->add('time', 'time', '', array(
        'hours'     =>  array(9, 10, 11, 12, 13, 14, 15, 16, 17),
        'minutes'   =>  array(0, 30),
    ));
*/


    $form->add('label', 'label_kid', 'kid', 'kid:');

    // add the "name" element
    $obj = $form->add('text', 'kid');

    // set rules
    $obj->set_rule(array(

        // error messages will be sent to a variable called "error", usable in custom templates
        'required' => array('error', 'KID-ul este obligatoriu!')

    ));

    // "submit"
    $form->add('submit', 'btnsubmit', 'Submit');

    // if the form is valid
    if ($form->validate()) {
        // do stuff here
        require_once '../Zebra_Database-master/Zebra_Database.php';

$adresa=$_POST["name"];
$extra = $_POST["extra"];
$lacat=$_POST["flipchard"];
$autocolant=$_POST["beverages"];
$inscriptionat = $_POST["inscriptionat"];
$kid = $_POST["kid"];  
$file = $_FILE["file"];
$file_name = $file["file_name"];
        
//if(isset($_POST['btnsubmit'])){

        
$db = new Zebra_Database();
$host       = "localhost:3306";
$username   = "muncescu_fir";
$password   = "1h(}r6uCuHNJ";
$dbname     = "muncescu_firide"; // will use later
// connect to a server and select a database
$db->connect($host, $username, $password, $dbname);

  if(!empty($_POST['extra'])) {
   
        if(!empty($extra[2]))
        {
           $extra= $extra[0].",".$extra[1].",".$extra[2];
        }
        elseif(!empty($extra[1]))
        {
            $extra=$extra[0].",".$extra[1];
        }
        else
        {
            $extra = $extra[0]; 
        }

    }

        $db->insert(
    'checks',
    array(
        'adresa'      => $adresa,
        'executat'      => $extra,
        'img' =>  $form->file_upload['file']['file_name'],
        'kid'      => $kid
        //'date_updated' => 'NOW()'echo $marks['Ankit']['C']
    )
);
?>
<?php
}  
    // otherwise
//}

        // generate output using a custom template
        $form->render('*horizontal');
?>
    </body>

</html>
