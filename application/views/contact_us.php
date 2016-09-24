
  <div class="content">
    <div id="map"></div>
    <br>
    <div class="contact_us">
	  	<div class="contact">
		  	<h3>India - Koratty</h3>
			<p>Nisagandhi 
			Infopark
			Koratty
			Trissur - 680308
		    <button onclick="koratty();">View Map</button></p>
	    </div>
	    <div class="contact">
		  	<h3>India - Trivandrum</h3>
			<p>4th Floor, Artech Magnet
			Vazhuthacaud
			Trivandrum - 695014
		    <button onclick="tvm();">View Map</button></p>
	    </div>
	    <div class="contact">
		  	<h3>India - Kochi</h3>
			<p>9th Floor, 9-A, Phase 4
			Carnival Infopark
			Cochin - 682030
		    <button onclick="kochi();">View Map</button></p>
	    </div>
    </div>
  </div>
    <script>
      var map;
      function initMap() {
	        map = new google.maps.Map(document.getElementById('map'), {
	          center: {lat: 10.015076, lng: 76.363643},
	          zoom: 7
	        });
	        var marker = new google.maps.Marker({
	          position: {lat: 10.268578, lng: 76.353755},
	          map: map,
	          title: 'Nisagandhi, Infopark,Koratty Trissur - 680308'
	        });
 			var marker = new google.maps.Marker({
	          position: {lat: 8.547835, lng: 76.879640},
	          map: map,
	          title: 'Qburst 4th Floor, Artech Magnet Vazhuthacaud'
	        });
	        var marker = new google.maps.Marker({
	          position: {lat: 10.015076, lng: 76.363643},
	          map: map,
	          title: 'Qburst th Floor, 9-A, Phase 4	Carnival Infopark'
	        });
      }
      function koratty(){
	      	map = new google.maps.Map(document.getElementById('map'), {
	          center: {lat: 10.268578, lng: 76.353755},
	          zoom: 16
	        });
	        var marker = new google.maps.Marker({
	          position: {lat: 10.268578, lng: 76.353755},
	          map: map,
	          title: 'Nisagandhi, Infopark,Koratty Trissur - 680308'
	        });
      }
      function tvm(){
	      	map = new google.maps.Map(document.getElementById('map'), {
	          center: {lat: 8.547835, lng: 76.879640},
	          zoom: 16
	        });
	        var marker = new google.maps.Marker({
	          position: {lat: 8.547835, lng: 76.879640},
	          map: map,
	          title: 'Qburst 4th Floor, Artech Magnet Vazhuthacaud'
	        });
      }
      function kochi(){
	      	map = new google.maps.Map(document.getElementById('map'), {
	          center: {lat: 10.015076, lng: 76.363643},
	          zoom: 16
	        });
	        var marker = new google.maps.Marker({
	          position: {lat: 10.015076, lng: 76.363643},
	          map: map,
	          title: 'Qburst th Floor, 9-A, Phase 4	Carnival Infopark'
	        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCaYWAzKhYkphKDOf6SrTMeEDyJofmiTk&callback=initMap"
    async defer></script>

