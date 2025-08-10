Commerce.cgi 3.01 is distributed according to the GNU General Public License.
The license.html file can be found in the /store/html/pages directory

--------------------------------------------------------------------------------

Commerce.cgi Installation

Step 1 - Unzip the commercecgi201.zip file using WinZip or a similar program.
This should leave you with a directory named /store that contains all of the
necessary Commerce.cgi files.

Step 2 - Upload this entire directory to your /cgi-bin. All of these files MUST
be transfered in ASCII mode!!! The ONLY exceptions to this are the files
contained in the directory /store/html/images which need to be transferred in
BINARY mode.

WARNING - Failure to transfer these files in the correct mode (ASCII or BINARY)
is one of the most common causes of problems - TAKE YOUR TIME AND DO THIS RIGHT
:-)

Step 3 - Now you must set the permissions on these files.

During installation, we set the permissions a bit 'looser', so you can use Store
Manager to edit your configuration files. After installation, you'll probably
want to go back and tighten these up to make your installation more secure.

chmod 777 /store/admin_files directory and all files within
chmod 777 /store/data_files directory and all files within
chmod 777 /store/log_files directory
chmod 777 /store/protected/files directory
chmod 755 /store/protected/manager.cgi file
chmod 777 /store/shopping_carts directory
chmod 755 /store/commerce.cgi file


*******>IMPORTANT SIDEBAR<*******
Although this will effectively disable Store Manager, you'll probably want to
re-visit this area after you complete your installation and tighten up your
permissions as follows.

chmod 744 /store/admin_files directory
chmod 644 all files within /store/admin_files directory
chmod 744 /store/data_files directory
chmod 644 /store/data_files/data.file
*******>END IMPORTANT SIDEBAR<*******

Before Doing Anything Else

The file 'commerce.cgi' is located in the /cgi-bin/store directory

The file 'manager.cgi' is located in the cgi-bin/store/protected directory

Make sure that the first lines of manager.cgi and commerce.cgi contain the
correct path to perl on your system. This line should look something like:

#!/usr/bin/perl -T

It is *very* important that you use perl version 5. Some systems have both
version 4 and version 5 installed in different locations for backwards
compatibilty. The scripts may appear to run with perl 4, but you will encounter
weird errors along the way. If you're unsure, ask your Systems Administrator for
the correct path.


--------------------------------------------------------------------------------

Enabling Store Manager

Next, to get the store up and running, you will need to enable the Store
Manager. While the Store Manager itself uses simple password protection, for
greater security you *must* also password protect the /cgi-bin/store/protected
directory.

REPEAT - YOU MUST PASSWORD PROTECT THE /cgi-bin/store/protected directory!

If you are unsure how to do this, ask your System Administrator to help
you...they should be able to offer you a way to password protect this directory,
possibly through your website 'Control Panel', assuming you have a webhost that
provides such tools...if you don't, please visit http://www.commerce-cgi.com/links/hosting.html

While you're waiting to hear from your SysAdmin, you need to enable the
secondary password protection within Store Manager.

1) Open up the manager.cgi file in a text editor and change the username and
password variables at the top. The file contains directions to walk you through
this.

2) The program stores your I.P. address in a temporary file to keep track of you
during your visit. You must rename this file to something unique that you choose
by setting the $a_unique_name variable to whatever name you like.

DO NOT skip over this step! If you find the login page just reloads itself over
and over, this is one possible reason why that is happening.

Last warning: Don't forget to password protect the /cgi-bin/store/protected
directory as soon as possible!

Now you must set a few important pieces of information unique to your store.
Access the 'Program Settings' section of Store Manager through your Web Browser
by accessing this URL

http://www.your_domain.com/cgi-bin/store/protected/manager.cgi

Obviously, you need to change this to reflect your specific URL and path.

If you have problems with Store Manager, please double check your permission
settings - that is almost always the root of the problem!

--------------------------------------------------------------------------------

Using Store Manager to set the Program Settings

After successfully logging in you will be taken directly to the Add A Product
screen of Store Manager. Click the Program Settings link at the top of this
page.

