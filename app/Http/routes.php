<?php
ini_set('display_errors', 1);
define('SITE_NAME', 'Fabmap');
define('manish', 'manish kumar saini');
/*

  |  ################# Manish kumar saini ############################
  |
 */
Route::get('auth/facebook', 'Auth\AuthController@redirectToProvider');
Route::get('auth/facebook/callback', 'Auth\AuthController@handleProviderCallback');
//Route::get('facebook', 'Auth\AuthController@facebook');
Route::get('register/verify/{confirmationCode}', [
    'as' => 'confirmation_path',
    'uses' => 'Auth\AuthController@confirm'
]);
Route::get('shopowner/verify/{confirmationCode}', [
    'as' => 'confirmation_path',
    'uses' => 'Admin\ShopownerController@ownconfirm'
]);
Route::get('autocomplete', 'UserController@autocomplete');
Route::get('autocomplete_c', 'UserController@autocomplete_c');
Route::get('automallsug', 'UserController@shopautosug');
Route::get('automallsug_c', 'UserController@shopautosug_c');
Route::get('autolandmarksug', 'UserController@shopautolandmark');
Route::get('autolandmarksug_c', 'UserController@shopautolandmark_c'); 
Route::get('automallchinese', 'UserController@shopautosug_c');
 Route::get('autolandmarkchinese', 'UserController@shopautolandmark_c');
 

Route::get('setsession', 'UserController@setsession');

Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');
Route::get('about', 'PagesController@about');
Route::get('privacypolicy', 'PagesController@privacypolicy');
Route::get('contact', 'PagesController@contact');
Route::post('contact', 'PagesController@postcontact');
Route::get('Shops/{id}/personalinfo', 'UserController@getpersonalinfo');
Route::post('Shops/{id}/personalinfo', 'UserController@postpersonalinfo');
//Route::get('guestinfo', 'UserController@getpersonalinfo');
//Route::post('guestinfo', 'UserController@postpersonalinfo');
Route::get('Shops/NewShops', 'UserController@newShops')->where('id', '(.*)');
Route::post('Shops/NewShops', 'UserController@postNewShops')->where('id', '(.*)');
Route::get('Shops', 'UserController@newShopEdit')->where('id', '(.*)');
Route::get('Shops/updateSearch', 'UserController@ShopUpdation')->where('id', '(.*)');
Route::get('Shops/ShopClosure', 'UserController@ShopUpdation')->where('id', '(.*)');
Route::get('Shops/ShopRelocation', 'UserController@ShopUpdation')->where('id', '(.*)');
Route::get('Shops/AddNewBranch/2', 'UserController@ShopUpdation')->where('id', '(.*)');
Route::get('rating', 'UserController@rating');
Route::get('Shops/{id}/download', 'UserController@getDownload');
//Route::post('ShopEdit/NewShops', 'UserController@postNewShops')->where('id', '(.*)');
Route::get('guestinfo', 'UserController@getguestinfo');
Route::post('guestinfo', 'UserController@postguestinfo');

Route::get('/{id}/policy', 'PagesController@staticfooter')->where('id', '(.*)');
;
Route::get('womencollection', 'PagesController@collectionwomen');
Route::get('Shops/{id}/shop_incharge_reg', 'UserController@shop_incharge_reg');
Route::post('Shops/{id}/shop_incharge_reg', 'UserController@postshop_incharge_reg');
//Route::post('Shops/{id}/shop_incharge_reg', 'UserController@postshop_incharge_reg');
Route::post('Shops/shop_incharge_reg/selecttall', 'UserController@selecttall');

Route::pattern('id', '[0-9]+');
Route::get('news/{id}', 'ArticlesController@show');
Route::get('video/{id}', 'VideoController@show');
Route::get('photo/{id}', 'PhotoController@show');
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'HomeController@switchLang']);

get('/auth/login', 'Auth\AuthController@getLogin');
post('/auth/login', 'Auth\AuthController@postLogin');
 get('/admin/auth/login', 'admin\Auth\AuthController@getLogin');

get('register', 'Auth\AuthController@getRegister');

post('register', 'Auth\AuthController@postRegister');
 
 
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
//post('/auth/login', 'Auth\AuthController@postLogin');

Route::get('users/{id}/shop_type', 'UserController@getshop_catogary')->where('id', '(.*)');

Route::get('users/region/{name}', 'UserController@getregion')->where('name', '(.*)'); //27 aug
Route::get('users/district/{name}', 'UserController@getlandmark')->where('name', '(.*)'); //27 aug

