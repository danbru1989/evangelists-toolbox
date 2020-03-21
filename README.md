# The Evangelists Toolbox

This is a WordPress plugin that provides itinerate evangelists with some tools and integrations for their websites.


## Plugin Dependancies
1. Advanced Custom Fields
2. Event Organiser
3. Notifications
4. Notifications – Conditional Logic
5. Notifications – Scheduled Triggers


## Features

1. Allows Event Organiser to have venues with the same name.
2. Creates a Travel News "widget" for use in theme developement.
3. Hides unneeded Event Organiser admin fields.
4. Filters iCal feed to add more itinerary details to each event.
5. Filters the event custom post type RSS feed to add dates, city, state, and proper formatting.
6. Adds featured images to the main post RSS feed.
7. Plenty of built-in hooks and filters for extending Evangelists Toolbox – see below.


## Hooks & Filters

### Hooks

#### bdset_before_travel_news_loop
Hooks before the Travel News event loop for adding markup.

#### bdset_after_travel_news_loop
Hooks after the Travel News event loop for adding markup.

#### bdset_before_travel_news_while
Hooks before the Travel News event loop while statement for adding markup before the loop.

#### bdset_after_travel_news_while
Hooks after the Travel News event loop while statement for adding markup after the loop.

#### bdset_before_travel_news_content
Hooks before the Travel News event for adding markup on the post content.

#### bdset_after_travel_news_content
Hooks after the Travel News event for adding markup on the post content.

### Filters

#### bdset_ical_contact_info
Filters the output of the Contact Info section in iCal feed event description.

#### bdset_ical_ministry_info
Filters the output of the Ministry Info section in iCal feed event description.

#### bdset_ical_lodging_info
Filters the output of the Lodging Info section in iCal feed event description.

#### bdset_ical_travel_info
Filters the output of the Travel Info section in iCal feed event description.

#### bdset_ical_other_notes_info
Filters the output of the Other Notes Info section in iCal feed event description.

#### bdset_map_options
Filters the global Google Map options.

#### bdset_map_styles
Filters the global Google Map styles. Visit https://mapstyle.withgoogle.com to create your own.

#### bdset_modify_rss_featured_image_size
Allows for modifying the featured image size.

#### bdset_modify_rss_featured_image_dimensions
Filters the featured image height and width.

#### change_pending_output
Filters the standard "pending" text output.

#### change_admin_pending_output
Filters the standard "pending" text output in the admin.

## Change Log
2.1.1 – Fixed calendar event title to accomodate "PENDING" status.

2.1.0 – Added settings page and options for default event status and Google Map zoom.

2.0.0 – Added itinerary output function. Tweaked pending system. Added "More Event Details" custom fields.

1.5.2 – Fixed iCal event titles with messed up characters.

1.5.1 – Fixed and improved iCal feeds. Improved map styles.

1.5.0 – Added Notifications plugin support.

1.4.2 – Forces "Future" events to show by default on the All Events admin page.

1.4.1 – Only allowed "public" events to be visible across the site, except for the itinerary page.

1.4.0 - Added featured images to RSS feeds.

1.3.1 – Added fix to only allow "public" events into the RSS feed.

1.3.0 – Added proper event RSS formatting.

1.2.0 – Added map filters and updated documentation.

1.1.0 – Added iCal filters.

1.0.0 – Ititial launch.
