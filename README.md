# Laravel Final Project Plan - ArtisanEats

## Group Information
- *Group Number:* 34
- *Class:* Pemrograman Berbasis Kerangka Kerja (D)

## Group Members
| Name               | NRP         |
|--------------------|-------------|
| Rayssa Ravelia      | 5025211219  |
| Wan Sabrina         | 5025211023  |
| Syarifah Talitha    | 5025211175  |

## Demo Video
Below is the demo video link that illustrates the key functionality of this project:  
[Watch the demo video here](https://youtu.be/z85R-rFig2Q)

## Conceptual Data Model
Below is the conceptual data model that outlines the structure and relationships of the data used in this project.
![alt text](cdm.jpg)

## Project Overview
For our final project in the Laravel framework course, we plan to develop a website called **ArtisanEats**, a Food Order Delivery Website. This website will allow customers to browse food menus and place delivery orders. The website will feature a clean and visually appealing green theme to represent freshness and sustainability.

### Key Features (Planned):
1. *Menu Display:* Customers will be able to view a list of available food items, including details such as price, description, and images.
2. *Order System:* Customers can add food items to their cart, adjust quantities, and place orders for delivery.
3. *User Authentication:* Separate login systems for customers and admins. Admins will manage the menu, view orders, and update order statuses.
4. *Responsive Design:* The website will be designed to work seamlessly on both mobile devices and desktops.

This project is currently in the planning stage, and we aim to build a user-friendly platform that simplifies the food ordering process while ensuring efficient backend management for administrators.

## Planned Models:
ArtisanEats will feature several key models that form the backbone of the application. These models will effectively structure data and manage relationships between different entities within the system, encapsulating specific functionality related to core features of our food order delivery website.

1. **Cart Model**: <br />
   This model will handle the shopping cart functionality, allowing users to add, update, and remove items from their cart. It will manage the relationship between users and the products they wish to purchase.

2. **Product Model**: <br />
   The Product model will represent individual food items available for order. It will include attributes such as name, description, price, and image URL. This model will be essential for displaying menu items to users.

3. **User Model**: <br />
   This model will manage user information for both customers and admins. It will handle user authentication, registration, and role-based access control, ensuring that users can log in and access features relevant to their role.

4. **Order Model**: <br />
   The Order model will track customer orders, including the items ordered, quantities, user details, and order status (e.g., pending, completed). This model will be critical for managing the ordering process and ensuring that orders are processed correctly.

## Technologies:
- *Laravel*: The PHP framework we will use for the development.
- *SqLite*: Database for storing customer data, orders, and menu information.
- *Tailwind*: For the responsive front-end design.
- *JavaScript*: For enhancing user interactions.

## Web Pages
Below describes the key pages and functionalities of the web application.

- [**Authentication**](#authentication):
  - [Login Page](#login-page)
  - [Register Page](#register-page)
- [**Homepage**](#homepage):
  - [Hero Section](#hero-section)
  - [About Us Section](#about-us-section)
  - [Contact Us Section](#contact-us-section)
- [**Menu**](#menu):
  - [Menu Page](#menu-page)
  - [Category Page](#category-page)
  - [Menu Detail Page](#menu-detail-page)
- [**Order**](#order):
  - [Cart Page](#cart-page)
  - [Order/Checkout Page](#ordercheckout-page)
  - [Order Summary/Payment Page](#order-summarypayment-page)
  - [Order History Page](#order-history-page)
- [**Chef**](#chef):
  - [Chef Page](#chef-page)
  - [Chef Detail Page](#chef-detail-page)
- [**Profile**](#profile):
  - [Profile Settings Page](#profile-settings-page)

### **Authentication:**

1. **Login Page:**

   ![alt text](https://github.com/rayrednet/Laravel-FP/raw/main/public/images/screenshots/login.png)
   - The login page allows registered users to log into their accounts. 
   - It features fields for entering an email address and password. 
   - There's also an option to remember the user by using a "Remember Me" checkbox. 
   - If a user forgets their password, they can click on the "Forgot your password?" link to reset it.
   - Users who don’t have an account can navigate to the registration page by clicking the "Register here" link.
  
2. **Register Page:**

   ![alt text](https://github.com/rayrednet/Laravel-FP/raw/main/public/images/screenshots/register.png)
   - The register page is where new users can create an account.
   - Users must provide their name, email, password, and confirm the password before clicking the "Register" button.
   - The page also has a link for existing users to navigate to the login page if they already have an account. 

### **Homepage:**

1. **Hero Section:**

   ![alt text](https://github.com/rayrednet/Laravel-FP/raw/main/public/images/screenshots/hero.png)
   - The hero section showcases the main offer of Artisan Eats, highlighting its services for gourmet food delivery.
   - It features a prominent headline: *"Experience the Finest Cuisine with Artisan Eats"*, along with a short description about the service.
   - Users can click the "Browse Menu" button to explore available dishes.

2. **About Us Section:**

   ![alt text](https://github.com/rayrednet/Laravel-FP/raw/main/public/images/screenshots/about.png)
   - The About Us section provides information about the company’s mission and values.
   - It emphasizes the use of fresh, locally-sourced ingredients to ensure the best quality meals.
   - There's a "Contact Us" button for users to reach out for further information.

3. **Contact Us Section:**

   ![alt text](https://github.com/rayrednet/Laravel-FP/raw/main/public/images/screenshots/contact.png)
   - This section provides a form for users to directly contact Artisan Eats.
   - It includes fields for name, email, and a message, as well as key contact details such as address, phone number, and email. 
   - The "Send Message" button allows users to submit their inquiries or messages easily.

### **Menu:**

1. **Menu Page:**

   ![alt text](https://github.com/rayrednet/Laravel-FP/raw/main/public/images/screenshots/menu1.png)
   - The Menu Page showcases a curated list of available dishes categorized by type.
   - Users can easily browse and add items to their cart from this page.
  
   ![alt text](https://github.com/rayrednet/Laravel-FP/raw/main/public/images/screenshots/menu2.png)
   - Each dish is displayed with an image, name, price, and category.
   - There is also an option to view more details or directly add the dish to the cart.

2. **Category Page:**

   ![alt text](https://github.com/rayrednet/Laravel-FP/raw/main/public/images/screenshots/categories.png)
   - The Category Page groups dishes by specific types such as appetizers, entrees, desserts, and more.
   - Users can explore items by category and view all relevant dishes for their selection.

3. **Menu Detail Page:**

   ![alt text](https://github.com/rayrednet/Laravel-FP/raw/main/public/images/screenshots/menudetails.png)
   - This page provides detailed information about a specific dish.
   - Users can see the chef responsible for the dish, the list of ingredients, and the option to adjust the quantity before adding the item to their cart.

### **Order:**

1. **Cart Page:**

   ![alt text](https://github.com/rayrednet/Laravel-FP/raw/main/public/images/screenshots/cart1.png)
   ![alt text](https://github.com/rayrednet/Laravel-FP/raw/main/public/images/screenshots/cart2.png)
   - The cart page displays a list of the items the user has added. 
   - Users can modify the quantity or remove items from the cart.
   - An order summary on the right provides details on the original price, delivery cost, and total price.
   - On the checkout page, users input their shipping address and select their payment method. 
   - The page shows the total cost of the order and provides options like cash on delivery or digital payment methods.
   - Users can click the "Continue to Order" button to finalize their order.

2. **Order Summary/Payment Page:**

   ![alt text](https://github.com/rayrednet/Laravel-FP/raw/main/public/images/screenshots/summary.png)
   ![alt text](https://github.com/rayrednet/Laravel-FP/raw/main/public/images/screenshots/paymentsuccess.png)
   - This page confirms the details of the order and includes the final shipping address, payment method, and total price.
   - Once the payment is processed, a "Payment Successful" message is displayed, confirming the order has been placed.

3. **Order History Page:**

   ![alt text](https://github.com/rayrednet/Laravel-FP/raw/main/public/images/screenshots/history.png)
   - The order history page lists all completed orders by the user.
   - It displays details such as order number, order date, dishes purchased, and the total cost.
   - Users can expand or collapse order details to see which dishes were part of each order and the respective chefs.

### **Chef:**

1. **Chef Page:**

   ![alt text](https://github.com/rayrednet/Laravel-FP/raw/main/public/images/screenshots/chef.png)
   - The chef page presents a list of all the chefs working for the restaurant. 
   - Each chef's profile includes their name and specialty.
   - The page includes a filter option for users to browse chefs based on their specialty, such as soup, dessert, etc.
   - Pagination is available for users to navigate through multiple pages of chefs.

2. **Chef Categories:**

   ![alt text](https://github.com/rayrednet/Laravel-FP/raw/main/public/images/screenshots/chefcategories.png)
   - This page showcases chefs filtered based on their expertise in specific categories, such as soup, pasta, or desserts.
   - Users can select a category from the dropdown, and the page will update to show only the chefs specializing in that category.

3. **Chef Detail Page:**

   ![alt text](https://github.com/rayrednet/Laravel-FP/raw/main/public/images/screenshots/chefdetails.png)
   - The chef detail page highlights the full profile of an individual chef.
   - It includes their biography, their culinary journey, and the specialties they are known for.
   - Signature dishes created by the chef are also listed at the bottom of the page.

### **Profile:**

1. **Profile Settings Page:**

   ![alt text](https://github.com/rayrednet/Laravel-FP/raw/main/public/images/screenshots/profile1.png)
   - This section allows users to update their profile information, including their name, email, and profile photo. Users can upload a new photo by selecting a file and saving the changes.

   ![alt text](https://github.com/rayrednet/Laravel-FP/raw/main/public/images/screenshots/profile2.png)
   - Additionally, users can update their password by providing their current password, a new password, and confirming it. There is also an option to permanently delete their account, with a warning to download any important data before proceeding.

---

