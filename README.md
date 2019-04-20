# The Evangelists Toolbox

This is a WordPress plugin that provides itinerate evangelists with some tools and integrations for their websites.


## Features

1. Allows Event Organiser to have venues with the same name.
2. Creates a Travel News "widget" for use in theme developement.
3. Hides unneeded Event Organiser admin fields.
4. Filters iCal feed to add more itinerary details to each event.
5. Filters the event custom post type RSS feed to add dates, city, state, and proper formatting.
6. Plenty of built-in hooks and filters for extending Evangelists Toolbox – see below.

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


## Change Log

1.3.0 – Added proper event RSS formatting.

1.2.0 – Added map filters and updated documentation.

1.1.0 – Added iCal filters.

1.0.0 – Ititial launch.
