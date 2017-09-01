<?php
	$nickname="";
	$messages="";
	$gambar="";
	foreach($record as $baris){
		$nickname=$baris->nickname;
		$messages=$baris->messages;
		$gambar=$baris->gambar;
	}
?>
<?php 
$action = "http://localhost/webdev/home/send_message";
?>
<!DOCTYPE html>
<html lang="en" class="no-js" >
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta name="description" content="" />
<meta name="author" content="" />
<!--[if IE]>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<![endif]-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
 
		
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	
	<!-- http://bootsnipp.com/snippets/4jXW -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/chat.css" />
	
	
	<script type="text/javascript">	  
		$( document ).ready ( function () {
			
			$('#nickname').keyup(function() {
				var nickname = $(this).val();
				
				if(nickname == ''){
					$('#msg_block').hide();
				}else{
					$('#msg_block').show();
				}
			});
			
			// initial nickname check
			$('#nickname').trigger('keyup');
		});
		
		
	</script>
	
	
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
.controls {
  margin-top: 10px;
  border: 1px solid transparent;
  border-radius: 2px 0 0 2px;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
  height: 32px;
  outline: none;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
}

#pac-input {
  background-color: #fff;
  font-family: Roboto;
  font-size: 15px;
  font-weight: 300;
  margin-left: 12px;
  padding: 0 11px 0 13px;
  text-overflow: ellipsis;
  width: 300px;
}

#pac-input:focus {
  border-color: #4d90fe;
}

.pac-container {
  font-family: Roboto;
}

#type-selector {
  color: #fff;
  background-color: #4d90fe;
  padding: 5px 11px 0px 11px;
}

#type-selector label {
  font-family: Roboto;
  font-size: 13px;
  font-weight: 300;
}

    </style>
    <title>Places Searchbox</title>
    <style>
      #target {
        width: 345px;
      }
    </style>	
	
	
	
	
	
	
	
