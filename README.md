# WordPress Plugin Template

This plugin is a template for creating a WordPress plugin. It is a fully working plugin itself, but it has very limited functionality. It only includes a starting point for features that you may want to implement in your own plugin. Remove features that you will not need and then extend the features you keep or add your own.

The goal is to provide a reliable, portable codebase with well-defined dependencies and minimal time for someone to make their first contribution even if they have never seen this code before.

_Note: if using `git` with SSH credentials, you may need to use an SSH style URL (git@github.com:ttitamu/com-wp-plugin-template.git) instead of HTTPS (https://github.com/ttitamu/com-wp-plugin-template.git)._

**Table of Contents**

-   [Developer Installation](#developer-installation)
-   [Creating a New Plugin](#creating-a-new-plugin)
-   [Directory Structure](#directory-structure)
-   [Commands](#commands)
-   [Tests](#tests)
-   [Installing System Requirements for Development](#system-requirements-for-development)
-   [Further Reading](#further-reading)

## Developer Installation

### Docker

Run the commands below and then open your browser to [http://localhost:8888](http://localhost:8888). Your username and password are `admin -> password`.

```shell
git clone https://github.com/ttitamu/com-wp-plugin-template
cd your-plugin-slug
npm install
npm start
```

### Local

```shell
cd ~/Local Sites/your-site/app/public/wp-content/plugins
git clone https://github.com/ttitamu/com-wp-plugin-template
cd com-wp-plugin-template
npm install
composer install
```

## Creating a New Plugin

_Note: You can remove this section from your new plugin's documentation._

To create your own plugin using this template, choose one of the approaches below. If you have not done so already, rename git's default branch name: `git config --global init.defaultBranch main`

### Docker

```shell
git clone https://github.com/ttitamu/com-wp-plugin-template your-plugin-slug
cd your-plugin-slug
rm -rf .git
npm run template
git init
git add .
git commit -m "initial commit"
git branch -M main
git remote add origin https://github.com/ttitamu/your-plugin-slug.git
git push -u origin main
npm install
npm start
```

### Local

```shell
cd ~/Local Sites/your-site/app/public/wp-content/plugins
git clone https://github.com/ttitamu/com-wp-plugin-template your-plugin-slug
cd your-plugin-slug
rm -rf .git
npm run template
git init
git add .
git commit -m "initial commit"
git branch -M main
git remote add origin https://github.com/ttitamu/your-plugin-slug.git
git push -u origin main
npm install
composer install
```

## Directory Structure

This plugin uses a specific directory structure which separates concerns between WordPress site administration features, WordPress site rendering hooks, static assets (CSS, JS, images, etc), and third party integrations. The directories are listed below with a brief description of what they contain.

1. **.bin** - Custom scripts for local development.
2. **.config** - Configuration files for development and build tools used in this project.
3. **.github** - GitHub integration files such as Actions workflows.
4. **.vscode** - Visual Studio Code integration files.
5. **.wp-env** - WordPress development environment default content.
6. **common** - Common WordPress feature implementations that you can copy and modify for your plugin.
7. **docs** - Documentation files going in depth on different aspects of this project or WordPress development.
8. **src** - Source code for the plugin.  
   a. **advanced-custom-fields** - Advanced Custom Fields field registration and import files.  
   b. **assets** - JavaScript, CSS, images, fonts, and other static files.  
   c. **views** - File content output to the browser by the plugin. This is where you should put most or all of the HTML output from your plugin, to make that content easier to find and change.
   d. **services** - Files which integrate your plugin with external services.
9. **test** - Plugin code tests.  
   a. **e2e** - Browser tests using Playwright.  
   b. **jest** - JavaScript tests using Jest.  
   c. **phpunit** - WordPress PHP code tests using PHPUnit.
10. **index.php** - The entrypoint for the plugin's source code, which is loaded by WordPress if the plugin is activated for a site.

## Commands

The commands you will use the most frequently for developing a plugin with this repository are listed below.

For a complete list of commands, refer to [package.json](package.json) and [composer.json](composer.json). For descriptions of what these commands do, see here: [docs/commands.md](docs/commands.md)

| Command            | Description                                                           |
| ------------------ | --------------------------------------------------------------------- |
| `npm install`      | Install your project dependencies for the first time.                 |
| `npm start`        | Start the development environment, build files, and watch for changes |
| `npm run build`    | Build asset files at src/assets/css/\*.scss                           |
| `npm run lint`     | Check JS and CSS code style using WordPress coding standards          |
| `npm run lint:php` | Check PHP code style using WordPress coding standards                 |
| `npm run test`     | Test JavaScript and PHP                                               |
| `npm run stop`     | Stop the development environment                                      |

## Tests

This plugin has a small set of tests to show you how to create your own. Core WordPress code is tested, so only test the code you write.

Categories of test included in this theme:

1. **Unit** tests examine the behavior of a small unit of code.
2. **End to end** tests examine what the end user sees.
3. **Integration** tests examine compatibility between separate systems.

## System Requirements for Development

You will need the following tools installed on your computer:

-   [Docker](https://www.docker.com/products/docker-desktop)
-   [Node.js](https://nodejs.org/en/download/) or [NVM](https://github.com/nvm-sh/nvm)
-   [git](https://git-scm.com/downloads)

To make this easier, you can use an installer included in this repository by saving it to your computer and making it executable.
You must have administrator rights to run these installers.

### Mac Installation

1. Copy this file to your computer: [.bin/installers/install-mac.sh](.bin/installers/install-mac.sh)
2. Open your terminal and navigate to the directory where you saved the file.
3. Make the file executable: `chmod +x install-mac.sh`
4. Run the file: `./install-mac.sh`

### Windows Installation

1. Copy this file to your computer: [.bin/installers/install-windows.bat](.bin/installers/install-windows.bat)
2. Open your terminal and navigate to the directory where you saved the file.
3. Run the file: `install-windows.bat`

## Further Reading

The links below describe important WordPress code concepts you may need to know when developing your WordPress plugin.

-   [Action Hooks](https://developer.wordpress.org/plugins/hooks/actions/)
-   [Filter Hooks](https://developer.wordpress.org/plugins/hooks/filters/)
-   [Shortcodes](https://developer.wordpress.org/plugins/shortcodes/)
-   [Options API](https://developer.wordpress.org/plugins/settings/options-api/)
-   [Custom Post Types](https://developer.wordpress.org/plugins/post-types/)
-   [Custom Taxonomies](https://developer.wordpress.org/plugins/taxonomies/)
-   [`@wordpress/env`](https://github.com/WordPress/gutenberg/tree/trunk/packages/env)
-   [`wp_remote_get()`](https://developer.wordpress.org/reference/functions/wp_remote_get/) for making HTTP requests, and see here for accepted options passed as the second argument for the function: [WP_Http::request()](https://developer.wordpress.org/reference/classes/wp_http/request/)
