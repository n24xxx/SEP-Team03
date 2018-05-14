<?php

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


Route::get('index',[

	'as'=>'trangchu',
	'uses'=>'PageController@getIndex'

]);
//home route
	Route::get('loai-san-pham/{type?}',[
		'as'=>'loaisp',
		'uses'=>'PageController@getLoaiSP'
	]);

	Route::get('chi-tiet-san-pham/{id}',[
		'as'=>'chitietsp',
		'uses'=>'PageController@getChiTietSP'
	]);

	Route::get('gioi-thieu',[
		'as'=>'gioithieu',
		'uses'=>'PageController@getGioiThieu'
	]);


Route::get('san-pham-khuyen-mai',[
	'as'=>'spkhuyenmai',
	'uses'=>'PageController@getSpKhuyenMai'
]);

Route::get('add-to-cart/{id}',[
	'as'=>'themgiohang',
	'uses'=>'PageController@getAddtoCart'
]);


	Route::get('search',[
		'as'=>'search',
		'uses'=>'PageController@getSearch'
	]);


	Route::get('san-pham-moi',[
		'as'=>'spmoi',
		'uses'=>'PageController@getSpMoi'
	]);

	Route::get('san-pham-khuyen-mai',[
		'as'=>'spkhuyenmai',
		'uses'=>'PageController@getSpKhuyenMai'
	]);
//cart route
	Route::get('add-to-cart/{id}',[
		'as'=>'themgiohang',
		'uses'=>'PageController@getAddtoCart'
	]);
	Route::get('del-cart/{id}',[
		'as'=>'xoagiohang',
		'uses'=>'PageController@getDelItemCart'
	]);
//login route
	Route::get('dang-nhap',[
		'as'=>'dangnhap',
		'uses'=>'Auth\LoginController@showLoginForm'
	]);

	Route::post('dang-nhap',[
		'as'=>'dangnhap',
		'uses'=>'Auth\LoginController@login'
	]);


	Route::get('dang-ky',[
		'as'=>'dangky',
		'uses'=>'AccountController@getSignUp'
	]);

	Route::post('dang-ky',[
		'as'=>'dangky',
		'uses'=>'AccountController@postSignUp'
	]);

	Route::get('dang-xuat',[
		'as'=>'dangxuat',
		'uses'=>'Auth\LoginController@logout'
	]);
//forgot password route
	Route::get('reset',[
		'as'=>'pwdforgot',
		'uses'=>'Auth\ForgotPasswordController@showLinkRequestForm'
	]);
	Route::get('password/reset/{token?}',[
		'as'=>'pwdreset',
		'uses'=>'Auth\ResetPasswordController@showResetForm'
	]);
	Route::post('reset',[
		'as'=>'pwdreset',
		'uses'=>'Auth\ResetPasswordController@reset'
	]);
	Route::post('email',[
		'as'=>'pwdemail',
		'uses'=>'Auth\ForgotPasswordController@sendResetLinkEmail'
	]);
	Route::post('email',[
		'as'=>'pwdemail',
		'uses'=>'Auth\ForgotPasswordController@sendResetLinkEmail'
	]);



//admin route

	Route::get('admin/index',[
		'as'=>'admin',
		'uses'=>'AdminController@getIndex'
	]);
	Route::get('admin/product',[
		'as'=>'product',
		'uses'=>'AdminController@getProduct'
	]);

//user route
	Route::group(['prefix'=>'user'],function(){
		Route::get('quan-ly',[
			'as'=>'user.quanly',
			'uses'=>'AccountController@getProfile'
		]);
		Route::group(['prefix'=>'orders'],function(){
			Route::get('index',[
				'as'=>'user.orders.index',
				'uses'=>'AccountController@getOrders'
			]);

			Route::get('index',[
				'as'=>'user.orders.detail',
				'uses'=>'AccountController@getOrdersDetail'
			]);
		});
		//address route
			Route::group(['prefix'=>'address'],function(){
				Route::get('/',[
					'as'=>'user.address',
					'uses'=>'AccountController@getAddressList'
				]);
				Route::get('edit/{id}',[
					'as'=>'user.address.edit',
					'uses'=>'AccountController@getEditAddressList'
				]);
				Route::post('edit',[
					'as'=>'user.address.edit',
					'uses'=>'AccountController@postEditAddressList'
				]);


			});
		Route::group(['prefix'=>'profile'],function(){

			Route::get('/',[
				'as'=>'user.profile.index',
				'uses'=>'AccountController@getIndexProfile'
			]);

			Route::get('chinh-sua',[
				'as'=>'user.profile.edit',
				'uses'=>'AccountController@getEditProfile'
			]);
			Route::post('chinh-sua',[
				'as'=>'user.profile.edit',
				'uses'=>'AccountController@postEditProfile'
			]);
			Route::get('thay-doi-mat-khau',[
				'as'=>'user.profile.changepassword',
				'uses'=>'AccountController@getChangePassword'
			]);
			Route::post('thay-doi-mat-khau',[
				'as'=>'user.profile.changepassword',
				'uses'=>'AccountController@postChangePassword'
			]);
		});
		
	});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('dat-hang',[
    'as'=>'dathang',
    'uses'=>'PageController@getCheckout'
]);
Route::post('dat-hang',[
    'as'=>'dathang',
    'uses'=>'PageController@postCheckout'
]);
