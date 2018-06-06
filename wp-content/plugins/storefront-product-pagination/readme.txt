=== Storefront Product Pagination ===
Contributors: jameskoster, tiagonoronha, automattic
Tags: woocommerce, ecommerce, products, storefront, pagination, next, previous
Requires at least: 4.0.0
Tested up to: 4.9.2
Stable tag: 1.2.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Add unobstrusive links to next/previous products on your WooCommerce single product pages.

== Description ==

A simple plugin that displays next and previous links on single product pages. A product thumbnail is displayed with the title revealed on hover. Products are ordered chronologically and the display can be customised in the Customizer.

This plugin requires both the WooCommerce eCommerce plugin and the Storefront theme to be installed.

== Installation ==

1. Upload `storefront-product-pagination` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Configure the display in the Customizer (look for the 'Product Pagination' section).
3. Done!

== Frequently Asked Questions ==

= I installed the plugin but cannot see the links =

First of all it's important to note that this plugin requires that <a href="https://wordpress.org/plugins/woocommerce/">WooCommerce</a> be installed, and that you use the <a href="https://wordpress.org/themes/storefront/">Storefront</a> theme.

The links will appear on any single product page, providing there is more than one product at your store.

== Screenshots ==

1. The product pagination.

== Changelog ==


= 1.2.3 - 01.29.2018 =
* Fix - Replaced wrong text domains. Correct text domain is `storefront-product-pagination`.

= 1.2.2 - 10.27.2017 =
* Fix - Odd content scrolling behaviour when clicking inline reviews link.

= 1.2.1 - 02.07.2017 =
* Fix - Errors when no next/previous product exists.

= 1.2.0 - 01.25.2017 =
* New - Design tweaks.
* Fix - Thumbnails when displaying next/prev products from the same category.
* Fix - Don't display hidden products in next/prev links.

= 1.1.3 - 09.09.2016 =
* Fix - Typo in the pagination background color setting.

= 1.1.2 - 08.17.2016 =
* Fix - Deprecated function notice.

= 1.1.1 - 06.23.2015 =
* Fix - Storefront install prompt no longer installs a child theme.

= 1.1.0 - 05.15.2015 =
* New - It's now possible to only display links to products that share categories with the one being viewed.
* Fix - Some animation flicker bugs.

= 1.0.1 - 04.27.2015 =
* Fix - z-index on buttons

= 1.0.0 - 04.01.2015 =
Initial release.