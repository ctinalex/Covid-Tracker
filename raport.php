<?php 
	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head ><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <title>Formular firide</title>

        <!-- load Zebra_Form's stylesheet file -->
        <link rel="stylesheet" href="Zebra_Form-master/public/css/zebra_form.css">
        <link rel="stylesheet" href="Zebra_Form-master/examples/public/css/style.css">
        <link rel="stylesheet" href="Zebra_Form-master/examples/libraries/highlight/public/css/ir_black.css" type="text/css">

        <script type="text/javascript" src="Zebra_Form-master/examples/libraries/highlight/public/javascript/highlight.js"></script>
        <script type="text/javascript" src="Zebra_Form-master/examples/public/javascript/jquery-1.12.0.js"></script>
        <script type="text/javascript" src="Zebra_Form-master/public/javascript/zebra_form.js"></script>
        <script type="text/javascript" src="Zebra_Form-master/examples/public/javascript/core.js"></script>
        <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.5.1/leaflet.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.5.1/leaflet.js"></script>
     <link rel="stylesheet" href="Control.Resizer.css" crossorigin=""/>
    <script src="ControlResizer.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/leaflet-search@2.4.0/dist/leaflet-search.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet-geocoder-mapzen/1.9.4/leaflet-geocoder-mapzen.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-geocoder-mapzen/1.9.4/leaflet-geocoder-mapzen.js"></script>
    <style>
@media all and (min-width: 50px)   {  body  { font-size:0.1em!important;  } }
@media all and (min-width: 100px)  {  body  { font-size:0.2em!important;  } }
@media all and (min-width: 200px)  {  body  { font-size:0.4em!important;  } }
@media all and (min-width: 300px)  {  body  { font-size:0.6em!important;  } }
@media all and (min-width: 400px)  {  body  { font-size:0.8em!important;  } }
@media all and (min-width: 500px)  {  body  { font-size:1.0em!important;  } }
@media all and (min-width: 600px)  {  body  { font-size:1.2em!important;  } }
@media all and (min-width: 700px)  {  body  { font-size:1.4em!important;  } }
@media all and (min-width: 800px)  {  body  { font-size:1.6em!important;  } }
@media all and (min-width: 900px)  {  body  { font-size:1.6em!important;  } }
@media all and (min-width: 1000px) {  body  { font-size:1.6em!important;  } }
@media all and (min-width: 1100px) {  body  { font-size:1.6em!important;  } }
@media all and (min-width: 1200px) {  body  { font-size:1.6em!important;  } }
@media all and (min-width: 1300px) {  body  { font-size:1.6em!important;  } }
@media all and (min-width: 1400px) {  body  { font-size:1.6em!important;  } }
@media all and (min-width: 1500px) {  body  { font-size:1.6em!important;  } }
@media all and (min-width: 1500px) {  body  { font-size:1.6em!important;  } }
@media all and (min-width: 1600px) {  body  { font-size:1.6em!important;  } }
@media all and (min-width: 1700px) {  body  { font-size:1.6em!important;  } }



.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}
  body {
      padding: 0;
      margin: 0;
    }
    html, body{
      height: 100%;
    }
    #map { width:100%;
    height:250px;
    padding-bottom:50px;
    bottom: 0;
    background-color: white;
    border-color:black;
    border-width: medium;
    border-style: solid;
    position:center;
    }
    td {
        word-wrap: break-word;min-width: 1px;max-width: 10px;
    }
#top,
#bottom {
    position: center;
    left: 0;
    right: 0;
   
}

#formis {
    position: center;
    left: 0;
    right: 0;
   
}
#top {
    top: 0;
    background-color: white;
}

