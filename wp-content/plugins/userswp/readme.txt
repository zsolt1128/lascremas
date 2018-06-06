=== UsersWP - User Profile & Registration ===
Contributors: stiofansisland, paoltaia, ayecode, ismiaini
Donate link: https://userswp.io/
Tags: community, member, membership, user profile, user registration, login form, registration form, users directory
Requires at least: 3.1
Tested up to: 4.9
Stable tag: 1.0.15
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Light weight frontend user registration and login plugin.

== Description ==

= The only lightweight user profile plugin for WordPress. UsersWP features front end user profile, users directory, a registration and a login form. =

While BuddyPress, Ultimate Member, Profile Builder and similar plugins are excellent, we wanted to create something much lighter and simpler to use.

Something that could be gentle on your server resources. With less options to make it easy to setup, more hooks to make it infinitely extensible.

Today UsersWP is by far the simplest solution available to manage users on WordPress. It takes seconds to setup, it is super fast and it's perfect to create a community of users within your website.

= FEATURES =

* Drag and Drop profile builder with all kind of user profile custom fields.
* Shortcode for the Login form
* Shortcode for the Registration form
* Shortcode for the Edit Account form
* Shortcode for the Users Directory
* Shortcode for the User profile
* Shortcode for the Password Recovery form
* Shortcode for the Change Password form
* Shortcode for the Reset Password form
* Custom menu items like login/logout links and links to relevant pages.

After activation all pages are created with the correct shortcodes so that you are good to go in seconds.

= User Profile =

The user profile features a cover image, an avatar and an optional tabbed menu showing :

* User's posts
* User's comments
* Custom fields (if any)

You can chose if you want to hide any section of it and where to show the custom fields. In a sidebar or in their own tab.

Otherwise just customize the templates as you wish within your child theme.

= Free Add-ons =

We provide some free extensions:

