![Simple Share Url for Statamic 2](https://github.com/OLBA-Bureau/statamic-simpleshareurl/raw/master/SimpleShareUrl/resources/banner.jpg)

# Simple Share Url for Statamic 2

Statamic 2 Addon. Add a new configurable Template Tag who generates a sharing URL for Social Networks.

* Facebook (with: url, title, picture, description, quote)
* Twitter (with: url, text, via, related, hashtags)
* Google+ (with: url)
* Linked In (with: url, title, summary, source)
* Pinterest (with: url, description)

## Installation

1. Place the `simpleshareurl` folder inside your `site/addons/` folder.

## Usage Examples

**Basic usage**

```html

{{ simple_share_url network='facebook' url='https://github.com' title='Title' }}

```

… will output …

```html

https://www.facebook.com/sharer/sharer.php?u=github.com&title=Title

```

**Alternative syntax, with the network as a method**

```html

{{ simple_share_url:facebook url='https://github.com' title='Title' }}

```

**You will probably use it like so**

```html

<a target="_blank" href="{{ simple_share_url:facebook url=current_url title=title }}">Share on Facebook</a>

```

## Parameters

**facebook** :

+ url **`required`**
+ title
+ picture
+ description
+ quote

Exemple, in Statamic Template:

```html
	
<a target="_blank" href="{{ simple_share_url:facebook url=current_url title=title picture=image_field|url description=description_field quote=quote_field }}">Share on Facebook</a>

```

**twitter** :

+ url **`required`**
+ text
+ via
+ related
+ hashtags

**googleplus** :

+ url **`required`**

**linkedin** :

+ url **`required`**
+ title
+ summary
+ source

**pinterest** :

+ url **`required`**
+ description

---

## Changelog

### 1.0.0

* Initial Release

---

Copyright © 2016 [OLBA Bureau](http://olba-bureau.com)
