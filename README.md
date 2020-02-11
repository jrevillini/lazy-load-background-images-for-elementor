# Lazy Load Elementor Background Images
Contributors: jrevillini
Donate link: https://james.revillini.com/
Tags: performance, lazyload, elementor, background images
Requires at least: 4.7
Tested up to: 5.3.2
Stable tag: trunk
Requires PHP: 7.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Lazy load background images of Elementor sections and columns. Requires a plugin that includes Waypoints JS library as well.

## Description

A major drawback to using Elementor is that the background images used for sections and columns are all loaded when the page loads. Using a plugin like WP Rocket or BJ Lazy Load will not solve this issue. **This plugin fixes that.**

The plugin is dead simple. No extra database tables or queries, no admin screens with difficult options to understand, and no dependencies other than that the page is designed with Elementor. It injects a little JavaScript and CSS on the front-end. The CSS hides all backgrounds on all non-animated sections and columns. The JavaScript detects the visitor’s scrolling and starts loading the background images as they get close to those sections/columns using the WayPoints JS library (which is packaged with Elementor).

## Installation

1. WP Dashboard > Plugins > Add New
1. Search for **Lazy Load Elementor Background Images**
1. Install and activate.

### Prerequisites

* You must be using the Elementor page builder. This plugin doesn’t have any effect whatsoever on pages not built with Elementor.
* WayPoints JS library – this library is currently bundled and loading on Elementor pages. Future versions of this plugin may include the WayPoints JS library so it will not be required.

## Frequently Asked Questions

### How do I know if this is working?

If your pages start loading faster, it's probably working. That's the non-technical version.

If you're a developer and know how to use Google Chome Developer Console, read on ...

1. If you're using a caching plugin, clear it.
1. If you're using a CDN such as Cloudflare, clear the CDN cache.
1. Open your site in an incognito tab in Google Chrome.
1. Open the Developer Console.
1. Go to the Network tab.
1. Tick the option to disable cache.
1. Click the `Img` sub-tab.
1. Reload the page.
1. As you scroll down, ensure that the background images of sections and columns load on the fly as you approach them.

### Why isn't this plugin doing anything?

If the plugin isn't lazy-loading your background images, then one of the following must be true:
* the **Lazy Load Elementor Background Images** plugin isn’t active – activate it.
* Elementor isn’t installed/activated – install and activate it.
* the page you’re checking is not an Elementor page – this plugin ONLY works on section/column backgrounds designed with Elementor.
* the section/column with a background is also animated (motion effects) … I can’t lazyload them because they are hidden until they are scrolled into view.
* Waypoints JS library is not loaded … we can look at this together and figure out why.

If none of the issues above applied to your situation, just leave the plugin activated, open a support ticket (support link forthcoming) and we’ll troubleshoot it. DO NOT leave a crappy review on the plugin, please. I’m providing it for free and support it for free. I will do my best to make it work in all situations but there are no guarantees.

### Where are the settings?

There is no admin screen added by this plugin. You just activate it and it works.

### This plugin killed my site!

I believe it. It’s a very new plugin that hasn’t been widely tested. Rather than give it a crappy rating, please use the support forum so we can figure out what happened. (I am waiting for WordPress.org to approve my plugin so I can link to the support forum)

In the meantime, to get your site back, get into your site’s files via cPanel File Manager through your hosting platform or via FTP, go into the `wp-content/plugins/` folder, and delete the `lazy-load-background-images-for-elementor` folder – that should immediately bring your site back to life.

On newer versions of WordPress, you may also use the recovery link that gets emailed to you when your site has a critical error.

### I’m not seeing huge performance increases ...

1. Remember – this plugin is not a lazy loader for all images on the page. It only affects background images applied to sections or columns. Use a plugin like WP Rocket to apply lazy-loading to all other image resources.
1. Background images which are visible (or close to visible) when the page loads are loaded immediately.
1. Your background images may not really be impacting the load time on your site (In other words, maybe your background images are highly optimized and small in size). A 2K JPG lazy-loaded is not going to improve your page speed much. A 500K JPG background will.
1. Your web server may simply be slow. Or there are other areas of optimization that need to be addressed. The best article I’ve found for tuning up everything on the site is Kinsta’s [How to Speed Up Your WordPress Website (Ultimate 2020 Guide)](https://kinsta.com/learn/speed-up-wordpress/).

## Changelog

### 1.0.0
* initial release
