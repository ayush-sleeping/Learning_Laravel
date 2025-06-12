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
|14| [Laravel Request Lifecycle](#Laravel-Request-LifeCycle)|
|15| [Overview of Laravel Versions in recent years](#Laravel-versions-lately)|
|16| [Artisan Console](#Artisan-Console)|



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



* Migrations: database/migrations :
  
  Define the structure of the database tables and handle schema modifications using PHP code. Migrations allow you to create, modify, and delete database tables and their columns.

* Models: app/Models :
  
  Represent the data entities of your application. They interact with the database and encapsulate the business logic of the application.

* Views: resources/views :
  
  Contain the presentation layer of your application. They define the structure and layout of the HTML pages that are served to the user.

* Controllers: app/Http/Controllers :
  
  Handle incoming requests, process data, and return the appropriate responses. They orchestrate the application's logic and interact with models.

* Routes: routes/web.php or routes/api.php :
  
  Responsible for defining the routes that map HTTP requests to controller actions.

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
  

       
14. ###  Laravel Request LifeCycle

In short : 

🧩 1. User sends a request <br>
* Someone opens your website or sends an API call.


 <br>

 
🛣 2. Request hits index.php <br>
Laravel starts from public/index.php, which:

* Loads Laravel system
* Creates the app


 <br>

 
⚙️ 3. Laravel sets up the app <br>
* Loads core settings
* Runs global middleware (like checking maintenance mode)
* Loads all important services (like database, routing, auth)


 <br>

 
🧭 4. Laravel finds the matching route <br>
* Checks ```routes/web.php``` or ```routes/api.php```
* Finds which controller or function should run


 <br>

 
🚧 5. Middleware checks the request <br>
* If the route has any extra checks (like auth), Laravel runs them here


 <br>

 
🧠 6. Controller runs <br>
* Laravel runs your controller or function
* It does the main work (DB query, logic, etc.)
* It prepares a response (like a webpage or JSON)


 <br>

 
📤 7. Response goes back <br>
* Laravel sends the response back through middleware
* Then returns it to the browser or client


 <br>
 
<b> Summary (Flow) </b> 


 <br>

 

```

[User Request]
   ↓
public/index.php (entry point) :
Loads Composer autoload and bootstrap/app.php
   ↓
bootstrap/app.php :
Creates Laravel application instance (service container)
   ↓
App\Http\Kernel (for HTTP requests) or App\Console\Kernel (for CLI commands)
   ↓
Run Global Middleware :
Handles things like maintenance mode, sessions, CSRF protection
   ↓
Register & Boot Service Providers :
Loads core services like DB, routing, auth from config/app.php['providers']
   ↓
Find Matching Route :
Checks routes/web.php or routes/api.php to match URL and method
   ↓
Run Route-specific Middleware :
Handles auth, rate limiting, etc.
   ↓
Execute Controller or Closure :
Runs logic, queries DB, returns a response
   ↓
Response Travels Back Through Middleware :
Response may be modified before sending
   ↓
Kernel → App → Response::send() :
Final response is sent to the user
   ↓
[User gets the final response]


```

0. Lets Understand this topic more :  <br>

🧠 Laravel handles each HTTP request → response cycle in several structured steps.

🔹 1. Entry Point → public/index.php  <br>
* Every web request first hits public/index.php.  <br>
This file:  <br>
* Loads Composer autoload ```vendor/autoload.php```  <br>
* Loads Laravel’s core using ```bootstrap/app.php```  <br>
* Creates the application instance  <br>

 </br>

🔹 2. Application Instance / Service Container  <br>
* Laravel creates the service container, which is the core of the app.  <br>
* It manages bindings, dependencies, facades, configs, services, etc.  <br>

 </br>


🔹 3. HTTP Kernel (```App\Http\Kernel```) <br>
* Laravel sends request to the HTTP Kernel.
Kernel responsibilities:
* Run bootstrappers (error handler, environment setup, etc.)
* Handle global middleware (like TrimStrings, VerifyCsrfToken)
* Load service providers

 </br>


🔹 4. Service Providers <br>
🧠 "Heart of Laravel's bootstrapping"
* Service providers register + boot Laravel components (DB, Routing, Queue, etc.)
Found in:
* Core: ```Illuminate\...```
* App-level: ```app/Providers/...```
Two key methods:
*  ```register()``` → Bind things into the container
*  ```boot()``` → Run logic after all services are registered

 </br>


🔹 5. Routing Phase (```routes/web.php or routes/api.php```) <br>
* Laravel checks the incoming URL and matches it to a route.
Route can be:
* A closure
* A controller method
* Route-specific middleware are also applied here.
  
  <br>
  
✅ Example: <br>
```Route::get('/users', [UserController::class, 'index']);```

 </br>


🔹 6. Middleware Execution <br>
* Middleware filters or modifies the request before reaching the controller.
* Global (from Kernel) and route-specific (from routes).
Examples:
* ```auth``` (check login)
* ```VerifyCsrfToken```
* ```PreventRequestsDuringMaintenance```

 </br>


🔹 7. Controller Execution <br>
* If middleware allows, Laravel calls the targeted controller method.
The controller performs:
* Business logic
* DB queries
* Data formatting
Returns a response (```HTML/JSON/Redirect```)

 </br>


🔹 8. Response Traversal (Reverse Middleware) <br>
* The response travels back through the middleware chain.
* Final modifications (like headers, cookies) can happen here.

 </br>


🔹 9. Send Response to Browser <br>
* The response is sent back to HTTP Kernel
* Kernel gives it to Application instance
* Finally, ```response->send()``` sends it to user’s browser or frontend client (e.g., React, Postman)

<br>

📌 Key Concepts to Remember ( Concept	Summary )  <br>

* Entry File :	```index.php``` is Laravel's entry for all HTTP requests <br>
* Service Container :	Core of Laravel – manages dependencies and bindings <br>
* Kernel :	Manages middleware and bootstrapping <br>
* Middleware :	Filters requests before they hit routes/controllers <br>
* Service Providers :	Bootstrap every Laravel feature (DB, routing, mail, etc.) <br>
* Routing : Maps URL + Method → Controller or Closure <br>
* Controller :	Executes app logic + returns a Response <br>
* Response :	Travels backward through middleware → then sent to browser <br>




  **[⬆ Back to Top](#Important-Commands)**
    

       
15. ###  Laravel versions lately

“So, Laravel has evolved toward cleaner, faster development, with type safety, better scaffolding, simplified structure, and support for modern PHP. Each version improved developer experience and made Laravel more scalable and team-friendly.” <br>

🔸 Laravel 8 (Sep 2020) <br>
* Factory Classes (New Style): Instead of old closures, factories now use class-based structure (UserFactory). <br>
* Model Directory Change: Models moved from app/Models by default instead of staying in app/. <br>
* Laravel Jetstream: New authentication scaffolding (Livewire or Inertia.js). <br>
* Job batching, dynamic Blade components, and route caching improvements. <br>
📌 Common things : class-based factories and Jetstream to handle auth & team features. <br>

 </br>



🔸 Laravel 9 (Feb 2022) <br>
* PHP 8 minimum, with Symfony v6 components. <br>
* Anonymous Migrations: Prevent class name collisions in migration files. <br>
* Query Builder Interface: Better auto-complete & IDE support. <br>
* Flysystem v3: Improved file uploads. <br>
* Moved to Symfony Mailer (from deprecated SwiftMailer). <br>
📌 Common things : anonymous migrations in a team project to avoid merge conflicts and took advantage of type-safe queries in large DB systems. <br>

 </br>



🔸 Laravel 10 (Feb 2023) <br>
* PHP 8.1 minimum required. <br>
* All core code now fully typed: Method arguments and return types added across the framework. <br>
* New Blade Component System (BladeX). <br>
* Improved route caching, more expressive route definitions. <br>
* Artisan test coverage, --coverage flag for php artisan test. <br>
📌 Common things : better auto-completion & static analysis due to full typing, especially in large controller/service-based apps. <br>

 </br>



🔸 Laravel 11 (Feb 2024) <br>
* Simplified default structure: No AppServiceProvider, RouteServiceProvider, ExceptionHandler by default – all handled behind the scenes, but customizable. <br>
* Minimal Boilerplate: Less clutter for fresh installs – more readable and cleaner. <br>
* SQLite by default for faster prototyping in local development. <br>
* WorkOS Starter Kits: For SSO, OAuth, and passkeys with Jetstream/Breeze. <br>
📌 Common things : Cleaner Middleware & Route definitions. <br>

 </br>





  **[⬆ Back to Top](#Important-Commands)**
    



       
16. ###  Artisan Console 

What is Artisan? <br>
* Artisan is Laravel’s built-in Command Line Interface (CLI) tool that helps developers perform repetitive and common tasks more efficiently. <br>
* Built on top of the Symfony Console component, so it's robust and extensible. <br>


 </br>

Viewing & Running Commands <br>
* ```php artisan list```             # lists all commands <br>
* ```php artisan help migrate```     # shows usage, arguments, options <br>
* ```php artisan --version```        # current Laravel version <br>

 </br>

Creating Custom Commands <br>
```php artisan make:command MyCommand``` # stub created in app/Console/Commands/MyCommand.php <br>
 <br>
 
* Define properties: <br>
* protected $signature = 'name {arg} {--opt}' <br>
* protected $description = '...'; <br>
* public function handle() { /* logic */ } <br>

 </br>

Scheduling & Calling Commands <br>
* Use schedule in Console/Kernel: ```$schedule->command('emails:send')->daily();``` <br>
* Call other commands from inside: ```$this->call('command:name', ['arg'=>'foo','--opt'=>'bar']);``` <br>

 </br>


Testing Console Commands <br>
```
$this->artisan('inspire')
     ->expectsQuestion('What is your name?', 'Taylor')
     ->expectsOutput('...')
     ->assertExitCode(0);
```

 </br>


Arguments <br>
* These are required or optional values passed without flags when running the command.<br>

Syntax in Signature: <br>
```protected $signature = 'greet {name}';```  <br>

 </br>




Options <br>
* These are named flags, usually start with -- and are optional. <br>

Syntax: <br>
```protected $signature = 'send:email {--queue=}';``` <br>

 </br>


```

[ Signature ]
    Arguments:     {user}, {user?}, {user=Ayush}, {user*}
    Options:       {--force}, {--queue=}, {--Q|queue=}, {--id=*}

[ Input in handle() ]
    $this->argument('user')         // gets argument
    $this->option('queue')          // gets option

[ Output Methods ]
    $this->info(), $this->error()
    $this->ask(), $this->confirm()

[ Locking ]
    use Isolatable
    php artisan my:command --isolated


```

### ✅ Artisan Command Summary

| Category             | Common Artisan Commands                               | Purpose                                      |
|----------------------|--------------------------------------------------------|----------------------------------------------|
| 🔧 Project Setup     | `php artisan serve`, `php artisan key:generate`        | Run dev server, generate app key             |
| 🛠 Migrations        | `php artisan make:migration`, `php artisan migrate`    | Create and apply DB schema changes           |
| 🧪 Testing           | `php artisan test`                                     | Run automated tests                          |
| 📂 File Generation   | `php artisan make:model`, `make:controller`, `make:command` | Generate boilerplate code files         |
| 📄 Routes/View Cache | `php artisan route:cache`, `view:clear`                | Cache and clear routes, views, config etc.   |
| 🔄 Queue/Jobs        | `php artisan queue:work`, `queue:listen`               | Manage background jobs                       |
| 🔐 Authentication    | `php artisan make:auth`, `ui`, `breeze:install`        | Scaffold auth system (via packages)          |
| ⚙️ Custom Commands   | `php artisan make:command`                             | Create your own CLI commands                 |


  **[⬆ Back to Top](#Important-Commands)**
    





