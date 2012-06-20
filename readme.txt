=== Plugin Name ===
Contributors: BFTrick
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=56EDEHK9PMWWC
Tags: jotform, form, jot
Requires at least: 3.0
Tested up to: 3.4
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

JotForm Integration is a Wordpress Plugin that helps the user include forms from JotForm.


== Description ==

JotForm Integration is a Wordpress Plugin that helps the user include forms from [JotForm](http://www.jotform.com/). Before you use this you will obviously need to create a form in JotForm. After including the `[jotform]` shortcode you should be able to continue to make changes to JotForm and have them mirrored on your site. Now you (the web dude) don't have to make simple form edits. You can pass that off to the client.

If you have any suggestions for improvements please go to the [GitHub page](https://github.com/BFTrick/jotform-integration) and create some feature improvements.


== Installation ==

This section describes how to install the plugin and get it working.

1. Upload `jotform-integration.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Place the `[jotform id=XXXXXXXXXXXXXX]` short code in your pages or posts. Replace the XXXXXXXXXXXXXX with your form's ID.


== Frequently Asked Questions ==

= How do I get my JotForm form ID? =

Your JotForm form ID can be found in the 'Form URL' field when you preview your form. It should look something like this:
http://form.jotform.us/form/############## . Just copy and paste the numbers.

= I'm getting an error "JotForm Integration Error - missing form ID". What do I do? =

Don't forget to include your JotForm form ID in the shortcode tag `[jotform id=XXXXXXXXXXXXXX]`.

= I don't see anything happening. What's going on? =

Are you sure you have the right form ID? If you have the wrong ID there won't be an error message it will just be empty. Sorry, that is just how JotForm works. Nothing I can do about that.

= I made changes to my JotForm and the changes aren't mirrored on my site. What's going on? =

Your browser might be caching the JavaScript that pulls in the iframe. What you can do is append a query string to your form ID. So instead of entering `[jotform id=12345]` you could enter `[jotform id=12345?update-2012-06-19]`. The query string can be anything. As long as it is different from the previous query string your browser wont pull the cached copy.


== Changelog ==

= 1.0 =
* Initial upload.
