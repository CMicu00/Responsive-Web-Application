# Responsive-Web-Application

This is a project for University

# Features

All pages contain a screen size responsive navigation bar with 3 destinations
1. Home "index.php"
2. Products "products.php"
3. Cart "cart.php"

Sthe site has log in and sign up functionality which is stored in the database

## Home
Only contains a welcome message and an iframe with an embedded YouTube video

## Products
The products page contains all the products provided in the resources.
The page is generated using php.

This page allows the user to view more details by clicking on the "Details" button which redirects to the "item.html" page and populates the "item.html" page using the ```populateItem()``` function.
the ```populateItem()``` function uses the browser's session storage to remember the item so it can display it.

The products page also allows the user to add an item to the cart by clicking the "ADD TO CART" button. This button uses the ```addToCart()``` function from main.js to create or append an array of objects  in the browser's local storage, so it can show them on the "cart.php" page

## Cart
This page is used to display the content of the "cart" which is gathered from local storage and displayed by the ```populateCart()``` function. 
On this page, the user can remove the items they don't wish to have in the cart by clicking the "Remove from Cart" button. This button uses the ```removeFromCart()``` function.

## Time Ploblems

Due to time constrains some featureses were not implemented. Given more time, more features could have been implemented. 
