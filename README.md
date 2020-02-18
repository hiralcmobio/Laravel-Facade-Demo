## **Laravel Facade**

#### **What Is Larave Facade**

Laravel Facades provides "static" interface to classes. which are availables in service container.
You can use Facade class without creating object of the class. Laravel Facade provides "static proxies" to classes which are in service container.
Facade provides short and expressive syntax while you maintaining more
testabily and flexibility.

Laravel's facades are defined in the Illuminate\Support\Facades namespace.

#### **Why We Should Use Facade**

Laravel Facade provides many benefits like it gives short and memorable syntax. and also we does not need to inject Facade class or not need to configure 
it manually. and we can test easily php's dynamic methods. it can be easy to let your classes continue to grow and use many facades in a single class.

So, let's start to use Facade

#### **How To Create And Use Facade**

First, We need to make helper class in app. So, let's create `LaraFacades.php` file in `app/LaraFacades/`. and let make one function as below:

```namespace App\LaraFacades;
class LaraFacades
{
    public function checkForVotingAccess($age)
    {
        //check condition whether age is greater than 18 or not.
        if($age >= 18){
            $message = "You may proceed to vote.";
            $status = "success";
        }else{
            $message = "Sorry! You are not able proceed.";
            $status = "failure";
        }
        $return = [];
        $return['message'] = $message;
        $return['status'] = $status;
        return $return;
    }
}
```

Now, we will create service provider by fire below command in terminal.

`php artisan make:provider LaraFacadesServiceProvider`

And in `LaraFacadesServiceProvider` service provider file, we will import LaraFacades class by 

`use App\LaraFacades\LaraFacades;`

and add code to register

        $this->app->bind('larafacades',function(){

            return new LaraFacades();

        });
        
 Now, we will register this service provider to the `Config/app.php` file like,
  
         /*
          * Application Service Providers...
          */
         App\Providers\LaraFacadesServiceProvider::class,
         
 And Now we will make another php file `LaraFacadesDemo.php` in `app/LaraFacades/` for access Facade class.
 the add code to it
 
``` namespace App\LaraFacades;
 use Illuminate\Support\Facades\Facade;
 
 class LaraFacadesDemo extends Facade
 {
     protected static function getFacadeAccessor()
     {
         return 'larafacades';
     }
 }
```

And now we will add this file to `Config/app.php` aliases like,

`'LaraFacade' => App\LaraFacades\LaraFacadesDemo::class,`

and now we will do composer reload like,

`composer dump-autoload`

and Finally, we will apply our facade class to controller.

```use LaraFacade;

class LaraFacadesController extends Controller
{
    public function laraFacadesView(){
        //define your age
        $age = 25;
        //call facade class LaraFacade
        return LaraFacade::checkForVotingAccess($age);
    }
}
```

and we will add this function to route like,

`Route::get('/larafacade', 'LaraFacadesController@laraFacadesView');`

And now run this route in your browser and enjoy the Facade!

Let's write the test cases for the facades

    namespace Tests\Feature;
    
    use Illuminate\Foundation\Testing\RefreshDatabase;
    use Illuminate\Foundation\Testing\WithFaker;
    use Tests\TestCase;
    
    class LaraFacadesTest extends TestCase
    {
        /**
         * @desc test status success or not
         *
         * @return array
         */
        public function testLaraFacadesStatusSuccess()
        {
            //call route
            $response = $this->get('/larafacade');
    
            //check whether response have status success or not
            $response->assertSeeText('success',$response['status']);
        }
    
        /**
         * @desc test status failure or not
         *
         * @return array
         */
        public function testLaraFacadesStatusFailure()
        {
            $response = $this->get('/larafacade');
    
            //check whether response don't have status failuee or not
            $response->assertDontSeeText('failure',$response['status']);
        }
    }
    
And run it by below command in terminal:

    vendor/bin/phpunit /tests/LaraFacadesTest.php

 
 
