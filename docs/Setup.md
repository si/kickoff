#Setup

This document serves to provide configuration and setup notes for anyone working on the Kickoff project.

##Environments

Kickoff is currently hosted on Heroku. It allows us to support the ideal development lifecycle (for free) and opportunity to scale in the future. 

There are three different dynos configured on Heroku for supporting the application development lifecycle:

 * [Kickoff-Build](https://kickoff-build.herokuapp.com/) ([alias](http://build.kickoffcalendars.com)) - automatic deployment from the `build` branch 
 * [Kickoff-Stage](https://kickoff-stage.herokuapp.com) ([alias](http://beta.kickoffcalendars.com)) - manual deployment from `build` branch 
 * [Kickoff-Cal](https://kickoff-cal.herokuapp.com) ([alias](https://kickoffcalendars.com)) - automatic deployment from the `master` branch 

##Version Control

All application code is version controlled with Git, hosted on a private Github repository at https://github.com/si/kickoff. 

Collaborator access can be requested but this is *not* an open-source project. 

There is potential to open-source some of the data-parsing services of the app:
 
 * Data scraping (http://spodat.us/)
 * Calendar delivery (http://addtoc.al/)

###Rules of Git Club

* All code in the `master` branch should be production ready for continuous deployment.
* Any development should be on a *feature branch* from the `build` branch
* Feature branches should be named concisely witout spaces
* Prefix all feature branches with their purpose:
 - **feature/**new-thing - new feature or change request
 - **fix/**problem - bug or hot-fix of problem
 - **poc/**idea - proof of concept
* Once new branches have passed QA, merge the feature branch into `build`
* Stable versions of `build` should be merged into `master` for deployment 
 
##Databases

All databases are using Heroku add-on, ClearDB MySQL on the free tier.
Passwords must be requested from [Si](https://github.com/si).

CakePHP application database connection is configured by `CLEARDB_DATABASE_URL` environment variable setup on the server. Local development requires custom config in *Config/database.php*. 

Database security is pending review from DevOps consultant.
 
###Build

    Username: b1b21e7eb9cfb4
    Host: eu-cdbr-west-01.cleardb.com
    Database: heroku_18f051336d4db01

###Stage

    Username: b9b9fe03ac9905
    Host: us-cdbr-iron-east-03.cleardb.net
    Database: heroku_b60257bee95830f

###Production

    Username: b2779db3defb60
    Host: eu-cdbr-west-01.cleardb.com
    Password: heroku_bc293710bcc78dc