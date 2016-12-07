
This is a bot for sending photos to your messenger alternative to searching the web for a photo of a specific word.

Why should I use it:- 

1- the image is compressed , so this won't use a lot of your phone data
(facebook decrease photo quality)


2- it's fast , easy just type a word and it will search google images for it

3- it can send 100 picture per day

4- It's good for searching about nudes ¯\_(ツ)_/¯

sample ready to use one : https://goo.gl/yimg1f



Requirement :-
Google custom search 
Facebook app
Facebook page

Steps to deploy :-


1-  Create a Facebook App(developers.facebook.com/apps) and Page

2- Go to the App Dashboard and under Product Settings click "Add Product" and select "Messenger."

3- Install the Heroku toolbelt from https://toolbelt.heroku.com to launch ,Sign up for free at https://www.heroku.com if you don't have an account yet.

4- Inside the app go to Messenger , then click Setup Webhook, put your heroku app url on Callback, and on Verify Token put meow_meow_meow

5- Scroll up to "Token Generation" , Select a page  and get the page token and save it somewhere.

6- Go to terminal  :
curl -X POST "https://graph.facebook.com/v2.6/me/subscribed_apps?access_token="your_page_token"

7- Edit  $access_token     = "your_access_token";    with your page token

8- Edit the cx and key var with your own cx and key.

9-  git push heroku master 
