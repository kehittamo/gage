# Kehittämö Gage
[![Commitizen friendly](https://img.shields.io/badge/commitizen-friendly-brightgreen.svg)](http://commitizen.github.io/cz-cli/)
[![semantic-release](https://img.shields.io/badge/%20%20%F0%9F%93%A6%F0%9F%9A%80-semantic--release-e10079.svg)](https://github.com/semantic-release/semantic-release)

A custom WordPress theme started as a fork of [Sage](https://roots.io/sage/) 8.5.1, and then converted into a barebones version suitable for Gutenberg.

Compatible with [Kehittämö Seravo Addons](https://github.com/kehittamo/kehittamo-seravo-addons).

## Documentation
Most files should be documented with a comment at the beginning.

## Folder structure
```bash
gage # Theme root
├── acf-json # Advanced Custom Fields JSON files
├── assets # Assets consumed by Webpack
│   ├── fonts # Fonts
│   ├── images # Images
│   ├── scripts # JavaScript
│   │   ├── routes # Class-based routing
│   │   └── util # Utilities
│   └── styles # SCSS styles
│       ├── blocks # Gutenberg block styles
│       ├── common # General styles
│       └── components # Component styles (ex. Footer & Header)
├── blocks # Gutenberg blocks
│   └── kehittamo-block-archive # Post list block for archive
├── dist # Webpack build target
├── lang # Pot files
├── lib # PHP library
└── templates # WP templates
```
