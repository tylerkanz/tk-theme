# TK Theme

A custom WordPress theme built on Bootstrap 5, with a customizer color/logo option, a GitHub-linked post preview shortcode, and self-hosted updates via GitHub releases.

![Screenshot](screenshot.png)

## Requirements

- WordPress 5.0+
- PHP 7.4+
- Node.js (to build the Sass/CSS pipeline)

## Installation

1. Clone or download this repo into `wp-content/themes/tk-theme`
2. Install front-end build dependencies:
   ```bash
   npm install
   ```
3. Compile the Sass source into `style.css`:
   ```bash
   npx gulp style
   ```
4. Activate **TK Theme** under **Appearance → Themes** in the WordPress admin

The theme checks this GitHub repository's `main` branch for updates via [Plugin Update Checker](https://github.com/YahnisElsts/plugin-update-checker), so once installed it can notify you of new releases from the WordPress admin.

## Features

- Bootstrap 5 navigation via a custom nav walker (`register_navwalker()`)
- Customizer options for an accent color and a header logo
- Theme support for responsive embeds, block editor styles, `wp-block-styles`, and featured images
- A **GitHub Repo URL** field on the post editor (added via a meta box) for linking a post to its source repository

## Shortcodes

### Post preview grid — `[tk-preview-posts]`

Renders the four most recent posts from a category as Bootstrap cards, each with a title, excerpt, and — if the post has a **GitHub Repo URL** set — a "View on GitHub" button.

```
[tk-preview-posts category="post-category-slug"]
```

| Attribute  | Required | Description                                  |
|------------|----------|-----------------------------------------------|
| `category` | Yes      | Slug of the category to pull posts from       |

## Development

Sass source lives in `sass/`. Run the build after making style changes:

```bash
npx gulp style
```