#bottom {
    padding-bottom:150px;
    bottom: 0;
    background-color: white;

}
#overlay {
  position: fixed;
  display: none;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0,0,0,0.5);
  z-index: 2;
  cursor: pointer;
}
@import url(http://fonts.googleapis.com/css?family=Open+Sans:700);
#cssmenu {
  background: #f96e5b;
  width: auto;
}
#cssmenu ul {
  list-style: none;
  margin: 0;
  padding: 0;
  line-height: 1;
  display: block;
  zoom: 1;
}
#cssmenu ul:after {
  content: " ";
  display: block;
  font-size: 0;
  height: 0;
  clear: both;
  visibility: hidden;
}
#cssmenu ul li {
  display: inline-block;
  padding: 0;
  margin: 0;
}
#cssmenu.align-right ul li {
  float: right;
}
#cssmenu.align-center ul {
  text-align: center;
}
#cssmenu ul li a {
  color: #ffffff;
  text-decoration: none;
  display: block;
  padding: 25px 25px;
  font-family: 'Open Sans', sans-serif;
  font-weight: 700;
  text-transform: uppercase;
  font-size: 14px;
  position: relative;
  -webkit-transition: color .25s;
  -moz-transition: color .25s;
  -ms-transition: color .25s;
  -o-transition: color .25s;
  transition: color .25s;
}
#cssmenu ul li a:hover {
  color: #333333;
}
#cssmenu ul li a:hover:before {
  width: 100%;
}
#cssmenu ul li a:after {
  content: "";
  display: block;
  position: absolute;
  right: -3px;
  top: 19px;
  height: 6px;
  width: 6px;
  background: #ffffff;
  opacity: .5;
}
#cssmenu ul li a:before {
  content: "";
  display: block;
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 0;
  background: #333333;
  -webkit-transition: width .25s;
  -moz-transition: width .25s;
  -ms-transition: width .25s;
  -o-transition: width .25s;
  transition: width .25s;
}
#cssmenu ul li.last > a:after,
#cssmenu ul li:last-child > a:after {
  display: none;
}
.row{
    margin-left: 0px!important;
}
#cssmenu ul li.active a {
  color: #333333;
}
#cssmenu ul li.active a:before {
  width: 100%;
}
#cssmenu.align-right li.last > a:after,
#cssmenu.align-right li:last-child > a:after {
  display: block;
}
#cssmenu.align-right li:first-child a:after {
  display: none;
}
@media screen and (max-width: 768px) {
  #cssmenu ul li {
    float: none;
    display: block;
  }
  #cssmenu ul li a {
    width: 100%;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    border-bottom: 1px solid #fb998c;
  }
  #cssmenu ul li.last > a,
  #cssmenu ul li:last-child > a {
    border: 0;
  }
  #cssmenu ul li a:after {
    display: none;
  }
  #cssmenu ul li a:before {
    display: none;
  }
}
 #myDIV {
     display:none;
     
 }
 
 .header{
     max-width: 1500px!important;
 }
body {
  max-width: 960px;
  margin: 0 auto;
  font-size:15px;}
nav {
  width: 100%;
  margin: 20px 0; }
nav ul {
  list-style: none;
  overflow: hidden; }
nav ul li {
  float: left;
  width: 20%; }