The Program Settings screen allows you to easily set certain configuration
variables for your store. We'll go through each of these choices one by one...

1) Please choose how you will process orders

Here you choose how you'd like to process your orders. This selection is new in
Commerce.cgi 2.01 and allows you to choose either Offline, AuthorizeNet,
eProcessingNetwork, iTransact or LinkPoint HTML.

Offline simply means that you'd like to have your orders logged and you will
process them offline through your own credit card software.

When using Offline processing, the order is logged to a text file on the server
and also e-mailed to the merchant. For security, the text file on the server
will contain the type of credit card that is being used and the first eight
digits of the credit card number. The e-mailed copy of the order that is sent to
the merchant will contain the last eight digits of the credit card number, and
the expiration date.

While it is a housekeeping chore to collate these two files to obtain the full
credit card information, it is also more secure. Many people have problems
setting up PGP encryption on their server, so this seemed to be a resonable
alternative.

If this process doesn't work for you, you may want to consider using real time
credit card processing. Commerce.cgi 2.0 currently allows you to use choose from
AuthorizeNet, eProcessingNetwork, iTransact, or LinkPoint HTML.

Whether you choose Offline, AuthorizeNet, eProcessingNetwork, iTransact, or
LinkPoint HTML, you will need to enter some additional information in the new
Gateway Settings screen. We'll learn more about this after we get through the
rest of the Program Settings....

2) Please enter the full URL of your /images directory.

For example: http://www.commerce-cgi.com/cgi-bin/store/html/images DO NOT
include the trailing slash!!

Commerce.cgi 2.01 does away with the annoying 'Path To Html' variable that we
used in the 1.02 version. Now, if you find that you cannot serve images from
your /cgi-bin directory, you can simply create an images directory somewhere
else on your server, move all of the images from the /cgi-bin/store/html/images
directory to this new directory, and enter the URL to that directory here. Just
as it says, DO NOT include the trailing slash in the URL!

3) Please enter the full URL of your store here:
(ex: http://www.commerce-cgi.com/cgi-bin/store/commerce.cgi)

To help fix another annoying problem from version 1.x, we've added some regular
expressions into Store Manager to calculate your cookie settings. Now you can
just enter the full URL to your store here and the cookie settings should be all
set.

One important note: Cookies are very particular and need to be set carefully.
Specifically, take a look at these two URLs:

http://www.commerce-cgi.com/cgi-bin/store/commerce.cgi

http://commerce-cgi.com/cgi-bin/store/commerce.cgi

These two URLs may access the same file, but they ARE NOT the same URL!. If you
drop the 'www' from your URL in this setting, and then try to access your Store
using the 'www' in the URL, you'll find that the cookie won't be set. Similarly,
if you include the 'www' in this setting, but access the Store without using the
'www' in the URL, the cookie won't be set. Just be consistent with how you use
your URL and you shouldn't have any problems.

If you're worried that visitors to your Store may drop the 'www' on their own,
just make sure that all the links on your frontpage include the 'www' and then
the cookie will be set when they click through....

4) Customers from the state selected here will be charged sales tax

This is self explanatory. Orders that are SHIPPED to this state will be charged
sales tax.

5) Enter sales tax percentage here. Enter as a decimal number.
Ex: ".05" for "5%", ".06" for "6%", etc.

Orders that are shipped to the state selcted above will have this percentage
added to the order for sales tax.

6) Do you wish to have orders e-mailed to you?
You'll probably answer 'yes' to this...

7) Enter the e-mail address where you'd like the orders sent

Self explanatory - just make sure that it's an address that is reliable.

8) Do you wish to have the orders written to a log file?
You'll probably answer 'yes' to this too...

9) Choose a unique name for your log file. (ex: "mylog3218.txt")

This is *very* important. Make up an odd name that only you will remember...use
letters and numbers. This file will contain your order data and will be located
in the /cgi-bin/store/log_files directory. It is a wise idea to password protect
this directory!

10) Enter the e-mail address of your webmaster or administrator here

