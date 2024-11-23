<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
.cart-icon {
  position: relative;
}

.cart-icon #cart-item-count {
  /* position: absolute;
  top: -10px;
  right: -10px;
  background-color: red;
  color: white;
  border-radius: 50%;
  padding: 5px; */
  height: 25px;
  width: 25px;
  background-color: red;
  text-align: center;
  border-radius: 50%;
  display: inline-block;
  margin-top: -35px;
  display:flex;
  justify-content: space-evenly;
}


</style>

<meta name="csrf-token" content="{{csrf_token()}}">
</head>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<div id="topBar">
 <p style="display:block;font-family: Gilroy Regular !important;color: #3c3c3c;text-align: center;
  background-color: #50504b;"><span style="color: #ffff; padding: 5px 0px; margin: 0px !important;
  font-weight: 700;"><u>CLICK HERE FOR MORE OFFERS</u></span></p>

</div>


<div id="secondBar">
 <p style="display:block;text-align: center;"><span style="color: #ffff;
  padding: 5px 0px;
  margin: 0px !important;
  font-weight: 700;"><img src="{{asset('images/brand.avif')}}"></span></p> </div>

<div class="row cart-icon" style="float:right" id="cart_display_option">
<i class="fa-solid fa-cart-shopping fa-3x" id="cart_icon_id" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" onclick="cartDisplay()"></i><br>
<span class="cart" id="cart-item-count" style="display:none" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" onclick="cartDisplay()"></span>
</div>

<div class="collapse" id="collapseExample">
</div>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{url('/product')}}">Shop All</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item ">
          <a class="nav-link active" href="{{url('/users')}}">Serums</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="{{url('/about')}}">Sunscreens</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/about')}}">Moisturizers</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{url('/about')}}">Face Wash</a>
        </li>

      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
