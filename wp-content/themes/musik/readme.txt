Hi!

Please note:
The header image is not shown on archives, pages or single posts, or when the sidebar is hidden.

Copyright 2014-2017 Carolina Nymark
This theme is based on Underscores http://underscores.me/, (C) 2012-2017 Automattic, Inc. License: GNU General Public License v2 or later
and Universal, Joe Dolson. License: GPLv2 or later.

Changelog:

Version: 1.8 2017-12-14
Removed the customizer reset.
Removed the post background color meta box. -This is in preperation for Gutenberg where you are able to select background colors freely.
Removed the logo position options. -If you wish to display your logo in more than one position I recommend the image widget.

Moved the pingback url from header.php to a new function in functions.php.
Removed esc_html() from the widget descriptions.
The content width global has been moved to the musik_setup function and function musik_content_width has been removed.
wp_enqueue_script( 'comment-reply' ); is no longer wrapped in if ( ! is_admin() ).
The 3 dots in function musik_excerpt_more has been changed to a proper &hellip;.
Function musik_body_class, function musik_author, function musik_meta has been moved from customizer.php to functions.php.
Changed the default width to 80, down from 100.
Changed the default position of the background image.

Fixed an issue with a missing singular placeholder in comments.php.
Fixed minor code style issues (missing spaces and similar).
General cleanup of the stylesheet. 
	Minor style changes for buttons.
	Removed duplicate styles.
	Increased the minimum font size to 16px.
Added support for WooCommerce. 
Improved support for Jetpack.
Improved support for selective refresh.
Added starter content.

Version: 1.7 2016-07-10
Added Normalize to the stylesheet.
Removed Genericons.
Removed the breadcrumbs.
Removed the featured image size limitation.
Replaced the logo functionality with the WordPress core custom logo.
Made sure that the sidebars are not printed if they don't contain any widgets.
Made sure that the menu area is empty if no menu is selected. Updated the menu code.
Replaced header- post- and footer divs with their html5 equivalent.
Added micro data.
Updated the theme tags.
Customizer changes:
Added a reset option.
Added an option to adjust the site width.
Added an option to show the posts on the front page as a 3 column grid.
Added an option to show excerpts on blog listing, archives and search.
Moved the meta and breadcrumbs option to a new section called "Post settings".
Added an option to combine pages with your blog listing on the front page:
	You can now choose up to 3 pages that are shown above your blog posts.
Added an option to use an accent color to highlight individual posts. -The color is used on the front page, archives, and search.


Version: 1.6 2015-12-25
Fixed an issue with the header text color.

Version: 1.5 2015-12-17
Improved menu and navigation.
Improved accessibility.
Reduced image sizes and added several music related images that can be used as headers or bakgrounds.
Added a Bredcrumbs customizer section. This option was previously under the old navigation section.


Version: 1.4
Fixed bug with sidebar id's
Added add_theme_support( "title-tag" );
Removed register style

Version: 1.3
Fixed html and css errors.
Added skip link.

Version 1.1
Updated menu and related javascript
Updated background settings
Adjusted the way footer widgets and featured images are displayed 


Folders included in this theme:
images/ -contains images.
languages/ -contains language files.
inc/ -contains the customizer file.
templates/ -contains template files.
js/ -contains javascript files.


All included images are public domain.
The gradients, the guitar headers and the blue and purple microphone photo are made by the theme author.

The other included photos are taken by Antoine Beauvillain:
https://stock.tookapic.com/photos/22792 Antoine Beauvillain
https://stock.tookapic.com/photos/25215 Antoine Beauvillain
(Yes I am aware that Tookapic has since changed their license. The images where added to the theme long before the license change, and you cannot revoke public domain.)

Fonts
Open Sans Condensed is released under Apache License, version 2.0.
Oswald is released under SIL Open Font License, version 1.1.

Javascript
navigation.js from: Underscores http://underscores.me/, (C) 2012-2015 Automattic, Inc. License: GNU General Public License v2 or later

If you have any questions or suggestions for this theme please contact me on the theme support page, http://wordpress.org/support/theme/musik.



Musik is the Swedish word or spelling for Music