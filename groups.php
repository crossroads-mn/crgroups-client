<?php
	include 'header.php';
?>

<header>
<div class="header-wrapper" style="background-color: \\\headercolor\\\">
<div layout="row" class="header-items" ng-cloak layout-align="center center">
        <!--<a href="/index.php">
            <img style="margin-left: 15px; margin-top: 10px; height:40px; margin-bottom: 2px"  src="/app/img/Back Arrow.png" alt="Crossroads Church" ng-click="selected='dashboard'" class="header-logo">
        </a>-->

        <a href="http://cr.life"><img style="text-align: center" src="/img/Header.png" height="60px;"></a>
</div>
        <h1 align="center">CROSSROADS GROUPS</h1>
</div>
</header>

<style>
#\\\selected_day.name\\\ {
	background: #062631;
	color: white;
}

#\\\selected_location.value\\\ {
	background: #062631;
	color: white;
}

#\\\selected_category.value\\\ {
	background: #062631;
	color: white;
}

#\\\selected_type.value\\\ {
	background: #062631;
	color: white;
}

#\\\selected_topic.value\\\ {
	background: #062631;
	color: white;
}

</style>
<div layout="column" width="100%">
	<img class="choose-community" src="/img/GroupSplash_3x.png">
	<div class="full-width-bar"></div>
</div>

<div ng-hide='!showgroups'>

<div class="get-involved" layout="column" width="100%">
	<h3>Welcome to the Groups registration page!</h3>
<p>
We can’t wait for you to plug into a group! Here are a few tips for navigating this page to find the right group for you:
</p>
<ul>
	<li><p>To learn more about each group, click the plus sign.</p></li>
	<li><p>On the left there are filters: days, locations, category, and meeting type.</p></li>
	<li><p>Feel free to use one or multiple of these filters to easily narrow down your options or take some time to scroll through all of the options.</p></li>
	<li><p>If you use the filter option and want to remove them, simply click the “reset” button on the bottom left.</p></li>
</ul>
<br/>
<div layout-flex layout="row">
	<div class="sidebar" flex="30">
		<md-card>
		<input name="header_search" placeholder="search small groups" value="search" type="text" style="color: #666666;" id="header_search" ng-model="query">
	</md-card>


<md-card class="daysheader">
	<md-card-title-text><h2>DAYS</h2></md-card-title-text>
</md-card>
<div layout="row">
	<md-card ng-click="select_day(days)" id="\\\days.name\\\" ng-repeat="days in days_of_week">
		<h3 class="days">\\\days.name\\\</h3>
	</md-card>
</div>

<div layout="row" >
	<md-card id="\\\weekends.name\\\" ng-click="select_day(weekends)" ng-repeat="weekends in days_of_weekend">
		<h3 class="weekends">\\\weekends.name\\\</h3>
	</md-card>
</div>

<md-card class="location-header">
	<md-card-title-text><h2>LOCATIONS</h2></md-card-title-text>
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
		<md-card id="\\\catss.value\\\" ng-click="select_location(catss)" ng-repeat="catss in locations_blaine">
			<h4 class="locations">\\\catss.name\\\</h4>
		</md-card>
	</div>
</div>

<md-card class="category-header">
	<md-card-title-text><h2>TOPIC</h2></md-card-title-text>
</md-card>

<div layout="column">
	<div layout="row">
		<md-card id="\\\t.value\\\" ng-click="select_topic(t)" ng-repeat="t in group_topic_one">
			<h4 class="topics" >\\\t.name\\\</h4>
		</md-card>
	</div>
	<div layout="row">
		<md-card id="\\\t.value\\\" ng-click="select_topic(t)" ng-repeat="t in group_topic_two">
			<h4 class="topics">\\\t.name\\\</h4>
		</md-card>
	</div>
	<div layout="row">
		<md-card id="\\\t.value\\\" ng-click="select_topic(t)" ng-repeat="t in group_topic_three">
			<h4 class="topics">\\\t.name\\\</h4>
		</md-card>
	</div>
	<div layout="row">
		<md-card id="\\\t.value\\\" ng-click="select_topic(t)" ng-repeat="t in group_topic_four">
			<h4 class="topics">\\\t.name\\\</h4>
		</md-card>
	</div>
</div>

<md-card class="category-header">
	<md-card-title-text><h2>CATEGORY</h2></md-card-title-text>
</md-card>