This is the e-mail address that appears as the return address when the customer
is sent an order confirmation e-mail. A customer service e-mail address is a
good choice for this....

Once you have entered all of the data above, you can click the Submit button.
You should see a message stating:

System settings have been successfully updated. Check your Gateway Settings here

Click the Gateway Settings link. Depending upon how you've decided to process
orders, you will be asked for certain information....


--------------------------------------------------------------------------------

LinkPoint HTML Processing

If you've chosen to use LinkPoint HTML, you'll be asked to enter some additional
information.

1) Gateway Username

Enter your valid username provided to you by Cardservice International

2) Secure URL to your Gateway's server

This is most likely https://secure.linkpt.net/cgi-bin/hlppay


--->LinkPoint HTML Administration Program<---

To use Commerce.cgi with LinkPoint HTML, you will also need to login to your
LinkPoint HTML Administration Program and make a few changes.

The LinkPoint HTML Administration Program can be accessed at the URL provided to
you by Cardservice International in your Welcome Letter.

1) Receipt's top
2) Receipt's bottom

The text entered for 'Receipt's top' and 'Receipt's bottom' will appear on both
the customers confirmation e-mail, and the receipt page displayed after the
order is placed.

3) Order Submission Form URL

Enter the URL of your order submission form - the web page from which control is
passed to the secure web server for card processing. This enables a check of the
referring web page for each transaction, in order to prevent fraud.

For example:
http://www.yourserver.com/yourstorename/yourorderform.html

or if you are using a secure web server:
https://www.yourserver.com/yourstorename/yourorderform.html

or if you are generating the form in a CGI:
http://www.yourserver.com/yourstorename/yourorderform.cgi

4) "Thank You" Page URL

Enter the URL of your "Thank You" page - the web page where you want to take a
customer if a transaction was approved. This should be the full URL to your
Commerce.cgi store (preferably, this should be a secure URL to avoid browser
warnings after the order is processed.)

5) Check here if this url is a CGI script.
6) Check if you wish to automatically display specified URL after the LinkPoint
HTML receipt page.

Steps 5 and 6 are check boxes....you should check them both!

7) "Sorry" Page URL

Enter the URL of your "Sorry" page - the web page where you want to take a
customer if a transaction was declined and the customer decided not to try
again/canceled the order.

8) Check here if this url is a CGI script.
9) Check if you wish to automatically display specified URL after the LinkPoint
HTML receipt page

Steps 8 and 9 are check boxes. Check Step 8 if your 'sorry' page is a cgi
script. Check Step 9 to automatically redirect the customer to your 'sorry' page
when their order is declined.

10) Company Logo Graphics URL

Enter the URL of your company logo graphics if you want it to be displayed at
the top of each page. This URL must point to a secure site, use HTTPS protocol.
Please make sure that your image fits the page.

11) Background Graphics URL

Enter the URL of your background graphics if you want to substitute the default
one. This URL must point to a secure site, use HTTPS protocol.

12) Company Name

Enter your company's or store's name here. It will be displayed at the top of
each page. You can enter up to 30 characters including spaces.

13) Custom Fields

It is VERY important that you enter the following 6 Customer Fields exactly as
listed. Do *NOT* click the check box to make them 'viewable'

Enter these EXACTLY as shown below in the 'Name' column

ordnum
custnum
shippingamount
shippingmethod
subtotalamount
salestaxamount

Captions for these are not required, but you can enter these if you'd like in
the 'Caption' column

Order Number
Customer Number
Shipping Price
Shipping Method
Subtotal
Sales Tax


14) Customer's Receipt

Check here if you would like to receive a copy of each receipt


--------------------------------------------------------------------------------

Offline Processing

If you've chosen to process your orders offline, you will only be asked to enter
one more piece of data

1) Please enter the Secure URL to your commerce.cgi store.

Because you are collecting credit card data, you really should have a secure
connection when that data is sent from the orderform to the server. Commerce.cgi
also requires that this secure URL accesses the exact same commerce.cgi file as
the standard URL. For example:

