<?php
	include 'header.php';
?>
  <link rel="stylesheet" href="css/eventstyle.css">

<header>
<div class="header-wrapper" style="background-color: \\\headercolor\\\">
	<div layout="row" class="header-items" style="background-color: #FD9C45;" ng-cloak layout-align="center center">
	        <!--<a href="/index.php">
	            <img style="margin-left: 15px; margin-top: 10px; height:40px; margin-bottom: 2px"  src="/app/img/Back Arrow.png" alt="Crossroads Church" ng-click="selected='dashboard'" class="header-logo">
	        </a>-->

	        <a href="http://cr.life"><img style="text-align: center; padding: 8px; background-color: #FD9C45" src="/app/img/cr_logo_white_horiz.png" height="60px;"></a>
	</div>
    	<h1 align="center">CROSSROADS GROUPS</h1>
</div>
</header>

<style>
#\\\selected_month.value\\\ {
	background: #FD9C45;
	color: white;
}

#\\\selected_location.value\\\ {
	background: #FD9C45;
	color: white;
}

#\\\selected_category\\\ {
	background: #FD9C45;
	color: white;
}


</style>

<div layout="column" width="100%">
	<img class="choose-community" src="/app/img/Events_Page.jpg">
	<div class="full-width-bar"></div>
</div>

<div class="get-involved" layout="column" width="100%">
	<h3>See upcoming Events</h3>
</div>

<div layout-flex layout="row">
	<div class="sidebar" flex="30">
		<md-card>
		<input name="header_search" placeholder="search events" value="search" type="text" style="color: #666666;" id="header_search" ng-model="query">
	</md-card>



<md-card class="months-header">
	<md-card-title-text><h2>MONTHS</h2></md-card-title-text>
</md-card>

<div layout="column">
	<div layout="row">
		<md-card id="\\\a.value\\\" ng-click="select_month(a)" ng-repeat="a in quarter_one">
			<h4 class="days">\\\a.name\\\</h4>
		</md-card>
	</div>
	<div layout="row">
		<md-card id="\\\b.value\\\" ng-click="select_month(b)" ng-repeat="b in quarter_two">
			<h4 class="days">\\\b.name\\\</h4>
		</md-card>
	</div>
	<div layout="row">
		<md-card id="\\\c.value\\\" ng-click="select_month(c)" ng-repeat="c in quarter_three">
			<h4 class="days">\\\c.name\\\</h4>
		</md-card>
	</div>
		<div layout="row">
		<md-card id="\\\d.value\\\" ng-click="select_month(d)" ng-repeat="d in quarter_four">
			<h4 class="days">\\\d.name\\\</h4>
		</md-card>
	</div>
</div>




<md-card class="location-header">
	<md-card-title-text><h2>CAMPUS</h2></md-card-title-text>
</md-card>

<div layout="column">
	<div layout="row">
		<md-card id="\\\l.value\\\" ng-click="select_location(l)" ng-repeat="l in locations">
			<h4 class="locations">\\\l.name\\\</h4>
		</md-card>
	</div>
	<div layout="row">
		<md-card id="\\\b.value\\\" ng-click="select_location(b)" ng-repeat="b in locations_bottom">
			<h4 class="locations">\\\b.name\\\</h4>
		</md-card>
	</div>
	<div layout="row">
		<md-card id="\\\catss.value\\\" ng-click="select_location(catss)" ng-repeat="catss in locations_events">
			<h4 class="locations">\\\catss.name\\\</h4>
		</md-card>
	</div>
</div>

<md-card class="category-header">
	<md-card-title-text><h2>CATEGORY</h2></md-card-title-text>
</md-card>

<div layout="column">
	<div layout="row">
		<md-card id="\\\cat\\\" ng-click="select_cat(cat)" ng-repeat="cat in categories_top">
			<h4 class="cats" >\\\cat\\\</h4>
		</md-card>
	</div>
	<div layout="row">
		<md-card id="\\\c\\\" ng-click="select_cat(c)" ng-repeat="c in categories_bottom">
			<h4 class="cats">\\\c\\\</h4>
		</md-card>
	</div>
</div>

<md-button ng-click="reset_query()" id="reset-button" class="md-warn md-raised" layout-align="middle middle">
	<h3>RESET</h3>
</md-button>


</div>

<div class="event-content" flex="70">
	<md-card style="width: 100%; background-color: #FD9C45">
		<md-card-title-text class="yourevents" style="text-align: center; color: white; font-size: 32px">
			Upcoming Events
		</md-card-title-text>
	</md-card>
	<md-card ng-repeat="event in events | orderBy: 'SYS_EVENT_DATE' | filter:query | filter:{SYS_EVENT_DATE: selected_month.name} | filter:{LOCATION: selected_location.name} | filter:{CATEGORY: selected_category} | filter:{ACTIVE: '1'}" class="eventcards">
		<md-card-title-text>
			<h4 ng-if="events.indexOf(event)!=event_selected || !is_event_selected"><i ng-click="expand_event(event)" class="fa fa-plus" aria-hidden="true"></i>&nbsp;\\\event.TITLE\\\ - \\\event.SYS_EVENT_DATE_STRING\\\</h4>
			<h4 ng-if="is_event_selected && events.indexOf(event)==event_selected"><i ng-click="expand_event(event)" class="fa fa-minus" aria-hidden="true"></i>&nbsp;\\\event.TITLE\\\</h4>

		</md-card-title-text>
		<md-card-content ng-show="is_event_selected && events.indexOf(event)==event_selected">
			<div class="inside-card">
				<h4><strong>When is the Event: </strong> \\\events[event_selected].SYS_EVENT_DATE_STRING\\\</h4>
				<h4><strong>Time of Event: </strong> \\\events[event_selected].START_TIME\\\ - \\\events[event_selected].END_TIME\\\</h4>
				<h4><strong>Event Location: </strong> \\\events[event_selected].LOCATION\\\</h4>
				<h4><strong>Event Description:</strong></h4>
				<p style="font-family: inherit; white-space: pre-wrap;">\\\events[event_selected].DESCRIPTION\\\</p>
				<h4><strong>Contact Email</strong> <a href="mailto:\\\events[event_selected].CONTACT_EMAIL\\\">\\\events[event_selected].CONTACT_EMAIL\\\</a>
				</h4>
				<h4 ng-hide="events[event_selected].COST == '' || events[event_selected].COST == '#' "><strong>Cost</strong> \\\events[event_selected].COST\\\
				</h4>
				<h4 ng-hide="events[event_selected].CHILDCARE_LINK == '' || events[event_selected].CHILDCARE_LINK == '#' "><strong>Childcare Link</strong><a href="\\\events[event_selected].CHILDCARE_LINK\\\">\\\events[event_selected].CHILDCARE_LINK\\\</a>
				</h4>
				
				<md-button ng-hide="events[event_selected].REGISTRATION_LINK == '' || events[event_selected].REGISTRATION_LINK == '#' " id="sign-up" layout-align="center center" class="md-primary md-raised" ng-href="\\\events[event_selected].REGISTRATION_LINK\\\" target="_blank">REGISTER</md-button>
			</div>
		</md-card-content>
	</md-card>

</div>
</div>