nikolag/core
=========
Core package for building additional payment gateway integrations with `nikolag` packages and `Laravel 5.5`

## Installation guide
`composer require nikolag/core`

---

## Usage
This package contains all of the necessary code to get you started with building the additional integrations of payment gateways
with `nikolag` packages. First of all there are couple of important layers and structure that you must follow:

```javascript
1. Configuration file
2. Main service
2. DI (Dependency Injections)
3. Migrations and Factories
4. Custom Exceptions
5. Facades
6. Models
7. Providers
8. Traits
9. Tests
10. Utility classes
```

### 1. Configuration file
Configuration file is the most important here since it'll contain all of the required pre-set options of your library.
The file must be called `nikolag.php` and it must be inside of `src/config` folder.

```javascript
return [
    /*
    |--------------------------------------------------------------------------
    | Nikolag Configuration
    |--------------------------------------------------------------------------
    |
    | This represents the default connection name that will be used when
    | u have multiple available connections. For all available connections
    | take a look a the code documentation of 'connections' just below.
    |
    */
    'default' => '{$default}',

    /*
    |--------------------------------------------------------------------------
    | Nikolag Connections
    |--------------------------------------------------------------------------
    |
    | Here you will find all available connections you have in your project.
    | For all available connections you can take a look at the link below.
    |
    | https://github.com/NikolaGavric94/nikolag-core/blob/master/DRIVERS.md
    |
    */
    'connections' => [
      /*
      |--------------------------------------------------------------------------
      | {$default} Configuration
      |--------------------------------------------------------------------------
      |
      | The {$default} configuration determines the default application_id
      | and {$default} token when doing any of the calls to {$default}. These values will
      | be used when there is no merchant provided as a seller. You have to change
      | these values.
      |
      */
      '{$default}' => [
        'namespace' => '{$namespace}',
        'application_id' => env('{$default}_APPLICATION_ID'),
        'access_token' => env('{$default}_TOKEN'),

        /*
        |--------------------------------------------------------------------------
        | {$default} Merchant Configuration
        |--------------------------------------------------------------------------
        |
        | The {$default} merchant configuration determines the default namespace for
        | merchant model and it's identifier which will be used in various
        | relationships when retrieving models. You are encouraged to change these
        | values to better reflect your application.
        |
        */
        'user' => [
          'namespace' => env('{$default}_USER_NAMESPACE', '\App\User'),
          'identifier' => env('{$default}_USER_IDENTIFIER', 'id')
        ],

        /*
        |--------------------------------------------------------------------------
        | {$default} Order Configuration
        |--------------------------------------------------------------------------
        |
        | The {$default} order configuration determines the default namespace for
        | order model and it's identifier which CAN be used when charging a customer.
        | You can relate that model to a certain transaction. You are encouraged to
        | change these values to better reflect your application.
        |
        */
        'order' => [
          'namespace' => env('{$default}_ORDER_NAMESPACE', '\App\Order'),
          'identifier' => env('{$default}_ORDER_IDENTIFIER', 'id')
        ]
      ],
    ]
];
```
This is just a starter snippet which u can start adapting to your own library. There are couple of important `variables` that u gotta change and rules which you must follow.
Change `{$default}` with the name of your package (paypal, payeer, payoneer, ...) and also include the fully qualified name (namespace) of your service instead of `{$namespace}`. You can check the example at [square](https://github.com/NikolaGavric94/nikolag-square/blob/master/src/config/nikolag.php) config file. 
[Here](https://github.com/NikolaGavric94/nikolag-square/blob/master/src/SquareConfig.php) is the example of how your configuration class file should look like.

### 2. Main service
Your package must have at least 1 main service which is responsible for all communication between rest calls and your package. 
It also must extend `Nikolag\Core\Abstracts\CorePaymentService` and it must implement the contract thats explained below. 
Example of that kind of class can be found [here](https://github.com/NikolaGavric94/nikolag-square/blob/master/src/SquareService.php).

### 3. DI (Dependency Injections)
Your library must have at least 1 contract which should be named `{$serviceName}ServiceContract.php` where `{$serviceName}` is the name of service you are trying to integrate with nikolag packages and Laravel 5.5. 
Also it must extends `Nikolag\Core\Contracts\PaymentServiceContract`. 
Any other contract which is not connected with your service file in any way mustn't extend the above contract. Some examples of such name are `PaypalServiceContract.php`, `PayeerServiceContract.php`, `PayoneerServiceContract.php`. 
Example of the contract can be found [here](https://github.com/NikolaGavric94/nikolag-square/blob/master/src/contracts/SquareContract.php).

### 4. Migrations and Factories
All migrations and factories must be under `src/database` folder and each of them respectively will have it's own subfolder `src/database/factories` and `src/database/migrations`. 
This core package already has couple of migrations so you don't have to write them yourself, but you can extend on them if necessary.

### 5. Custom Exceptions
All package custom exceptions are found under `src/exceptions` and each exception must extend `Nikolag\Core\Exceptions\Exception` instead of php `\Exception` class. 

If you wish to register your own exception handler you can do so by creating a handler like [here](https://github.com/NikolaGavric94/nikolag-square/blob/master/src/ExceptionHandler.php) and adding it inside of your `ExceptionServiceProvider` like [so](https://github.com/NikolaGavric94/nikolag-square/blob/master/src/providers/ExceptionServiceProvider.php).

### 6. Facades
All facades are found under `src/facades` and your package must have at least 1 facade which must be alias for your main service class. 
```javascript
//Facades
$this->app->alias(SquareService::class, 'square');
```

### 7. Models
All models must be located under `src/models`. There are 2 core models: `Customer` and `Translation`. 

You must extend those 2 core models and create your own from them with all relationships available and also add
```javascript
/**
 * The model's attributes.
 *
 * @var array
 */
protected $attributes = [
  //where `{$serviceName}` is the name of service you are trying to integrate with nikolag packages and Laravel 5.5.
  //example: 'paypal', 'payoneer', 'payeer'
  'payment_service_type' => {$serviceName}
];
```
The above is only required for 2 base models, any other models u might make don't have to extend anything and you can create them normally. 
Example can be found [here](https://github.com/NikolaGavric94/nikolag-square/blob/master/src/models/Customer.php).

### 8. Traits
All traits must be under `src/traits`.

### 9. Tests
All your tests must be under `tests` and they are split into 2 types: `integration` and `unit` where each of them has it's own subfolder. 
```javascript
src/
tests/
  integration/
  unit/
```

### 10. Utility classes
All your utility classes must be under `src/utils` folder.

## More examples
For a more complete example you can take a look at this [repository](https://github.com/NikolaGavric94/nikolag-square).

## Contributing
Everyone is welcome to contribute to this repository, simply open up an issue
and label the request, whether it is an issue, bug or a feature. For any other
enquiries send an email to nikola.gavric94@gmail.com

## License
MIT License

Copyright (c) 2017

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
