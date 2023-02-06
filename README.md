# Purrgil CMS

This is a basic, mostly PHP-based, CSV-backed CMS for WCPSS-GEO projects. The intentions here is to be able to deploy permalink-able access to AGOL applications so that users don't have to keep track of a new URL when an AGOL applications must be republished. It also allows the ability to add additional supporting pages with written in Markdown.

## Tech

- PHP-Controls pulling content from CSV and adding to pages
- [pico.css](https://picocss.com/)-Provides basic styling and layout
- [md-block.js](https://md-block.verou.me/)-Renders page content from markdown

## Development

### pages.csv

`data/pages.csv` serves as the central table containing attributes about the various pages related to this project. It is important to fill out all columns for a new entry.

It's worth noting, that as this is setup now, pages.csv can be downloaded in its entirety if a person can figure out where this "DB" lives in the file structure and what it is called. You could create a condition in a .htaccess file in the project root, but this not guaranteed to work if your overall server configuration does not allow project-level .htaccess files (This is the case with our servers in oosa/ooga).

#### Values
- page: Page name for url param in permalink
- page_display_name: A formatted, prettier name of the page for display
- page_category: A broad category for the page to group certain resources together
- page_type: Type of resource the page is:
    - page: A regular page that will a have a listing in `pages`
    - redirect: A redirect to an external page
- path: Path or URL to page
- description: A short snippet of text to describe the page
- active: A flag to indicate if info about the page should be listed
- a_target: Target attribute for links to page.
    - _self
    - _blank

### Creating a new page

To create a new page, create a new directory in `pages` and give it a name. Do not include any spaces in the directory name. Use a dash in place of spaces (e.g. my-new-page). The name you give the page should be used as the `page` value in `pages.csv`. 