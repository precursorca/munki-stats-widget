# Custom MunkiReport Munki Stats Widget

> v. 3.0.0 
> April 16, 2023  
> Alex Narvey / Precursor.ca  

![munki_stats_widget  view](https://github.com/precursorca/munki-stats-widget/blob/master/munki_stats_widget.png)

A custom munkireport Stats Widget to show statistics similar to early versions of munkireport 2.

No warrantee is offered. Neither express nor implied. Use at your own risk.

After many attempts to make my own, Arjen van Bochoven took pity on my and womped this up in 15 minutes! I made a few modifications to my own taste - as described below.

To use:

1) Place the munki_stats_widget.php file inside the local/views/widgets directory of MunkiReport PHP

3) Call it from a dashboard or make a custom dashboard with a .yml file in /local/dashboards

Notes:

- The period is 720 hours (one month).  
  //Set the hours to one month
		var hours = 24 * 30;
- I changed the "Clients" button to "Computers": by commenting out its title designation and creating a hard coded name:
  ```
  <!-- <span data-i18n="client.clients"></span> -->
   <span>Computers</span>
   ```
- You can display counts as "totals" or by "clients" using the relevant Var.
  for example in "Pending" I am showing the total by the number of clients that need pending updates so my client knows how many computers require updates
  but in "Installs" I am showing the total number of items installed so my client has an idea of how many pieces of software are getting updated each month.
- The Installs count is a total of Succesful_Installs_Munki_Installs and Successful_Installs_AppleSUS.
- The Pending count is a total of Pending Munki Installs and Pending AppleSUS Installs.

Release Notes:

* April 16, 2023 Version 3.0.0 - Created a version to display properly in MunkiReport 6 with Bootstrap 4.
* July 29, 2020 Version 2.0.0 - Abandoned my own code and posted the version that Arjen van Bochoven helped me with .
* January 8, 2019 Version 1.0.7 - Instead of modifying the managedinstall controller get_stats function we now add a custom function to it. Modified the Read Me and files accordingly.
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
