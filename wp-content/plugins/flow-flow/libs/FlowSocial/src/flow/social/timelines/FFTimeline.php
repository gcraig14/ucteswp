<?php namespace flow\social\timelines;
if ( ! defined( 'WPINC' ) ) die;
/**
 * Flow-Flow.
 *
 * @package   FlowFlow
 * @author    Looks Awesome <email@looks-awesome.com>

 * @link      http://looks-awesome.com
 * @copyright Looks Awesome
 */
interface FFTimeline {
	public function init($twitter, $feed);
	public function getUrl();
	public function getField();
}