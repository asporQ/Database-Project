# This is Database Course’s Project

Database Design: ER Diagram 

Objective: Develop a mini web application with a focus on e-commerce functionality. Your project will involve designing an ER diagram for the database and implementing a functional web app with the following features:

    • Products page (publicly)
    • Log-in page
    • Register page (Before customers can place an order, they need to be a member first)
    • Home page and Member’s info.
    • Cart page
    • Summary page
    
Include 1 more feature by selecting from this:

    • Promotion: discount
    • Promotion: buy x get x
    • Member Royalty Program: membership level
    • Wish list page: a customer can add favorite items into a wish list
    • Comments: textual reviews
    • Rating System: a star-based rating system (e.g., 1 to 5 stars) for users to rate products
    • Presentation: 10-15 mins (idea, database schema design, app demo)

For contributors: 

   • migrate and seed first if first clone
    if not first time run below on database sql to clear old data first

        SET FOREIGN_KEY_CHECKS = 0;
        TRUNCATE TABLE laravel.products;
        SET FOREIGN_KEY_CHECKS = 1;
        
   • admin need to change status by manual on database directly to admin
            