<style>
#marker-tooltip {
 display: none;
 position:absolute;
 width: 300px;
 height: 200px;
 background-color: #ccc;
 margin: 15px;
}
</style>
<title>T-FO</title>
<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/logo-big.png">
<!-- BOOTSTRAP CORE CSS -->
<link href="assets/css/bootstrap.css" rel="stylesheet" />
<!-- ION ICONS STYLES -->
<link href="assets/css/ionicons.css" rel="stylesheet" />
<!-- FONT AWESOME ICONS STYLES -->
<link href="assets/css/font-awesome.css" rel="stylesheet" />
<!-- FANCYBOX POPUP STYLES -->
<link href="assets/js/source/jquery.fancybox.css" rel="stylesheet" />
<!-- STYLES FOR VIEWPORT ANIMATION -->
<link href="assets/css/animations.min.css" rel="stylesheet" />
<!-- CUSTOM CSS -->
<link href="assets/css/style-green.css" rel="stylesheet" />
<!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<script src="http://code.jquery.com/jquery-1.10.2.min.js" type="text/javascript"></script>
   <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyA7IZt-36CgqSGDFK8pChUdQXFyKIhpMBY&sensor=true" type="text/javascript"></script>
   <script type="text/javascript">

       var map;
       var geocoder;
       var marker;
       var bord_data  = new Array();
       var latlng;
       var infowindow;

       $(document).ready(function() {
           ViewCustInGoogleMap();
        
          
       });

       function ViewCustInGoogleMap() {

           var mapOptions = {
               center: new google.maps.LatLng(18.9894117, 73.1175052),   // Coimbatore = (11.0168445, 76.9558321)
               zoom: 11,
               mapTypeId: google.maps.MapTypeId.ROADMAP
           };
           map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);

           //   data in json format

          var data = '[{ "DisplayText": "PANVEL 4:30 AM", "ADDRESS": "PANVEL", "LatitudeLongitude": " 18.9894117,73.1175052", "MarkerId": "Customer" },{ "DisplayText": "KHARGHAR 5:00 AM", "ADDRESS": "KHARGHAR", "LatitudeLongitude": "19.0361,73.0617", "MarkerId": "Customer"},{ "DisplayText": "CBD BELAPUR", "ADDRESS": "CBD BELAPUR 5:15 AM", "LatitudeLongitude": "19.0169,73.0394", "MarkerId": "Customer"},{ "DisplayText": "VASHI 5:30 AM", "ADDRESS": "VASHI", "LatitudeLongitude": "19.005198400000000000,73.0100", "MarkerId": "Customer"},{ "DisplayText": "KHANDA COLONY 4:55AM", "ADDRESS": "KHANDA COLONY", "LatitudeLongitude": " 19.005198400000000000 ,73.112831299999930000", "MarkerId": "Customer"}]';


           bord_data = JSON.parse(data);

           for (var i = 0; i < bord_data.length; i++) {
               setMarker(bord_data[i]);
           }

       }

       function setMarker(bord_data ) {
           geocoder = new google.maps.Geocoder();
           infowindow = new google.maps.InfoWindow();
           if ((bord_data ["LatitudeLongitude"] == null) || (bord_data ["LatitudeLongitude"] == 'null') || (bord_data ["LatitudeLongitude"] == '')) {
               geocoder.geocode({ 'address': bord_data ["Address"] }, function(results, status) {
                   if (status == google.maps.GeocoderStatus.OK) {
                       latlng = new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng());
                       marker = new google.maps.Marker({
                           position: latlng,
                           map: map,
                           draggable: false,
                           html: bord_data ["DisplayText"],
                          // icon: "images/marker/" + bord_data ["MarkerId"] + ".png"
                       });
                      
                       google.maps.event.addListener(marker, 'mouseover', function(event) {
                           infowindow.setContent("<b>"+this.html+"</br>");
                           infowindow.setPosition(event.latLng);
                           infowindow.open(map, this);
                       });
                   }
                   else {
                       alert("error");
                   }
               });
           }
           else {
               var latlngStr = bord_data ["LatitudeLongitude"].split(",");
               var lat = parseFloat(latlngStr[0]);
               var lng = parseFloat(latlngStr[1]);
               latlng = new google.maps.LatLng(lat, lng);
               marker = new google.maps.Marker({
                   position: latlng,
                   map: map,
                   draggable: false,               // cant drag it
                   html: bord_data ["DisplayText"]    // Content display on marker click
                  //icon: "images/marker.png"       // Give ur own image
               });
               //marker.setPosition(latlng);
               //map.setCenter(latlng);
               google.maps.event.addListener(marker, 'mouseover', function(event) {
                   infowindow.setContent("<h3>"+this.html+"</h3>");
                   infowindow.setPosition(event.latLng);
                  
                   infowindow.open(map, this);

               });
              google.maps.event.addListener(marker, 'mouseout', function(event) {
                   infowindow.setContent("<h3>"+this.html+"</h3>");
                   //infowindow.setPosition(event.latLng);
                  
                   infowindow.close(map, this);

               });
           }
       }

   </script>
<![endif]-->
</head>
<body data-spy="scroll" data-target="#menu-section">
<!--MENU SECTION START-->
<div class="navbar navbar-inverse navbar-fixed-top scroll-me" id="menu-section" >
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="#">

T - FO

</a>
</div>
<div class="navbar-collapse collapse">
<ul class="nav navbar-nav navbar-right">
<li><a href="#home">HOME</a></li>
<li><a href="#services">SERVICES</a></li>
<li><a href="#work">NEWS</a></li>
<li><a href="#team">TEAM</a></li>
<li><a href="#grid">GRID</a></li>
<li><a href="#contact">CONTACT</a></li>
</ul>
</div>

</div>
</div>
<!--MENU SECTION END-->
<!--HOME SECTION START-->
<div id="home" >
<div class="container">
<div class="row">
<div class="col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 ">
<div id="carousel-slider" data-ride="carousel" class="carousel slide  animate-in" data-anim-type="fade-in-up">

<div class="carousel-inner">
<div class="item active">
<h3>BANDUNG</h3>
<p>Arah menuju Alun-Alun/ Balai Kota Bandung mengalami kemacetan. <a href="#work">More Info</a></p>
</div>

<div class="item">
<h3>YOGYAKARTA</h3>
<p>Jalan malioboro mengalami peningkatan kendaraan. <a href="#work">More Info</a></p>
</div>

<div class="item">
<h3>JAKARTA</h3>
<p>Lampu merah dibeberapa daerah di Jakarta mengalami kematian total. <a href="#work">More Info</a></p>
</div>

