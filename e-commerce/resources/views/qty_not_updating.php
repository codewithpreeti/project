<x-header/>
<head>
    <script src="{{asset('js/jquery-3.7.1.js')}}"></script>
</head>

<br><br>



<div class="container" id="div_imgs">
    <div class="row">

        <?php //echo "<pre>";print_r($products);exit;?>
        @foreach($products as $product)

        <div class="col">
            <div class="card" style="width: 18rem;">
                <img src="{{asset('images/'.$product['path'])}}" class="card-img-top" alt="logo">
                <div class="card-body">
                    <h5 class="card-title"> {{$product['label']}}</h5>
                    <p class="card-text">{{$product['feature']}}</p>
                    <div name="price">

                        <b style="color:#ff6781">{{"Rs: ".$product['price']}}</b>

                    </div>

                    <div name="add-to-cart">
                        <button type="button" name="add_to_cart" id="add_to_cart_{{$product['id']}}"
                                class="btn btn-block btn-primary" onclick="addToCart({{$product['id']}})">ADD TO
                            CART
                        </button>

                        <div class="quantity" id="quantity_div_{{$product['id']}}" style="display:none;">

                            <svg onclick="clickminus({{$product['id']}})" xmlns="http://www.w3.org/2000/svg"
                                 width="16" height="16" fill="currentColor" class="bi bi-dash-square minus_plus"
                                 viewBox="0 0 16 16">
                                <path
                                    d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                                <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8"/>
                            </svg>

                            <input type="number" id="quantity_{{$product['id']}}" class="quantity-input" size="2"
                                   name="quantity" value="">

                            <svg onclick="clickadd({{$product['id']}})" xmlns="http://www.w3.org/2000/svg"
                                 width="16" height="16" fill="currentColor" class="bi bi-plus-square plus_minus"
                                 viewBox="0 0 16 16">
                                <path
                                    d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                            </svg>

                        </div>


                    </div>
                </div>
            </div>
            <br><br>
        </div>

        @endforeach


    </div>
</div>

<div id="div_table"></div>


