var app = angular.module('app', ['ngMaterial', 'ngAnimate']);

app.config(function($interpolateProvider) {
    $interpolateProvider.startSymbol('\\\\\\');
    $interpolateProvider.endSymbol('\\\\\\');
  });

app.config(function($mdThemingProvider) {
	$mdThemingProvider.alwaysWatchTheme(true);
	 var turq = $mdThemingProvider.extendPalette('teal', {
    '500': '#76BDC3',
    'contrastDefaultColor': 'dark'
  	});

	 var turq_offset = $mdThemingProvider.extendPalette('teal', {
    '300': '#062631',
    'contrastDefaultColor': 'light'
  	});


	$mdThemingProvider.definePalette('turq', turq);
	$mdThemingProvider.definePalette('turqo', turq_offset);
	$mdThemingProvider.theme('default').primaryPalette('turq', { 'default': '500' });
	$mdThemingProvider.theme('default').accentPalette('turqo', { 'default': '300' });
	$mdThemingProvider.theme('default').warnPalette('red', {'default' : '200'});
});




app.controller('uctrl', function uctrl($scope, $interval, $http, $location, $mdDialog, $filter, $mdSidenav) {
	$scope.urlparms = getAllUrlParams();
	$scope.selected = "home";
	$scope.group_selected = -1;
	$scope.event_selected = -1;
	$scope.headercolor = "#74BDC4";
		
	$scope.selected_day = "";
	$scope.selected_month = "";
	$scope.selected_category = "";
	$scope.selected_topic = ($scope.urlparms.hasOwnProperty('Topic') ? getQueryTopicFromParam($scope.urlparms.Topic) : '');
	$scope.selected_type = "";
	$scope.selected_location = "";
	$scope.query = "";

	$scope.is_group_selected = false;

	$scope.icon = "plus";

	//Define the main content page asset url:
	$scope.default_big_tile = "/img/Asset 3_3x.png"; 
	$scope.big_tile = $scope.default_big_tile;
	$scope.switch_to_default = false;

	// Important definition for deciding if groups should be shown or not
	$scope.showgroups = true;

	$scope.options = [{
		"name": "Groups",
		"icon": "fa-group"
	},
	{
		"name": "Home",
		"icon": "fa-gears"
	},
	{
		"name": "Data",
		"icon": "fa-line-chart"
	}];

	//Dynamically change the selected option depending on url
	for (var i = 0; i < $scope.options.length; i++) {
  		if (isParam($scope.urlparms, $scope.options[i].name)) {
  			$scope.selected = $scope.options[i].name;
			//run proper get function
			var funcname = "get_" + $scope.selected.toLowerCase().replace(/ /g,"_");
			console.log(funcname);
			if(angular.isFunction($scope[funcname])) {
				$scope[funcname]();
			}
  			
  		}
  	}

	//get_groups function pulls in group data from MySQL server (Calls php script that runs server code)
	$scope.get_groups = function() {
		//Test if there is a sys_id
		if($scope.urlparms.Sys_id != null) {
			$scope.get_record($scope.urlparms.Table, $scope.urlparms.Sys_id);
			$scope.groups_sub_selected = 'edit';
			//$scope.record.Table = "Posts"
		}

		if($scope.urlparms.Option != null) {
			$scope.groups_sub_selected = $scope.urlparms.Option;
		}

		$http.get("get_groups.php")
		.then(function (response) {
			$scope.groups = response.data;
			//console.log($scope.groups);
			for(var b in $scope.groups) {
				$scope.groups[b]['DATE_SUBMITTED'] = new Date($scope.groups[b]['DATE_SUBMITTED']).toDateString();
			}
		});
	}

	$scope.get_events = function() {
		//Test if there is a sys_id
		if($scope.urlparms.Sys_id != null) {
			$scope.get_record($scope.urlparms.Table, $scope.urlparms.Sys_id);
			$scope.events_sub_selected = 'edit';
			//$scope.record.Table = "Posts"
		}

		if($scope.urlparms.Option != null) {
			$scope.events_sub_selected = $scope.urlparms.Option;
		}

		console.log("events being fired");

		$http.get("get_events.php")
		.then(function (response) {
			$scope.events = response.data;
			//console.log($scope.events);
			for(var b in $scope.events) {
				$scope.events[b]['SYS_CREATED_ON'] = new Date($scope.events[b]['SYS_CREATED_ON']).toDateString();
				// $scope.events[b]['SYS_EVENT_DATE'] = new Date($scope.events[b]['SYS_EVENT_DATE']);
				$scope.events[b]['SYS_EVENT_DATE_STRING'] = moment($scope.events[b]['SYS_EVENT_DATE']).format("MMMM Do YYYY");
				$scope.events[b]['SYS_EVENT_DATE'] = new Date($scope.events[b]['SYS_EVENT_DATE']);
				//$scope.events[b]["DESCRIPTION"] = $scope.events[b]["DESCRIPTION"].replace(/(?:\r\n|\r|\n)/g, "&lt;br&rt;");
			}
		});
	}


	$scope.get_sermons = function() {
		{
			$scope.sermons = {"data": {
				"sermons":[
					{
						"year": "2017",
						"title": "Christmas at Crossroads",
						"description": "The Christmas story.  It’s like a Thomas Kinkade holiday snow globe.  Shake it and the snow particles gently float in the air. <br> It’s so blissful.  So idyllic.  You have a shining star.  Barn animals.  A baby cooing in a manger. Guests bearing gifts.  Could it be any more peaceful? <br> OR, could it be any more perplexing?  What’s this story really all about? <br> The Christmas story is actually part of a much bigger story.  A story that explains everything.  A story that changes everything.  A story that we can actually find ourselves in.",
						"watch_link": "#link-to-watch",
						"listen_link": "#link-to-listen",
						"notes_link": "#link-to-notes"
					}
				]
			}
		}
	}
		}

	$scope.get_sermons();

	$scope.reset_query = function() {
		$scope.selected_day = "";
		$scope.selected_category = "";
		$scope.selected_topic = "";
		$scope.selected_type = "";
		$scope.selected_location = "";
		$scope.selected_month = "";
		$scope.query = "";
	}

	$scope.select_group = function(grnum) {
		$scope.group_selected = grnum;
	}

	$scope.select_event = function(evnum) {
		$scope.event_selected = evnum;
	}
	

	$scope.change_header_color = function(newcolor) {
		$scope.headercolor = newcolor;
	}

	$scope.select_day = function(d) {
		$scope.selected_day = d;
		console.log(d);
	}

	$scope.select_month = function(d) {
		$scope.selected_month = d;
	}

	$scope.select_cat = function(c) {
		$scope.selected_category = c;
		console.log(c);
	}

	$scope.select_type = function(t) {
		$scope.selected_type = t;
		console.log(t);
	}

	$scope.select_topic = function(t) {
		$scope.selected_topic = t;
		console.log(t);
	}

	$scope.select_location = function(l) {
		$scope.selected_location = l;
		console.log(l);
	}



	$scope.show_content_preview = function() {
		$scope.big_tile = "/img/alt_big_tile.png"
	}

	$scope.hide_content_preview = function() {
		$scope.big_tile = $scope.default_big_tile;
	}

	$scope.expand_group = function(gr) {
		var index = $scope.groups.indexOf(gr);
		gr.listplacement = index;
		if(!$scope.is_group_selected) {
			$scope.is_group_selected = true;
			$scope.icon = "minus";
		}
		else if ($scope.is_group_selected) {
			$scope.is_group_selected = false;
			$scope.icon = "plus";
		}
		$scope.select_group(index);
	}

	$scope.expand_event = function(ev) {
		var index = $scope.events.indexOf(ev);
		ev.listplacement = index;
		if(!$scope.is_event_selected) {
			$scope.is_event_selected = true;
			$scope.icon = "minus";
		}
		else if ($scope.is_event_selected) {
			$scope.is_event_selected = false;
			$scope.icon = "plus";
		}
		$scope.select_event(index);
	}

	$scope.goto_page = function(page) {
  		window.location.href = page;
  	}

	$scope.get_groups();
	$scope.get_events();

	$scope.locations = [{
		"name":"WOODBURY",
		"value":"woodbury"},
		{
		"name":"EAGAN",
		"value":"eagan"}];

	$scope.locations_bottom = [{
		"name":"COTTAGE GROVE",
		"value":"cottagegrove"},
		{
			"name":"HASTINGS",
			"value":"hastings"
		}];

	$scope.locations_blaine = [{
		"displayname":"OTHER",
		"name":"OTHER",
		"value":"other"
	}];

	$scope.locations_events = [{
		"displayname":"OFFSITE",
		"name":"OFFSITE",
		"value":"offsite"
	}];

	$scope.event_categories_top = [
		{
			"name": "KIDS",
			"value": "kids"
		},
		{ 
			"name" : "YOUTH", 
			"value": "youth"
		},
		{ 
			"name" : "WORSHIP", 
			"value": "worship"
		}
	]

	$scope.event_categories_bottom = [
		{
			"name": "ADULTS",
			"value": "adults"
		},
		{ 
			"name" : "MISSION", 
			"value": "mission"
		},
		{ 
			"name" : "YOUNG ADULTS", 
			"value": "youngadults"
		}
	]

	$scope.group_cat_top = [
		{
			"name": "YOUNG ADULT",
			"value": "youngadult"
		},
		{ 
			"name" : "WOMEN", 
			"value": "women"
		}
	];
	$scope.group_cat_mid = [
		{
			"name": "MEN",
			"value": "men"
		},
		{ 
			"name" : "COUPLES", 
			"value": "couples"
		}
	];
	$scope.group_topic_one = [group_topics[0], group_topics[1]];
	$scope.group_topic_two = [group_topics[2], group_topics[3]];
	$scope.group_topic_three = [group_topics[4], group_topics[5]];
	$scope.group_topic_four = [group_topics[6]];
	$scope.group_type_top = [		
		{
			"name": "ZOOM",
			"value": "zoom"
		},
		{ 
			"name" : "OUTSIDE", 
			"value": "outside"
		}
	];
	$scope.group_type_bottom = [
		{
			"name": "INSIDE",
			"value": "inside"
		}
	];
	$scope.days_of_week = [{
		"name":"MON",
		"value":"Monday"
	},
	{
		"name":"TUE",
		"value":"Tuesday"
	},
	{
		"name":"WED",
		"value":"Wednesday"
	},
	{
		"name":"THU",
		"value":"Thursday"
	}];

	$scope.days_of_weekend = [	{
		"name":"FRI",
		"value":"Friday"
	},
	{
		"name":"SAT",
		"value":"Saturday"
	},
	{
		"name":"SUN",
		"value":"Sunday"
	}];

	$scope.quarter_one = [
		{
			"name": "JAN",
			"value": "January"
		},
		{
			"name": "FEB",
			"value": "February"
		},
		{
			"name": "MAR",
			"value": "March"
		}
	];

	$scope.quarter_two = [
		{
			"name": "APR",
			"value": "April"
		},
		{
			"name": "MAY",
			"value": "May"
		},
		{
			"name": "JUN",
			"value": "June"
		}
	];

	$scope.quarter_three = [
		{
			"name": "JUL",
			"value": "July"
		},
		{
			"name": "AUG",
			"value": "August"
		},
		{
			"name": "SEP",
			"value": "September"
		}
	];

	$scope.quarter_four = [
		{
			"name": "OCT",
			"value": "October"
		},
		{
			"name": "NOV",
			"value": "November"
		},
		{
			"name": "DEC",
			"value": "December"
		}
	];

	$scope.this_year = new Date().getFullYear().toString();

	$scope.event_category_filter = function(evt) {
		if ($scope.selected_category == "") { 
			return true;
		}
		else {
			return evt.CATEGORY.toLowerCase().replace(/\s+/g, '') == $scope.selected_category.value.toLowerCase();
		}
	}

	$scope.group_category_filter = function(grp) {
		if ($scope.selected_category == "") { 
			return true;
		}
		else {
			return grp.CATEGORY.toLowerCase().replace(/\s+/g, '') == $scope.selected_category.value.toLowerCase();
		}
	}

	$scope.group_type_filter = function(grp) {
		if ($scope.selected_type == "") { 
			return true;
		}
		else {
			return grp.GROUP_TYPE.toLowerCase().replace(/\s+/g, '') == $scope.selected_type.value.toLowerCase();
		}
	}

	$scope.group_topic_filter = function(grp) {
		if ($scope.selected_topic == "") {
			return true;
		}
		else {
			return grp.TOPIC.toLowerCase().replace(/\s+/g, '') == $scope.selected_topic.value.toLowerCase();
		}
	}
});

app.filter('yesorno_filter', function() {
	return function(value) {
		if ((value) && value > 0) return 'Yes';
		return 'No';
	}
})

app.filter('topic_friendlyname_filter', function() {
	return function(value) {
		if (!value) {
			return '';
		}
		switch (value.toLowerCase().trim()) {
			case 'care':
				return 'Care';
			case 'sermon':
				return 'Sermon Rewind';
			case 'promise':
				return 'Promise Principle';
			case 'grace':
				return 'The Grace of God';
			case 'spider':
				return 'Kill the Spider';
			case 'fan':
				return 'Not a Fan';
			case 'bridge':
				return 'Be the Bridge';
			default:
				return '';
		}
	}
})