<div class="item">
<h3>SEMARANG</h3>
<p>Jalan layang menuju Bandara Ahmad Yani Semarang mengalami peningkatan kendaraan dikarenakan... <a href="#work">More Info</a></p>
</div>

</div>


</div>


</div>
</div>
<div class="row animate-in" data-anim-type="fade-in-up">
<div class="col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 col-lg-8 col-lg-offset-2 scroll-me">


<p >
Recently Happend...

</p>
<div class="social">
<a href="https://www.facebook.com/niken.kusumawati" class="btn button-custom btn-custom-one" ><i class="fa fa-facebook "></i></a>
<a href="https://twitter.com/nikenfebrianik" class="btn button-custom btn-custom-one" ><i class="fa fa-twitter"></i></a>
</div>
<a href="#services" class=" btn button-custom btn-custom-two">See Service List </a>
</div>
</div>
</div>

</div>
<!--HOME SECTION END-->
<!--SERVICE SECTION START-->
<section id="services" >
<div class="container">
<div class="row text-center header">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 animate-in" data-anim-type="fade-in-up">
<h3>Our Services</h3>
<hr />
</div>
</div>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
<div class="services-wrapper">
<i class="ion-clipboard"></i>
<h3>UP TO DATE</h3>
Berita ter-update seputar lalu lintas selalu kami hadirkan untukmu
</div>
</div>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
<div class="services-wrapper">
<i class="ion-erlenmeyer-flask"></i>
<h3>CONTROL</h3>
Memiliki prinsip "Hari ini harus lebih baik daripada kemarin". Sehingga selalu diadakan upgrade sistem dan pengontrolan features
</div>
</div>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
<div class="services-wrapper">
<i class="ion-speedometer"></i>
<h3>24H</h3>
Layanan keluhan pelanggan 24H non-stop
</div>
</div>
</div>
</div>
</section>
<!--SERVICE SECTION END-->
<!--WORK SECTION START-->
<section id="work" >
<div class="container">
<div class="row text-center header animate-in" data-anim-type="fade-in-up">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<h3>NEWS</h3>
<hr />
</div>
<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
<h2>Have many infos</h2>
<div class="container">
			<table>
				<form method="post" action="<?php echo $action;?>" enctype="multipart/form-data" class="login">
					<tr><th>
					  <label>Nickname<th>:</th></label>
					</th><th>
					  <input type="text" name="nickname" class="form-control input-sm" placeholder="Nickname..." value="<?php echo $nickname;?>">
					</th></tr>
					<tr><th>
					  <label>Messages<th>:</th></label>
					</th><th>
					  <input type="text" name="messages" class="form-control input-sm" placeholder="Type your message here..." value="<?php echo $messages;?>">
					</th></tr>
					<tr><th>
					  <label>Gambar Macet<th>:</th></label>
					</th><th>
					  <input type="file" class="btn btn-warning btn-sm" name="gambar" value="">
					</th></tr>
						<tr><th class="login-submit">
					</th><th>
						<button type="submit" class="btn btn-warning btn-sm" name="submit">Send</button>
					</th></tr>
				</form>
				</table>
</div>
</div>
<div class="row text-center animate-in" data-anim-type="fade-in-up" >
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pad-bottom">
<div class="caegories">
<a href="#" data-filter="*" class="active btn btn-custom btn-custom-two btn-sm">All</a>
<a href="#" data-filter=".html" class="btn btn-custom btn-custom-two btn-sm">MACET</a>
<a href="#" data-filter=".code" class="btn btn-custom btn-custom-two btn-sm" >PINDAH JALUR</a>
<a href="#" data-filter=".script" class="btn btn-custom btn-custom-two btn-sm" >LAIN-LAIN</a>
</div>
</div>
</div>
<div class="row text-center animate-in" data-anim-type="fade-in-up" id="work-div">

<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 html">
<div class="work-wrapper">

<a class="fancybox-media" title="Image Title Goes Here" href="assets/img/portfolio/1.jpg">

<img src="<?php echo base_url(); ?>assets/img/portfolio/1.jpg" class="img-responsive img-rounded" alt="" />
</a>