nav ul li a {
  text-align: center;
  padding: 8px 0;
  display: block;
  width: 100%;
  background: #cdeb8e; /* Old browsers */
  background: -moz-linear-gradient(top,
    #cdeb8e 0%, #b0ca34 100%); /* FF3.6+ */
  background: -webkit-gradient(linear, left top, left bottom,
    color-stop(0%,#cdeb8e),
    color-stop(100%,#b0ca34)); /* Chrome,Safari4+ */
  background: -webkit-linear-gradient(top,
    #cdeb8e 0%,#b0ca34 100%); /* Chrome10+,Safari5.1+ */
  background: -o-linear-gradient(top,
    #cdeb8e 0%,#b0ca34 100%); /* Opera 11.10+ */
  background: linear-gradient(to bottom,
    #cdeb8e 0%,#b0ca34 100%); /* W3C, IE10+ */
  filter: progid:DXImageTransform.Microsoft.gradient(
    startColorstr=’#cdeb8e’,
    endColorstr=’#b0ca34′,GradientType=0 ); /* IE6-9 */
  }
nav ul li a,
nav ul li a:focus,
nav ul li a:visited,
nav ul li a:hover,
nav ul li a:active {
  color: #000;
  text-decoration: none; }
nav ul li a:hover,
nav ul li a:active {
  background: #b0ca34; /* Old browsers */
  background: -moz-linear-gradient(top,
    #b0ca34 0%, #96c40d 100%); /* FF3.6+ */
  background: -webkit-gradient(linear, left top, left bottom,
    color-stop(0%,#b0ca34),
    color-stop(100%,#96c40d)); /* Chrome,Safari4+ */
  background: -webkit-linear-gradient(top,
    #b0ca34 0%,#96c40d 100%); /* Chrome10+,Safari5.1+ */
  background: -o-linear-gradient(top,
    #b0ca34 0%,#96c40d 100%); /* Opera 11.10+ */
  background: linear-gradient(to bottom,
    #b0ca34 0%,#96c40d 100%); /* W3C, IE10+ */
  filter: progid:DXImageTransform.Microsoft.gradient(
    startColorstr=’#b0ca34′,
    endColorstr=’#96c40d’,GradientType=0 ); /* IE6-9 */
  }
  .table{
    margin:0px !important;
    table-layout:fixed;  
    width: 100%;
  }
  .table td{
    padding-bottom: 0px !important;  
    overflow:hidden;
  }
  .table th{
    padding-bottom: 0px !important;  
    overflow:hidden;
  }
nav ul li:first-child a {
  border-top-left-radius: 8px;
  border-bottom-left-radius: 8px; }
nav ul li:last-child a {
  border-top-right-radius: 8px;
  border-bottom-right-radius: 8px; }
    </style>

    </head>
<body >
     <div id="top">
     <div class="topnav">
  <a class="home" href="index.php">Home</a>
  <a href="raport.php">Raport</a>
   <p >  <a  href="index.php?logout='1'" style="color: red;float: right;">Deconectare    </a> </p>
</div> 


 <div id="map"></div>
 <h2>Cauta persoana</h2>

    <!-- the PHP code below goes here -->
<?php
    // include the Zebra_Form class
    require 'config.php';
    require 'Zebra_Form-master/Zebra_Form.php';
    require 'Zebra_Image-master/Zebra_Image.php';

    // instantiate a Zebra_Form object
    require_once 'Zebra_Database-master/Zebra_Database.php';
    
$form = new Zebra_Form('form');
 $form->add('label', 'judets', 'judets', 'Judet:');
 $obj = $form->add('select', 'judet', 'judet');

// add selectable values with specific indexes
// values will be "v1", "v2" and "v3", respectively
// also, overwrite the language-specific default first value (notice the boolean TRUE at the end)
$obj->add_options(array(
    ''   => '- select a value -',
    'bacau' => 'Bacau',
    'botosani' => 'Botosani',
    'iasi' => 'Iasi',
    'neamt' => 'Neamt',
    'suceava' => 'Suceava',
    'vaslui' => 'Vaslui'
), true);


 $form->add('label', 'user', 'user_s', 'User:');
 $obj = $form->add('text', 'user_s');
$obj->set_rule(array(
    'required' => array('error', 'User este obligatoriu!')
));
 
 
 
  $form->add('label', 'date', 'date_start', 'Data inceput:');
 // add a date control to the form
$obj = $form->add('date', 'date_start', date('Y-m-d'));
 
// you *have* to set the "date" rule
$obj->set_rule(array(
    'date'  =>  array('error', 'Invalid date specified!'),
    'required' => array('error', 'Data este obligatorie!')
));
 
// set the date's format
//$obj->format('M d, Y');
 

   $form->add('label', 'dates', 'data_sfarsit', 'Data sfarsit:');
 // add a date control to the form
$obj = $form->add('date', 'data_sfarsit', date('Y-m-d'));
 
// you *have* to set the "date" rule
$obj->set_rule(array(
    'date'  =>  array('error', 'Invalid date specified!'),
    'required' => array('error', 'Data este obligatorie!')
));
 
 
 
 
 
 
 
 $form->add('submit', 'btnsubmit', 'Submit');

    // if the form is valid
    if ($form->validate()) {
        // do stuff here
 $date = $obj->get_date();
$db = new Zebra_Database();

// connect to a server and select a database
 $db->debug = true;
$db->connect($host, $user_name, $password, $dbname);
$criteria=[$_POST['judet']];
$criteria2 = [$_POST['user_s']];
$criteria3 = [$_POST['date_start']];
$criteria4 = [$_POST['data_sfarsit']];

if(empty($_POST['judet']))
{
    $db->query('SELECT * FROM monitor WHERE user LIKE ? AND DATE(data_insert) >= ? AND DATE(data_insert) <=?', array($criteria2,$criteria3,$criteria4));
}
else
{
$db->query('SELECT * FROM monitor WHERE judet LIKE ? AND user LIKE ? AND DATE(data_insert) >= ? AND DATE(data_insert) <= ?', array($criteria,$criteria2,$criteria3,$criteria4));
}
$records = $db->fetch_assoc_all();

    function DumpTable($array_assoc) {
        if (is_array($array_assoc)) {
            echo '<table class="table">';
            echo '<thead>';
            echo '<tr>';
            list($table_title) = $array_assoc;
            foreach ($table_title as $key => &$value):
                echo '<th>' . $key . '</th>';
            endforeach;
            echo '</tr>';
            echo '</thead>';
            foreach ($array_assoc as &$master):
                echo '<tr>';
                $count = 0;
                foreach ($master as &$slave):
                    echo '<td>' . $slave . '</td>';
                    $count = $count +1;
                endforeach;
                echo '</tr>';
            endforeach;
            echo '</table>';
            return;
        }
    }

DumpTable($records);

}
?>

<script type="text/javascript">
var markers = <?php echo "markers=",json_encode($records); ?>;

// See post: http://asmaloney.com/2014/01/code/creating-an-interactive-map-with-leaflet-and-openstreetmap/

var map = L.map( 'map', {
  center: [47.166089, 27.573429],
  zoom: 13
});

 var e = L.control.resizer({ onlyOnHover: true }).addTo(map);
        var s = L.control.resizer({ direction: 's' }).addTo(map);
        L.control.resizer({ direction: 'se', pan: true }).addTo(map);
        setTimeout(function() { e.fakeHover(1000) }, 1000);

        L.DomEvent.on(s, 'down dragstart predrag drag dragend', function(e){ console.log(e.type, e)});

L.tileLayer( 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
  subdomains: ['a', 'b', 'c']
}).addTo( map );

var markersLayer = new L.LayerGroup();	//layer contain searched elements
map.addLayer(markersLayer);

var controlSearch = new L.Control.Search({
		position:'topleft',		
		layer: markersLayer,
		initial: false,
		zoom: 20,
		marker: false
	});

	map.addControl( controlSearch );

var myIcon = L.icon({
  iconUrl: 'images/marker-icon-2x-blue.png',
  iconSize: [25, 41],
  iconAnchor: [12, 41],
  popupAnchor: [1, -34],
  shadowSize: [41, 41]
})
var myGreen = L.icon({
  iconUrl: 'images/marker-icon-2x-green.png',
  iconSize: [25, 41],
  iconAnchor: [12, 41],
  popupAnchor: [1, -34],
  shadowSize: [41, 41]
})
 var myRed = L.icon({
  iconUrl: 'images/marker-icon-2x-red.png',
  iconSize: [25, 41],
  iconAnchor: [12, 41],
  popupAnchor: [1, -34],
  shadowSize: [41, 41]
})

var myYellow = L.icon({
  iconUrl: 'images/marker-icon-2x-yellow.png',
  iconSize: [25, 41],
  iconAnchor: [12, 41],
  popupAnchor: [1, -34],
  shadowSize: [41, 41]
})
	//console.log(an);
//var data_limita = new Date(an + '-' + luna + '-' + zi);
var today = new Date();
//var dd = String(today.getDate()).padStart(2, '0');
//var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var an_limita = today.getFullYear();
var an_doi_limita = today.getFullYear()-2;
var an_trei_limita = today.getFullYear()-3;
var an_unu_limita = today.getFullYear()-1;




for ( var i=0; i < markers.length; ++i )
{
var title = markers[i].nume + ',' + markers[i].prenume;

var dates = new Date(markers[i].date);
var an_inregr = dates.getFullYear();


    marker = L.marker( [markers[i].lat_gps, markers[i].lng_gps],{title: title,icon: myRed} )
   .bindPopup( '<a>' + markers[i].nume + '- '+ markers[i].prenume + ', ' + markers[i].data_insert + '</a> ' )
  .addTo( map );
  markersLayer.addLayer(marker);
}


</script>
</div>
<div id="top">
<?php

 $form->render();

?>
</div>



 <script>
/*
    function initMap() {
    var options = {center : new L.LatLng(51.930156,7.189230), zoom : 7 };
    var osmUrl = 'https://{s}.tile.osm.org/{z}/{x}/{y}.png',
                osmAttribution = 'Map data &copy; 2012 OpenStreetMap contributors',
                osm = new L.TileLayer(osmUrl, {maxZoom: 18, attribution: osmAttribution});
    
    var mapLayer = new L.TileLayer(osmUrl);
    var marker = L.marker(
      [0,0], {
        draggable: false
      }
    );
    this.map = new L.Map('map', options).addLayer(mapLayer);
    map.on('click',
  function mapClickListen(e) {
    var pos = e.latlng;
    var poslat = e.latlng.lat;
    var poslng = e.latlng.lng;
    
    console.log('map click event');
    console.log(pos);
    
var x=document.getElementById("latitude");
var y = document.getElementById("longitude");
x.value =poslat; 
  y.value = poslng;
   marker.setLatLng(pos);
    marker.on('drag', function(e) {
      console.log('marker drag event');
   
    });
    marker.on('dragstart', function(e) {
    
      console.log('marker dragstart event');
      map.off('click', mapClickListen);
    });
    marker.on('dragend', function(e) {
      console.log('marker dragend event');
      setTimeout(function() {
        map.on('click', mapClickListen);
      }, 10);
    });
    map.removeLayer(marker);
    marker.addTo(map);
    calculate();
  }
);
}



function locateUser() {
    this.map.locate({setView : true});
    
    var curPos = myMarker.getLatLng();
}



function gettisimo(){
if (navigator.geolocation) {
  navigator.geolocation.getCurrentPosition(function(position) {
    latit = position.coords.latitude;
    longit = position.coords.longitude;
    // this is just a marker placed in that position
   
    // move the map to have the location in its center
    map.panTo(new L.LatLng(latit, longit));
     map.setView(new L.LatLng(latit, longit), 25);
     var xx=document.getElementById("lat_gps");
var yy = document.getElementById("lng_gps");

     xx.value =latit; 
  yy.value = longit;
       var xxx=document.getElementById("latitude");
var yyy = document.getElementById("longitude");

     xxx.value =latit; 
  yyy.value = longit;
});
}
}

var map = null;
initMap();
$('#actions').find('a').on('click', function() {
  gettisimo();
  
});

*/
  </script>


    </body>

</div>
</html>

