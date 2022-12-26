# blog_op
This project, develop your own blog using PHP, is a part of my training with Openclassrooms : Application's developper - PHP/Symfony.



## Features

*	Front office accessible to all users
*	Back office accessible to admin only

### Front office
The website includes the following pages :

* Homepage : presentation page (name, picture, PDF CV, social networks link) and a contact form.
* Blogposts : display all articles ordered by latest. Each blog post card must include a title, updated at date, lead paragraph & link to article.
* One blogpost : individual article page with title, headline, content, author, updated at date, comments & publish comment form (only for connected user)
*	Register / log forms
* Navbar & footer present on all pages. Footer contains a link to Admin back office.

### Back office (admin interface)
This interface includes :

* Blogpost management : add, modify or delete an article
* Comments management : validation of comments, modify or delte comments


### Specs
*	PHP 8
*	Bootstrap 5
*	Bundles installed via Composer :
    * Twig
    * Autoload
    * PHP CodeSniffer
    * PHP Mailer

#### Success criteria
The website must be responsive & secured. Code quality assessments done via Codacy.

#### Required UML diagrams
*	Use case diagrams
*	Class diagram
*	Sequence diagrams

### Requirements

*	You need to have composer on your computer
*	Your server needs PHP version 8.0
*	MySQL or MariaDB
*	Apache or Nginx


## Set up your environment
If you would like to install this project on your computer, you will first need to clone or download the repo of this project in a folder of your local server.

1. In the db folder edit the dbConfig.php file with your own credentials for database :

*	DB_HOST=XXX
*	DB_USER=XXX
*	DB_PASSWORD=XXX
*	DB_NAME=XXX


2. In the services folder modify the mailConfigEx.php with your own SMTP values and rename it in mailConfig.php:

* MAIL_ADD (sending address)
* MAIL_PASS
* MAIL_SEND (receiving address)
Remark : it is designed to work with gmail smtp (so smtp host = smtp.gmail.com and smtp port = 587)

3. Install composer if you don't have it

4. Import the supplied MySQL database to your server (blog.sql) with is a prefilled database.

## Test the blog

* As a regular member:
Register via the registration form

* As administrator:
Use the identifiers below or register via the registration form and change your user role your to admin directly in the database.

    * username: sandrine
    * Password: mdp

