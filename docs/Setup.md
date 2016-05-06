#Setup

##Environments

There are three different dynos configured on Heroku for supporting the application development lifecycle:

 * **Kickoff-Build** - automatic deployment from the `build` branch
 * **Kickoff-Stage** - manual deployment from `build` branch
 * **Kickoff-Cal** - automatic deployment from the `master` branch

##Version Control

All application code is version controlled with Git, hosted on a private Github repository at https://github.com/si/kickoff. 

Collaborator access can be requested but this is not an open-source project. There is potential to open-source some of the website components such as data parsing methods (scraping and JSON delivery).

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
Passwords must be requested from Si.

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

###Prod

    Username: b2779db3defb60
    Host: eu-cdbr-west-01.cleardb.com
    Password: heroku_bc293710bcc78dc