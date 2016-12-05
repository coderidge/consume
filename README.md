Consume
=======

This project scrapes specific content from a 3rd party website page, creates an array of data, before finally returning the data in specified JSON format. 

Built in Symfony 3.1 a PHP MVC framework, it makes use of bundles Guzzle and DomCrawler. 

Installation 
=========

1/ run the command 'git clone' in your local development server <br/>

2/ cd to the newly created project folder 'consume' <br/>

3/ If you don't have composer, install composer packager manager with the command 'curl -sS https://getcomposer.org/installer | php' <br/>

4/ Run command 'composer update' this install all the dependencies in your vendor folder, including 'Guzzle' and 'DomCrawler' which are additional <br/>

5/ To run the  project in the dev environment use the command 'bin/console server:run' then access it at http://127.0.0.1:8000  <br/>

Unit tests 
================ 

Run unit test in command line with 'phpunit' <br/>

The useful test to check the url return 200 success code and also takes returned data and runs a json decode function to check that correctly formatted json has been 
created. <br/>
  
 
TODO - With more, other tests for correct data and fields returned to be completed. 
