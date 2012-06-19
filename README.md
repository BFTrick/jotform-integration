jotform-integration
===================

JotForm Integration is a Wordpress Plugin that helps the user include forms from JotForm.

Installation
-------------------

To install this plugin all you have to do is download it, extract it in your wp-content/plugins/ directory in your side folder, and then activate it in the Plugins section of the WordPress admin.

Usage
-------------------

To use JotForm Integration all you have to do is include a [jotform id=XXXXXXXXXXXXXX] shortcode in a page or post where you want the form to appear. Replace the XXXXXXXXXXXXXX with your form's ID.

Your forms ID can be found in the Form URL field when you preview your form. It should look something like this:
http://form.jotform.us/form/##############

If you don't include an ID in your short code the plugin will kick back an error but it will not display an error if you enter the wrong ID. That is something this plugin can't control.