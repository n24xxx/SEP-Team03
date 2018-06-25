@extends('master')
@section('title')
<title>{{ $loai->name }} - CloudBooth</title>
@endsection
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">{{ $loai->name }}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{ route('trangchu') }}">Home</a> /<span>Loại sản phẩm/{{ $loai->name }}</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
							@foreach($loaisp as $item)
							<li><a href="{{ route('loaisp',$item->id) }} ">{{ $item->name }}</a></li>
							@endforeach
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>Danh Sách Sản Phẩm</h4>
							<div class="beta-products-details">
								<p class="pull-left">tìm thấy {{ count($count_sp_theoloai) }} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($sp_theoloai as $item)
								<div class="col-sm-4" style="margin-top: 20px">
									<div class="single-item">
										@if($item->promotion_price != null)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
										<div class="single-item-header">
											<a href="{{ route('chitietsp',$item->id) }}"><img style="height: 250px" src="source/image/product/{{ $item->image }}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{ $item->name }}</p>
											<p class="single-item-price">
												@if($item->promotion_price == '')
												<span>{{ number_format($item->unit_price) }}đ/{{ $item->unit }}</span>
											
											
											@else
												<span class="flash-del">{{ number_format($item->unit_price) }}đ/{{ $item->unit }}</span>
												<span class="flash-sale">{{ number_format($item->promotion_price) }}đ/{{ $item->unit }}</span>
												
											@endif
											</p>
										</div>
										<div class="single-item-caption" style="margin-top: 10px">
											<a class="add-to-cart pull-left" href="{{ route('chitietsp',$item->id) }}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{ route('chitietsp',$item->id) }}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							<div class="row">{{ $sp_theoloai->links() }}</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						{{-- <div class="beta-products-list">
							<h4>Sản phẩm khác</h4>
							<div class="beta-products-details">
								<p class="pull-left"><a href="{{ route }}">Xem thêm</a></p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($sp_khac as $item)
								<div class="col-sm-4" style="margin-top: 20px">
									<div class="single-item">
										@if($item->promotion_price != null)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
										<div class="single-item-header">
											<a href="product.html"><img src="source/image/product/{{ $item->image }}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{ $item->name }}</p>
											<p class="single-item-price">
												@if($item->promotion_price == '')
												<span>{{ number_format($item->unit_price) }}đ/{{ $item->unit }}</span>
											
											
											@else
												<span class="flash-del">{{ number_format($item->unit_price) }}đ/{{ $item->unit }}</span>
												<span class="flash-sale">{{ number_format($item->promotion_price) }}đ/{{ $item->unit }}</span>
												
											@endif
											</p>
										</div>
										<div class="single-item-caption" style="margin-top: 10px">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							<div class="space40">&nbsp;</div>
							
						</div> --}} <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection