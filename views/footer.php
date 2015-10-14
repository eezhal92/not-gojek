  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&language=id&libraries=places"></script>
  <script type="text/javascript">
	var mobil = (function() {
	  var mobil = [];		

	  function getMobil()
	  {
        $.get('/api/mobil', {}, handleSuccess, "json");

	    function handleSuccess(response) {            
	      mobil = response;
	      console.log(response);
	    }
      
		return mobil;
	  }

	  return {
		getMobil: getMobil
	  };

	})();

	var map = (function() {
	  var mapDom = document.getElementById('map-canvas');
	  var currentLatLng = new google.maps.LatLng(-0.894348, 119.874850);
	  var mapOptions = {
		zoom: 17,
		center: currentLatLng
	  };

	  var map = new google.maps.Map(mapDom, mapOptions);

	})();

  </script>
</body>
</html>