<div layout="column">
	<div layout="row">
		<md-card id="\\\c.value\\\" ng-click="select_cat(c)" ng-repeat="c in group_cat_top">
			<h4 class="cats" >\\\c.name\\\</h4>
		</md-card>
	</div>
	<div layout="row">
		<md-card id="\\\c.value\\\" ng-click="select_cat(c)" ng-repeat="c in group_cat_mid">
			<h4 class="cats" >\\\c.name\\\</h4>
		</md-card>
	</div>
</div>

<md-card class="category-header">
	<md-card-title-text><h2>MEETING TYPE</h2></md-card-title-text>
</md-card>

<div layout="column">
	<div layout="row">
		<md-card id="\\\t.value\\\" ng-click="select_type(t)" ng-repeat="t in group_type_top">
			<h4 class="types" >\\\t.name\\\</h4>
		</md-card>
	</div>
	<div layout="row">
		<md-card id="\\\t.value\\\" ng-click="select_type(t)" ng-repeat="t in group_type_bottom">
			<h4 class="types">\\\t.name\\\</h4>
		</md-card>
	</div>
</div>

<md-button ng-click="reset_query()" id="reset-button" class="md-warn md-raised" layout-align="middle middle">
	<h3>RESET</h3>
</md-button>


</div>

<div class="group-content" flex="70">
	<md-card style="width: 100%; background-color: #74BDC4">
		<md-card-title-text class="yourgroups" style="text-align: center; color: white; font-size: 32px">
			YOUR GROUPS
		</md-card-title-text>
	</md-card>
	<md-card ng-repeat="group in groups | orderBy:'TITLE' | filter:query | filter:{ACTIVE:'1'} | filter:{MEET_DAY: selected_day.value} | filter:{CAMPUS: selected_location.name} | filter:group_category_filter | filter:group_type_filter | filter:group_topic_filter" class="groupcards">
		<md-card-title-text>
			<h4 ng-if="groups.indexOf(group)!=group_selected || !is_group_selected"><i ng-click="expand_group(group)" class="fa fa-plus" aria-hidden="true"></i>&nbsp;\\\group.TITLE\\\</h4>
			<h4 ng-if="is_group_selected && groups.indexOf(group)==group_selected"><i ng-click="expand_group(group)" class="fa fa-minus" aria-hidden="true"></i>&nbsp;\\\group.TITLE\\\</h4>
		</md-card-title-text>
		<md-card-content ng-show="is_group_selected && groups.indexOf(group)==group_selected">
			<div class="inside-card">
				<h4><strong>Group Description:</strong></h4>
				<p>
			\\\groups[group_selected].DESCRIPTION\\\
				</p>
				<h4><strong>Topic</strong> \\\groups[group_selected].TOPIC | topic_friendlyname_filter\\\</h4>
				<h4><strong>Who Should Attend?</strong> \\\groups[group_selected].TARGET_AUDIENCE\\\</h4>
				<h4><strong>Day the Group Meets?</strong> \\\groups[group_selected].MEET_DAY\\\</h4>
				<h4><strong>Number of Weeks?</strong> \\\groups[group_selected].DURATION\\\</h4>
				<h4><strong>Time Group Starts and Ends?</strong> \\\groups[group_selected].MEET_TIME_START\\\</h4>
				<h4><strong>Leader's Name:</strong> \\\groups[group_selected].LEADER\\\</h4>
				<h4><strong>Email Address:</strong> \\\groups[group_selected].EMAIL\\\</h4>
				<h4><strong>Location Where Group Meets?</strong> \\\groups[group_selected].LOCATION\\\</h4>
				<h4><strong>Cost?</strong> \\\groups[group_selected].COST\\\</h4>
				<h4><strong>Is Childcare Provided? </strong>\\\groups[group_selected].CARE_PROVIDED | yesorno_filter\\\</h4>
				
				<md-button id="sign-up" layout-align="center center" class="md-primary md-raised" ng-href="\\\groups[group_selected].GROUP_LINK\\\" target="_blank">SIGN-UP</md-button>
			</div>
		</md-card-content>
	</md-card>

</div>
</div>
</div>

<div ng-show="!showgroups">
	<div class="get-involved" layout="column" width="100%">
	<h3>SMALL GROUPS COMING SOON!</h3>
<p>Crossroads is planning a great new way to explore small groups. Stay tuned!</p>
</div>