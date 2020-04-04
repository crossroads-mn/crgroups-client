<?php
?>

<div ng-show="selected=='home'">
<!-- Alex put code here for home page -->
<?php
	include "home.php";
?>


<div ng-show="selected=='groups'" class="groups">
	<?php
		include "groups.php";
		?>
</div>