Route::get('users/region_c/{name}', 'UserController@getregion_c')->where('name', '(.*)');


Route::get('users/district_c/{name}', 'UserController@getlandmark_c')->where('name', '(.*)');

Route::get('users/regionf/{name}', 'UserController@getregionf')->where('name', '(.*)');

Route::get('Shops/listing', 'UserController@postShopsSubmit');

Route::get('/searchpage', 'UserController@postShopsSearch');

//Route::post('/searchpage_c', 'UserController@postShopsSearch_c');

Route::get('/searchpage_c', 'UserController@postShopsSearch_c');

Route::get('Shops/{id}/SeeAll', 'UserController@SeeAll')->where('id', '(.*)');
Route::get('Shops/{id}/ShopDetail', 'UserController@ShopDetail')->where('id', '(.*)');
Route::get('Shops/{id}/Branches', 'UserController@Branches')->where('id', '(.*)');

Route::get('Shops/{id}/editShopCategory', 'UserController@editShopCategory')->where('id', '(.*)');
Route::get('Shops/{id}/UpdateInfo', 'UserController@ShopUpdateInfo')->where('id', '(.*)');
Route::post('Shops/{id}/UpdateInfo', 'UserController@postShopUpdateInfo')->where('id', '(.*)');
Route::get('Shops/{id}/newShop', 'UserController@newShop')->where('id', '(.*)');
Route::post('Shops/{id}/newShop', 'UserController@postNewShop')->where('id', '(.*)');
Route::get('Shops/{id}/ShopClosure', 'UserController@ShopClosure')->where('id', '(.*)');
Route::post('Shops/{id}/ShopClosure', 'UserController@postShopClosure')->where('id', '(.*)');
Route::get('Shops/{id}/ShopRelocation', 'UserController@ShopRelocation')->where('id', '(.*)');
Route::post('Shops/{id}/ShopRelocation', 'UserController@postShopRelocation')->where('id', '(.*)');
Route::get('Shops/{id}/ShopRenovation', 'UserController@ShopRenovation')->where('id', '(.*)');
Route::post('Shops/{id}/ShopRenovation', 'UserController@postShopRenovation')->where('id', '(.*)');
Route::get('Shops/{id}/AddNewBranch/{type}', 'UserController@AddNewBranch')->where('id', '(.*)');
Route::post('Shops/{id}/AddNewBranch/{type}', 'UserController@postAddNewBranch')->where('id', '(.*)');

Route::post('newsletter', 'UserController@postnewsletter');




Route::get('Shops/{id}/AllShopList', 'UserController@AllShopList');
Route::get('/SearchAllSHopList', 'UserController@SearchAllSHopList');

Route::get('Shops/shopType/{id}', 'UserController@getshopType')->where('id', '(.*)');
Route::get('members/dashboard', 'PagesController@memberdashboard');
Route::post('members/dashboard', 'PagesController@postMemberprofile')->where('id', '(.*)');
Route::get('favorite', 'PagesController@favorite');
Route::get('members/{id}/changePassword', 'PagesController@getChangePasswor')->where('id', '(.*)');
Route::post('members/{id}/changePassword', 'PagesController@postChangePasswor')->where('id', '(.*)');
Route::get('favoriteshops', 'PagesController@favoriteshops');    
// Redirect to Facebook for authorization
//https://github.com/adamwathan/eloquent-oauth-l5
//Route::get('facebook/authorize', function() {
//    return OAuth::authorize('facebook');
//});
//
//
//Route::get('google/authorize', function() {
//    return OAuth::authorize('google');
//});
//// Facebook redirects here after authorization
//Route::get('facebook/login', function() {
//
//    // Automatically log in existing users
//    // or create a new user if necessary.
//    OAuth::login('facebook');
//
//    // Current user is now available via Auth facade
//    $user = Auth::user();
//
//    return Redirect::intended();
//});


Route::get('nearby', 'UserController@nearby');
////////////////////// Admin ////////////////////////////
Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'namespace' => 'Admin'], function() {

    Route::controllers([
        'auth' => 'Auth\AuthController',
        'password' => 'Auth\PasswordController',
    ]);


    Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'LanguageController@switchLang']);


