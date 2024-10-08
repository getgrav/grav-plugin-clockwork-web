# Clockwork Web Plugin

The **Clockwork Web** Plugin is an extension for [Grav CMS](https://github.com/getgrav/grav). Enables the Web Interface for the [Clockwork Debugger](https://underground.works/clockwork) that comes with Grav CMS.  In the past you had to install a browser extension (either Chrome or Firefox) to use the ClockworkDebugger, but as of Clockwork v5.1, you just need to install the plugin to enable the web interface. This means it can work on other browsers such as Safari and Edge.

## Installation

Installing the Clockwork Web plugin can be done in one of three ways: The GPM (Grav Package Manager) installation method lets you quickly install the plugin with a simple terminal command, the manual method lets you do so via a zip file, and the admin method lets you do so via the Admin Plugin.

### GPM Installation (Preferred)

To install the plugin via the [GPM](https://learn.getgrav.org/cli-console/grav-cli-gpm), through your system's terminal (also called the command line), navigate to the root of your Grav-installation, and enter:

    bin/gpm install clockwork-web

This will install the Clockwork Web plugin into your `/user/plugins`-directory within Grav. Its files can be found under `/your/site/grav/user/plugins/clockwork-web`.

### Manual Installation

To install the plugin manually, download the zip-version of this repository and unzip it under `/your/site/grav/user/plugins`. Then rename the folder to `clockwork-web`. You can find these files on [GitHub](https://github.com/trilbymedia/grav-plugin-clockwork-web) or via [GetGrav.org](https://getgrav.org/downloads/plugins).

You should now have all the plugin files under

    /your/site/grav/user/plugins/clockwork-web
	
> NOTE: This plugin is a modular component for Grav which may require other plugins to operate, please see its [blueprints.yaml-file on GitHub](https://github.com/trilbymedia/grav-plugin-clockwork-web/blob/main/blueprints.yaml).

### Admin Plugin

If you use the Admin Plugin, you can install the plugin directly by browsing the `Plugins`-menu and clicking on the `Add` button.

## Configuration

Before configuring this plugin, you should copy the `user/plugins/clockwork-web/clockwork-web.yaml` to `user/config/plugins/clockwork-web.yaml` and only edit that copy.

Here is the default configuration and an explanation of available options:

```yaml
enabled: true               # Enable the plugin
route: /clockwork           # Path where your Clockwork Web interface will be displayed.
```

Please make sure the route doesn't conflict with any page, redirect, or URL on your site or it could cause problems.

Note that if you use the Admin Plugin, a file with your configuration named clockwork-web.yaml will be saved in the `user/config/plugins/`-folder once the configuration is saved in the Admin. 

## Usage

Once installed, and you have debugger enabled, and set to Clockwork in the system configuration, you should see a Grav icon in the bottom left corner of every page, hovering over this and clicking the **View Debug Info 🔗"** link should open the Clockwork Web UI in a new tab.