[Social Login](https://userswp.io/downloads/social-login/)
[ReCAPTCHA](https://userswp.io/downloads/recaptcha/)

= Premium Add-ons =

UsersWP can be extended with several add-ons. Few examples are:
* [~~GeoDirectory~~](https://userswp.io/downloads/geodirectory/) - NOW BUILT IN TO CORE - Create a tab for each listing type submitted, reviews and favorite listings.
* [Woocommerce](https://userswp.io/downloads/woocommerce/) - Connect WooCommerce with UsersWP, display orders and reviews in user profile pages.
* [bbPress](https://userswp.io/downloads/bbpress-2/) - Connect bbPress with UsersWP, display forum interactions in user profile pages.
* [Easy Digital Downloads](https://userswp.io/downloads/easy-digital-downloads/) - Display “Downloads” and “Purchases” tab in user profile pages.
* [WP Job Manager](https://userswp.io/downloads/wp-job-manager/) - Connects WP Job Manager with UsersWP, display Jobs tab in user profile pages.
* [MailChimp](https://userswp.io/downloads/mailchimp/) - Allows the user to subscribe to your newsletters via Mailchimp during registration.
* [Moderation](https://userswp.io/downloads/moderation/) - Lets you manually approve or reject user signups.
* [Restrict User Signups](https://userswp.io/downloads/restrict-user-signups/) - Restrict usernames and emails or even email domains to prevent spam.
* [myCRED](https://userswp.io/downloads/mycred/) - myCRED add on for UsersWP, earn points and lets users send points.
* [Profile Progress](https://userswp.io/downloads/profile-progress-2/) - Assign %'s and show profile completion progress bar via a widget.
* [Followers](https://userswp.io/downloads/followers/) - Your users can follow each other, just like twitter with this addon.
* [Friends](https://userswp.io/downloads/friends/) - Your users can send and accept friend requests, just like facebook with this addon.
* [Online Users](https://userswp.io/downloads/online-users/) - This addon displays the list of users who are currently online and more.
* [Frontend Post](https://userswp.io/downloads/frontend-post/) - Lets users submit blog post from the frontend.
* [Multisite Creator](https://userswp.io/downloads/multisite-creator/) - Lets your users to create new site for multisite on registration.


There are many others and we release new Add-ons frequently. You can see the full collection here: [UsersWP Premium Add-ons](https://userswp.io/downloads/category/addons/)

Should you find any bug, please report it in the [support forum](https://userswp.io/support/) and we will fix it asap!

UsersWP is 100% translatable.

== Installation ==

= Minimum Requirements =

* WordPress 3.1 or greater

* PHP version 5.2.4 or greater

* MySQL version 5.0 or greater

= Automatic installation =

Automatic installation is the easiest option. To do an automatic install of UsersWP, log in to your WordPress dashboard, navigate to the Plugins menu and click Add New.

In the search field type UsersWP and click Search Plugins. Once you've found our plugin you install it by simply clicking Install Now. [UsersWP installation](https://userswp.io/docs/2017/02/24/userswp-overview/)

= Manual installation =

The manual installation method involves downloading UsersWP and uploading it to your webserver via your favourite FTP application. The WordPress codex will tell you more [here](http://codex.wordpress.org/Managing_Plugins#Manual_Plugin_Installation).

= Updating =

Automatic updates should seamlessly work. We always suggest you backup up your website before performing any automated update to avoid unforeseen problems.

== Frequently Asked Questions ==

No questions so far, but don't hesitate to ask!

== Screenshots ==

1. User Profile Page.
2. Users Directory.
3. Registration Form.
4. Drag and Drop Profile Builder.
5. Login Form.
6. Edit Account Form.

== Changelog ==

= 1.0.15 =
* Fix text domain in privacy message - FIXED
* Fix design issues for login and register forms in widget and shortcode - FIXED

= 1.0.14 =
* Added filter to change the default subtab displayed under listing tab in user profile - ADDED
* Fix escape slashes in content of profile fields - FIXED
* Comment count includes other post types as well - FIXED
* Allows admin to change avatar and banner of other user from backend - CHANGED
* Change settings text from "Dashboard" to "Loginbox" - CHANGED
* Implement widget and gutenberg blocks using super duper class - CHANGED
* Filter to exclude account fields from edit profile fields in admin side - ADDED
* Reviews tab using gravatar when comments are using UsersWP profile - FIXED
* Default avatar showing next to review instead of listing featured image - FIXED
* GDPR Compliance - ADDED
* Login redirect issues for last user page - FIXED

= 1.0.13 =
* Allow to change icon for fieldset while displaying as a profile tab - CHANGED
* Option to exclude user from lists is missing from wp-admin - FIXED
* Change text domains in class geodirectory plugin - FIXED
* Delete user meta on removing from site of multisite network - FIXED
* Add hook to modify the content of forgot password email. - ADDED
* Add Resend Activation Email for users - ADDED
* Reviews should not be displayed for deleted listings - FIXED
* Option to disable default password nag notice - ADDED
* Added WPML compatibility - ADDED
* Style is not proper on pages with shortcode but not assigned in page settings - FIXED
* Filter to force redirect after registration - ADDED

= 1.0.12 =
* Filter added to wp_login_url() to filter change all login urls to the UWP one - CHANGED
* Settings added to change subject & content for Password change notification - CHANGED
* redirect_to REQUEST variable will take priority over UWP page redirects - CHANGED
* Login/register specific notices will only show on their respective locations - CHANGED
* Icon url in custom field icon does not working - FIXED
* Merge UWP GeoDirectory functionality into UWP core - CHANGED
* First/Last name fields breaks the design if labels are displayed in forms - FIXED
* Old avatar/banner file should be removed on a new avatar/banner upload - CHANGED
* after login it should redirect to prev page - FIXED
* Add default image options - FIXED
* Conflict with Google Captcha plugin. - FIXED
* Use site specific dummy user passwords - CHANGED

= 1.0.11 =
* Some emails have an extra opening p tag - FIXED
* WP 4.8.3 can cause Edit profile page to not display all fields - FIXED

= 1.0.10 =
* Default value can now be used to set the default country by setting the the two letter country code, example "de" - ADDED
* Fatal error: Class ‘UsersWP_Meta’ not found in new installation - FIXED

= 1.0.9 =
* Upgrade function changed to run on version change and not on activation hook only - FIXED

= 1.0.8 =
* For admin use option added - ADDED
* Username label changed to "Username or Email" - CHANGED
* New email notification tags breaks reset and activate keys - FIXED
* Profile image change popup can sometimes be hidden or not clickable - FIXED
* uwp_form_input_field_xxx filter added - ADDED

= 1.0.7 =
* Edit user in wp-admin does not display country input correctly - FIXED
* Tools page added - ADDED
* Major code refactoring - CHANGED
* Class names renamed from Users_WP to UsersWP for better naming and consistency - CHANGED
* Email links are displayed as plain text - FIXED
* Login widget redirects to current page - ADDED
* Register admin notification setting - ADDED
* File Preview Not working properly - FIXED
* Font awesome icon displayed instead of count 1 for custom field "display as tab" - CHANGED
* Updates not creating the new table columns - FIXED
* Fieldset with its fields can be displayed in own profile tab - ADDED
* Url field value not getting printed in more info tab - FIXED
* Bio not displaying correctly - FIXED
* User bio slashes contains duplicate slashes - FIXED
* User privacy settings not working correctly - FIXED
* Email notifications code refactored to override via hooks - CHANGED
* Email error logs now contains full error in json format - ADDED
* Extra tags added for forgot and activate mails - ADDED
* Register widget - ADDED
* WPML compatibility - ADDED
* Display confirm password and confirm email fields only on register form - CHANGED
* Avatar breaks when social login profile url used - FIXED
* Facebook profile image can break profile image - FIXED
* Some profile page CSS changes - CHANGED

= 1.0.6 =
* First release on WordPress.org - :)
* Checks profile tabs array is unique before saving - ADDED
* fade and show class renamed to avoid conflict with other themes - CHANGED
* Chosen select inputs on form builder CSS issue, too thin - FIXED

= 1.0.4 =
* PHP < 5.5 compatibility changes - FIXED

= 1.0.3 =
* Added callback to show info type setting - ADDED
* Profile tabs now appear in the order they are added - CHANGED

= 1.0.1 =
* First beta release.

= 1.0.0 =
* First alpha release.

== Upgrade Notice ==

TBA