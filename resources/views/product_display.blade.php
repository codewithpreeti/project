<head>
    <script src="{{asset('js/jquery-3.7.1.js')}}"></script>
</head>
<div  class="container">
    <div class="row">
        <table class="table table-hover">
            <tr>
                <th>S.no</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Remove</th>

            </tr>
         <?php //echo"<pre>";print_r($productDisplayData);die;?>
            @php
                $sno=1;
                $total=10;
                //dump($productDisplayData[0]['label']);die;
            @endphp
            @foreach ($productDisplayData as $data)
            <tr>
                <td>{{$sno++}}</td>
                <td>{{$data->label}}</td>
                <td>
                    <div class="quantity" id="cart_quantity_div_{{$data->id}}" >
                        <svg onclick="clickminusqty({{$data->id}})" xmlns="http://www.w3.org/2000/svg"
                             width="16" height="16" fill="currentColor" class="bi bi-dash-square minus_plus"
                             viewBox="0 0 16 16">
                            <path
                                d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                            <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8"/>
                        </svg>

                        <input type="number" id="cartquantity_{{$data->id}}" class="quantity-input" size="2"
                               name="quantity" value="{{$data->qty}}">

                        <svg onclick="clickaddqty({{$data->id}})" xmlns="http://www.w3.org/2000/svg"
                             width="16" height="16" fill="currentColor" class="bi bi-plus-square plus_minus"
                             viewBox="0 0 16 16">
                            <path
                                d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                            <path
                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                        </svg></div>

                    </td>
{{--                <td>{{$data->qty}}</td>--}}
                <input type="hidden" name="originalPrice" id="originalPrice{{$data->id}}" value="{{$data->price }}">
                <td id="price_data{{$data->id}}">{{$data->qty * $data->price }}</td>
                <td><a href="#" onclick="deleteItem('{{$data->id}}')"><i class="fa fa-trash" style='color:red' aria-hidden="true"></i>
                    </a></td>

            </tr>
            @endforeach
        </table>

    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.all.min.js"></script>
<link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.min.css " rel="stylesheet">
<script>
    function deleteItem(id)
    {

        // alert(id);
        var count=0;
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                console.log(id);
                // console.log(localStorage.getItem('arrIds'));
                arrIds =[];
                arrIds = JSON.parse(localStorage.getItem('arrIds'));
                // console.log(arrIds);
                for (let item of arrIds) {
                    // console.log(item);
                    if (item == id) {
                       count++;
                    }
                }
                // console.log(count+" ??"+ typeof count);return false;
                newarrIds = arrIds.filter(function(item){
                    return (item !=id);
                });
                // console.log(typeof newarrIds+">>>"+ newarrIds);
                localStorage.setItem('arrIds', JSON.stringify(newarrIds));

                var cartc = localStorage.getItem('cartCount', cartCount);
                // console.log(cartc+" ----"+count);
                newCartc = cartc - count;
                // console.log(typeof newCartc+">>>"+newCartc);
                localStorage.setItem('cartCount', newCartc);
                document.getElementById('cart-item-count').textContent = newCartc;
                cartDisplay();

                Swal.fire({
                    title: "Deleted!",
                    text: "Your file has been deleted.",
                    icon: "success"
                });
            }
        });
    }

    function clickaddqty(id) {

        // alert($('#quantity_'+id).val());return false;
        var valIncr = $('#cartquantity_' + id).val();
        valIncr++;
        $('#cartquantity_' + id).val(valIncr);//console.log(document.getElementById('cartquantity_' + id));return false;
        // $('#quantity_' + id).val(valIncr).attr('value',valIncr); this line is setting the value run time as well as in input element tag
        // document.getElementById('#quantity_' + id).value = valIncr;

        // console.log($('#quantity_' + id).val());
        // alert(id+"~~~~~~"+typeof(id));
        // alert($('#price_data').html());return false;   // PRCIE UPDATE KE LIYE VALUE
        var Org_price = $('#originalPrice'+id).val();
        var new_price = parseInt(valIncr)*parseInt(Org_price);
        $('#price_data'+id).html(new_price);

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

    function clickminusqty(id) {
        // alert($('#quantity_'+id).val()+">>>>>>>>..."+typeof $('#quantity_'+id).val());
        var qtyToDecre = $('#cartquantity_' + id).val();
        if (qtyToDecre == 1) {
            $('#add_to_cart_' + id).show();
            $('#cart_quantity_div_' + id).hide();
        } else {
            var newValue = parseInt(qtyToDecre) - 1;
            document.getElementById('cartquantity_' + id).value = newValue;
            var Org_price = $('#originalPrice'+id).val();
            var new_price = parseInt(newValue)*parseInt(Org_price);
            $('#price_data'+id).html(new_price);
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

</script>
