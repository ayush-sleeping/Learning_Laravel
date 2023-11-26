# Learning_Laravel
> "I've been learning and using Laravel a lot for my internship as a FullStack Developer. To keep everything organized, I made a special collection of important code and notes. This collection is like a big container that holds all the things I've learned about Laravel, starting from the basics to the more advanced stuff. .... "

<br>

### Important Commands

| No. | Questions |
|---- | ---------
|1 | [How to Install Laravel](#Install-Laravel)|
|2 | [Creating a New Project](#New-Project)|
|3 | [Running Your Project in the Browser](#Run-your-Project-in-browser)|
|4 | [Updating Composer](#Update-Composer)|
|5 | [Making a Model in Laravel](#Making-a-Model-in-Laravel)|
|6 | [Creating a Migration File & Migrate the migration file](#Creating-a-Migration-File)|
|7 | [Generating a Controller File](#Generating-a-Controller-File)|
|8 | [Understanding Route Lists](#Understanding-Route-Lists)|
|9 | [Migrating & Seed Your Database](#Migrating-&-Seed-Your-Database)|
|10| [Generating an Application Key](#Generating-an-Application-Key)|
|11| [Creating a Storage Link](#Creating-a-Storage-Link)|
|12| [Refreshing Laravel's Memory](#Refreshing-Laravel's-Memory)|
|13| [Understanding CRUD Project Flow](#Understanding-CRUD-Project-Flow)|

<br>

1. ### Install Laravel
    
    You can install Laravel globally as
    ```cmd
   composer global require laravel/installer
    ```
    This command installs Laravel globally on your system. It allows you to create new Laravel projects using the laravel new command.


  **[⬆ Back to Top](#Important-Commands)**
  

2. ### New Project
    
    To make a New project  of Laravel 
    ```cmd
   laravel new app_name
    ```
    This command creates a new Laravel project with the specified name (app_name). It sets up the basic structure and necessary files for a Laravel application.


  **[⬆ Back to Top](#Important-Commands)**
    

3. ### Run your Project in  browser
    
    * To your project  of Laravel in browser
    ```cmd
   php artisan serve
    ```
    * And if you want to run your project in different port
   ```cmd
   php artisan serve --port=8080
   ```
   This command starts the development server, allowing you to access your Laravel application in the browser at http://localhost:8000/. You can specify a different port using --port.



  **[⬆ Back to Top](#Important-Commands)**
    

4. ###  Update Composer 
    
    * To your update composer of project
    ```cmd
   composer update
    ```
    This command starts the development server, allowing you to access your Laravel application in the browser at http://localhost:8000/. You can specify a different port using --port.


    * Ignoring Some Requirements during Update
   ```cmd
   composer update --ignore-platform-reqs
   ```
   In some cases, you might need to update without considering platform requirements. This command allows you to update without checking PHP and extension versions.


  **[⬆ Back to Top](#Important-Commands)**
   

5. ###  Making a Model in Laravel
    
    * To make a Model file
    ```cmd
   php artisan make:model modelNAME
    ```
    This command generates a new Eloquent model in the app/Models directory. Models represent database tables and encapsulate business logic related to data.
   
    * Creating a Migration File with Model
   ```cmd
   php artisan make:model modelNAME -m
   ```
   This command not only creates a model but also generates a corresponding database migration file. Migrations define the structure of your database tables.



  **[⬆ Back to Top](#Important-Commands)**  

6. ###  Creating a Migration File
    
    * To Create a Migration File
    ```cmd
   php artisan make:migration create_contacts_table
    ```
    This command generates a new migration file in the database/migrations directory. Migration files define changes to your database schema.
   
    * Migrate the migration file 
    ```cmd
   php artisan migrate
    ```
    This command applies pending migrations, updating your database schema to match the changes defined in the migration files.
   
   * Migrate fresh the migration file 
    ```cmd
   php artisan migrate:fresh
    ```
    Use this command to rollback all migrations and start fresh. It re-runs all migrations, effectively resetting your database.



  **[⬆ Back to Top](#Important-Commands)**
  
7. ###  Generating a Controller File
    
    Generate a Controller File
    ```cmd
   php artisan make:controller nameofController --resource
    ```
    This command creates a new controller with resourceful methods (index, create, store, show, edit, update, destroy). Controllers handle user requests, process data, and interact with models.


  **[⬆ Back to Top](#Important-Commands)**
   
8. ###  Understanding Route Lists
    
    Generate a Route List
    ```cmd
   php artisan route:list
    ```
    This command displays a list of all registered routes for your application. It shows the HTTP methods, URI, controller, and middleware for each route.


  **[⬆ Back to Top](#Important-Commands)**
   
9. ###  Migrating & Seed Your Database
    
    * Migrate Your Database
    ```cmd
   php artisan migrate --seed
    ```
    `migrate --seed` applies migrations and seeds the database with sample data.
   
    * Migrate fresh your Database
   ```cmd
   php artisan migrate:fresh --seed
   ```
   `migrate:fresh --seed` resets the database, then applies migrations and seeds.
   
    * Seed your Database
   ```cmd
   php artisan db:seed
   ```
   `db:seed` seeds the database without running migrations.


  **[⬆ Back to Top](#Important-Commands)**
     
10. ###  Generating an Application Key
    
    Generate an Application Key
    ```cmd
    php artisan key:generate
    ```
    This command generates a new application key used for encryption and other security-related features in Laravel.


  **[⬆ Back to Top](#Important-Commands)**
 
       
11. ###  Creating a Storage Link
    
    Create a Storage Link
    ```cmd
    php artisan storage:link
    ```
    This command creates a symbolic link from the public/storage directory to the storage/app/public directory. It is used to make file uploads publicly accessible.


  **[⬆ Back to Top](#Important-Commands)**
  
       
12. ###  Refreshing Laravel's Memory
    
    * Optimize Project
    ```cmd
    php artisan optimize:clear
    ```
    clears the compiled classes and services from the cache.
    
    * Clear cache Project
    ```cmd
    php artisan cache:clear
    ```
    clears the application cache.
          
    * Refresh route Project
    ```cmd
    php artisan route:clear
    ```
    clears the route cache.
        
    * Clear view Project
    ```cmd
    php artisan view:clear
    ```
    clears the view cache.
          
    * Clear config Project
    ```cmd
    php artisan config:clear
    ```
    clears the configuration cache.


  **[⬆ Back to Top](#Important-Commands)**

       
13. ###  Understanding CRUD Project Flow
    
> In a typical CRUD (Create, Read, Update, Delete)
application built with Laravel, the various components are distributed
across different files and directories. Here's a breakdown of the key
files and their responsibilities:


* Routes: routes/web.php or routes/api.php :
  
  Responsible for defining the routes that map HTTP requests to controller actions.

* Controllers: app/Http/Controllers :
  
  Handle incoming requests, process data, and return the appropriate responses. They orchestrate the application's logic and interact with models.

* Models: app/Models :
  
  Represent the data entities of your application. They interact with the database and encapsulate the business logic of the application.

* Views: resources/views :
  
  Contain the presentation layer of your application. They define the structure and layout of the HTML pages that are served to the user.

* Migrations: database/migrations :
  
  Define the structure of the database tables and handle schema modifications using PHP code. Migrations allow you to create, modify, and delete database tables and their columns.

* Middleware: app/Http/Middleware :
  
  Enable you to filter HTTP requests entering your application. They can perform tasks like authentication, logging, session handling, etc.

* Requests: app/Http/Requests :
  
  Validate incoming HTTP requests before they reach the controller. They ensure that the data sent by the user is valid and meets the specified criteria.

* Database Seeders: database/seeders :
  
  Populate the database with dummy data for testing and development purposes.

* Configuration: config :
  
  Contains various configuration files for the application, including database configuration, cache configuration, and more.

* Views Partials and Layouts: resources/views/partials and resources/views/layouts :
  
  Include reusable view components and layout templates that can be used across multiple views.



  **[⬆ Back to Top](#Important-Commands)**
  
