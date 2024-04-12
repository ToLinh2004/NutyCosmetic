@extends('layouts.masterLayoutClient')

@section('content')
<style>
    .button_x button{
        border: none;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-12">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Product</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                    @if (count($blogWishlists) > 0)
                        @foreach ($blogWishlists as $blogWishlist)
                        <tr>
                            <th> <a style="text-decoration: none" href="{{ route('user.product-detail', ['id' => $blogWishlist->products->id, 'category_id' => $blogWishlist->products->category_id]) }}">
                                <img src="{{asset($blogWishlist->products->image_url) }}" alt="anh-san-pham" class="img-fluid" width="100px"></a>
                            </th>

                            <td> <a style="text-decoration: none" href="{{ route('user.product-detail', ['id' => $blogWishlist->products->id, 'category_id' => $blogWishlist->products->category_id]) }}">{{$blogWishlist->products->product_name}}</a> </td>
                            <td>{{$blogWishlist->products->quantity}}</td>
                            <td>{{$blogWishlist->products->price}}</td>
                            <td>
                                <form action="{{ route('user.wishlist.destroy', $blogWishlist->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="button_x">
                                        <button type="submit"><i class="fa-solid fa-xmark"></i></button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    @else
                    <tr class="d-flex">
                        <td class="wsus__pro_name" style="width:500px">
                            <p>Chưa có sản phẩm được thêm vào mục yêu thích!</p>
                        </td>
                    </tr>
                    @endif
                </tbody>
              </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="{{asset('js/product.js')}}"></script>
@endsection
