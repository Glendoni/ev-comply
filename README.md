<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>



## About This Demo App

Technical task to demonstrate laravel queue,event and sending mail:

Create a form to subscribe to a newsletter.

1. Email field completed in a form on the page is submitted to backend, show a success message "Thanks for signing up!" after successful submission.

2. The email address is added to a newsletter recipients table

3. Dispatch an event for when the newsletter is added and use a Listener to handle step 4

4. Queue up a job that is responsible for sending the newsletter email to the given email address (the email can simply say "Here is our newsletter")

Please submit the code to a repository and share the link with us.


## Instalation

<p>Ensure Docker is installed and running</p>

<p>In terminal cd to application root</p>

<p>Run: sail up -d  or ./vendor/bin/sail up</p>
<p>In terminal run: sail php artisan migrate</p>

<p>Login to Docker container with sail</p>

<p>Login to Docker container using  sail to start the queue worker by running: <br/>sail php artisan optimize<br/>sail php artisan queue:flush<br/> sail php artisan queue:work --timeout=0</p>

## Browser
<p>Navigate to http://localhost/newsletter-subscription and insert email to form and click the Subscribe To Newsletter button. </p>

## Database
<p>Subscription emails are stored in the newsletter_subscriptions table</p>

## MailHog
<p>Navigate to http://localhost:8025 to check post submission curtsy subscription email</p>

![img.png](img.png)
