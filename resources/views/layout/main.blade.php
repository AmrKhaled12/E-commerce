<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
@include('layout.styles')
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
 @include('layout.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   @include('layout.content-header')
    <!-- /.content-header -->
  @yield('content')
    <!-- Main content -->
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="shopping-item">
                                        <div class="dropdown-cart-header">
                                            <span>2 Items</span>
                                            <a href="cart.html">View Cart</a>
                                        </div>
                                        <ul class="shopping-list">
                                            <li>
                                                <a href="javascript:void(0)" class="remove" title="Remove this item"><i
                                                        class="lni lni-close"></i></a>
                                                <div class="cart-img-head">
                                                    <a class="cart-img" href="product-details.html"><img
                                                    src="{{asset('assets/system-image/Electronics.jpg')}}" id="card-img"alt="#"></a>
                                                </div>

                                                <div class="content" style="display: grid;">
                                                    <h4 class="card-title">Apple Watch Series 6</h4>
                                                    <h4 class="card-title">1x </h4>
                                                    <h4 class="card-title">$99.00</h4>
                                                </div>
                                            </li>

                                            <li>
                                                <a href="javascript:void(0)" class="remove" title="Remove this item"><i
                                                        class="lni lni-close"></i></a>
                                                <div class="cart-img-head">
                                                    <a class="cart-img" href="product-details.html"><img
                                                            src="{{asset('assets/system-image/Electronics.jpg')}}" id="card-img" alt="#"></a>
                                                </div>

                                                <div class="content" style="display: grid;">
                                                    <h4 class="card-title">Apple Watch Series 6</h4>
                                                    <h4 class="card-title">1x </h4>
                                                    <h4 class="card-title">$99.00</h4>
                                                </div>
                                            </li>

                                            <li>
                                                <a href="javascript:void(0)" class="remove" title="Remove this item"><i
                                                        class="lni lni-close"></i></a>
                                                <div class="cart-img-head">
                                                    <a class="cart-img" href="product-details.html"><img
                                                    src="{{asset('assets/system-image/Electronics.jpg')}}" id="card-img" alt="#"></a>
                                                </div>

                                                <div class="content" style="display: grid;">
                                                    <h4 class="card-title">Apple Watch Series 6</h4>
                                                    <h4 class="card-title">1x </h4>
                                                    <h4 class="card-title">$99.00</h4>
                                                </div>
                                            </li>
                                            <li>
                                            <div class="bottom">
                                            <div class="total">
                                                <span>Total</span>
                                                <span class="total-amount">$134.00</span>
                                            </div>
                                            <div class="button">
                                                <a href="checkout.html" class="btn animate">Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                            </li>
                                        </ul>
                                        
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
@include('layout.scripts')
</body>
</html>