<h4>Bandung. Arah menuju Alun-Alun/ Balai Kota Bandung mengalami kemacetan. Pengguna jalan yang ingin menuju tempat-tempat tersebut harap memilih jalur alternatif</h4>
</div>
</div>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 html css">
<div class="work-wrapper">

<a class="fancybox-media" title="Image Title Goes Here" href="assets/img/portfolio/2.jpg">

<img src="<?php echo base_url(); ?>assets/img/portfolio/2.jpg" class="img-responsive img-rounded" alt="" />
</a>

<h4>Yogyakarta. Jalan malioboro mengalami peningkatan kendaraan karena masa liburan sekolah sudah dimulai dan banyak keluarga ingin berbelanja di sini.
<br>Pengguna jalan yang ingin menuju tempat-tempat tersebut harap memilih jalur alternatif</br></h4>
</div>
</div>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 code script">
<div class="work-wrapper">

<a class="fancybox-media" title="Image Title Goes Here" href="assets/img/portfolio/3.jpg">

<img src="assets/img/portfolio/3.jpg" class="img-responsive img-rounded" alt="" />
</a>

<h4>Jakarta. Lampu merah dibeberapa daerah di Jakarta mengalami kematian total. Banyak kendaraan berebut jalan agar bisa melanjutkan perjalanan
<br>Pengguna jalan yang ingin menuju tempat-tempat tersebut harap memilih jalur alternatif</br></h4>
</div>
</div>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 html script">
<div class="work-wrapper">

<a class="fancybox-media" title="Image Title Goes Here" href="assets/img/portfolio/4.jpg">

<img src="assets/img/portfolio/4.jpg" class="img-responsive img-rounded" alt="" />
</a>

<h4>Bandung. Jalan menuju lembang mengalami peningkatan kendaraan karena masa liburan sekolah sudah dimulai dan banyak keluarga ingin berbelanja di sini.
<br>Pengguna jalan yang ingin menuju tempat-tempat tersebut harap memilih jalur alternatif</br></h4>
</div>
</div>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 html code">
<div class="work-wrapper">

<a class="fancybox-media" title="Image Title Goes Here" href="assets/img/portfolio/5.jpg">

<img src="assets/img/portfolio/5.jpg" class="img-responsive img-rounded" alt="" />
</a>

<h4>Semarang. Jalan layang menuju Bandara Ahmad Yani Semarang mengalami peningkatan kendaraan dikarenakan adanya truk terguling. Pengguna jalan yang ingin menuju tempat-tempat tersebut harap memilih jalur alternatif</h4>
</div>
</div>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 script">
<div class="work-wrapper">

<a class="fancybox-media" title="Image Title Goes Here" href="assets/img/portfolio/6.jpg">

<img src="assets/img/portfolio/6.jpg" class="img-responsive img-rounded"/>
</a>

<h4>Surabaya. Adanya peningkatan kendaraan menuju arah kota dikarenakan ada kecelakaan beruntun antara mobil sedan dengan bus. Pengguna jalan yang ingin menuju tempat-tempat tersebut harap memilih jalur alternatif</h4>
</div>
</div>
</div>
</div>
</section>
<!--WORK SECTION END-->
<!--TEAM SECTION START-->
<section id="team" >
<div class="container">
<div class="row text-center header animate-in" data-anim-type="fade-in-up">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<h3>Team Members </h3>
<hr />
</div>
</div>
<div class="row animate-in" data-anim-type="fade-in-up">

FREE SLOT FOR YOU WHO WANNA JOIN US
</p>
</div>
</div>
</div>
<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
<div class="team-wrapper">
<div class="team-inner" style="background-image: url('assets/img/team/3.jpg')" >
<a href="#" target="_blank" > <i class="fa fa-twitter" ></i></a>
</div>
<div class="description">
<h3> Niken Febriani Kusumawati</h3>
<h5> <strong> Developer & Designer </strong></h5>
<p>
SI-39-01 - 1202154297
</p>
</div>
</div>
</div>
<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
<div class="team-wrapper">
<div class="team-inner" style="background-image: url('assets/img/team/1.png')" >
<a href="#" target="_blank" > <i class="fa fa-twitter" ></i></a>
</div>
<div class="description">
<h3> [ANONYMOUS]</h3>
<h5> <strong> Developer & Designer </strong></h5>
<p>
????
</p>
</div>
</div>
</div>
</div>
</div>
</section>
<!--TEAM SECTION END-->
<!--GRID SECTION START-->
<section id="grid" >
<div class="container">
<div class="row text-center header animate-in" data-anim-type="fade-in-up">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
<h2>Maps</h2
</div>

