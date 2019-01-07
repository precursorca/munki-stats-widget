# munki-stats-widget

> v. 1.0 
> January 7, 2019  
> Alex Narvey / Precursor.ca  


A custom MunkiReport 4.0 Stats Widget to show statistics similar to early versionss of Munki.

No warrantee is offered. Neither express nor implied. Use at your own risk.

To use:

1) Place the munki_stats_widget.php file inside the local/views/widgets directory of MunkiReport 4

2) Call it from a dashboard or make a custom dashboard with a .yml file in /local/dashboards

Notes:

- The stats come from the getStats function in the ManagedInstalls module.
- The period is 30 days using:
		var hours = 24 * 30;
- The formatting is borrowed from the MS_Office module.
- The Pending count is a total of Pending Munki Installs and Pending AppleSUS Installs

* January 7, 2019 Version 1.0 

## Contributors
* Alex Narvey

—
Alex Narvey
precursor.ca