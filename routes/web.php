 <?php

    use App\Http\Controllers\AdminController;
    use App\Http\Controllers\Backend\AdminProfileController;
    use App\Http\Controllers\Backend\BrandController;
    use App\Http\Controllers\Backend\CategoryController;
    use App\Http\Controllers\Backend\SubCategoryController;
    use App\Http\Controllers\Frontend\FrontendController;
    use App\Http\Controllers\Frontend\IndexController;
    use App\Models\User;
    use Illuminate\Support\Facades\Route;
    use Laravel\Jetstream\Rules\Role;
    use Illuminate\Support\Facades\Auth;
    use League\CommonMark\Extension\CommonMark\Node\Block\IndentedCode;

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

    Route::get('/', function () {
        return view('welcome');
    });
    Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function () {
        Route::get('/login', [AdminController::class, 'loginForm']);
        Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
    });
    Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');



    // Admin Route
    Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
    Route::get('/admin/profile', [AdminProfileController::class, 'adminProfile'])->name('admin.profile');
    Route::get('/admin/profile/edit', [AdminProfileController::class, 'adminProfileEdit'])->name('admin.profile.edit');
    Route::post('/admin/profile/store', [AdminProfileController::class, 'adminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminProfileController::class, 'adminChangePassword'])->name('admin.change.password');
    Route::post('/update/change/password', [AdminProfileController::class, 'updateChangePassword'])->name('update.change.password');


    //User Route 
    Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('dashboard', compact('user'));
    })->name('dashboard');
    Route::get('/', [IndexController::class, 'index']);
    Route::get('/user/logout', [IndexController::class, 'userLogout'])->name('user.logout');
    Route::get('/user/profile', [IndexController::class, 'userProfile'])->name('user.profile');
    Route::post('/user/profile/store', [IndexController::class, 'userProfileStore'])->name('user.profile.store');
    Route::get('/change/password', [IndexController::class, 'userChangePassword'])->name('change.password');
    Route::post('user/password/update', [IndexController::class, 'userPasswordUpdate'])->name('user.password.update');

    // Admin brand route
    Route::prefix('brand')->group(function () {
        Route::get('/view', [BrandController::class, 'brandView'])->name('all.brands');
        Route::post('/store', [BrandController::class, 'brandStore'])->name('brand.store');
        Route::get('/edit/{id}', [BrandController::class, 'brandEdit'])->name('brand.edit');
        Route::post('/update', [BrandController::class, 'brandUpdate'])->name('brand.update');
        Route::get('/delete/{id}', [BrandController::class, 'brandDelete'])->name('brand.delete');
    });

    // Admin category route
    Route::prefix('category')->group(function () {
        Route::get('/view', [CategoryController::class, 'categoryView'])->name('all.category');
        Route::post('/store', [CategoryController::class, 'categoryStore'])->name('category.store');
        Route::get('/edit/{id}', [CategoryController::class, 'categoryEdit'])->name('category.edit');
        Route::post('/update', [CategoryController::class, 'categoryUpdate'])->name('category.update');
        Route::get('/delete/{id}', [CategoryController::class, 'categoryDelete'])->name('category.delete');
        // Sub Category route
        Route::get('/sub/view', [SubCategoryController::class, 'subcategoryView'])->name('all.subcategory');
        Route::post('/sub/store', [SubCategoryController::class, 'subcategoryStore'])->name('subcategory.store');
        Route::get('sub/edit/{id}', [SubCategoryController::class, 'subcategoryEdit'])->name('subcategory.edit');
        Route::post('sub/update', [SubCategoryController::class, 'categoryUpdate'])->name('subcategory.update');
        Route::get('sub/delete/{id}', [SubCategoryController::class, 'categoryDelete'])->name('subcategory.delete');
    });