http://www.commerce-cgi.com/cgi-bin/store/commerce.cgi

https://www.server2200.net/commerce-cgi/cgi-bin/store/commerce.cgi

Both access the same exact file, one is through a standard http connection, the
other is through a secure https connection.

If your hosting company expects you to put secure files on a different machine,
commerce.cgi will not work. If they want you to put secure files in a special
directory, you *may* be able to creat a softlink from the secure directory to
the directory containing commerce.cgi. Ask your Server Administrator for
assistance.

Hopefully, you will simply be able to enter the secure URL and you'll be all
set....


--------------------------------------------------------------------------------

AuthorizeNet Processing

If you've chosen to use AuthorizeNet, you'll be asked to enter some additional
information. Most of it is self explanatory, and will be used to customize the
AuthorizeNet orderform. It is no longer necessary for you to have a secure
server on your end to use Commerce.cgi with AuthorizeNet. All order data is now
collected on the AuthorizeNet secure server...

1) Gateway Username

Enter a valid username provided to you by AuthorizeNet

2) Secure URL to your Gateway's server
This is most likely:
https://secure.authorize.net/gateway/transact.dll

3) Complete URL to the logo you'd like to display on your orderform. This MUST
be a secure https URL. You can also leave this blank if you prefer.

This is self explanatory. If you choose to include this, just make sure it is a
SECURE url or you'll have problems.

4) Background color of your orderform.
5) Text Color
6) Link Color

These three are all self explanatory customization variables....

7) Enter the text that you'd like displayed at the top of your orderform.

8) Enter the text that you'd like displayed at the bottom of your orderform.

Self explanatory....

9) Enter the text that you'd like displayed at the top of your receipt page.
10) Enter the text that you'd like displayed at the bottom of your receipt page.
Self explanatory...

11) Enter the text that you'd like displayed at the top of your customer's
e-mail receipt.
12) Enter the text that you'd like displayed at the bottom of your customer's
e-mail receipt.

Self explanatory...the e-mail receipt is sent to the customer by AuthorizeNet
after the order is processed.


--------------------------------------------------------------------------------

eProcessingNetwork

eProcessingNetwork is another gateway that is becoming popular. As of this
writing, the secure URL for eProcessingNetwork is:
https://www.eProcessingNetwork.Com/cgi-bin/an/order.pl

eProcessingNetwork supports all of the same functionality as AuthorizeNet, so
simply refer to the AuthorizeNet instructions above for the remainder of the
setup.


--------------------------------------------------------------------------------

iTransact Processing

If you've chosen to use iTransact, you'll be asked to enter some additional
information. Most of it is self explanatory, and will be used to customize the
iTransact orderform. It is no longer necessary for you to have a secure server
on your end to use Commerce.cgi with iTransact. All order data is now collected
on the iTransact secure server...

1) Gateway Username

Enter your valid username provided to you by iTransact

2) Secure URL to your Gateway's server

This is most likely:
https://secure.itransact.com/cgi-bin/mas/split.cgi

3) Enter the name of your business here.

Self explanatory...

These next three variables need to be answered correctly for your specific
account. If you are unsure of any of these, contact iTransact support for
assistance.

4) Are setup to accept credit cards through iTransact?
Select '0' for no, '1' for yes.
Self explanatory...

5) Are you setup to accept checks through iTransact?
Select '0' for no, '1' for yes.
Self explanatory...

6) Are you setup to accept EFT through iTransact?
Select '0' for no, '1' for yes.
Self explanatory...

7) Do you want to allow customers to enter an alternate shipping address? Select
'0' for no, '1' for yes.

If you answer yes to this, the iTransact orderform will allow customers to enter
a shipping address that is different from the billing address. Depending on your
business, you may or may not want to allow this...

8) Enter the text that you'd like to appear in the body of the confirmation
e-mail sent to the customer.

This is the e-mail that is sent to the customer by iTransact after the order is
processed.


--------------------------------------------------------------------------------

Adding Products To Your Datafile

