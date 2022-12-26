# blog_op
This projets is the 5th Openclassrooms project of the PHP/Symfony developer course : develop your own blog using PHP


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

## Set up your environment
If you would like to install this project on your computer, you will first need to clone the repo of this project using Git.

At the root of your projet, you need to create a .env file (same level as .env.example) in which you need to configure the appropriate values for your blog to run 


