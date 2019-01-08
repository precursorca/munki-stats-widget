# Custom MunkiReport Munki Stats Widget

> v. 1.0.6 
> January 8, 2019  
> Alex Narvey / Precursor.ca  

![munki_stats_widget  view](https://github.com/precursorca/munki-stats-widget/blob/master/munki_stats_widget.png)

A custom munkireport 4.0 Stats Widget to show statistics similar to early versions of munkireport 2.

No warrantee is offered. Neither express nor implied. Use at your own risk.

To use:

1) Replace the get_stats function in managedinstalls/managedinstalls_controller.php with the code provided by John Eberle in the file Custom Get_Stats Function.txt

2) Place the munki_stats_widget.php file inside the local/views/widgets directory of MunkiReport 4

3) Call it from a dashboard or make a custom dashboard with a .yml file in /local/dashboards

Notes:

- The stats come from the Get_Stats function in the ManagedInstalls module.
- In this case John Eberle modified the Get_Stats function to help pick out the correct arrays with JQuery.
- The period is 720 hours (one month).
- The formatting is borrowed from the MS_Office module.
- The Installs count is a total of Succesful_Installs_Munki_Installs and Successful_Installs_AppleSUS.
- The Pending count is a total of Pending Munki Installs and Pending AppleSUS Installs.
- Arjen van Bochoven schooled me on dealing with null array elements.

Release Notes:

* January 8, 2019 Version 1.0.6 - Included instructions for replacing get_stats function in managedinstalls_contoller.php. 
* January 8, 2019 Version 1.0.5 - Fixed Grahpic url. 
* January 8, 2019 Version 1.0.4 - Updated the grahpic to show new button. 
* January 8, 2019 Version 1.0.3 - Added an Installs button for successful installs to show what has been updated (combining successful munki and applesus installs). Renamed "Clients" to "Computers", and "Installs" to "Software" (to indicate what is managed).
* January 8, 2019 Version 1.0.2 - Now based on John Eberle's custom Get_Stats function. Now deals properly with empty arrays by displaying a disabled zero button such as when there are no pending installs or no failed installs. Changed the Button urls to get to appropriate items. Edited the button labels to standardize capitalization. Tested with Machine Group filtering.
* January 7, 2019 Version 1.0.1 - Some bug fixes to pending and data calls.
* January 7, 2019 Version 1.0


## Contributors
* Alex Narvey
* John Eberle
* Arjen van Bochoven

—
Alex Narvey
precursor.ca