$('document').ready(function(e){
(function(A) {

if (!Array.prototype.forEach)
	A.forEach = A.forEach || function(action, that) {
		for (var i = 0, l = this.length; i < l; i++)
			if (i in this)
				action.call(that, this[i], i, this);
		};

	})(Array.prototype);
	var map_result;
	var user_lat = $('#user_lat2').val();
	var user_lng = $('#user_lng2').val();
	$.ajax({
		url: base_url+'booking/get_available_booking_users',
		dataType: "JSON",
		async: false,
		success: (res)=>{
			map_result = res;
		}
	});
	var
	mapObject,
	markers = [],
	markersData = {
		'Marker': map_result
	};

	var mapOptions = {
		zoom: 15,
		center: new google.maps.LatLng(user_lat, user_lng),
		mapTypeId: google.maps.MapTypeId.ROADMAP,

		mapTypeControl: false,
		mapTypeControlOptions: {
			style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
			position: google.maps.ControlPosition.LEFT_CENTER
		},
		panControl: false,
		panControlOptions: {
			position: google.maps.ControlPosition.TOP_RIGHT
		},
		zoomControl: true,
		zoomControlOptions: {
			style: google.maps.ZoomControlStyle.LARGE,
			position: google.maps.ControlPosition.TOP_LEFT
		},
		scrollwheel: false,
		scaleControl: false,
		scaleControlOptions: {
			position: google.maps.ControlPosition.TOP_LEFT
		},
		streetViewControl: true,
		streetViewControlOptions: {
			position: google.maps.ControlPosition.LEFT_TOP
		},
		styles: [
			{
				"featureType": "administrative.country",
				"elementType": "all",
				"stylers": [
					{
						"visibility": "off"
					}
				]
			},
			{
				"featureType": "administrative.province",
				"elementType": "all",
				"stylers": [
					{
						"visibility": "off"
					}
				]
			},
			{
				"featureType": "administrative.locality",
				"elementType": "all",
				"stylers": [
					{
						"visibility": "off"
					}
				]
			},
			{
				"featureType": "administrative.neighborhood",
				"elementType": "all",
				"stylers": [
					{
						"visibility": "off"
					}
				]
			},
			{
				"featureType": "administrative.land_parcel",
				"elementType": "all",
				"stylers": [
					{
						"visibility": "off"
					}
				]
			},
			{
				"featureType": "landscape.man_made",
				"elementType": "all",
				"stylers": [
					{
						"visibility": "simplified"
					}
				]
			},
			{
				"featureType": "landscape.natural.landcover",
				"elementType": "all",
				"stylers": [
					{
						"visibility": "on"
					}
				]
			},
			{
				"featureType": "landscape.natural.terrain",
				"elementType": "all",
				"stylers": [
					{
						"visibility": "off"
					}
				]
			},
			{
				"featureType": "poi",
				"elementType": "all",
				"stylers": [
					{
						"visibility": "off"
					}
				]
			},
			{
				"featureType": "poi.business",
				"elementType": "all",
				"stylers": [
					{
						"visibility": "off"
					}
				]
			},
			{
				"featureType": "poi.government",
				"elementType": "all",
				"stylers": [
					{
						"visibility": "off"
					}
				]
			},
			{
				"featureType": "poi.medical",
				"elementType": "all",
				"stylers": [
					{
						"visibility": "off"
					}
				]
			},
			{
				"featureType": "poi.park",
				"elementType": "all",
				"stylers": [
					{
						"visibility": "off"
					}
				]
			},
			{
				"featureType": "poi.park",
				"elementType": "labels",
				"stylers": [
					{
						"visibility": "off"
					}
				]
			},
			{
				"featureType": "poi.place_of_worship",
				"elementType": "all",
				"stylers": [
					{
						"visibility": "off"
					}
				]
			},
			{
				"featureType": "poi.school",
				"elementType": "all",
				"stylers": [
					{
						"visibility": "off"
					}
				]
			},
			{
				"featureType": "poi.sports_complex",
				"elementType": "all",
				"stylers": [
					{
						"visibility": "off"
					}
				]
			},
			{
				"featureType": "road.highway",
				"elementType": "all",
				"stylers": [
					{
						"visibility": "off"
					}
				]
			},
			{
				"featureType": "road.highway",
				"elementType": "labels",
				"stylers": [
					{
						"visibility": "off"
					}
				]
			},
			{
				"featureType": "road.highway.controlled_access",
				"elementType": "all",
				"stylers": [
					{
						"visibility": "off"
					}
				]
			},
			{
				"featureType": "road.arterial",
				"elementType": "all",
				"stylers": [
					{
						"visibility": "simplified"
					}
				]
			},
			{
				"featureType": "road.local",
				"elementType": "all",
				"stylers": [
					{
						"visibility": "simplified"
					}
				]
			},
			{
				"featureType": "transit.line",
				"elementType": "all",
				"stylers": [
					{
						"visibility": "off"
					}
				]
			},
			{
				"featureType": "transit.station.airport",
				"elementType": "all",
				"stylers": [
					{
						"visibility": "off"
					}
				]
			},
			{
				"featureType": "transit.station.bus",
				"elementType": "all",
				"stylers": [
					{
						"visibility": "off"
					}
				]
			},
			{
				"featureType": "transit.station.rail",
				"elementType": "all",
				"stylers": [
					{
						"visibility": "off"
					}
				]
			},
			{
				"featureType": "water",
				"elementType": "all",
				"stylers": [
					{
						"visibility": "on"
					}
				]
			},
			{
				"featureType": "water",
				"elementType": "labels",
				"stylers": [
					{
						"visibility": "off"
					}
				]
			}
		]
	};
	var marker;
	mapObject = new google.maps.Map(document.getElementById('map'), mapOptions);
	for (var key in markersData){
		markersData[key].forEach(function (item) {
			marker = new google.maps.Marker({
				position: new google.maps.LatLng(item.location_latitude, item.location_longitude),
				map: mapObject,
				icon: base_url + 'assets/img/s-pin-sm.png',
			});

			if ('undefined' === typeof markers[key])
				markers[key] = [];
				markers[key].push(marker);
				google.maps.event.addListener(marker, 'click', (function () {
				closeInfoBox();
				getInfoBox(item).open(mapObject, this);
				mapObject.setCenter(new google.maps.LatLng(item.location_latitude, item.location_longitude));
			}));
		});
	}

	new MarkerClusterer(mapObject, markers[key]);
	
	function hideAllMarkers () {
		for (var key in markers)
			markers[key].forEach(function (marker) {
				marker.setMap(null);
			});
	};

	function closeInfoBox() {
		$('div.infoBox').remove();
	};

	function getInfoBox(item) {
		return new InfoBox({
			content:
			'<div class="marker_info" id="marker_info">' +
			'<div class="info-img-map"><img src="' +item.map_image_url + '" alt=""/></div>' +
			'<span>'+ 
				'<span class="infobox_rate">'+ item.rate +'</span>' +
				'<h3><a href="'+ item.url_point + '" target="_blank">'+ item.name_point +'</a></h3>' +
				'<em>'+ item.type_point +'</em>' +
				'<strong>'+ item.description_point +'</strong>' +
				'<a href="tel://'+ item.phone +'" class="btn_infobox_phone">'+ item.phone +'</a>' +
			'</span>' +
			'</div>',
			disableAutoPan: false,
			maxWidth: 0,
			pixelOffset: new google.maps.Size(10, 92),
			closeBoxMargin: '',
			closeBoxURL: base_url+"assets/img/close_infobox.png",
			isHidden: false,
			alignBottom: true,
			pane: 'floatPane',
			enableEventPropagation: true
		});
	};
});