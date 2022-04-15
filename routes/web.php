<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DaySellingController;
use App\Http\Controllers\Admin\LeadController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\FarmerController as AdminFarmerController;
use App\Http\Controllers\Admin\FcController as AdminFcController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\WarehouseController as AdminWareController;


use App\Http\Controllers\Fcenter\FarmerController as FcFarmerController;
use App\Http\Controllers\Fcenter\OrderController as FcOrderController;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\Fcenter\FcenterController;
use App\Http\Controllers\Admin\LogisticController as AdminLgController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Fcenter\AuthController as FcenterAuthController;
use App\Http\Controllers\Fcenter\FcController;
use App\Http\Controllers\Fcenter\SupportController;
use App\Http\Controllers\Admin\SupportController as AdminSupportController;
use App\Http\Controllers\Logistic\AuthController as LogisticAuthController;
use App\Http\Controllers\Logistic\LogisticController;
use App\Http\Controllers\Warehouse\AuthController as WarehouseAuthController;
use App\Http\Controllers\Warehouse\WarehouseController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.login');
    })->name('web.home');
});



/*
|--------------------------------------------------------------------------
| ADMIN Routes
|--------------------------------------------------------------------------
|
| Here is where you can register ADMIN routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "ADMIN" middleware group. Now create something great!
|
*/
Route::prefix('admin')->name('admin.')->group(function () {

    /* Unauthenticated Routes */
    Route::middleware(['guest:admin'])->group(function () {

        /* Auth Controller Routes */
        Route::controller(AdminAuthController::class)->group(function () {
            Route::get('/login', 'index')->name('login');
            Route::post('/login', 'login')->name('login');
            Route::get('/register', 'create')->name('create');
            Route::post('/register', 'store')->name('create');
        });
    });

    /* Authenticated Routes */
    Route::middleware(['auth:admin'])->group(function () {

        /* Admin Index Controller Routes */
        Route::controller(AdminController::class)->group(function () {
            Route::get('/', 'index')->name('home');
        });

        /* Auth Controller Routes */
        Route::controller(AdminAuthController::class)->group(function () {
            Route::get('/logout', 'logout')->name('logout');
            Route::get('/edit/{id}', 'edit')->name('show');
            Route::put('/edit/{id}', 'update')->name('update');
        });

        /* Payment Routes */
        Route::prefix('/payment')->name('payment.')->group(function () {
            /* Payment Controller Routes */
            Route::controller(PaymentController::class)->group(function () {
                Route::get('/', 'index')->name('index');
            });
        });

        /* Leads Routes */
        Route::prefix('/lead')->name('lead.')->group(function () {

            /* Lead Controller Routes */
            Route::controller(LeadController::class)->group(function () {
                Route::get('/contact', 'contact')->name('contact');
                Route::get('/career', 'career')->name('career');
                Route::get('/distributor', 'distributor')->name('distributor');
                Route::get('/all', 'all')->name('all');
            });
        });

        /* Day-Selling Routes */
        Route::prefix('/day-selling')->name('dayselling.')->group(function () {

            /* DaySelling Controller Routes */
            Route::controller(DaySellingController::class)->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/create', 'store')->name('create');
                Route::get('/edit/{id}', 'edit')->name('edit');
                Route::post('/edit/{id}', 'update')->name('edit');
            });
        });


        /* Farmers Routes */
        Route::prefix('/farmer')->name('farmer.')->group(function () {

            /* Admin Farmer Controller Routes */
            Route::controller(AdminFarmerController::class)->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/', 'index')->name('index');
                Route::get('/profile/{id}', 'show')->name('profile');
                Route::get('/edit/{id}', 'edit')->name('edit');
                Route::post('/edit/{id}', 'update')->name('edit');
                Route::get('/create', 'create')->name('create');
                Route::post('/create', 'store')->name('create');
            });
        });


        /* Fcenter Routes */
        Route::prefix('/fcenter')->name('fcenter.')->group(function () {

            /* Admin Fc Controller */
            Route::controller(AdminFcController::class)->group(function () {

                Route::get('/', 'index')->name('index');
                Route::post('/', 'index')->name('index');

                Route::get('/search/{pincode}', 'searchPincode')->name('search');

                Route::get('/profile/{id}', 'show')->name('show');
                Route::get('/create', 'create')->name('create');
                Route::post('/create', 'store')->name('create');

                Route::get('/edit/{id}', 'edit')->name('edit');
                Route::post('/edit/{id}', 'update')->name('edit');
                Route::post('/delete/{id}', 'destroy')->name('delete');
            });
        });


        /* Payment Routes */
        Route::prefix('/payment')->name('payment.')->group(function () {

            /* payment Controller */
            Route::controller(PaymentController::class)->group(function () {

                Route::get('/', 'index')->name('index');
                Route::post('/', 'index')->name('index');

                Route::get('/show/{id}', 'show')->name('show');
                Route::post('/show/{id}', 'show')->name('show');

                Route::post('/create', 'store')->name('allocate');

                Route::get('/allocations', 'history')->name('history');
                Route::post('/allocations', 'history')->name('history');

                Route::get('/request', 'request')->name('request');
                Route::get('/pay/{sc}', 'pay')->name('pay');
            });
        });


        /* Order Routes */
        Route::prefix('/order')->name('order.')->group(function () {

            /* Admin Order Controller Routes */
            Route::controller(AdminOrderController::class)->group(function () {

                Route::get('/', 'index')->name('index');

                Route::get('/price/{qty?}', 'price')->name('price');
                Route::get('/view/{id?}', 'view')->name('view');
                Route::get('/create', 'create')->name('create');
                Route::post('/create', 'store')->name('create');
            });
        });


        /* 9r Routes */
        Route::prefix('/9r')->name('9r.')->group(function () {

            /* Admin Order Controller Routes */
            Route::controller(AdminOrderController::class)->group(function () {
                Route::get('/', 'nine_r')->name('index');
            });
        });


        /* category Routes */
        Route::prefix('/category')->name('category.')->group(function () {

            /* Admin Order Controller Routes */
            Route::controller(CategoryController::class)->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/create', 'store')->name('create');
                Route::get('/delete/{id}', 'delete')->name('delete');
            });
        });


        /* video Routes */
        Route::prefix('/video')->name('video.')->group(function () {
            /* Admin video Controller Routes */
            Route::controller(VideoController::class)->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/edit/{id}', 'edit')->name('edit');
                Route::post('/edit/{id}', 'update')->name('edit');

                Route::post('/create', 'store')->name('create');
                Route::get('/delete/{id}', 'delete')->name('delete');
            });
        });


        /* blog Routes */
        Route::prefix('/blog')->name('blog.')->group(function () {
            /* Admin blog Controller Routes */
            Route::controller(BlogController::class)->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/edit/{id}', 'edit')->name('edit');
                Route::post('/edit/{id}', 'update')->name('edit');

                Route::get('/create', 'create')->name('create');
                Route::post('/create', 'store')->name('create');
                Route::get('/delete/{id}', 'delete')->name('delete');
            });
        });



        /* Logistics Routes */
        Route::prefix('/logistic')->name('logistic.')->group(function () {

            /* Logistic Fc Controller */
            Route::controller(AdminLgController::class)->group(function () {

                Route::get('/', 'index')->name('index');
                Route::post('/', 'index')->name('index');

                Route::get('/profile/{id}', 'show')->name('show');
                Route::get('/create', 'create')->name('create');
                Route::post('/create', 'store')->name('create');

                Route::get('/edit/{id}', 'edit')->name('edit');
                Route::post('/edit/{id}', 'update')->name('edit');

                Route::post('/delete/{id}', 'destroy')->name('delete');
            });
        });


        /* warehouse Routes */
        Route::prefix('/warehouse')->name('warehouse.')->group(function () {

            /* warehouse Controller */
            Route::controller(AdminWareController::class)->group(function () {

                Route::get('/', 'index')->name('index');
                Route::post('/', 'index')->name('index');

                Route::get('/profile/{id}', 'show')->name('show');
                Route::get('/create', 'create')->name('create');
                Route::post('/create', 'store')->name('create');

                Route::get('/edit/{id}', 'edit')->name('edit');
                Route::post('/edit/{id}', 'update')->name('edit');

                Route::post('/delete/{id}', 'destroy')->name('delete');
            });
        });


        /* support Routes */
        Route::prefix('/support')->name('support.')->group(function () {

            /* warehouse Controller */
            Route::controller(AdminSupportController::class)->group(function () {

                Route::get('/farmer', 'farmer')->name('farmer');
                Route::get('/fcenter', 'fcenter')->name('fcenter');
                Route::get('/warehouse', 'warehouse')->name('warehouse');
                Route::get('/logistics', 'logistic')->name('logistic');

                Route::get('/edit/{id?}', 'edit')->name('edit');
                Route::post('/edit/{id?}', 'update')->name('edit');
            });
        });
    });
});