>
<input id="pac-input" class="controls" type="text" placeholder="Search Box">
    <div id="map"></div>
    <script>
// This example adds a search box to a map, using the Google Place Autocomplete
// feature. People can enter geographical searches. The search box will return a
// pick list containing a mix of places and predicted search terms.

function initAutocomplete() {
  var map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: -6.9032739, lng: 107.5731165},
    zoom: 13,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });

  // Create the search box and link it to the UI element.
  var input = document.getElementById('pac-input');
  var searchBox = new google.maps.places.SearchBox(input);
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

  // Bias the SearchBox results towards current map's viewport.
  map.addListener('bounds_changed', function() {
    searchBox.setBounds(map.getBounds());
  });

  var markers = [];
  // [START region_getplaces]
  // Listen for the event fired when the user selects a prediction and retrieve
  // more details for that place.
  searchBox.addListener('places_changed', function() {
    var places = searchBox.getPlaces();

    if (places.length == 0) {
      return;
    }

    // Clear out the old markers.
    markers.forEach(function(marker) {
      marker.setMap(null);
    });
    markers = [];

    // For each place, get the icon, name and location.
    var bounds = new google.maps.LatLngBounds();
    places.forEach(function(place) {
      var icon = {
        url: place.icon,
        size: new google.maps.Size(71, 71),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(25, 25)
      };

      // Create a marker for each place.
      markers.push(new google.maps.Marker({
        map: map,
        icon: icon,
        title: place.name,
        position: place.geometry.location
      }));

      if (place.geometry.viewport) {
        // Only geocodes have viewport.
        bounds.union(place.geometry.viewport);
      } else {
        bounds.extend(place.geometry.location);
      }
    });
    map.fitBounds(bounds);
  });
  // [END region_getplaces]
}


    </script>
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&callback=initAutocomplete"
         async defer></script>
</div>


</div>
<div class="row animate-in" data-anim-type="fade-in-up">

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<h2>Hello...</h2>
<p>
This's my personal website whose made for WEBDEV CLASS PROJECT about Traffic. If there's any error or miss-spelling, please contact me as soon as possible. Thanks. ENJOY IT!
</p>

</div>



</div>
</div>
</section>
<!--GRID SECTION END-->
<!--CONTACT SECTION START-->
<section id="contact" >
<div class="container">
<div class="row text-center header animate-in" data-anim-type="fade-in-up">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

<h3>Contact Details </h3>
<hr />

</div>
</div>

<div class="row animate-in" data-anim-type="fade-in-up">

<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
<div class="contact-wrapper">
<h3>We Are Social</h3>
<p>
Don't forget to follow my socmed for getting my fast response...
</p>
<div class="social-below">
<a href="https://www.facebook.com/niken.kusumawati" class="btn button-custom btn-custom-two" > Facebook</a>
<a href="https://twitter.com/nikenfebrianik" class="btn button-custom btn-custom-two" > Twitter</a>
<a href="https://www.instagram.com/nikenfebrianik/" class="btn button-custom btn-custom-two" > Instagram</a>
</div>
</div>

</div>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
<div class="contact-wrapper">
<h3>Quick Contact</h3>
<h4><strong>Email : </strong> nikenfebrianik@gmail.com </h4>
<h4><strong>Call : </strong> +62-811-2326009 </h4>
<h4><strong>Line : </strong> nikenfk </h4>
</div>

</div>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
<div class="contact-wrapper">
<h3>Address : </h3>
<h4>Telkom University </h4>
<h4>Bandung, Indonesia</h4>
<div class="footer-div" >
&copy; 2015 t-fo | <a href="#" target="_blank" >by DesignBootstrp</a>
</div>
</div>

</div>

</div>


</div>
</section>
<!--CONTACT SECTION END-->

