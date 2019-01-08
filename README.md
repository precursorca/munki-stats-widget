# munki-stats-widget

> v. 1.0.2 
> January 8, 2019  
> Alex Narvey / Precursor.ca  

![Munki Stats Widget](https://github.com/precursorca/munki-stats-widget/blob/master/munki_stats_widget.png)

A custom MunkiReport 4.0 Stats Widget to show statistics similar to early versions of Munki.

No warrantee is offered. Neither express nor implied. Use at your own risk.

To use:

1) Replace the function in managedinstalls_controller.php with the on in Custom Get_Stats.txt.
(Thanks to John Eberle for providing this custom function)

2) Place the munki_stats_widget.php file inside the local/views/widgets directory of MunkiReport 4

3) Call it from a dashboard or make a custom dashboard with a .yml file in /local/dashboards

Notes:

- The stats come from the get_Stats function in the ManagedInstalls module.
- In this case John Eberle modified the Get_Stats function to help pick out the correct arrays with JQuery.
- The period is 720 hours (one month).
- The formatting is borrowed from the MS_Office module.
- The Pending count is a total of Pending Munki Installs and Pending AppleSUS Installs
- Arjen van Bochoven schooled me on dealing with null array elements


* January 8, 2019 Version 1.0.2 - Now based on John Eberle's custom Get_Stats function. 
Now deals properly with empty arrays by displaying a disabled zero button such as when there are no pending installs or no failed installs.
Changed the Button urls to get to appropriate items. Edited the button labels to standardize capitalization.
Tested with Machine Group filtering.
* January 7, 2019 Version 1.0.1 - Some bug fixes to pending and data calls.
* January 7, 2019 Version 1.0

## Contributors
* Alex Narvey
* John Evberle
* Arjen van Bochoven

—
Alex Narvey
precursor.ca