/*
|--------------------------------------------------------------------------
| FACILITATE CENTER Routes
|--------------------------------------------------------------------------
|
| Here is where you can register FCENTER routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "FCENTER" middleware group. Now create something great!
|
*/

Route::prefix('fcenter')->name('fcenter.')->group(function () {

    /* Unauthenticated Routes */
    Route::middleware(['guest:fcenter'])->group(function () {

        /* AuthController Routes */
        Route::controller(FcenterAuthController::class)->group(function () {
            Route::get('/login', 'index')->name('login');
            Route::post('/login', 'login')->name('login');
            Route::get('/register', 'create')->name('create');
            Route::post('/register', 'store')->name('create');
        });
    });

    /* Authenticated Routes */
    Route::middleware(['auth:fcenter'])->group(function () {

        Route::get('/', [FcController::class, 'index'])->name('index');
        Route::get('/wallet', [FcController::class, 'wallet'])->name('wallet');


        /* Auth Controller Routes */
        Route::controller(FcenterAuthController::class)->group(function () {
            Route::get('/logout', 'logout')->name('logout');
        });

        /* farmer routes */
        Route::prefix('/farmer')->name('farmer.')->group(function () {
            /* Farmer Controller Routes */
            Route::controller(FcFarmerController::class)->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/create', 'store')->name('create');
                Route::get('/profile/{id}', 'edit')->name('show');
                Route::get('/edit/{id}', 'edit')->name('edit');
                Route::post('/edit/{id}', 'update')->name('edit');
                Route::post('/delete/{id}', 'destroy')->name('delete');
            });
        });


        /* order routes */
        Route::prefix('/order')->name('order.')->group(function () {
            /* order Controller Routes */
            Route::controller(FcOrderController::class)->group(function () {

                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/create', 'store')->name('create');
                Route::get('/price/{qty?}', 'price')->name('price');
                Route::post('/proceed/{sc}', 'proceed')->name('proceed');

                Route::get('/9r', 'nine_r')->name('9r');
                Route::post('/9r', 'create_nine_r')->name('9r');
            });
        });

        /* support routes */
        Route::prefix('/support')->name('support.')->group(function () {

            /* fcenter support Controller */
            Route::controller(SupportController::class)->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/view/{id?}', 'view')->name('view');
                Route::post('/create', 'store')->name('create');
            });
        });
    });
});


