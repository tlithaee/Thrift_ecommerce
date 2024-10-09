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

## Technologies (Planned):
- *Laravel*: The PHP framework we will use for the development.
- *SqLite*: Database for storing customer data, orders, and menu information.
- *Tailwind*: For the responsive front-end design.
- *JavaScript*: For enhancing user interactions.

## Next Steps:
1.  *Development Setup*: Set up the Laravel framework and database configurations.
2. *Feature Implementation*: Begin coding the core features such as menu display, order processing, and user authentication.
3. *Testing*: Ensure all features work as expected through user testing.