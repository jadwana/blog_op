# blog_op
This project, develop your own blog using PHP, is a part of my training with Openclassrooms : Application's developper - PHP/Symfony.

[![Codacy Badge](https://app.codacy.com/project/badge/Grade/f3ee6d5a76e845f08ef23a59851b389d)](https://www.codacy.com/gh/jadwana/blog_op/dashboard?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=jadwana/blog_op&amp;utm_campaign=Badge_Grade)

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
    * PHP dotenv

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

1. Create a file .env in the same folder than index.php and insert your credentials for Database and SMTP :

*	DB_HOST=XXX
*	DB_USER=XXX
*	DB_PASSWORD=XXX
*	DB_NAME=XXX


* MAIL_ADD (sending address)
* MAIL_PASS
* MAIL_SEND (receiving address)
Remark : it is designed to work with gmail smtp (so smtp host = smtp.gmail.com and smtp port = 587)

2. Install composer if you don't have it

3. Import the supplied MySQL database to your server (blog.sql) with is a prefilled database.

## Test the blog

* As a regular member:
Register via the registration form

* As administrator:
Use the identifiers below or register via the registration form and change your user role your to admin directly in the database.

    * username: sandrine
    * Password: mdp

