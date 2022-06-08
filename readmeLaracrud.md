# Imp Link: https://www.youtube.com/playlist?list=PLjsp2uDzfb32JOpUPYiu30LuMHjEcQgNz

# Laravel Project Problem Solving Sequence 

-> View -> Routing -> Controller -> Model
Or,
-> Model -> View -> Routing -> Controller 

# Prob Fix
1.  Class 'App\Providers\ServiceProvider' not found (https://stackoverflow.com/questions/45775231/php-fatal-error-class-app-providers-serviceprovider-not-found-after-i-fixed )


# Web Journey

# Laravel 8 Crud Bangla | Install Laravel | Create Database Model Migration Table | Part - 01
# --------------------------------------------------------------------------------------------------------
1. Install Laravel 
    - Laravel Installing with composer

2. Create DB and Connect
    - DB creation like : 'laracrud'
    - DB connection : 
                -> .env 
                ->  DB_CONNECTION = mysql
                    DB_HOST = 127.0.0.1
                    DB_PORT = 3306
                    DB_DATABASE = laracrud
                    DB_USERNAME = root
                    DB_PASSWORD = 

3. Create model and migration file
    - php artisan make:Model Crud -m  

4. Configure AppServiceProvider
    -> Providers
    -> AppServiceProvider
    -> use Illuminate\Support\Facades\Schema;
       use Illuminate\Support\ServiceProvider; 
    -> On boot method : Schema::defaultStringLength(191); 

5. Migration Table
    -> migrations  
    -> 2022_03_28_101332_create_cruds_table
    -> Table fields creation 
    -> To cli: php artisan migrate
    -> Refresh db

6. Browse Project 
    - To cli: php artisan serve


# Laravel 8 Crud Bangla | Create Controller | Design Form and Table Page | Part - 02
# --------------------------------------------------------------------------------------------------------

1. Create Controller 
    - cli : php artisan make:Controller CrudController
    - cli : php artisan serve

2. Create HTML table (show data on page)
    - View file: show_data.blade.php

    - Method on Controller: Controller -> CrudController ->showData() 

    - Route setting: 
        - On routes -> web.php
        - use App\Http\Controllers\CrudController;
        - Route::get('/', [CrudController :: class, 'showData']);

3. Form Design (add data page)
    - View file: add_data.blade.php

    - Method on Controller: Controller -> CrudController -> addData() 

    - Route setting: 
        - On routes -> web.php
        - Route::get('/add_data', [CrudController :: class, 'addData']);

# Laravel 8 Crud Bangla _ Form Validation with Custom Message _ Part- 03
# --------------------------------------------------------------------------------------------------------

1. Storing Data method
    - View file: action setting on add_data.blade.php  

    - Method on Controller: Controller -> CrudController -> storeData() 
        -  storeData(Request $request)  // function (className parameter)
        -  $this-> validate($request,$rules);
        -  return $request->all();

    - Route setting: 
        - On routes -> web.php
        - Route::get('/store_data', [CrudController :: class, 'storeData']);

2. Rules setting 
    - View file: 
        - add_data.blade.php 
        - @error('fiendName') #enderror for error condition 
        - <span class='text-danger'>{{$message}}</span> on error condition 

    - Method on Controller: Controller -> CrudController -> storeData()   
        -  $rules array variable 
        -  Fields name and rules conditions with operator in $rules 
        -  $this-> validate($request,$rules);
        -  return $request->all();

    - Route setting: 
        - On routes -> web.php
        - Route::get('/store_data', [CrudController :: class, 'storeData']);

2. Custom Rules setting 
    - View file: 
        - same as rules setting view file

    - Method on Controller: Controller -> CrudController -> storeData()   
        -  $customMSG array variable 
        -  Fields name and rules conditions with operator in $customMSG
        -  $this-> validate($request,$rules,$customMSG);
        -  return $request->all();

    - Route setting: 
        - On routes -> web.php
        - Route::get('/store_data', [CrudController :: class, 'storeData']);

# Laravel 8 Crud Bangla _ Add Data With Success Message _ Part - 04
# --------------------------------------------------------------------------------------------------------

1. Data Insert 
    - View file: 
        - add_data.blade.php
        - @if(!empty($showData)) @endif             : for Checking empty or not
        - @foreach($showData as $row) @endforeach   : for data iterating 

    - Method on Controller: Controller -> CrudController -> storeData()  
        - use App\Models\Crud;
        - $crud = new Crud();
        - $crud->name = $request->name; 
          
          //$crud->name = database_fieldName,$resquest->name = from_fieldName
          
        - $crud->email = $request->email;
        - $crud->save();

    - Route setting: 
        - On routes -> web.php
        - Route::get('/store_data', [CrudController :: class, 'storeData']);
    
2. Success Message
    - View file: 
        - show_data.blade.php
        - @if(Session::has('msg')) @endif for condition setting  
        - {{Session::get('msg')}}  for getting msg and print msg 

    - Method on Controller: Controller -> CrudController -> storeData()  
        - use Session
        - Session::flash('msg','Successfully Data Added.');

    - Route setting: 
        - On routes -> web.php 
        - Route::get('/store_data', [CrudController :: class, 'storeData']);
    
3. Redirect 
    - View file: Redirect to show_data.blade.php 

    - Method on Controller: Controller -> CrudController -> storeData()  
        - return redirect('/'); 

    - Route setting: 
        - On routes -> web.php
        - Route::get('/store_data', [CrudController :: class, 'storeData']);

# Laravel 8 Crud Bangla | Show Data With Pagination | Part 05
# --------------------------------------------------------------------------------------------------------

1. Pagination
    - 