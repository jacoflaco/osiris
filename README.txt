Project

  OOO     SS    II  R R     II   SS
 O   O   S   S  II  R   R   II  S   S
O     O   S     II  R R     II   S
O     O     S   II  R  R    II     S
 O   O   S   S  II  R   R   II  S   S
  OOO     SSS   II  R    R  II   SSS

Version 1.0.0

This is a website that implements both front-end and back-end web development.
The website is for a Desinations and Resorts company where you can make reservations,
pay bills, and learn all about the destinations.

Getting Started

Open a browser and in the URL bar, type 'corsair.cs.iupui.edu:20111/osiris/current/index.php'
There you will be presented with the home page.
You can click on REGISTER to register a user and then login to see more options. After registering, you will
be sent an email with an activationcode and a link. The link should automatically activate you. If not, copy and paste the code.

For Admin controls, go to the following website 'corsair.cs.iupui.edu:20111/osiris/current/admin/login.php'
You can use the following credentials to login:

  Username: jakeah122@gmail.com
  Password: password12

This will take you to a landing page for admin controls. You will have the option to View database info
You will also be able to Enter data into the database with the New Entry button. There is also a shortcut to phpMyAdmin
All forms are working for both Users and Admins.
If you would like to view a report, click on Views on the top.

If you return to the user website at 'corsair.cs.iupui.edu:20111/osiris/current/index.php'
You can login and access the user controls. After logging in, your name will appear in the top right nav bar
Next to and inside that drop down, you will have the user options. You can create a reservation, view reservations, change password,
pay bills, and cancel reservations.

All content pages (any page under the 'Destinations', 'Experience Osiris', 'About Osiris', and 'Resort Hotels') are all filled out with
placeholder information used from a combination of other similar resort sites which I will cite at the end of this file.


===============================
  Things to change if I had time
  ===================================

1. Create my own content for the information pages. I would love to be able to create a website 100% top to bottom
   Currently, I created every part of the website from scratch just besides the text and images.

2. For the reservation form, I have not implemented a feature to let you reserve for a different date if the date that you want is taken
   For example, each hotel only has one penthouse suite and if I reserve a penthouse suite for December 15th to the 20th for the
   Azure Hotel in Hawaii, no one can reserve that suite at that hotel for any date until it is canceled, or until after the 20th.

3. At the beginning of the course I was more concerned with aesthetics because that's what I know best, eventually I realized that it
   was hindering my work with the back-end. If I had more time, I would plan the site a little better to give it a more responsive design.
   I created it with some responsive characteristics, but didn't get to implement it.

4. I would create an error/message for all pages if something goes wrong or something is successful.
   I can't think of any of the top of my head that don't have it, but I know I skipped some.

5. Somewhere in the last couple of weeks, the search bar from the datatables in the views disappeared. I didn't even mess with it,
   but if I had more time I would figure it out

6. On the main page with the resort/hotel boxes, those do not update with the database. Neither do the ones on the user registration page
   On the admin reservation page it is a dropdown list and updates with the database

7. I would allow for updating the database such as user information, reservation information, payment details, etc. As of now,
   the only way to do that is through phpMyAdmin.


====================
  SOURCES
  ======================

1. http://www.vidanta.com
2. http://www.fourseasons.com
3. https://www.constancehotels.com/en/hotels-resorts/maldives/moofushi/
4. http://www.elconresort.com
