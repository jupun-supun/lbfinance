/* global jQuery:false */
/* global CLOTHING69_STORAGE:false */
/* global TRX_ADDONS_STORAGE:false */

(function() {
	"use strict";

	jQuery(document).on('action.add_googlemap_styles', clothing69_trx_addons_add_googlemap_styles);
	jQuery(document).on('action.init_shortcodes', clothing69_trx_addons_init);
	jQuery(document).on('action.init_hidden_elements', clothing69_trx_addons_init);

	// Add theme specific styles to the Google map
	function clothing69_trx_addons_add_googlemap_styles(e) {
		if (typeof TRX_ADDONS_STORAGE == 'undefined') return;
		TRX_ADDONS_STORAGE['googlemap_styles']['dark'] = [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"lightness":20},{"color":"#13162b"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#13162b"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#5fc6ca"},{"lightness":21}]},{"featureType":"road","elementType":"all","stylers":[{"visibility":"simplified"},{"color":"#cccdd2"}]},{"featureType":"road","elementType":"geometry","stylers":[{"color":"#13162b"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"color":"#ff0000"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#13162b"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#13162b"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#13162b"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#13162b"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#f4f9fc"},{"lightness":17}]}];
		TRX_ADDONS_STORAGE['googlemap_styles']['extra'] = [{ "featureType": "all", "elementType": "labels.text.fill", "stylers": [{ "saturation": 36}, { "color": "#333333"}, { "lightness": 40}]}, { "featureType": "all", "elementType": "labels.text.stroke", "stylers": [{ "visibility": "on"}, { "color": "#ffffff"}, { "lightness": 16}]}, { "featureType": "all", "elementType": "labels.icon", "stylers": [{ "visibility": "off"}]}, { "featureType": "administrative", "elementType": "geometry.fill", "stylers": [{ "color": "#fefefe"}, { "lightness": 20}]}, { "featureType": "administrative", "elementType": "geometry.stroke", "stylers": [{ "color": "#fefefe"}, { "lightness": 17}, { "weight": 1.2}]}, { "featureType": "administrative", "elementType": "labels.text.fill", "stylers": [{ "color": "#454444"}]}, { "featureType": "administrative.country", "elementType": "geometry.stroke", "stylers": [{ "color": "#bababa"}, { "weight": "0.75"}]}, { "featureType": "administrative.province", "elementType": "geometry.stroke", "stylers": [{ "color": "#7e7a7a"}]}, { "featureType": "administrative.locality", "elementType": "all", "stylers": [{ "visibility": "on"}]}, { "featureType": "landscape", "elementType": "geometry", "stylers": [{ "color": "#f5f5f5"}, { "lightness": 20}]}, { "featureType": "landscape.man_made", "elementType": "all", "stylers": [{ "color": "#ebe5dc"}, { "saturation": "-16"}, { "lightness": "28"}, { "gamma": "1"}]}, { "featureType": "landscape.natural", "elementType": "all", "stylers": [{ "color": "#ebe5dc"}, { "lightness": "28"}, { "saturation": "-16"}]}, { "featureType": "landscape.natural", "elementType": "labels.text.fill", "stylers": [{ "color": "#454444"}]}, { "featureType": "poi", "elementType": "geometry", "stylers": [{ "color": "#ebe5dc"}, { "lightness": "6"}]}, { "featureType": "poi", "elementType": "labels.text.fill", "stylers": [{ "color": "#454444"}]}, { "featureType": "poi.park", "elementType": "geometry", "stylers": [{ "color": "#ebe5dc"}, { "lightness": "7"}]}, { "featureType": "poi.park", "elementType": "labels.text.fill", "stylers": [{ "color": "#454444"}]}, { "featureType": "road", "elementType": "labels.text.fill", "stylers": [{ "color": "#454444"}]}, { "featureType": "road.highway", "elementType": "geometry.fill", "stylers": [{ "color": "#ffffff"}, { "lightness": 17}]}, { "featureType": "road.highway", "elementType": "geometry.stroke", "stylers": [{ "color": "#ffffff"}, { "lightness": 29}, { "weight": 0.2}]}, { "featureType": "road.arterial", "elementType": "geometry", "stylers": [{ "color": "#ffffff"}, { "lightness": 18}]}, { "featureType": "road.arterial", "elementType": "labels.text.fill", "stylers": [{ "color": "#454444"}]}, { "featureType": "road.local", "elementType": "geometry", "stylers": [{ "color": "#ffffff"}, { "lightness": 16}]}, { "featureType": "road.local", "elementType": "labels.text.fill", "stylers": [{ "color": "#454444"}]}, { "featureType": "transit", "elementType": "geometry", "stylers": [{ "color": "#f2f2f2"}, { "lightness": 19}]}, { "featureType": "transit.station", "elementType": "labels.text.fill", "stylers": [{ "color": "#454444"}]}, { "featureType": "water", "elementType": "geometry", "stylers": [{ "color": "#e5ded5"}, { "lightness": "14"}, { "saturation": "-13"}]}, { "featureType": "water", "elementType": "labels.text.fill", "stylers": [{ "color": "#454444"}]}];
    }


    function clothing69_trx_addons_init(e, container) {
		if (arguments.length < 2) var container = jQuery('body');
		if (container===undefined || container.length === undefined || container.length == 0) return;
		container.find('.sc_countdown_item canvas:not(.inited)').addClass('inited').attr('data-color', CLOTHING69_STORAGE['alter_link_color']);
	}

})();