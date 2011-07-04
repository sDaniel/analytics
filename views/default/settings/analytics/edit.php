<?php
	/**
	* Google Analytics settings configuration.
	* 
	* @package analytics
	* @author ColdTrick IT Solutions
	* @copyright ColdTrick IT Solutions 2009
	* @link http://www.coldtrick.com/
	*/

	global $CONFIG;
	
	$trackID = $vars['entity']->analyticsSiteID;
	$domain = $vars['entity']->analyticsDomain;
	$actions = $vars['entity']->trackActions;
	$events = $vars['entity']->trackEvents;
	
	$host = $_SERVER['HTTP_HOST'];
	$hostArray = explode(".", $host);
	$host = "";
	for($i = 1; $i < count($hostArray); $i++){
		$host .= "." . $hostArray[$i];
	}
	
	if($domain != $host){
		$sample = true;
	}
?>
<div>
	<div><?php echo elgg_echo("analytics:settings:trackid"); ?></div>
	<input type="text" id="analyticsSiteID" name="params[analyticsSiteID]" value="<?php echo $trackID; ?>" maxlength="15" />
</div>

<div>
	<div><?php echo elgg_echo("analytics:settings:domain"); ?></div>
	<input type="text" id="analyticsDomain" name="params[analyticsDomain]" value="<?php echo $domain; ?>" /> 
	<?php if($sample){ 
		echo sprintf(elgg_echo("analytics:settings:domain:sample"), $host); 
	} ?>
</div>

<div>
	<span><?php echo elgg_echo("analytics:settings:track_actions"); ?></span>
	<select name="params[trackActions]">
		<option value="no" <?php if($actions != "yes") echo "selected='selected'"; ?>><?php echo elgg_echo("option:no"); ?></option>
		<option value="yes" <?php if($actions == "yes") echo "selected='selected'"; ?>><?php echo elgg_echo("option:yes"); ?></option>
	</select>
</div>

<div>
	<span><?php echo elgg_echo("analytics:settings:track_events"); ?></span>
	<select name="params[trackEvents]">
		<option value="no" <?php if($events != "yes") echo "selected='selected'"; ?>><?php echo elgg_echo("option:no"); ?></option>
		<option value="yes" <?php if($events == "yes") echo "selected='selected'"; ?>><?php echo elgg_echo("option:yes"); ?></option>
	</select>
</div>