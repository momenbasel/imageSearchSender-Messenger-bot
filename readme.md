
This is a bot for sending photos to your messenger alternative to searching the web for a photo of a specific word.<br /><br /><br />

Why should I use it:- <br />

1- the image is compressed , so this won't use a lot of your phone data
(facebook decrease photo quality)
<br />
2- it's fast , easy just type a word and it will search google images for it
<br />
3- it can send 100 picture per day
<br />
4- It's good for searching about nudes ¯\_(ツ)_/¯
<br />
sample ready to use one : https://goo.gl/yimg1f   ( I put popular nudes sites on " Search the entire web but emphasize included sites." on google custom search on this bot )
<br />
<br />
Instruction :-
<br />
Type "help" you will get response contain instruction, way to report a problem.<br />
<br />
Type anything you want to search about and you will get photos about it from google custom search.
<br />

Requirement :-<br />

-Google custom search <br />
-Facebook app<br />
-Facebook page<br />

Steps to deploy :-

<br />
1-  Create a Facebook App(developers.facebook.com/apps) and Page
<br />
2- Go to the App Dashboard and under Product Settings click "Add Product" and select "Messenger."
<br />
3- Install the Heroku toolbelt from https://toolbelt.heroku.com to launch ,Sign up for free at https://www.heroku.com if you don't have an account yet.
<br />
4- Inside the app go to Messenger , then click Setup Webhook, put your heroku app url on Callback, and on Verify Token put meow_meow_meow
<br />
5- Scroll up to "Token Generation" , Select a page  and get the page token and save it somewhere.
<br />
6- Go to terminal  :
curl -X POST "https://graph.facebook.com/v2.6/me/subscribed_apps?access_token="your_page_token"
<br />
7- Edit  $access_token     = "your_access_token";    with your page token
<br />
8- Edit the cx and key var with your own cx and key.
<br />


9-  git push heroku master 
