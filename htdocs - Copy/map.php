<?php include("includes/layouts/session.php"); ?>
<?php require_once("includes/db_connection.php") ?>
<?php require_once("includes/functions.php") ?>
<?php
  if (!$_SESSION['username']){
    redirect_to('index.php');
  }
  $username = $_SESSION['username'];
  
?>
<!DOCTYPE html>
<html>
  <head>
	<!-- Required documents and css styling -->
    <title>HISPLORE: Map</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/stylesheet_main.css" media="screen"/>
	<link rel="stylesheet" href="css/map_style.css" media="screen"/>
    
	
	<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="js/site.js"></script>
	
	<!---Font Styles --->
	<link href="https://fonts.googleapis.com/css?family=Special+Elite" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">

	<!-- links to the Google api, Jquery and timeline api -->
  <!-- <script   src="https://code.jquery.com/jquery-3.1.0.min.js"   integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s="   crossorigin="anonymous"></script> -->
  
    
    
	
    <script src="js/jquery.timelinr-0.9.6.js"></script>
	
  <script>
    $(function(){
      $().timelinr({
        arrowKeys: 'true'
      })
    });
  </script>
  
  
  </head>
  
  <!-- Body start, Main divs and api scripts here -->
  <body>
	<div id="modal_background"></div>
	
	
    <!-- <img id="loading" src="loading.gif" width="50" height="50"> -->
	
	<!---NAVBAR--->
	<header>
		<nav>
			<ul class="ul-left">
				<li><a href="account.php"><span class="glyphicon glyphicon-user"></span> My Account</a></li>
				<li><a href="" id="info_button"><span class="glyphicon glyphicon-info-sign"></span> Info</a></li>
				<li><a href="" id="options_button"><span class="glyphicon glyphicon-cog"></span> Options</a></li>
			</ul>
			<ul class="ul-right">
				<li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
			</ul>
		</nav>
	</header>


	<div class="timeline1">
	  <!-- timeline div(NOTE must get this to perform the page refresh if possible) -->
      <center><div id="year" style="display:none;">start</div>


    <div id="timeline">
		<ul id="dates">
		  <li><a id="start">XXXX</a></li>
		  <li><a id="1900">1900</a></li>
		  <li><a id="1930">1910</a></li>
		  <li><a id="1944">1920</a></li>
		  <li><a id="1950">1930</a></li>
		  <li><a id="1971">1940</a></li>
		  <li><a id="1977">1950</a></li>
		  <li><a id="1989">1960</a></li>
		  <li><a id="1900">1970</a></li>
		  <li><a id="1930">1980</a></li>
		  <li><a id="1944">1990</a></li>
		  <li><a id="1950">2000</a></li>
		  <li><a id="1971">2005</a></li>
		  <li><a id="1977">2010</a></li>
		  <li><a id="1989">2016</a></li>
		</ul>
	</div></div></center>
	
	<!-- Stub? -->
    <ul id='issues'>
    </ul>
 

      <!-- <div id="floating-panel">
        <input id="vn" type="button" value="Vietnam">
        <input id="aus" type="button" value="Australia">
        <input id="sing" type="button" value="Singapore">
        <input id="test" type="button" value="test">
      </div> -->
	  
	  <!-- not sure what this is -->
      <div id="map" class="col-sm-9"></div>
      <div class="col-sm-3">
		<!-- un-needed, we dont search by text
        <div class="form-group">
          <input type="text" name="search" id="search" class="form-control">
        </div>
		-->
      </div>
	  
	  
	  
	  <div class="search_form">

			<!-- Search buttons -->
			
			<!-- we no longer need an individual newspaper search button
			<div class="col-sm-3 btn-div">
				<button class="btn btn-lg btn-primary" id="btnSearchNewspaper">Search Newspaper</button>
			</div>
			-->
			<div class="col-sm-3 btn-div">
				<button class="btn btn-lg btn-primary" id="btnNext">Show next Result</button>
			</div>
	  
		  <!-- <div class="col-sm-3 btn-div">
			<button class="btn btn-lg btn-primary" id="btnTest">Test</button>
		  </div> -->
		  <div class="col-sm-3 btn-div" id='checkboxList'>
			<input type="checkbox" name="vehicle" value="Bike" id='nsw'>New South Wales<br>
			<input type="checkbox" name="vehicle" value="Bike" id='act'>ACT<br>
			<input type="checkbox" name="vehicle" value="Bike" id='qld'>Queensland<br>
			<input type="checkbox" name="vehicle" value="Bike" id='tas'>Tasmania<br>
			<input type="checkbox" name="vehicle" value="Bike" id='sa'>South australia<br>
			<input type="checkbox" name="vehicle" value="Bike" id='nt'>Northern Territory<br>
			<input type="checkbox" name="vehicle" value="Bike" id='wa'>Western Australia<br>
			<input type="checkbox" name="vehicle" value="Bike" id='vic'>Victoria<br>
		  </div>
      </div>

	  <!-- this will become redundant if we put peope on to the mp directly -->
    <!--
      <div class="col-sm-12">
        <h1> Some suggestion </h1>
      </div>
    -->
	  
	  <!-- Stub? -->
      <!-- #test div is the people list suggestion,don't delete -->
      <div class="col-sm-6" id="test" style="display:none">
        <!-- <ul id="test">
        </ul> -->
      </div>
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  	<!--- info divs--->
		
		<div id="info" class="info_content">
			<div class="info_header">
				
			<h2>About HISPLORE</h2>
			</div>
				<h3>What is HISPLORE? </h3>
				<p>HISPLORE is an interactive timemap where our users can look through documents from trove (www.trove.nla.au). We know what you study a lot of Australian history at school so we designed an application that will allow you to search through the trove database for historical people in Australia. When the markers on the map has loaded, you will be able to view the birth date and place, occupation and articles on Australian historical people. Jump into Australian history with HISPLORE and learn something new about your country! </p>

				<h3>How do we use it?</h3>
				<p> Hisplore is to be used for your studies. ... </p>

				<p>Click on a pin either on the timeline or on the map and the document preview should come up. You can decide whether you want to read it or save it for later. Scroll down to the account section and you will be able to know how to delete these saved items!</p>

			<h2>Options </h2>
				<h3>Colour</h3>
				<p>Do you have difficulty with colour? We have designed HISPLORE to be friendly to those suffering from colorblindness or any other vision-impairments. Simply click on the options button and select the right colour settings to suit your needs. </p>

				<h3>Reading</h3>
				<p>Do you have difficulty with reading? We have also design HISPLORE to be friendly with those who suffer from reading impairments. Simply click on the options button and select the settings under text-to-speech settings and font size settings to suit your needs.</p>


			<h2>Account </h2>
				<h3>Login </h3>
				<p>You can also login to HISPLORE! Simply login if you already have an account or create an account by just choosing a username and password. When you login, you will be directed to the main page as shown in the picture on the side. </p>


				<h3>Saving Documents </h3>
				<p>You can search through trove’s documents by selecting one of the preset searches. When you find something you like, just click on its pin and a save option will be at the bottom. You can save this to your account and see it later whenever you want! </p>


				<h3>Deleting Documents </h3>
				<p>When you look at your account on the account page, you can see a list of all of your saved items. If you wish to delete any - simple click on the trash can on the right side of the document. </p>


				<h3>Logging Out </h3>
				<p>
				If you wish to log out at any time, simply press the “LOG OUT” button on the top right hand corner and you will be able to log out of your account. <strong>Remember:</strong> you wont be able to use the application if you are logged out.</p>

		</div>
		
		
		
		
		<!-- Options Div -->
		
		<div id="options" class="options_content">
			<div class="options_header">
			<h2>Options</h2>
			</div>
			<div class="content">
			<p>Here you can change the settings of the website to suit you!</p>
			
			<h3>Self-Reader</h3>
			<p>Do you have difficulty in reading? If you click on the button "Read for me" the text-to-speech application will turn on!</p>
			<button type="button" id="text-to-speech">Read for me!</button>
			<button type="button" id="text-to-speech">Don't read for me.</button>
			
			<h3>Text Size</h3>
			<p>Hard to read? Here you can change the size of the text!</p>
			<table id="fsize_table">
				<tr>
				<td><span id="small"><p>A</p></span></td>
				<td><span id="medium"><h4>A</h4></span></td>
				<td><span id="large"><h2>A</h2></span></td>
				</tr>
			</table>
			
			<!-- insert function by js to change css font size -->
			</div>
		</div>
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBGW7c_hlZRJX3QGsDwkrAicn40AoiIZGs&callback=initMap" ></script>
	
	<!-- Main Trove search functions are in this script -->
    <script>
		
    	// --------------- Variable ------------------- \\
      var apiKey = "jsk1qqntnrj7qbvf";
    	//var googleurl = "https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyBGW7c_hlZRJX3QGsDwkrAicn40AoiIZGs&address="+item.state;

      var states = ['nsw', 'act', 'qld', 'tas', 'sa', 'nt', 'wa', 'vic'];

      var geo = {'victoria':[-37.4713077,144.7851531],'act':[-35.4734679,149.0123679],'queensland':[-20.9175738,142.7027956],
        'tasmania':[-41.4545196,145.9706648],'south australia':[-30.0002315,136.2091547],'northern territory':[-19.4914108,132.5509603],
        'western australia':[-27.842557,122.614925],'new south wales':[-31.2532183,146.921099]

      };
      var markers = [];

	    
        // --------------- Some Function ------------------- \\
      	

        function get_newspaper(searchTerm,year,max_num){
          $('#loading').show();
          var result= [];
          for (var i in states){
            var url = "http://api.trove.nla.gov.au/newspaper/titles?key="+apiKey+"&encoding=json&q="+searchTerm+"&l-year="+year+"&state="+states[i]+"&callback=?";
          //console.log(url);
            
            $.getJSON(url,function(data){
              
              news = data.response.records.newspaper;
              //console.log(news);
              $.each(news,function(index,item){
              	// check for me if National is the state???
                if (item.state=="National"){
                  return; // continue
                }
                var obj = {};

                //console.log(index);
                if (index==max_num){
                  //console.log('haha');
                  return false; // break
                }
                obj.state = item.state.toLowerCase();
                obj.troveUrl = item.troveUrl;
                obj.title = item.title;
                addToMarkers(obj,map);
              });
            });

          }
          
          
          //return result;
        }



        //people search
        function get_people(searchTerm,year){
          var url = 'http://api.trove.nla.gov.au/result?&zone=people&encoding=json&q='
        }

        //newspaper search
        function get_newspaper_by_state(searchTerm,year,state,max_num){
          $('#loading').show();
          var result= [];
          
            var url = "http://api.trove.nla.gov.au/newspaper/titles?key="+apiKey+"&encoding=json&q="+searchTerm+"&l-year="+year+"&state="+state+"&callback=?";
          //console.log(url);
            
            $.getJSON(url,function(data){
              
              news = data.response.records.newspaper;
              //console.log(news);
              $.each(news,function(index,item){
                // check for me if National is the state???
                if (item.state=="National"){
                  return; // continue
                }
                var obj = {};
                //console.log(index);
                if (index==max_num){
                  //console.log('haha');
                  return false; // break
                }
                obj.state = item.state.toLowerCase();
                obj.troveUrl = item.troveUrl;
                obj.title = item.title;
                addNewsMarkers(obj,map);
              });
            });

          
          
          
          //return result;
        }
        function addNewsMarkers(item,map){
          	//console.log(list);
          	//console.log(list);
	        
	        var geotmp = $.extend({},geo[item.state]);
	        var obj = {};
	        //console.log(geotmp[0]);
	        
	        // the more of ran_const, the wider the spread in each marker
	        var ran_const = 2.0;
	        var tmp = Math.random();
	        if (tmp>0.5){
	          tmp2 = Math.random()*ran_const;
	          tmp3 = Math.random()*ran_const;
	          geotmp[0] += tmp2;
	          geotmp[1] += tmp3;
	        }
	        else{
	          tmp2 = Math.random()*ran_const;
	          tmp3 = Math.random()*ran_const;
	          geotmp[0] -= tmp2;
	          geotmp[1] -= tmp3;
	        }
	        var myLatlng = new google.maps.LatLng(geotmp[0],geotmp[1]);
	        //var img = 'images/news.png';
		        
	       	var marker = new google.maps.Marker({
	          	position: myLatlng,
	          	map: map,
				//icon: person.png,

	      
	    	});
	        //console.log(marker);
	       	// contentHTML is the content of the pop-up of marker
	      	var contentHTML = item.troveUrl + "<br>" + item.title;
	       	var infowindow = new google.maps.InfoWindow({
	         	content: contentHTML
	       	});
	       	marker.addListener('click',function(){
	         	infowindow.open(map,marker);
	         //map.setZoom(10);
	         	map.setCenter(marker.getPosition());
	       	});


	       
	        markers.push(marker);
	      
	       
        }
      	

        function addPeopleEvent(year,states){
              states.each(function(index,region){


                    //console.log(region);
                    var people = $(region).children();
                    //var state = region.getAttribute("state");
                    //console.log(state);
                    //console.log(people);
                    people.each(function(index,person){
                          if ((index >= searchIndex*5) && (index<(searchIndex+1)*5)){
                                // console.log($(person).children().attr('href'));
                                // console.log(person.getAttribute("state"));
                                var wikiUrl = $(person).children().attr('href');
                                var state = $(person).parent().attr('state');
                                var searchTerm = $(person).children().attr('title');
                                //console.log(searchTerm);
                                   var troveSearchUrl = "http://api.trove.nla.gov.au/result?key=" + apiKey + "&encoding=json&zone=newspaper" + 
                               "&q=" + searchTerm +"&n=2"+ "&reclevel=full&callback=?";
                                
                               $.getJSON(troveSearchUrl,function(data){
                                  var obj = {};
                                  obj.searchTerm = searchTerm;
                                  obj.state = state;
                                  
                                  obj.wikiUrl = "https://en.wikipedia.org" + wikiUrl;
                                  obj.troveLinks = [];
                                  var articles = data.response.zone[0].records.article;
                                  //console.log(articles);

                                  for (var i in articles){
                                    //console.log(articles[i]);
                                    var obj_tmp = {}
                                    obj_tmp.troveUrl = articles[i].troveUrl;
                                    obj_tmp.heading = articles[i].heading;
                                    obj_tmp.snippet = articles[i].snippet;
                                    obj.troveLinks.push(obj_tmp);
                                    //console.log(articles[i]);
                                    //console.log(obj);
                                  }
                                  console.log(obj);

                                  addPeopleMarkers(obj,map);
                                  
                               }) // get Trove content
                          } // only show 5 results in the search event
                   
                    })// each person
               
            
              }) // each region

        }

        function addPeopleMarkers(item,map){
            //console.log(list);
            //console.log(list);
          
          var geotmp = $.extend({},geo[item.state]);
          //var obj = {};
          //console.log(geotmp[0]);
          
          // the more of ran_const, the wider the spread in each marker
          var ran_const = 2.0;
          var tmp = Math.random();
          if (tmp>0.5){
            tmp2 = Math.random()*ran_const;
            tmp3 = Math.random()*ran_const;
            geotmp[0] += tmp2;
            geotmp[1] += tmp3;
          }
          else{
            tmp2 = Math.random()*ran_const;
            tmp3 = Math.random()*ran_const;
            geotmp[0] -= tmp2;
            geotmp[1] -= tmp3;
          }
          var myLatlng = new google.maps.LatLng(geotmp[0],geotmp[1]);
          //var img = 'images/news.png';
            
          //var person= new google.maps.MarkerImage("images/person.png", new google.maps.Size(21, 34),
		  //new google.maps.Point(0, 0),
		  //new google.maps.Point(10, 34));
		  
		  var marker = new google.maps.Marker({
              position: myLatlng,
              map: map,
			  //icon: person,
        });
         //console.log(marker);
          // contentHTML is the content of the pop-up of marker
          var contentHTML = "<h2>"+item.searchTerm+"</h2><br>"
          contentHTML += "<a target='_blank' href='"+item.wikiUrl +"'>Click For WikiPedia Link</a><hr>"
          contentHTML += "<button onclick='save_people("+ "\""+ item.searchTerm+ "\"" +")'>Save Search</button>"
          contentHTML += "<p> Some of the Trove Links</p>"
          var troveLinks = item.troveLinks;
          for (var i in troveLinks){
            contentHTML += "<h6>"+troveLinks[i].heading+"</h6>";
            contentHTML += "<p>"+troveLinks[i].snippet+"</p>";
            contentHTML += "<a target='_blank' href='"+troveLinks[i].troveUrl +"'>Click to go to Trove</a>"
            contentHTML += "<hr>"
          }

          
          //this the window container for each map marker
          //var contentHTML = item.troveUrl + "<br>" + item.title;
          var infowindow = new google.maps.InfoWindow({
            content: contentHTML
          });
          marker.addListener('click',function(){
            infowindow.open(map,marker);
           //map.setZoom(10);
            map.setCenter(marker.getPosition());
          });


         
          markers.push(marker);
        
         
        }

        function save_people(term){
        	alert(term);
        	// $.post("save_people.php",{term:term},function(data){
        	// 	alert(data);
        	// });

        	// alert("<?php echo $_SESSION['username'] ?>");

        }

      	
      	function delete_all_markers(){
          for (var i in markers){
            markers[i].setMap(null);
          }
          //empty the marker list
          markers = [];
        }

        function createPeopleList(){
          $('#test').html('');
            if ($('#nsw').is(':checked')){
              $.get('people/nsw.html',function(data){
                
                $('#test').append(data);
                
              })
            } 
            if ($('#act').is(':checked')){
              $.get('people/act.html',function(data){
                
                $('#test').append('<p>Sorry we dont have anyone at the moment</p>');
                
              })
              //get_newspaper_by_state('science',year,'act',5);
            }
            if ($('#qld').is(':checked')){
              $.get('people/qld.html',function(data){
                
                $('#test').append(data);
                
              })
              //get_newspaper_by_state('science',year,'qld',5);
            }
            if ($('#tas').is(':checked')){
              $.get('people/tas.html',function(data){
                
                $('#test').append(data);
                ;
              })
              //get_newspaper_by_state('science',year,'tas',5);
            }
            if ($('#sa').is(':checked')){
              $.get('people/sa.html',function(data){
                
                $('#test').append(data);
                
              })
            }
            if ($('#nt').is(':checked')){
              $.get('people/nt.html',function(data){
              
                $('#test').append(data);
                
              })
              //get_newspaper_by_state('science',year,'nt',5);
            }
            if ($('#wa').is(':checked')){
              $.get('people/wa.html',function(data){
                
                $('#test').append(data);
                
              })
              //get_newspaper_by_state('science',year,'wa',5);
            }
            if ($('#vic').is(':checked')){
              $.get('people/vic.html',function(data){
                
                $('#test').append(data);
                
              })
            }
        }









        //THIS is the map creation call

      	window.initMap = function() {
	            map = new google.maps.Map(document.getElementById('map'), {
	              zoom: 4,
	              center: {lat: -26.8241, lng: 133.7751}
	            });
	        


        // Define the LatLng coordinates for the polygon's path.
        var ntcoords = [
          {lat: -15.057254, lng: 129.159176},
          {lat: -12.218014, lng: 133.343669},
          {lat: -16.545583, lng: 137.939128},
          {lat: -25.703676, lng: 137.759604},
          {lat: -25.595647, lng: 129.355759}
        ];

        // Define the LatLng coordinates for the polygon's path.
        var qldcoords = [
          {lat: -10.954549, lng: 142.457234},
          {lat: -28.122488, lng: 153.267750},
          {lat: -28.772415, lng: 141.205406},
          {lat: -25.847837, lng: 141.150249},
          {lat: -16.917604, lng: 138.177868}
        ];
		
		// Define the LatLng coordinates for the polygon's path.
        var nswcoords = [
          {lat: -29.291888, lng: 141.194757},
          {lat: -29.616526, lng: 152.753672},
          {lat: -33.879516, lng: 150.302466},
          {lat: -35.2037146, lng: 145.309437},
          {lat: -35.203714, lng: 145.309437}
        ];
		
		// Define the LatLng coordinates for the polygon's path.
        var actcoords = [
          {lat: -35.455773, lng: 145.616421},
          {lat: -34.940069, lng: 150.425803},
          {lat: -37.249107, lng: 149.897515}
        ];        
		// Define the LatLng coordinates for the polygon's path.
        var viccoords = [
          {lat: -34.373634, lng: 141.247595},
          {lat: -36.292693, lng: 144.597771},
          {lat: -37.531387, lng: 149.570544},
          {lat: -38.126833, lng: 141.413849}
        ];
		
		// Define the LatLng coordinates for the polygon's path.
        var sacoords = [
          {lat: -26.286459, lng: 129.327044},
          {lat: -26.356284, lng: 140.608844},
          {lat: -37.674298, lng: 140.530603},
          {lat: -32.953328, lng: 135.388165},
          {lat: -31.166650, lng: 129.447673}
        ];

		// Define the LatLng coordinates for the polygon's path.
        var wacoords = [
          {lat: -22.301520, lng: 114.946052},
          {lat: -15.657529, lng: 127.317237},
          {lat: -31.681433, lng: 128.239287},
          {lat: -34.349486, lng: 116.705606},
          {lat: -26.716461, lng: 114.320071}
        ];
        var tascoords = [
          {lat: -41.067298, lng: 144.938145},
          {lat: -41.112119, lng: 148.045270},
          {lat: -43.488762, lng: 146.488228}
        ];



        // Construct nsw
        var NTquads = new google.maps.Polygon({
          paths: ntcoords,
          strokeColor: '#FF0000',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '#FF0000',
          fillOpacity: 0.25
        });

        // Construct nsw
        var QLDquads = new google.maps.Polygon({
          paths: qldcoords,
          strokeColor: '#FF0000',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '#FF0000',
          fillOpacity: 0.25
        });

        // Construct nsw
        var NSWquads = new google.maps.Polygon({
          paths: nswcoords,
          strokeColor: '#FF0000',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '#FF0000',
          fillOpacity: 0.25
        });

        var ACTquads = new google.maps.Polygon({
          paths: actcoords,
          strokeColor: '#FF0000',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '#FF0000',
          fillOpacity: 0.25
        });

        var VICquads = new google.maps.Polygon({
          paths: viccoords,
          strokeColor: '#FF0000',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '#FF0000',
          fillOpacity: 0.25
        });		
		
        var SAquads = new google.maps.Polygon({
          paths: sacoords,
          strokeColor: '#FF0000',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '#FF0000',
          fillOpacity: 0.25
        });		
		
        var WAquads = new google.maps.Polygon({
          paths: wacoords,
          strokeColor: '#FF0000',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '#FF0000',
          fillOpacity: 0.25
        });			
        var TASquads = new google.maps.Polygon({
          paths: tascoords,
          strokeColor: '#FF0000',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '#FF0000',
          fillOpacity: 0.25
        });			
		
		
		
		
		
        NTquads.setMap(map);
        NTquads.addListener('click', ntcheck);  
		
        QLDquads.setMap(map);
        QLDquads.addListener('click', qldcheck);
		
        NSWquads.setMap(map);
        NSWquads.addListener('click', nswcheck);
		
        ACTquads.setMap(map);
        ACTquads.addListener('click', actcheck);
		
        VICquads.setMap(map);
        VICquads.addListener('click', viccheck);
		
        SAquads.setMap(map);
        SAquads.addListener('click', sacheck);	
		
        WAquads.setMap(map);
        WAquads.addListener('click', wacheck);
		
        TASquads.setMap(map);
        TASquads.addListener('click', tascheck);
		
		
		function ntcheck(){
            if ($('#nt').is(':checked')){
				NTquads.setOptions({strokeWeight: 2.0, fillColor: '#FF0000', strokeColor: '#FF0000'});
                $('#nt')[0].checked = false;

            }
            else {
				NTquads.setOptions({strokeWeight: 2.0, fillColor: 'green', strokeColor: 'green'});
	           	$('#nt')[0].checked = true;
            }
            createPeopleList();
            delete_all_markers();  
        }
        function qldcheck(){
            if ($('#qld').is(':checked')){
				QLDquads.setOptions({strokeWeight: 2.0, fillColor: '#FF0000', strokeColor: '#FF0000'});
                $('#qld')[0].checked = false;

            }
            else {
				QLDquads.setOptions({strokeWeight: 2.0, fillColor: 'green', strokeColor: 'green'});
	           	$('#qld')[0].checked = true;
            }
            createPeopleList();
            delete_all_markers();  
        }
        function nswcheck(){
            if ($('#nsw').is(':checked')){
				NSWquads.setOptions({strokeWeight: 2.0, fillColor: '#FF0000', strokeColor: '#FF0000'});
                $('#nsw')[0].checked = false;

            }
            else {
				NSWquads.setOptions({strokeWeight: 2.0, fillColor: 'green', strokeColor: 'green'});
	           	$('#nsw')[0].checked = true;
            }
            createPeopleList();
            delete_all_markers();  
        }
        function actcheck(){
            if ($('#act').is(':checked')){
				ACTquads.setOptions({strokeWeight: 2.0, fillColor: '#FF0000', strokeColor: '#FF0000'});
                $('#act')[0].checked = false;

            }
            else {
				ACTquads.setOptions({strokeWeight: 2.0, fillColor: 'green', strokeColor: 'green'});
	           	$('#act')[0].checked = true;
            }
            createPeopleList();
            delete_all_markers();  
        }
        function viccheck(){
            if ($('#vic').is(':checked')){
				VICquads.setOptions({strokeWeight: 2.0, fillColor: '#FF0000', strokeColor: '#FF0000'});
                $('#vic')[0].checked = false;

            }
            else {
				VICquads.setOptions({strokeWeight: 2.0, fillColor: 'green', strokeColor: 'green'});
	           	$('#vic')[0].checked = true;
            }
            createPeopleList();
            delete_all_markers();  
        }
        function sacheck(){
            if ($('#sa').is(':checked')){
				SAquads.setOptions({strokeWeight: 2.0, fillColor: '#FF0000', strokeColor: '#FF0000'});
                $('#sa')[0].checked = false;

            }
            else {
				SAquads.setOptions({strokeWeight: 2.0, fillColor: 'green', strokeColor: 'green'});
	           	$('#sa')[0].checked = true;
            }
            createPeopleList();
            delete_all_markers();  
        }
        function wacheck(){
            if ($('#wa').is(':checked')){
				WAquads.setOptions({strokeWeight: 2.0, fillColor: '#FF0000', strokeColor: '#FF0000'});
                $('#wa')[0].checked = false;

            }
            else {
				WAquads.setOptions({strokeWeight: 2.0, fillColor: 'green', strokeColor: 'green'});
	           	$('#wa')[0].checked = true;
            }
            createPeopleList();
            delete_all_markers();  
        }
        function tascheck(){
            if ($('#tas').is(':checked')){
				TASquads.setOptions({strokeWeight: 2.0, fillColor: '#FF0000', strokeColor: '#FF0000'});
                $('#tas')[0].checked = false;

            }
            else {
				TASquads.setOptions({strokeWeight: 2.0, fillColor: 'green', strokeColor: 'green'});
	           	$('#tas')[0].checked = true;
            }
            createPeopleList();
            delete_all_markers();  
        }
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	    }
	            

		























    </script>

	<!-- Main Sscript -->

    <script type="text/javascript">
    
    	// ---------------Main program----------------- \\
        var searchIndex = 0;
        $('#btnNext').off('click').click(function(){
                //alert('ahihi');
                var year = $('#year').text();
                if (year=='start'){
                  alert('please choose a year');
                }
                else{
                  delete_all_markers();
                  searchIndex += 1;
                  var year = $('#year');
                  var states = $('#test ul');
                  $('#loading').show();
                  addPeopleEvent(year,states);
                  $('#loading').hide();
                }
                
        }) // show next result event

        
        dates = $('#dates').find('a');
        dates.each(function(index,data){
          //console.log(data);
          $(data).off('click').click(function(){
            
            //change the value of the "invisible" div '#year' to the selected year
            if (this.id != 'start'){ // if it's a year,add event
              searchIndex = 0;
              $('#year').text($(data).attr('id'));
              //alert('ahihi');
              $('#loading').show();
              delete_all_markers();
              var year = $('#year');
              var states = $('#test ul');
              $('#loading').show();
              addPeopleEvent(year,states);
              $('#loading').hide();
              //console.log(states);
              //var searchIndex = 0; // index of the result search.
              
              
              
            }
            
          }) //event click for year

        }) // each year in the timeline,create event.


        // $('#btnSearchNewspaper').click(function(){
        //   searchTerm = $('#search').val();
        //   year = $('#year').text();
        //   console.log(year);
        //   delete_all_markers();
        //   get_newspaper('science',year,5);
        // })


        // $('#btnSearchPeople').click(function(){
        //   searchTerm = $('#search').val();
        //   year = $('#year').text();
        //   console.log(year);

        //   delete_all_markers();
        //   var search = 'Blake Shelton';
        //   //var url = 'https://en.wikipedia.org/w/api.php?action=query&format=json&srsearch='+search+'&callback=?';
        //   //var url = 'https://en.wikipedia.org/w/api.php?action=query&prop=coordinates&titles=Wikimedia%20Foundation&callback=?';
        //   var url = 'https://en.wikipedia.org/w/api.php?action=opensearch&format=json&search='+searchTerm+'&callback=?';
        //   $.getJSON(url,function(data){
        //     console.log(url);
        //     console.log(data[3][0]);
        //     $.post('wiki.php',{url:data[3][0]}).done(function(data){
        //       // var tmp = data.indexOf('was born in');
        //       // //console.log(tmp);
        //       // var tmp2 = data.split("was born in ");
        //       // if (tmp2.slice(0,2) == '<a'){
        //       //   alert('afs');
        //       // }
        //       // console.log(tmp2.slice(0,2));
        //       //console.log(tmp2[1]);
        //       console.log(data);
        //     })
        //   })

        // })
         // $('#btnSearchNewspaper').click(function(){
         //    //alert('ccc');
         //    searchTerm = $('#search').val();
         //    year = $('#year').text();
         //    console.log(year);
         //    delete_all_markers();
         //    //states = ['nsw', 'act', 'qld', 'tas', 'sa', 'nt', 'wa', 'vic'];
         //    if ($('#nsw').is(':checked')){
         //      get_newspaper_by_state('science',year,'nsw',5);
         //    } 
         //    if ($('#act').is(':checked')){
         //      get_newspaper_by_state('science',year,'act',5);
         //    }
         //    if ($('#qld').is(':checked')){
         //      get_newspaper_by_state('science',year,'qld',5);
         //    }
         //    if ($('#tas').is(':checked')){
         //      get_newspaper_by_state('science',year,'tas',5);
         //    }
         //    if ($('#sa').is(':checked')){
         //      get_newspaper_by_state('science',year,'sa',5);
         //    }
         //    if ($('#nt').is(':checked')){
         //      get_newspaper_by_state('science',year,'nt',5);
         //    }
         //    if ($('#wa').is(':checked')){
         //      get_newspaper_by_state('science',year,'wa',5);
         //    }
         //    if ($('#vic').is(':checked')){
         //      get_newspaper_by_state('science',year,'vic',5);
         //    }
         //  })


         checkboxList = $('#checkboxList').children();
         

         checkboxList.change(function(){
            createPeopleList();
            delete_all_markers();
            // $(document).off('click','.people li').on('click', '.people li' , function(event) {
            //          //code here ....
            //   // console.log($(event.target).parent().attr('state'));
            //   // console.log($(event.target).children().attr('href'));
              
            //   $('#loading').show();
            //   var state = $(event.target).parent().attr('state');
            //   var wikiUrl = $(event.target).children().attr('href');
            //   console.log(wikiUrl);
            //   var searchTerm = $(event.target).children().attr('title');
              
            //   var troveSearchUrl = "http://api.trove.nla.gov.au/result?key=" + apiKey + "&encoding=json&zone=newspaper" + 
            //    "&q=" + searchTerm +"&n=2"+ "&reclevel=full&callback=?";
            //     // console.log(troveSearchUrl);
            //    // $.getJSON(troveSearchUrl).done(function(data){

            //    //    var articles = data.response.zone[0].article;
            //    //    for (var i in articles){

            //    //      obj.troveUrl.push(articles[i].troveUrl);
            //    //      console.log(obj);
            //    //    }
            //    //    console.log(obj.troveUrl);
            //    // })
            //    $.getJSON(troveSearchUrl,function(data){
            //       var obj = {};
            //       obj.searchTerm = searchTerm;
            //       obj.state = state;
                  
            //       obj.wikiUrl = "https://en.wikipedia.org" + wikiUrl;
            //       obj.troveLinks = [];
            //       var articles = data.response.zone[0].records.article;
            //       //console.log(articles);

            //       for (var i in articles){
            //         //console.log(articles[i]);
            //         var obj_tmp = {}
            //         obj_tmp.troveUrl = articles[i].troveUrl;
            //         obj_tmp.heading = articles[i].heading;
            //         obj_tmp.snippet = articles[i].snippet;
            //         obj.troveLinks.push(obj_tmp);
            //         //console.log(articles[i]);
            //         //console.log(obj);
            //       }
            //       console.log(obj);
            //       addPeopleMarkers(obj,map);
            //       $('#loading').hide();
            //    })
            
              
            // }); // people list clicked

         }) // Button people search clicked




    </script>
    
  </body>
</html>