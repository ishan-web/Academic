<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\roleController;
use App\Http\Controllers\permissioncategoryController;
use App\Http\Controllers\permissionController;
use App\Http\Controllers\sitesettingController;
use App\Http\Controllers\visitorController;
use App\Http\Controllers\HometopController;
use App\Http\Controllers\HomeaboutController;
use App\Http\Controllers\HomebottomController;
use App\Http\Controllers\AboutBannerController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\branchController;
use App\Http\Controllers\galleryController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [visitorController::class, 'home'])->name('home');

Route::get('/about', [visitorController::class, 'about'])->name('about');

Route::get('/contact', [visitorController::class, 'contact'])->name('contact');
Route::post('/contact/store', [visitorController::class, 'storecontact'])->name('contact.store');

Route::get('/blog', [visitorController::class, 'blog'])->name('blog');
Route::get('/blogdetails/{id}', [visitorController::class, 'blogdetails'])->name('blogdetails');

Route::get('/event', [visitorController::class, 'event'])->name('event');
Route::get('/eventdetails/{id}', [visitorController::class, 'eventdetails'])->name('eventdetails');

Route::get('/gallery', [visitorController::class, 'gallery'])->name('gallery');

Route::get('/event', [visitorController::class, 'event'])->name('event');
Route::get('/eventdetails/{id}', [visitorController::class, 'eventdetails'])->name('eventdetails');

Route::get('/service', [visitorController::class, 'service'])->name('service');
Route::get('/servicedetails/{id}', [visitorController::class, 'servicedetails'])->name('servicedetails');