Although there is no 'hard-coded' limit to the amount of products that can be
maintained by Store Manager (or used by Commerce.cgi), we generally recommend
that you use caution (100 to 200 products max). This is for performance reasons,
mostly.

Nothing is programmed into manager.cgi or commerce.cgi to limit the amount of
products, but you may see server performance problems if your datafile becomes
too big....just be careful and consider yourself warned :-)

The 'Add A Product' screen of Store Manager can be access here:

http://www.commerce-cgi.com/cgi-bin/store/protected/manager.cgi?add_screen=yes

Obviously, you need to change this to reflect your specific URL and path.

1) Reference # - This value is entered automatically by Store Manager. This is
not a SKU number, but simply a unique number needed by Commerce.cgi to identify
this particular product

2) Category - This should be one word only, no spaces. Commerce.cgi displays
products on dynamic product pages based on this category. For example, to
display all of the products in the 'books' category, you create a link that
looks something like this:

http://www.your_domain.com/cgi-bin/store/commerce.cgi?product=books

3) Price - just the numeric price, no $ sign needed

4) Product Name - two or three words to identify the product. This value is
displayed in the shopping cart.

5) Image File - This is just the name of the image file, NOT the complete URL or
path! If you've correctly set the 'URL To Images' field in the Program Settings
screen, you this image should display correctly on your Commerce.cgi product
pages.

6) Option File - the filename of your options file NOT the complete URL or path.
The options files are located in the /store/html/options directory. Check out
the sample file called gift_option.html for reference.

7) Shipping Price - This should be set to your base shipping price for each
product. See the 'Shipping' Price section of this Read Me for more complete
details.

8) User Defined Field One through Five - these five fields allow you to store up
to five pieces of data that can be displayed on your product pages by placing
'tokens' within the productPage.inc file. These are defined in the upcoming
discussion called "Editing the look and feel of your product pages". Please note
that User Defined Fields are NOT captured as a part of the order, they are
designed for product page dislay only.

9) Description - This is where you enter the description and information about
the product. HTML can be included here as well...


--------------------------------------------------------------------------------

Editing Products Within Your Datafile

The Edit Product screen can be accessed here:

http://www.commerce-cgi.com/cgi-bin/store/protected/manager.cgi?edit_screen=yes

Obviously, you need to change this to reflect your specific URL and path.

Here you will select the product you wish to edit, and then you will be taked to
a form similar to the Add A Product form where you can make your changes.


--------------------------------------------------------------------------------

Deleting Products From Your Datafile

The Edit Product screen can be accessed here:

http://www.commerce-cgi.com/cgi-bin/store/protected/manager.cgi?delete_screen=yes

Obviously, you need to change this to reflect your specific URL and path.

Here you will select the product you wish to delete. Use this screen with care!!


--------------------------------------------------------------------------------

Shipping Levels and Prices

As mentioned in the 'Adding Products To Your Datafile' section of this Read Me,
every product has a fixed 'base shipping' price assigned in the datafile. To add
some additional flexibilty, there is now a way to add in additional levels of
'upgrade' shipping.

First, you will need to determine which orderform you are using. This is
dependent upon how you are processing your orders. Look in the /store/html
directory and you'll notice four files named *-orderform.html, They are:

AuthorizeNet-orderform.html
iTransact-orderform.html
Linkpoint-orderform.html
Offline-orderform.html

Choose the orderform that matches your method of order processing, download this
file in ascii mode and open it up in your text editor.

Look for this SELECT box:

<SELECT NAME="upgradeShipping">
<OPTION VALUE="">Please Make Your Selection</OPTION>
<OPTION VALUE="0|Ground Shipping">Ground Shipping (+0.00)</OPTION>
<OPTION VALUE="1|U.P.S. Three Day - Upgrade">U.P.S. Two Day (+5%)</OPTION>
<OPTION VALUE="2|U.P.S. Two Day - Upgrade">U.P.S. Two Day (+10%)</OPTION>
<OPTION VALUE="3|U.P.S. Overnight - Upgrade">U.P.S. Overnight (+15%)</OPTION>
</SELECT>

