<?php
	/**
	* Google Analytics startup file.
	* 
	* @package analytics
	* @author ColdTrick IT Solutions
	* @copyright ColdTrick IT Solutions 2009
	* @link http://www.coldtrick.com/
	*/

	require_once(dirname(__FILE__) . "/lib/functions.php");

	function analytics_init()	{
		
		if(function_exists("elgg_extend_view")){
			elgg_extend_view("metatags", "analytics/metatags", 999);
		} else {
			extend_view("metatags", "analytics/metatags", 999);
		}
	}
	
	function analytics_action_plugin_hook($hook, $type, $returnvalue, $params){
		if(get_plugin_setting("trackActions", "analytics") == "yes"){
			register_shutdown_function("analytics_track_action", $type);
		}
	}
	
	function analytics_event_tracker($event, $object_type, $object){
		if(!empty($object) && $object instanceof ElggEntity){
			if(get_plugin_setting("trackEvents", "analytics") == "yes"){
				switch($object->type){
					case "object":
						analytics_track_event($object->getSubtype(), $event, $object->title, $object->getGUID());
						break;
					case "group":
						analytics_track_event($object->type, $event, $object->name, $object->getGUID());
						break;
					case "user":
						analytics_track_event($object->type, $event, $object->name, $object->getGUID());
						break;
				}
			}
		}
	}
	
	// register default elgg event
	register_elgg_event_handler("init", "system", "analytics_init");
	
	// register tracking events
	register_elgg_event_handler("all", "object", "analytics_event_tracker");
	register_elgg_event_handler("all", "group", "analytics_event_tracker");
	register_elgg_event_handler("all", "user", "analytics_event_tracker");
	
	// register plugin hooks
	register_plugin_hook("action", "all", "analytics_action_plugin_hook");
	
?>
