<?php
	/**
	 * Invite users to groups
	 * 
	 * @package ElggGroups
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Marcus Povey
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 */

	require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
	gatekeeper();

	$group_guid = get_input('group_guid');
	$group = get_entity($group_guid);
	$title = elgg_echo("groups:invite");

	$body = elgg_view_title($title);
	
	if (($group) && ($group->canEdit()))
	{	
		$body .= elgg_view("forms/groups/invite", array('entity' => $group));
			 
	} else {
		$body .= elgg_echo("groups:noaccess");
	}
	
	$body = elgg_view_layout('one_column', $body);
	
	page_draw($title, $body);
?>