This is where you'll add your levels of upgraded shipping. Notice how the
"VALUE=" statements contain pipe delimited data such as:

2|U.P.S. Two Day - Upgrade

The '2' indicates that it will get the percentage value from the 2nd field in the
@upgradeShipPrice array, in the commerce_subs.pl file sub define_shipping_logic.

That looks something like this:
@upgradeShipPrice = (0, 5, 10, 15);

So '2' would read a value of 10%... Note in Perl the first field is '0'...

The 'U.P.S. Two Day - Upgrade' is the method of shipping that will be
recorded with the order.


--------------------------------------------------------------------------------

Adding your Header, Footer, and Frontpage

The header and footer files are displayed on all of your dynamic product pages.
There are separate header and footer files which are displayed on the orderform,
allowing you to include secure links to images more easily.

The frontpage is simply a static HTML page that is parsed by the script and
displayed when commerce.cgi is accessed.

NOTE: Many people are confused by this....to access the frontpage of your store,
your link should look something like this:

http://www.your_domain.com/cgi-bin/store/commerce.cgi

The script will grab the file called 'frontpage.html' that is found in the
/store/html directory and display that file. DO NOT link directly to
frontpage.html!!!

PLEASE NOTE: the frontpage.html WILL NOT automatically/dynamically display links
to your product categories! As I've said, this is a static HTML page. I've added
some additional comments on this subject to the frontpage.html that is included
with your commerce.cgi files - please read that page for more info...

1) Create your standard header HTML and save it in a file called
store_header.inc. This file should NOT include <html> or <body> tags - use the
sample store_header.inc as a guide.

Upload this file and place it in the directory
/cgi-bin/store/html/html-templates

2) Create your secure header HTML and save it in a file called
secure_store_header.inc. This file should NOT include <html> or <body> tags -
use the sample secure_store_header.inc as a guide. This file can contain secure
links to images if needed.

Upload this file and place it in the directory
/cgi-bin/store/html/html-templates

3) Create your standard footer HTML and save it in a file called
store_footer.inc. This file should NOT include </html> or </body> tags - use the
sample store_footer.inc as a guide.

Upload this file and place it in the directory
/cgi-bin/store/html/html-templates

4) Create your secure footer HTML and save it in a file called
secure_store_footer.inc. This file should NOT include </html> or </body> tags -
use the sample secure_store_footer.inc as a guide. This file can contain secure
links to images if needed.

Upload this file and place it in the directory
/cgi-bin/store/html/html-templates

5) Create your Frontpage HTML and save it in a file called frontpage.html.
Upload this file and place it in the directory /cgi-bin/store/html. To view your
frontpage, you need to access commerce.cgi through a link that looks something
like this:

http://www.your_domain.com/cgi-bin/store/commerce.cgi

PLEASE NOTE: the frontpage.html WILL NOT automatically/dynamically display links
to your product categories! As I've said, this is a static HTML page. I've added
some additional comments on this subject to the frontpage.html that is included
with your commerce.cgi files - please read that page for more info...


--------------------------------------------------------------------------------

Editing the look and feel of your product pages

We've tried to make it a little easier for desigers to edit the look and feel of
the product pages. There are now template files located in the
/cgi-bin/store/html/html-templates directory which will allow you to edit
various parts of the product page without digging through the script.

The template files are:

cart_footer.inc
change_quantity_footer.inc
delete_items_footer.inc
productPage.inc
secure_store_footer.inc
secure_store_header.inc
store_footer.inc
store_header.inc

The productPage.inc template allows you to drop 'tokens' into the file to easily
display product data from the datafile. Here are the possible values...

%%image%%
%%name%%
%%description%%
%%price%%
%%shippingPrice%%
%%userFieldOne%%
%%userFieldTwo%%
%%userFieldThree%%
%%userFieldFour%%
%%userFieldFive%%

Please note: these tokens are for display only - these values are not included
in your order log or confirmation e-mails.


--------------------------------------------------------------------------------
Hopefully, this Read Me has answered some of your basic questions. Good luck
with your online business!
