<?php

function widget_mou_link($links, $file)
{
    if($file == plugin_basename(__FILE__))
    {
        $widget_mou_link = '<a href="https://www.paypal.me/pirmax/5" target="_blank">Faire un don Paypal</a>';
        $links[] = $widget_mou_link;
        $widget_mou_link = '<a href="https://wordpress.org/support/view/plugin-reviews/minecraft-onlineusers-widget" target="_blank">Voter pour ce plugin</a>';
        $links[] = $widget_mou_link;
    }
    return $links;
}

add_filter('plugin_row_meta', 'widget_mou_link', 10, 2);

?>