/*
|--------------------------------------------------------------------------
| WAREHOUSE Routes
|--------------------------------------------------------------------------
|
| Here is where you can register WAREHOUSE routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "WAREHOUSE" middleware group. Now create something great!
|
*/

Route::prefix('warehouse')->name('warehouse.')->group(function () {

    /* Unauthenticated Routes */
    Route::middleware(['guest:warehouse'])->group(function () {

        Route::controller(WarehouseAuthController::class)->group(function () {

            Route::get('/login', 'index')->name('login');
            Route::post('/login', 'login')->name('login');
        });
    });

    /* Authenticated Routes */
    Route::middleware(['auth:warehouse'])->group(function () {

        Route::controller(WarehouseAuthController::class)->group(function () {
            Route::get('/logout', 'logout')->name('logout');
        });

        Route::controller(WarehouseController::class)->group(function () {
            Route::get('/', 'index')->name('index');

            Route::get('/history', 'history')->name('history');

            Route::get('/support', 'support')->name('support');
            Route::post('/support', 'store')->name('support.create');
            Route::get('/support/view/{id?}', 'view')->name('support.view');
        });
    });
});




/*
|--------------------------------------------------------------------------
| Logistic Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Logistic routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "Logistic" middleware group. Now create something great!
|
*/

Route::prefix('logistic')->name('logistic.')->group(function () {

    /* Unauthenticated Routes */
    Route::middleware(['guest:logistic'])->group(function () {

        Route::controller(LogisticAuthController::class)->group(function () {

            Route::get('/login', 'index')->name('login');
            Route::post('/login', 'login')->name('login');
        });
    });

    /* Authenticated Routes */
    Route::middleware(['auth:logistic'])->group(function () {


        Route::controller(LogisticAuthController::class)->group(function () {
            Route::get('/logout', 'logout')->name('logout');
        });


        Route::controller(LogisticController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/edit/{id?}', 'update')->name('update');

            Route::get('/history', 'history')->name('history');

            Route::get('/support', 'support')->name('support');
            Route::get('/support/view/{id?}', 'view')->name('support.view');
            Route::post('/support', 'store')->name('support.create');
        });
    });
});


/*
|--------------------------------------------------------------------------
| FARMER Routes
|--------------------------------------------------------------------------
|
| Here is where you can register FARMER routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "FARMER" middleware group. Now create something great!
|
*/

Route::prefix('farmer')->name('farmer.')->group(function () {


    /* Unauthenticated Routes */
    Route::middleware(['guest:farmer'])->group(function () {
    });

    /* Authenticated Routes */
    Route::middleware(['auth:farmer'])->group(function () {
    });
});
