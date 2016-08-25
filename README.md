# mediawiki_imgur
The Imgur extension allows images from the website Imgur to be embedded in MediaWiki pages.

## Fork from
This repository fork from Gist [Pavelovich/imgur.php](https://gist.github.com/Pavelovich/15ffd9baaaa3fdef0aa6) on 2016/08/25.

## Issue
Only tested in MediaWiki 1.23 with php 5.4

## Installation
* Download and place the `imgur.php` in your extensions/ folder.
* Add the following code at the bottom of your `Localsettings.php`.
```php
require_once "$IP/extensions/imgur.php";
```

## Configuration parameters
```html
<imgur>XXXOOOO</imgur>
<imgur float="right" width="600" comment="This is a comment">XXXOOOO</imgur>
```
* Put the imgur ID in the `<imgur>` tag.
* There are three attribute in this extension
    * flaot, image position, default is right.
    * width, image size in px, default is 320.
    * comment, text under the image.