<!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME -->
<!-- CORE JQUERY -->
<script src="assets/js/jquery-1.11.1.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="assets/js/bootstrap.js"></script>
<!-- EASING SCROLL SCRIPTS PLUGIN -->
<script src="assets/js/vegas/jquery.vegas.min.js"></script>
<!-- VEGAS SLIDESHOW SCRIPTS -->
<script src="assets/js/jquery.easing.min.js"></script>
<!-- FANCYBOX PLUGIN -->
<script src="assets/js/source/jquery.fancybox.js"></script>
<!-- ISOTOPE SCRIPTS -->
<script src="assets/js/jquery.isotope.js"></script>
<!-- VIEWPORT ANIMATION SCRIPTS   -->
<script src="assets/js/appear.min.js"></script>
<script src="assets/js/animations.min.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src="assets/js/custom.js"></script>
</body>
var sendChat = function (message, callback) {
	$.getJSON('<?php echo base_url(); ?>api/send_message?message=' + message + '&nickname=' + $('#nickname').val() + '&guid=' + getCookie('user_guid'), function (data){
		callback();
	});
}
 
var append_chat_data = function (chat_data) {
	chat_data.forEach(function (data) {
		var is_me = data.guid == getCookie('user_guid');
		
		if(is_me){
			var html = '<li class="right clearfix">';
			html += '	<span class="chat-img pull-right">';
			html += '		<img src="http://placehold.it/50/FA6F57/fff&text=' + data.nickname.slice(0,2) + '" alt="User Avatar" class="img-circle" />';
			html += '	</span>';
			html += '	<div class="chat-body clearfix">';
			html += '		<div class="header">';
			html += '			<small class="text-muted"><span class="glyphicon glyphicon-time"></span>' + parseTimestamp(data.timestamp) + '</small>';
			html += '			<strong class="pull-right primary-font">' + data.nickname + '</strong>';
			html += '		</div>';
			html += '		<p>' + data.message + '</p>';
			html += '	</div>';
			html += '</li>';
		}else{
		  
			var html = '<li class="left clearfix">';
			html += '	<span class="chat-img pull-left">';
			html += '		<img src="http://placehold.it/50/55C1E7/fff&text=' + data.nickname.slice(0,2) + '" alt="User Avatar" class="img-circle" />';
			html += '	</span>';
			html += '	<div class="chat-body clearfix">';
			html += '		<div class="header">';
			html += '			<strong class="primary-font">' + data.nickname + '</strong>';
			html += '			<small class="pull-right text-muted"><span class="glyphicon glyphicon-time"></span>' + parseTimestamp(data.timestamp) + '</small>';
			
			html += '		</div>';
			html += '		<p>' + data.message + '</p>';
			html += '	</div>';
			html += '</li>';
		}
		$("#received").html( $("#received").html() + html);
	});
  
	$('#received').animate({ scrollTop: $('#received').height()}, 1000);
}
 
var update_chats = function () {
	if(typeof(request_timestamp) == 'undefined' || request_timestamp == 0){
		var offset = 60*15; // 15min
		request_timestamp = parseInt( Date.now() / 1000 - offset );
	}
	$.getJSON('<?php echo base_url(); ?>api/get_messages?timestamp=' + request_timestamp, function (data){
		append_chat_data(data);	
 
		var newIndex = data.length-1;
		if(typeof(data[newIndex]) != 'undefined'){
			request_timestamp = data[newIndex].timestamp;
		}
	}); 



$('#submit').click(function (e) {
	e.preventDefault();
	
	var $field = $('#message');
	var data = $field.val();

	$field.addClass('disabled').attr('disabled', 'disabled');
	sendChat(data, function (){
		$field.val('').removeClass('disabled').removeAttr('disabled');
	});
});

$('#message').keyup(function (e) {
	if (e.which == 13) {
		$('#submit').trigger('click');
	}
});

setInterval(function (){
	update_chats();
}, 1500);

$('#submit').click(function (e) {
	e.preventDefault();
	
	var $field = $('#message');
	var data = $field.val();
 
	$field.addClass('disabled').attr('disabled', 'disabled');
	sendChat(data, function (){
		$field.val('').removeClass('disabled').removeAttr('disabled');
	});
});
 
$('#message').keyup(function (e) {
	if (e.which == 13) {
		$('#submit').trigger('click');
	}
});
 
setInterval(function (){
	update_chats();
}, 1500);	
}
</html>
