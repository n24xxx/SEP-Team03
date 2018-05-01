<?php

namespace App\Http\Controllers;
use App\Slide;
use Illuminate\Http\Request;
use App\Product;
use App\productType;
class PageController extends Controller
{
    //
    public function getIndex(){
    	$slide = Slide::all();
    	// return view('pages.trangchu',['slide'->$slide]); 
    	$new_product = Product::where('new',1)->paginate(4); //paginate so san pham tren dong
    	$sanpham_khuyenmai = Product::where('promotion_price','<>','')->paginate(4);
    	
    	return view('pages.trangchu',compact('slide','new_product','sanpham_khuyenmai')); 	// truyen du lieu slide
    }
    public function getLoaiSP($type){
    	$loaisp = productType::all();

    	$loai = productType::where('id',$type)->first();
    	$sp_theoloai = Product::where('id_type',$type)->paginate(9);
    	$count_sp_theoloai = Product::where('id_type',$type)->get();
    	return view('pages.loaisp',compact('sp_theoloai','loaisp','loai','count_sp_theoloai'));
    }

    public function getChiTietSP(){
    	return view('pages.chitietsp');
    }
      public function getGioiThieu(){
    	return view('pages.gioithieu');
    }

    public function getSearch(Request $request){
    	$loaisp = productType::all();
    	$product = Product::where('name','like','%'.$request->key.'%')
    						->orWhere('unit_price',$request->key)
    						->paginate(6);
    	$count_product = Product::where('name','like','%'.$request->key.'%')
    						->orWhere('unit_price',$request->key)
    						->get();
    	return view('pages.search',compact('product','count_product','loaisp'));
    }

    public function getSpMoi(){
    	$new_product = Product::where('new',1)->paginate(9);
    	$count_product = Product::where('new',1)->get();
    	$loaisp = productType::all();
    	return view('pages.sanphammoi',compact('new_product','count_product','loaisp'));
    }
       public function getSpKhuyenMai(){
    	$sanpham_khuyenmai = Product::where('promotion_price','<>','')->paginate(9);
    	$count_product = Product::where('promotion_price','<>','')->get();
    	$loaisp = productType::all();
    	return view('pages.sanphamgiamgia',compact('sanpham_khuyenmai','count_product','loaisp'));
    }
}
