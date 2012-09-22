=== Plugin Name ===
Contributors: BFTrick
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=56EDEHK9PMWWC
Tags: jotform, form, jot, widget, shortcode
Requires at least: 3.0
Tested up to: 3.4
Stable tag: 1.1.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

JotForm Integration is a Wordpress Plugin that helps the user include forms from JotForm.


== Description ==

JotForm Integration is a Wordpress Plugin that helps the user include forms from [JotForm](http://www.jotform.com/). Now you, the web dude, don't have to make simple form edits. You can give the client the JotForm credentials and let them go wild.

Before you can add a JotForm to your site you will obviously need to create a form in JotForm! After including the `[jotform]` shortcode you should be able to continue to make changes to JotForm and have them mirrored on your site. If you don't plan on making many changes you can turn on caching in the options panel.

As of version 1.1.0 there is now a widget available for you to use. Simply add the JotForm widget to the sidebar, enter the form ID and bingo, bango, bongo, you're done. Watch the magic happen.

If you have any suggestions for improvements please go to the [GitHub page](https://github.com/BFTrick/jotform-integration) and create some issues. You can even edit the code yourself and submit a pull request. :)


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

= Can I put a JotForm in a sidebar? =

Yes, I added a widget in version 1.1.0. You should be able to go to appearance > widgets page in the WordPress backend and select the JotForm widget from the list. Enter your form ID number in the field provided and let the plugin handle the rest. 

= Widgets confuse me, can't I just put the shortcode into a widget? =

No, WordPress has the option turned off by default.

= Ok, so I put the form in the sidebar but it looks terrible. Is there anything you can do to fix it? =

Not a thing. The form is pulled in with an iframe meaning that I can't touch the CSS inside the iframe. You will have to modify your form (try top aligned labels instead of left aligned labels) or your template to get it to fit. The other thing you can do is not put the form in the sidebar. :)

= I made changes to my JotForm and the changes aren't mirrored on my site. What's going on? =

Your browser might be caching the JavaScript that pulls in the iframe. Make sure you have the `cache form` option turned off in the options panel.

If that still isn't working you can append a query string to your form ID. So instead of entering `[jotform id=12345]` you could enter `[jotform id=12345?update-2012-06-19]`. The query string can be anything. As long as it is different from the previous query string your browser wont pull the cached copy.

== Screenshots ==

1. The Jotform shortcode being used on the edit page screen of the WordPress backend.
2. The Jotform widget.
3. The Jotform output on the sample page from a fresh WordPress install.

== Changelog ==

= 1.1.2 =
* Adding WordPress Assets

= 1.1.1 =
* Updated readme file (whoops! =D)

= 1.1.0 =
* Added widget

= 1.0.1 =
* Added options panel.
* Added caching option.

= 1.0.0 =
* Initial upload.