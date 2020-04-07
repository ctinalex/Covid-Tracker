<h2>A meeting room reservation form</h2>

<p>Check the "Template source" tab to see how it's done!</p>

<?php

    // include the Zebra_Form class
    require 'Zebra_Form.php';

    // instantiate a Zebra_Form object
    $form = new Zebra_Form('form');

    // the label for the "name" element
    $form->add('label', 'label_name', 'name', 'Adresa:');

    // add the "name" element
    $obj = $form->add('text', 'name');

    // set rules
    $obj->set_rule(array(

        // error messages will be sent to a variable called "error", usable in custom templates
        'required' => array('error', 'Adresa este obligatorie')

    ));

   
/*
    // "department"
    $form->add('label', 'label_department', 'department', 'Department:');
    $obj = $form->add('select', 'department', '', array('other' => true));
    $obj->add_options(array(
        'Marketing',
        'Operations',
        'Customer Service',
        'Human Resources',
        'Sales Department',
        'Accounting Department',
        'Legal Department',
    ));
    $obj->set_rule(array(
        'required' => array('error', 'Department is required!')
    ));
*/
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
        'flipchard'     =>  'Inscriptionare',
        'plasma'        =>  'Securizare',
        'beverages'     =>  'Autocolant',
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
    // "submit"
    $form->add('submit', 'btnsubmit', 'Submit');

    // if the form is valid
    if ($form->validate()) {

        // show results
        show_results();
        print_r($form->file_upload);
    // otherwise
    } else

        $form->render();
        // generate output using a custom template
        $form->render('reservation.php');

?>