Auth::routes(['register' => true]);
Route::middleware('AdminLogin')->group(function () {

    Route::get('/sitesetting', [sitesettingController::class, 'index'])->name('sitesetting.index');
    Route::post('/sitesetting/store', [sitesettingController::class, 'store'])->name('sitesetting.store');
    Route::resource('roles', roleController::class);
    Route::resource('users', userController::class);
    Route::resource('percategory', permissioncategoryController::class);
    Route::resource('permission', permissionController::class);

    Route::get('/home/topbanner', [HometopController::class, 'index'])->name('home.topbanner');
    Route::post('/home/store_topbanner', [HometopController::class, 'store'])->name('home.storetopbanner');
    // Route::resource('topbanner', HometopController::class);
    Route::get('/home/edit_topbanner/{id}', [HometopController::class, 'edit'])->name('home.edittopbanner');
    Route::patch('/home/update_topbanner/{id}', [HometopController::class, 'update'])->name('home.updatetopbanner');
    Route::delete('/home/store_topbanner/{id}', [HometopController::class, 'destroy'])->name('home.destroytopbanner');

    Route::get('/home/highlights', [HometopController::class, 'indexHigh'])->name('home.highlights');
    Route::post('/home/store_highlights',[HometopController::class, 'storeHigh'])->name('home.storehighlights');
    Route::get('/home/edit_highlights/{id}', [HometopController::class, 'editHigh'])->name('home.edithighlights');
    Route::patch('/home/update_highlights/{id}',[HometopController::class, 'updateHigh'])->name('hmoe.updatehighlights');
    Route::delete('/home/store_highlights/{id}',[HometopController::class, 'destroyHigh'])->name('home.destroyhighlights');

    Route::get('/home/courses', [HometopController::class, 'indexCourse'])->name('home.courses');
    Route::post('/home/store_courses',[HometopController::class, 'storeCourse'])->name('home.storecourses');
    Route::get('/home/edit_courses/{id}', [HometopController::class, 'editCourse'])->name('home.editcourses');
    Route::patch('/home/update_courses/{id}',[HometopController::class, 'updateCourse'])->name('hmoe.updatecourses');
    Route::delete('/home/store_courses/{id}',[HometopController::class, 'destroyCourse'])->name('home.destroycourses');
    Route::post('/home/store_coursetitle',[HometopController::class, 'storeCoursetitle'])->name('home.storecoursetitle');

    Route::get('/home/about',[HomeaboutController::class, 'index'])->name('home.about');
    Route::post('/home/store_about', [HomeaboutController::class, 'store'])->name('home.aboutstore');

    Route::get('/home/value',[HomeaboutController::class, 'indexValue'])->name('home.value');
    Route::post('/home/store_value',[HomeaboutController::class, 'storeValue'])->name('home.storevalue');
    Route::delete('/home/store_value/{id}', [HomeaboutController::class, 'destroyValue'])->name('home.destroyvalue');

    Route::get('/home/event', [HomeaboutController::class, 'indexEvent'])->name('home.event');
    Route::post('/home/store_event',[HomeaboutController::class, 'storeEvent'])->name('home.storeevent');
    Route::get('/home/edit_event/{id}', [HomeaboutController::class, 'editEvent'])->name('home.editevent');
    Route::patch('/home/update_event/{id}',[HomeaboutController::class, 'updateEvent'])->name('home.updateevent');
    Route::delete('/home/store_event/{id}',[HomeaboutController::class, 'destroyEvent'])->name('home.destroyevent');
    Route::post('/home/store_eventTitle', [HomeaboutController::class, 'storeEventtitle'])->name('home.storeeventtitle');

    Route::get('/home/staff', [HomebottomController::class, 'indexStaff'])->name('home.staff');
    Route::post('/home/store_staff',[HomebottomController::class, 'storeStaff'])->name('home.storestaff');
    Route::get('/home/edit_staff/{id}', [HomebottomController::class, 'editStaff'])->name('home.editstaff');
    Route::patch('/home/update_staff/{id}',[HomebottomController::class, 'updateStaff'])->name('home.updatestaff');
    Route::delete('/home/store_staff/{id}',[HomebottomController::class, 'destroyStaff'])->name('home.destroystaff');
    Route::post('/home/store_staffTitle', [HomebottomController::class, 'storeStafftitle'])->name('home.storestafftitle');

    Route::get('/home/news', [HomebottomController::class, 'indexNews'])->name('home.news');
    Route::post('/home/store_news',[HomebottomController::class, 'storeNews'])->name('home.storenews');
    Route::get('/home/edit_news/{id}', [HomebottomController::class, 'editNews'])->name('home.editnews');
    Route::patch('/home/update_news/{id}',[HomebottomController::class, 'updateNews'])->name('home.updatenews');
    Route::delete('/home/store_news/{id}',[HomebottomController::class, 'destroyNews'])->name('home.destroynews');
    Route::post('/home/store_newsTitle', [HomebottomController::class, 'storeNewstitle'])->name('home.storenewstitle');

    Route::get('/home/say', [HomebottomController::class, 'indexSay'])->name('home.say');
    Route::post('/home/store_say',[HomebottomController::class, 'storeSay'])->name('home.storesay');
    Route::get('/home/edit_say/{id}', [HomebottomController::class, 'editSay'])->name('home.editsay');
    Route::patch('/home/update_say/{id}',[HomebottomController::class, 'updateSay'])->name('home.updatesay');
    Route::delete('/home/store_say/{id}',[HomebottomController::class, 'destroySay'])->name('home.destroysay');
    Route::post('/home/store_sayTitle', [HomebottomController::class, 'storeSaytitle'])->name('home.storesaytitle');

    Route::get('/home/logo', [HomebottomController::class, 'indexLogo'])->name('home.logo');
    Route::post('/home/store_logo',[HomebottomController::class, 'storeLogo'])->name('home.storelogo');
    Route::get('/home/edit_logo/{id}', [HomebottomController::class, 'editLogo'])->name('home.editlogo');
    Route::patch('/home/update_logo/{id}',[HomebottomController::class, 'updateLogo'])->name('home.updatelogo');
    Route::delete('/home/store_logo/{id}',[HomebottomController::class, 'destroyLogo'])->name('home.destroylogo');
    Route::post('/home/store_logoTitle', [HomebottomController::class, 'storeLogotitle'])->name('home.storelogotitle');

    Route::get('/home/footer',[HomebottomController::class, 'index'])->name('home.footer');
    Route::post('/home/store_footer', [HomebottomController::class, 'store'])->name('home.storefooter');

    Route::get('/about/topbanner',[AboutBannerController::class, 'index'])->name('about.topbanner');
    Route::post('/about/store_topbanner', [AboutBannerController::class, 'store'])->name('about.storetopbanner');
    Route::get('/about/edit_topbanner/{id}', [AboutBannerController::class, 'edit'])->name('about.edittopbanner');
    Route::patch('/about/update_topbanner/{id}',[AboutBannerController::class, 'update'])->name('about.updatetopbanner');
    Route::delete('/about/store_topbanner/{id}',[AboutBannerController::class, 'destroy'])->name('about.destroytopbanner');

    Route::get('/about/history',[AboutBannerController::class, 'topindex'])->name('about.history');
    Route::post('/about/store_history', [AboutBannerController::class, 'topstore'])->name('about.storehistory');

    Route::get('/about/mission',[AboutBannerController::class, 'missionindex'])->name('about.mission');
    Route::post('/about/store_mission', [AboutBannerController::class, 'missionstore'])->name('about.storemission');

    Route::get('/about/vision',[AboutBannerController::class, 'visionindex'])->name('about.vision');
    Route::post('/about/store_vision', [AboutBannerController::class, 'visionstore'])->name('about.storevision');

    Route::get('/contact_us',[contactController::class, 'index'])->name('contact_us');
    Route::post('/store_contact_us', [contactController::class, 'store'])->name('store.contact_us');

    Route::get('/branch', [branchController::class, 'index'])->name('branch');
    Route::post('store_branch',[branchController::class, 'store'])->name('storebranch');
    Route::get('/edit_branch/{id}', [branchController::class, 'edit'])->name('editbranch');
    Route::patch('/update_branch/{id}',[branchController::class, 'update'])->name('updatebranch');
    Route::delete('/store_branch/{id}',[branchController::class, 'destroy'])->name('destroybranch');
    Route::post('/store_branchTitle', [branchController::class, 'storeTitle'])->name('storebranchTitle');

    Route::get('/admin/gallery',[galleryController::class, 'index'])->name('admin.gallery');
    Route::post('/admin/store_gallery', [galleryController::class, 'store'])->name('admin.storegallery');
    Route::get('/admin/edit_gallery/{id}', [galleryController::class, 'edit'])->name('admin.editgallery');
    Route::patch('/admin/upadate_gallery/{id}', [galleryController::class, 'update'])->name('admin.upategallery');
    Route::delete('/admin/store_gallery/{id}', [galleryController::class, 'destroy'])->name('admin.destroygallery');
    Route::post('/admin/store_gallerytitle',[galleryController::class,'storeTitle'])->name('admin.storegallerytitle');
});


