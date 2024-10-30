<?php

function widget_mou_action_links($links, $file)
{

	static $this_plugin;

	if(!$this_plugin)
	{
		$this_plugin = plugin_basename(__FILE__);
	}

	if($file == $this_plugin)
	{
		$settings_link = '<a href="https://www.paypal.me/pirmax/5" target="_blank">Faire un don Paypal</a>';
		array_unshift($links, $settings_link);
		// $settings_link = '<a href="https://wordpress.org/support/view/plugin-reviews/minecraft-onlineusers-widget" target="_blank">Voter pour ce plugin</a>';
		// array_unshift($links, $settings_link);
	}

	return $links;

}

add_filter('plugin_action_links', 'widget_mou_action_links', 10, 2 );

?>