<script>


    $(document).ready(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        // localStorage.removeItem('cartCount');
        // localStorage.removeItem('arrIds');return false;

        if (localStorage.getItem('cartCount') !== null) {
            var count = localStorage.getItem('cartCount');
            console.log('onload pe count=' + count);
            $('#cart-item-count').text(count);
            $('#cart-item-count').show();
            var selectedItemIds = JSON.parse(localStorage.getItem('arrIds'));
            // console.log(selectedItemIds);
            for (i = 0; i < selectedItemIds.length; i++) {
                $('#add_to_cart_' + selectedItemIds[i]).hide();
                $('#quantity_div_' + selectedItemIds[i]).show();
            }
            const countQty = {};
            for (const ele of selectedItemIds) {
                if (countQty[ele]) {
                    countQty[ele] += 1;
                } else {
                    countQty[ele] = 1;
                }
            }
            // console.log(countQty);

            for (const key in countQty) {
                // console.log(key+">>>>"+countQty[key]);  let key se difference nahi padta let only for scope hota hai
                document.getElementById('quantity_' + key).value = countQty[key];

            }

        } else {
            $('#cart-item-count').hide();
        }


    });

    var arrForIds = [];
    var cartCount = 0;
    var storedArr = [];

    function addToCart(id) {
        // alert(id);
        if (localStorage.getItem('arrIds') === null) {
            // alert("FFFFFFFFff");
            // alert(id+"~~~*******~~~"+typeof(id));
            arrForIds.push(id);                          //pura array localstorage pe store kara rahe hain next line dekho
            // console.log(arrForIds+">>>>>"+typeof arrForIds);
            localStorage.setItem('arrIds', JSON.stringify(arrForIds));
            $('#add_to_cart_' + id).hide();
            $('#quantity_div_' + id).show();
            cartCount++;
            localStorage.setItem('cartCount', cartCount);
            document.getElementById('cart-item-count').textContent = cartCount;
            $('#cart-item-count').show();
            $('#quantity_' + id).val(1);

        } else {
            // alert("EEEEEEEEEee");
            // alert(id+"~~~*******~~~"+typeof(id));
            arrForIds = JSON.parse(localStorage.getItem('arrIds'));
            arrForIds.push(id);
            // console.log(arrForIds+">>>>>"+typeof arrForIds);
            localStorage.setItem('arrIds', JSON.stringify(arrForIds));
            $('#add_to_cart_' + id).hide();
            $('#quantity_div_' + id).show();
            var cartc = localStorage.getItem('cartCount', cartCount);
            cartc++;
            localStorage.setItem('cartCount', cartc);
            document.getElementById('cart-item-count').textContent = cartc;
            $('#cart-item-count').show();
            $('#quantity_' + id).val(1);
        }

    }


    function clickadd(id) {

        // alert($('#quantity_'+id).val());return false;
        var valIncr = $('#quantity_' + id).val();
        valIncr++;
        $('#quantity_' + id).val(valIncr);
        // $('#quantity_' + id).val(valIncr).attr('value',valIncr); this line is setting the value run time as well as in input element tag
        // document.getElementById('#quantity_' + id).value = valIncr;

        // console.log($('#quantity_' + id).val());
        // alert(id+"~~~~~~"+typeof(id));
        storedArr = JSON.parse(localStorage.getItem('arrIds'));
        // console.log(storedArr+">>>>>>>");
        storedArr.push(id);
        // console.log(storedArr+"?????"+typeof storedArr);
        localStorage.setItem('arrIds', JSON.stringify(storedArr));
        var presentCount = localStorage.getItem('cartCount');
        presentCount++;
        localStorage.setItem('cartCount', presentCount);
        document.getElementById('cart-item-count').textContent = presentCount;

    }

    function clickminus(id) {
        // alert($('#quantity_'+id).val()+">>>>>>>>..."+typeof $('#quantity_'+id).val());
        var qtyToDecre = $('#quantity_' + id).val();
        if (qtyToDecre == 1) {
            $('#add_to_cart_' + id).show();
            $('#quantity_div_' + id).hide();
        } else {
            var newValue = parseInt(qtyToDecre) - 1;
            document.getElementById('quantity_' + id).value = newValue;
        }

        // console.log(document.getElementById('cart_display_option').textContent); or cart_item_count same works see definition of textContent
        var checkCartCount = document.getElementById('cart_display_option').textContent;
        var updateCartCount = 0;
        if (checkCartCount == 1) {
            $('#cart-item-count').hide();
        } else {
            // console.log(typeof checkCartCount);
            updateCartCount = parseInt(checkCartCount) - 1;
            // console.log(updateCartCount);false;
            document.getElementById('cart-item-count').textContent = updateCartCount;
        }
        if (updateCartCount == 0) {
            localStorage.removeItem('arrIds');
            localStorage.removeItem('cartCount');
        } else {
            localStorage.setItem('cartCount', updateCartCount);
            var updateArrIds = JSON.parse(localStorage.getItem('arrIds'));
            // console.log(updateArrIds);
            for (var i = 0; i < updateArrIds.length; i++) {
                if (updateArrIds[i] == id) {
                    updateArrIds.splice(i, 1);
                    break;
                }
            }
            localStorage.setItem('arrIds', JSON.stringify(updateArrIds));
        }


    }

    /*        function cartDisplay()
            {
                var arrayIds = JSON.parse(localStorage.getItem('arrIds'));
                console.log(typeof arrayIds+">>>>>"+arrayIds);
                var idsString='';
    // idsString = arrayIds.join(",");
                idsString = "2,3";

    // console.log(typeof idsString);
    //   console.log("'hello()'.'2'.route('conc')}}");
    // console.log("helllo misss route('cart',['id' =>'"+idsString+"']{world}");
    //console.log("//route('cart',['id' =>'"+idsString+"'])}}");
                // 127.0.0.0/cart/id/+2022idstring%20
    //console.log("//route('cart',['id' =>'"+$idsString+"'])}}");

  }*/


    function cartDisplay() {
        var ids=[];
        ids = JSON.parse(localStorage.getItem('arrIds'));
        // console.log(ids);return false;
        $.ajax({

            url: '{{url('/cart')}}',
            type: 'POST',
            data : {
                'all_ids' : ids
            },
            success: function (result) {
                // alert(data);exit;
                if(result)
                {
                    $('#div_table').html(result);
                    $('#div_imgs').hide();
                }else{
                    alert("SOMETHING IS WORNG!!!");
                }
            },
            error: function (request, error) {
                alert("Request: " + JSON.stringify(request));
            }
        });
    }


</script>






