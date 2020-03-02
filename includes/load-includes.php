<?php
/**
 * Loads the various components.
 *
 * @package      BrubakerDesignServices\EvangelistsToolbox
 * @author       Dan Brubaker
 * @since        1.0.0
 */

require_once __DIR__ . '/setup.php';
require_once __DIR__ . '/helpers.php';
require_once __DIR__ . '/partials/index.php';
require_once __DIR__ . '/wordpress/posts-rss-feed.php';
require_once __DIR__ . '/event-organiser/general.php';
require_once __DIR__ . '/event-organiser/google-maps.php';
require_once __DIR__ . '/event-organiser/calendar-feed.php';
require_once __DIR__ . '/event-organiser/events-rss-feed.php';
require_once __DIR__ . '/event-organiser/custom-fields.php';
require_once __DIR__ . '/notifications/general.php';
