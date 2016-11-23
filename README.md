Consume
=======

This project scrapes specific content from a 3rd party website page, creates an array of data, before finally returning the data in specified JSON format. 

Built in Symfony 3.1 a PHP MVC framework, it makes use of bundles Guzzle and DomCrawler. 

Installation 
=========

1/ run the command 'git clone' in your local development server 
2/ cd to the newly created project folder 'consume'
3/ If you don't have composer, install composer packager manager with the command 'curl -sS https://getcomposer.org/installer | php'
4/ Run command 'composer update' this install all the dependencies in your vendor folder, including 'Guzzle' and 'DomCrawler' which are additional
5/ To run the  project in the dev environment use the command 'bin/console server:run' then access it at http://127.0.0.1:8000 

Unit tests 
================ 
1/ The useful test to check the url return 200 success code and also takes returned data and runs a json decode function to check that correctly formatted json has been 
created.  
 
TODO - With more, other tests for correct data and fields returned to be completed. 
