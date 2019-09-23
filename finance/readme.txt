Ben Schritchfield
ExpensEZ Info document 

Overview:
This is Version 2.0 of my finance tracking site ExpensEZ. This update contains major upgrades in the form of AJAX page updates, a better history page, a goal setting page, visual improvements, and many more small changes.
Frameworks/Languages Used:
Bootstrap, jQuery, PHP, SQL, CanvasJS

Original Element:
My Original Element this time around is the goals page calculation and data entry system. It is nothing groundbreaking in terms of concept, but it is a very efficient way to help the user create goals based around categories of expense. The user can add or subtract from the total goal in increments of $25, and add or subtract from each of 5 categories IF they have enough money remaining. All of this is done in the front end, using JQuery. Then, when the user clicks save, all of the data is posted to the file setgoals.php, where it is then inserted into the database. If there was already data for that month’s goal, it will be overwritten and the user will be notified.  

Future of the project:
There is still much to add/improve on this site. First, I want to add user accounts. I will create a third database with full user information, including a hash generated unique user id, that will be tied to each users data. I will then probably need to create databases using PHP sql commands when an account is created. Second, I want to add the ability to add/remove/change goal and expense categories, for each user. This would let them customize the site better for their needs. Third, I want to integrate more security features, which would be necessary for having multiple users. Also, I want to improve the styling and mobile responsiveness of the site. Overall its been a great learning experience and I definitely want to continue working on this.

Folder contents:
Files:
Index.php - homepage
Indexupdate.php - AJAX refreshing part of the homepage
Piechart.php - Externalized Pie chart drawing page
History.php - site specific page: shows line chart of a date range
Histupdate.php - AJAX refreshing part of the history page
Detailtable.php - AJAX updated table for history page
Chartcreator.php - Externalized, AJAX updating chart drawing page for the history page
Goals.php - container page for the goal setting and display system
Setgoals.php - this updates the database with the goal variables passed by AJAX
Goalsupdate.php - This is the AJAX refreshing part of the goals page
Logdata.php - form page for adding new expenditure info to the SQL database
Nav.php - prints the navbar
Footer.php - prints the footer
Calculations.php - does the math and creates variables to display throughout the site
Monthcards.php - prints out “cards” for goal based categories to display on the homepage
Dataentry.php - form processing file for Logdata.php (externalized)
Db_connect - contains the info needed to connect to the SQL database
Table.php - prints the table of data for the current month selected on the homepage

/css - bootsrap files
/img - images
/js - bootsrap and jQuery files (I put some of my own externalized JS files here too)