//    Route::controllers([
//    'auth' => 'Auth\AuthController',
//    'password' => 'Auth\PasswordController',
//]);
    Route::pattern('id', '[0-9]+');
    Route::pattern('id2', '[0-9]+');
    get('/admin/login', 'Auth\AuthController@getLogin');
    ################################        Admin Dashboard       ####################################################
    Route::get('/', 'DashboardController@index');
    Route::get('login', 'DashboardController@index');
    Route::get('dashboard', 'DashboardController@index');
    Route::get('Shops/shopType/{id}', 'UserController@getshopType')->where('id', '(.*)');
    ###################################    Admin Setting         ###################################################
    Route::get('users/{id}/editprofile', 'UserController@editprofile')->where('id', '(.*)');
    Route::post('users/{id}/editprofile', 'UserController@postEditProfile')->where('id', '(.*)');

    Route::get('users/{id}/changeProfileImage', 'UserController@changeProfileImage')->where('id', '(.*)');
    Route::post('users/{id}/changeProfileImage', 'UserController@postchangeProfileImage')->where('id', '(.*)');

    Route::get('users/{id}/changePasswor', 'UserController@getChangePasswor')->where('id', '(.*)');
    Route::post('users/{id}/changePasswor', 'UserController@postChangePasswor')->where('id', '(.*)');

    ##################################      Sub Admin Setting      ##################################################
    Route::get('users/sub_index/{page?}', 'UserController@sub_index')->where('page', '[1-9]+[0-9]*');
    Route::get('users/sub_create', 'UserController@sub_getCreate');
    Route::post('users/sub_create', 'UserController@sub_postCreate');
    Route::get('users/{id}/sub_edit', 'UserController@sub_getEdit')->where('id', '(.*)');
    Route::post('users/{id}/sub_edit', 'UserController@sub_postEdit')->where('id', '(.*)');
    Route::get('users/{id}/sub_delete', 'UserController@sub_getDelete')->where('id', '(.*)');
    Route::get('users/{id}/sub_active', 'UserController@sub_getactive')->where('id', '(.*)');
    Route::get('users/{id}/sub_inactive', 'UserController@sub_getincative')->where('id', '(.*)');
    Route::get('users/{id}/sub_detail', 'UserController@sub_getdetail')->where('id', '(.*)');
    // ajax router
    Route::post('users/sub_activeall', 'UserController@sub_getactiveall');
    Route::post('users/sub_inactiveall', 'UserController@sub_getinactiveall');
    Route::post('users/sub_deleteall', 'UserController@sub_getdeleteall');
    // search sub admin router
    Route::post('users/sub_index/{page?}', 'UserController@sub_index')->where('page', '[1-9]+[0-9]*');

    // Route::post('users/{id}/sub_delete', 'UserController@sub_postDelete');
    Route::get('users/sub_data', 'UserController@sub_data');
    ###################################      Users Setting         ####################################################
    Route::get('users/index/{page?}', 'UserController@index')->where('page', '[1-9]+[0-9]*');
    Route::get('users/create', 'UserController@getCreate');
    Route::post('users/create', 'UserController@postCreate');
    Route::get('users/{id}/edit', 'UserController@getEdit')->where('id', '(.*)');
    Route::post('users/{id}/edit', 'UserController@postEdit')->where('id', '(.*)');
    Route::get('users/{id}/delete', 'UserController@getDelete')->where('id', '(.*)');
    Route::get('users/{id}/active', 'UserController@getactive')->where('id', '(.*)');
    Route::get('users/{id}/inactive', 'UserController@getincative')->where('id', '(.*)');
    Route::get('users/{id}/detail', 'UserController@getdetail')->where('id', '(.*)');
    // ajax router
    Route::post('users/activeall', 'UserController@getactiveall');
    Route::post('users/inactiveall', 'UserController@getinactiveall');
    Route::post('users/deleteall', 'UserController@getdeleteall');
    // search sub admin router
    Route::post('users/index/{page?}', 'UserController@index')->where('page', '[1-9]+[0-9]*');

    // Route::post('users/{id}/delete', 'UserController@postDelete');
    Route::get('users/data', 'UserController@data');

    ####################################    Shop Owner Setting      ###################################################

    Route::get('users/sho_index/{page?}', 'UserController@sho_index')->where('page', '[1-9]+[0-9]*');
    Route::get('users/sho_create', 'UserController@sho_getCreate');
    Route::post('users/sho_create', 'UserController@sho_postCreate');
    Route::get('users/{id}/sho_edit', 'UserController@sho_getEdit')->where('id', '(.*)');
    Route::post('users/{id}/sho_edit', 'UserController@sho_postEdit')->where('id', '(.*)');
    Route::get('users/{id}/sho_delete', 'UserController@sho_getDelete')->where('id', '(.*)');
    Route::get('users/{id}/sho_active', 'UserController@sho_getactive')->where('id', '(.*)');
    Route::get('users/{id}/sho_inactive', 'UserController@sho_getincative')->where('id', '(.*)');
    Route::get('users/{id}/sho_detail', 'UserController@sho_getdetail')->where('id', '(.*)');
    // ajax router
    Route::post('users/sho_activeall', 'UserController@sho_getactiveall');
    Route::post('users/sho_inactiveall', 'UserController@sho_getinactiveall');
    Route::post('users/sho_deleteall', 'UserController@sho_getdeleteall');
    // search sub admin router
    Route::post('users/sho_index/{page?}', 'UserController@sho_index')->where('page', '[1-9]+[0-9]*');
    Route::get('users/sho_upload_excel', 'UserController@sho_getupload_excel');
    Route::post('users/sho_upload_excel', 'UserController@sho_postUpload_excel');

    // Route::post('users/{id}/sho_delete', 'UserController@sho_postDelete');
    Route::get('users/sho_data', 'UserController@sho_data');

    ####################################    Shopes (according to shop owner)      ###################################################

    Route::get('users/{id}/shop_index', 'UserController@getshop_index')->where('id', '(.*)');
    Route::post('users/{id}/shop_index', 'UserController@getshop_index')->where('id', '(.*)');
    Route::get('users/{id}/shop_create', 'UserController@shop_getCreate')->where('id', '(.*)');
    Route::post('users/{id}/shop_create', 'UserController@shop_postCreate')->where('id', '(.*)');
    Route::get('users/{id}/shop_edit', 'UserController@shop_getEdit')->where('id', '(.*)');
    Route::post('users/{id}/shop_edit', 'UserController@shop_postEdit')->where('id', '(.*)');
    // Route::get('users/{id}/shop_delete', 'UserController@shop_getDelete')->where('id', '(.*)');
//    Route::get('users/{id}/sho_active', 'UserController@sho_getactive')->where('id', '(.*)');
//    Route::get('users/{id}/sho_inactive', 'UserController@sho_getincative')->where('id', '(.*)');
    //  Route::get('users/{id}/shop_detail', 'UserController@shop_getdetail')->where('id', '(.*)');
//    // ajax router
//    Route::post('users/sho_activeall', 'UserController@sho_getactiveall');
//    Route::post('users/sho_inactiveall', 'UserController@sho_getinactiveall');
//    Route::post('users/sho_deleteall', 'UserController@sho_getdeleteall');
//    
//    Route::post('users/sho_index/{page?}', 'UserController@sho_index')->where('page', '[1-9]+[0-9]*');
// 
//    Route::get('users/sho_data', 'UserController@sho_data');
    ####################################    #####  Shopes #######  ###################################################

    Route::get('users/shops_index', 'UserController@getshops_index')->where('id', '(.*)');
    Route::post('users/shops_index', 'UserController@getshops_index')->where('id', '(.*)');
    Route::get('users/shops_create', 'UserController@shops_getCreate')->where('id', '(.*)');
    Route::get('users/{id}/shop_type', 'UserController@getshop_catogary')->where('id', '(.*)');
    Route::post('users/shops_create', 'UserController@shops_postCreate')->where('id', '(.*)');
    Route::get('users/{id}/shops_edit', 'UserController@shops_getEdit')->where('id', '(.*)');
    Route::post('users/{id}/shops_edit', 'UserController@shops_postEdit')->where('id', '(.*)');
    Route::get('users/{id}/add-manager', 'UserController@getAddManager')->where('id', '(.*)');
    Route::post('users/{id}/add-manager', 'UserController@postAddManager')->where('id', '(.*)');
    Route::get('users/{id}/edit-manager', 'UserController@getEditManager')->where('id', '(.*)');
    Route::post('users/{id}/edit-manager', 'UserController@postEditManager')->where('id', '(.*)');
    Route::get('users/{id}/shop_Image', 'UserController@getshop_Image')->where('id', '(.*)');
    Route::post('users/{id}/shop_Image', 'UserController@postshop_Image')->where('id', '(.*)');
    Route::get('users/{id}/shop_delete', 'UserController@shop_getDelete')->where('id', '(.*)');
    Route::get('users/{id}/shop_detail', 'UserController@shop_getdetail')->where('id', '(.*)');
    Route::get('users/{id}/shop_active', 'UserController@shop_getactive')->where('id', '(.*)');
    Route::get('users/{id}/shop_inactive', 'UserController@shop_getincative')->where('id', '(.*)');
    Route::get('users/{id}/shop_display', 'UserController@shop_getdisplay')->where('id', '(.*)');
    Route::get('users/{id}/shop_undisplay', 'UserController@shop_getundisplay')->where('id', '(.*)');
    // ajax router
    Route::post('users/shop_activeall', 'UserController@shop_getactiveall');
    Route::post('users/shop_inactiveall', 'UserController@shop_getinactiveall');
    Route::post('users/shop_deleteall', 'UserController@shop_getdeleteall');
        Route::get('users/createExcel', 'UserController@createExcel');
     ### Category ###
         Route::get('category/index', 'CategoryController@index');
    ###   Gallery Section   ####### 

    Route::get('gallery/index', 'GalleryController@index')->where('id', '(.*)');
    Route::get('gallery/add', 'GalleryController@getAdd')->where('id', '(.*)');
    Route::post('gallery/add', 'GalleryController@postAdd')->where('id', '(.*)');
    Route::get('gallery/{id}/edit', 'GalleryController@getedit')->where('id', '(.*)');
    Route::post('gallery/{id}/edit', 'GalleryController@postedit')->where('id', '(.*)');
    Route::get('gallery/{id}/active', 'GalleryController@getactive')->where('id', '(.*)');
    Route::get('gallery/{id}/inactive', 'GalleryController@getinactive')->where('id', '(.*)');
    Route::get('gallery/{id}/detail', 'GalleryController@getdetail')->where('id', '(.*)');
    Route::get('gallery/{id}/delete', 'GalleryController@delete')->where('id', '(.*)');
    Route::post('gallery/activeall', 'GalleryController@getactiveall');
    Route::post('gallery/inactiveall', 'GalleryController@getinactiveall');
    Route::post('gallery/deleteall', 'GalleryController@getdeleteall');

    ###   Advertisement Section   ####### 

    Route::get('advertisement/index', 'AdvertisementController@index')->where('id', '(.*)');
    Route::post('advertisement/index', 'AdvertisementController@index')->where('id', '(.*)');
    Route::get('advertisement/add', 'AdvertisementController@getAdd')->where('id', '(.*)');
    Route::post('advertisement/add', 'AdvertisementController@postAdd')->where('id', '(.*)');
    Route::get('advertisement/{id}/edit', 'AdvertisementController@getedit')->where('id', '(.*)');
    Route::post('advertisement/{id}/edit', 'AdvertisementController@postedit')->where('id', '(.*)');
    Route::get('advertisement/{id}/delete', 'AdvertisementController@advdelete')->where('id', '(.*)');
    Route::get('advertisement/{id}/active', 'AdvertisementController@getactive')->where('id', '(.*)');
    Route::get('advertisement/{id}/inactive', 'AdvertisementController@getinactive')->where('id', '(.*)');
    Route::get('advertisement/{id}/detail', 'AdvertisementController@getdetail')->where('id', '(.*)');
    Route::post('advertisement/activeall', 'AdvertisementController@getactiveall');
    Route::post('advertisement/inactiveall', 'AdvertisementController@getinactiveall');
    Route::post('advertisement/deleteall', 'AdvertisementController@getdeleteall');

    ### Forshop update Section   ####### 
    Route::get('forshopupdate/update_index', 'ForshopController@update_index')->where('id', '(.*)');
    Route::post('forshopupdate/update_index', 'ForshopController@update_index')->where('id', '(.*)');

    Route::get('forshopupdate/{id}/update', 'ForshopController@getupdate')->where('id', '(.*)');
    Route::post('forshopupdate/{id}/update', 'ForshopController@postupdate')->where('id', '(.*)');
    Route::get('forshopupdate/{id}/delete', 'ForshopController@delete')->where('id', '(.*)');
    Route::get('forshopupdate/{id}/newshopdelete', 'ForshopController@newshopdelete')->where('id', '(.*)');
    Route::get('forshopupdate/{id}/relocdelete', 'ForshopController@relocdelete')->where('id', '(.*)');
    Route::get('forshopupdate/{id}/renovdelete', 'ForshopController@renovdelete')->where('id', '(.*)');
    Route::get('forshopupdate/{id}/branchdelete', 'ForshopController@branchdelete')->where('id', '(.*)');
    Route::get('forshopupdate/{id}/closuredelete', 'ForshopController@closuredelete')->where('id', '(.*)');


    Route::get('forshopupdate/{id}/detail', 'ForshopController@getdetail')->where('id', '(.*)');
    Route::get('forshopupdate/{id}/newshop_detail', 'ForshopController@newshopdetail')->where('id', '(.*)');
    Route::get('forshopupdate/{id}/renovation_detail', 'ForshopController@renovationdetail')->where('id', '(.*)');


    Route::get('forshopupdate/newShop_index', 'ForshopController@newShop_index');
    Route::post('forshopupdate/newShop_index', 'ForshopController@newShop_index');
    Route::get('forshopupdate/{id}/createNewShop', 'ForshopController@createNewShop')->where('id', '(.*)');
    Route::post('forshopupdate/{id}/createNewShop', 'ForshopController@postcreateNewShop')->where('id', '(.*)');
    // Route::post('forshopupdate/newShop', 'ForshopController@postNewShop');
    Route::get('forshopupdate/closure_index', 'ForshopController@closure_index');
    Route::post('forshopupdate/closure_index', 'ForshopController@closure_index');
    Route::get('forshopupdate/{id}/ClosureUpdate', 'ForshopController@getClosureUpdate')->where('id', '(.*)');
    Route::post('forshopupdate/{id}/ClosureUpdate', 'ForshopController@postClosureUpdate')->where('id', '(.*)');
    Route::get('forshopupdate/{id}/closuredetail', 'ForshopController@closuredetail')->where('id', '(.*)');


    Route::get('forshopupdate/relocation_index', 'ForshopController@relocation_index');
    Route::post('forshopupdate/relocation_index', 'ForshopController@relocation_index');
    Route::get('forshopupdate/{id}/relocationUpdate', 'ForshopController@getrelocationUpdate')->where('id', '(.*)');
    Route::post('forshopupdate/{id}/relocationUpdate', 'ForshopController@postrelocationUpdate')->where('id', '(.*)');
    Route::get('forshopupdate/{id}/relocationdetail', 'ForshopController@relocationdetail')->where('id', '(.*)');

    Route::get('forshopupdate/renovation_index', 'ForshopController@renovation_index');
    Route::post('forshopupdate/renovation_index', 'ForshopController@renovation_index');
    Route::get('forshopupdate/{id}/renovationUpdate', 'ForshopController@getrenovationUpdate')->where('id', '(.*)');
    Route::post('forshopupdate/{id}/renovationUpdate', 'ForshopController@postrenovationUpdate')->where('id', '(.*)');
    Route::get('forshopupdate/{id}/renovationdetail', 'ForshopController@renovationdetail')->where('id', '(.*)');

    Route::get('forshopupdate/Branch_index', 'ForshopController@Branch_index');
    Route::post('forshopupdate/Branch_index', 'ForshopController@Branch_index');
    Route::get('forshopupdate/{id}/BranchUpdate', 'ForshopController@getBranchUpdate')->where('id', '(.*)');
    Route::post('forshopupdate/{id}/BranchUpdate', 'ForshopController@postBranchUpdate')->where('id', '(.*)');
    Route::get('forshopupdate/{id}/branchdetail', 'ForshopController@branchdetail')->where('id', '(.*)');




    Route::get('forshopupdate/shopclosure', 'ForshopController@ShopClosure')->where('id', '(.*)');
    Route::post('forshopupdate/{id}/ShopClosure', 'ForshopController@postShopClosure')->where('id', '(.*)');
    Route::get('forshopupdate/{id}/ShopRelocation', 'ForshopController@ShopRelocation')->where('id', '(.*)');
    Route::post('forshopupdate/{id}/ShopRelocation', 'ForshopController@postShopRelocation')->where('id', '(.*)');
    Route::get('forshopupdate/{id}/ShopRenovation', 'ForshopController@ShopRenovation')->where('id', '(.*)');
    Route::post('forshopupdate/{id}/ShopRenovation', 'ForshopController@postShopRenovation')->where('id', '(.*)');
    Route::get('forshopupdate/AddNewBranch', 'ForshopController@AddNewBranch')->where('id', '(.*)');
    Route::post('forshopupdate/{id}/AddNewBranch', 'ForshopController@postAddNewBranch')->where('id', '(.*)');

    
    Route::post('forshopupdate/update_index/deleteall', 'ForshopController@updateshopdeleteall');
    Route::post('forshopupdate/renovation_index/deleteall', 'ForshopController@renovationshopdeleteall');
    Route::post('forshopupdate/relocation_index/deleteall', 'ForshopController@relocationshopdeleteall');
    Route::post('forshopupdate/newShop_index/deleteall', 'ForshopController@newshopsdeleteall');
     
    Route::post('forshopupdate/closure_index/deleteall', 'ForshopController@closureshopdeleteall');
    Route::post('forshopupdate/Branch_index/deleteall', 'ForshopController@branchshopsdeleteall');
    
    #### comman

    Route::get('users/region/{name}', 'ForshopController@getregion')->where('name', '(.*)');

    ## static management section ###
    Route::get('staticpages/index', 'StaticmanagementController@index')->where('id', '(.*)');
    Route::post('staticpages/index', 'StaticmanagementController@index')->where('id', '(.*)');
    Route::get('staticpages/add', 'StaticmanagementController@getAdd');
    Route::post('staticpages/add', 'StaticmanagementController@postAdd')->where('id', '(.*)');
    Route::get('staticpages/{id}/edit', 'StaticmanagementController@getedit')->where('id', '(.*)');
    Route::post('staticpages/{id}/edit', 'StaticmanagementController@postedit')->where('id', '(.*)');
    Route::get('staticpages/{id}/delete', 'StaticmanagementController@pagedelete')->where('id', '(.*)');
    Route::get('staticpages/{id}/detail', 'StaticmanagementController@getdetail')->where('id', '(.*)');
    Route::get('staticpages/{id}/active', 'StaticmanagementController@getactive')->where('id', '(.*)');
    Route::get('staticpages/{id}/inactive', 'StaticmanagementController@getinactive')->where('id', '(.*)');
    Route::post('staticpages/activeall', 'StaticmanagementController@getactiveall');
    Route::post('staticpages/inactiveall', 'StaticmanagementController@getinactiveall');
    Route::post('staticpages/deleteall', 'StaticmanagementController@getdeleteall');
    ##Emailmanagement###
    Route::get('emailmanagement/index', 'EmailtemplateController@index');
    Route::post('emailmanagement/index', 'EmailtemplateController@index');
    Route::get('emailmanagement/{id}/edit', 'EmailtemplateController@getedit')->where('id', '(.*)');
    Route::post('emailmanagement/{id}/edit', 'EmailtemplateController@postedit')->where('id', '(.*)');
    Route::get('emailmanagement/{id}/detail', 'EmailtemplateController@getdetail')->where('id', '(.*)');
    Route::get('emailmanagement/{id}/delete', 'EmailtemplateController@emaildelete')->where('id', '(.*)');
    Route::get('emailmanagement/{id}/active', 'EmailtemplateController@getactive')->where('id', '(.*)');
    Route::get('emailmanagement/{id}/inactive','EmailtemplateController@getinactive')->where('id', '(.*)');
    Route::post('emailmanagement/activeall', 'EmailtemplateController@getactiveall');
    Route::post('emailmanagement/inactiveall', 'EmailtemplateController@getinactiveall');
    Route::post('emailmanagement/deleteall', 'EmailtemplateController@getdeleteall');
    
    
    ## newsletter##
    Route::get('newsletter/index', 'NewsletterController@index');
    Route::post('newsletter/index', 'NewsletterController@index');
    Route::get('newsletter/{id}/delete', 'NewsletterController@newsletterdelete')->where('id', '(.*)');
    Route::post('newsletter/deleteall', 'NewsletterController@getdeleteall');
    Route::get('newsletter/csvdownload', 'NewsletterController@csvdownload');
    
    
    Route::get('shopowner/index', 'ShopownerController@index');
    Route::get('shopowner/{id}/detail', 'ShopownerController@getdetail')->where('id', '(.*)');
    Route::get('shopowner/{id}/update', 'ShopownerController@getupdate')->where('id', '(.*)');
    Route::post('shopowner/{id}/update', 'ShopownerController@postupdate')->where('id', '(.*)');
    Route::post('shopowner/deleteall', 'ShopownerController@getdeleteall');
    Route::get('members/index', 'ShopownerController@getmembers');
    
    # Language
    Route::get('language', 'LanguageController@index');
    Route::get('language/create', 'LanguageController@getCreate');
    Route::post('language/create', 'LanguageController@postCreate');
    Route::get('language/{id}/edit', 'LanguageController@getEdit');
    Route::post('language/{id}/edit', 'LanguageController@postEdit');
    Route::get('language/{id}/delete', 'LanguageController@getDelete');
    Route::post('language/{id}/delete', 'LanguageController@postDelete');
    Route::get('language/data', 'LanguageController@data');
    Route::get('language/reorder', 'LanguageController@getReorder');

    # News category
    Route::get('newscategory', 'ArticleCategoriesController@index');
    Route::get('newscategory/create', 'ArticleCategoriesController@getCreate');
    Route::post('newscategory/create', 'ArticleCategoriesController@postCreate');
    Route::get('newscategory/{id}/edit', 'ArticleCategoriesController@getEdit');
    Route::post('newscategory/{id}/edit', 'ArticleCategoriesController@postEdit');
    Route::get('newscategory/{id}/delete', 'ArticleCategoriesController@getDelete');
    Route::post('newscategory/{id}/delete', 'ArticleCategoriesController@postDelete');
    Route::get('newscategory/data', 'ArticleCategoriesController@data');
    Route::get('newscategory/reorder', 'ArticleCategoriesController@getReorder');

    # News
    Route::get('news', 'ArticlesController@index');
    Route::get('news/create', 'ArticlesController@getCreate');
    Route::post('news/create', 'ArticlesController@postCreate');
    Route::get('news/{id}/edit', 'ArticlesController@getEdit');
    Route::post('news/{id}/edit', 'ArticlesController@postEdit');
    Route::get('news/{id}/delete', 'ArticlesController@getDelete');
    Route::post('news/{id}/delete', 'ArticlesController@postDelete');
    Route::get('news/data', 'ArticlesController@data');
    Route::get('news/reorder', 'ArticlesController@getReorder');

    # Photo Album
    Route::get('photoalbum', 'PhotoAlbumController@index');
    Route::get('photoalbum/create', 'PhotoAlbumController@getCreate');
    Route::post('photoalbum/create', 'PhotoAlbumController@postCreate');
    Route::get('photoalbum/{id}/edit', 'PhotoAlbumController@getEdit');
    Route::post('photoalbum/{id}/edit', 'PhotoAlbumController@postEdit');
    Route::get('photoalbum/{id}/delete', 'PhotoAlbumController@getDelete');
    Route::post('photoalbum/{id}/delete', 'PhotoAlbumController@postDelete');
    Route::get('photoalbum/data', 'PhotoAlbumController@data');
    Route::get('photoalbum/reorder', 'PhotoAlbumController@getReorder');

    # Photo
    Route::get('photo', 'PhotoController@index');
    Route::get('photo/create', 'PhotoController@getCreate');
    Route::post('photo/create', 'PhotoController@postCreate');
    Route::get('photo/{id}/edit', 'PhotoController@getEdit');
    Route::post('photo/{id}/edit', 'PhotoController@postEdit');
    Route::get('photo/{id}/delete', 'PhotoController@getDelete');
    Route::post('photo/{id}/delete', 'PhotoController@postDelete');
    Route::get('photo/{id}/itemsforalbum', 'PhotoController@itemsForAlbum');
    Route::get('photo/{id}/{id2}/slider', 'PhotoController@getSlider');
    Route::get('photo/{id}/{id2}/albumcover', 'PhotoController@getAlbumCover');
    Route::get('photo/data/{id}', 'PhotoController@data');
    Route::get('photo/reorder', 'PhotoController@getReorder');

    # Video
    Route::get('videoalbum', 'VideoAlbumController@index');
    Route::get('videoalbum/create', 'VideoAlbumController@getCreate');
    Route::post('videoalbum/create', 'VideoAlbumController@postCreate');
    Route::get('videoalbum/{id}/edit', 'VideoAlbumController@getEdit');
    Route::post('videoalbum/{id}/edit', 'VideoAlbumController@postEdit');
    Route::get('videoalbum/{id}/delete', 'VideoAlbumController@getDelete');
    Route::post('videoalbum/{id}/delete', 'VideoAlbumController@postDelete');
    Route::get('videoalbum/data', 'VideoAlbumController@data');
    Route::get('video/reorder', 'VideoAlbumController@getReorder');

    # Video
    Route::get('video', 'VideoController@index');
    Route::get('video/create', 'VideoController@getCreate');
    Route::post('video/create', 'VideoController@postCreate');
    Route::get('video/{id}/edit', 'VideoController@getEdit');
    Route::post('video/{id}/edit', 'VideoController@postEdit');
    Route::get('video/{id}/delete', 'VideoController@getDelete');
    Route::post('video/{id}/delete', 'VideoController@postDelete');
    Route::get('video/{id}/itemsforalbum', 'VideoController@itemsForAlbum');
    Route::get('video/{id}/{id2}/albumcover', 'VideoController@getAlbumCover');
    Route::get('video/data/{id}', 'VideoController@data');
    Route::get('video/reorder', 'VideoController@getReorder');

    # Users

    Route::get('getimage', 'UserController@getimage');
    Route::get('getletlong', 'UserController@getletlong');
    Route::get('nearby', 'UserController@nearby');
    Route::get('users/region/{name}', 'UserController@getregion1')->where('name', '(.*)');
});
