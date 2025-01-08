/*

function cartDisplay()
{
var arrayIds = JSON.parse(localStorage.getItem('arrIds'));
console.log(typeof arrayIds+">>>>>"+arrayIds);
var idsString='';
// idsString = arrayIds.join(",");
idsString = "2,3";



// console.log(typeof idsString);
//   console.log("{{'hello()'.'2'.route('conc')}}");
// console.log("helllo misss route('cart',['id' =>'"+idsString+"']{world}");
//console.log("{{route('cart',['id' =>'"+idsString+"'])}}");
//console.log("{{route('cart',['id' =>'"+$idsString+"'])}}");





}
*/



BELOW IS THE PAGE USERS.BLADE.PHP FULL CODE AS BKUP
###################################################################################################################




<x-header/>
<head>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>

<br><br>

<div class="container"  id="div_imgs">
    <div class="row">


        @foreach($products as $product)

            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="{{asset('images/'.$product['path']);}}" class="card-img-top" alt="logo">
                    <div class="card-body">
                        <h5 class="card-title"> {{$product['label']}}</h5>
                        <p class="card-text">{{$product['feature'];}}</p>
                        <div name="price">

                            <b style="color:#ff6781">{{"Rs: ".$product['price']}}</b>

                        </div>

                        <div name="add-to-cart">
                            <button type="button" name="add_to_cart" id="add_to_cart_{{$product['id']}}" class="btn btn-block btn-primary" onclick="addToCart('{{$product['id']}}')"   >ADD TO CART</button>

                            <div class="quantity" id="quantity_div_{{$product['id']}}" style="display:none;">

                                <svg onclick="clickminus({{$product['id']}})" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-square minus_plus" viewBox="0 0 16 16">
                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                                    <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8"/></svg>

                                <input type="number" id="quantity_{{$product['id']}}" class="quantity-input" size="2" name="quantity" value="">

                                <svg onclick="clickadd({{$product['id']}})"xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square plus_minus" viewBox="0 0 16 16">
                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                                </svg>

                            </div>


                        </div>
                    </div>
                </div><br><br>
            </div>

        @endforeach


    </div>
</div>

<div id="div_table"> </div>

<script>
    var arrCount=0;
    var id=0;
    var convArr=0;
    var cartItemCount = 0;
    var countOfArr=0;
    var dataArr=[];

    $( document ).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // localStorage.removeItem('total_c');
        // localStorage.removeItem('arrIds');return false;

        if(localStorage.getItem('total_c') !== null)
        {

            arrCount=localStorage.getItem('total_c');
            document.getElementById('cart-item-count').textContent =arrCount;
            $('#cart-item-count').show();
            previousid = JSON.parse(localStorage.getItem('arrIds'));
            for(var i=0; i<previousid.length;i++)
            {
                $('#add_to_cart_'+previousid[i]).hide();
                $('#quantity_div_'+previousid[i]).show();

            }
            var countQty={};
            previousid.forEach(element => {
                if(countQty[element]){
                    countQty[element] +=1;
                }else{
                    countQty[element]=1;
                }

            });

            for(const key in countQty)
            {
                $('#quantity_'+key).show();
                document.getElementById('quantity_'+key).value = countQty[key];

            }

        }else{
            $('#cart-item-count').hide();
        }

    });



    function addToCart(id)
    {

        if(id !== '' )
        {

            if(localStorage.getItem('total_c') !== null)
            {


                cartItemCount=localStorage.getItem('total_c');

                cartItemCount++;
                localStorage.setItem('total_c',cartItemCount);
                document.getElementById('cart-item-count').textContent = cartItemCount;
                $('#cart-item-count').show();
                previousid = JSON.parse(localStorage.getItem('arrIds'));

                previousid.push(id);

                localStorage.setItem('arrIds',JSON.stringify(previousid));
                $('#add_to_cart_'+id).hide();
                $('#quantity_div_'+id).show();
                if($('#quantity_'+id).val() == '' || $('#quantity_'+id).val()== null)
                {

                    document.getElementById('quantity_'+id).value =1;
                    document.getElementById('quantity_'+id).dispatchEvent(new Event('input'));

                }else{
                    var valueOfQty = $('#quantity_'+id).val();

                    var increValue = parseInt(valueOfQty)+1;

                    document.getElementById('quantity_'+id).value = increValue;

                    document.getElementById('quantity_'+id).dispatchEvent(new Event('input'));

                }


            }else{

                dataArr.push(id);

                convArr =JSON.stringify(dataArr);

                localStorage.setItem('arrIds',convArr);
                countOfArr = dataArr.length;
                $('#cart-item-count').show();
                cartItemCount++;
                document.getElementById('cart-item-count').textContent = cartItemCount;
                localStorage.setItem('total_c',countOfArr);
                $('#add_to_cart_'+id).hide();
                $('#quantity_div_'+id).show();

                $('#quantity_'+id).val(1);

            }

        }

    }


    function clickadd(id)
    {
        addToCart(id.toString());
    }

    function clickminus(id)
    {

        let qtyValue = $('#quantity_'+id).val();

        let decreValue = parseInt(qtyValue)-1;

        document.getElementById('quantity_'+id).value = decreValue.toString();
        document.getElementById('quantity_'+id).dispatchEvent(new Event('input'));

        var cartValueDisplayed = document.getElementById('cart-item-count').textContent;

        let newCartValue = parseInt(cartValueDisplayed)-1;
        document.getElementById('cart-item-count').textContent = newCartValue;
        localStorage.setItem('total_c',newCartValue);
        var arrRemoveId= JSON.parse(localStorage.getItem('arrIds'));

        for (var i=0;i<arrRemoveId.length;i++)
        {
            if (arrRemoveId[i] == id.toString())
            {
                arrRemoveId.splice(i, 1);
                break;
            }

        }

        localStorage.setItem('arrIds',JSON.stringify(arrRemoveId));


    }


    function cartDisplay()
    {
        var allArrIds='';
        allArrIds = JSON.parse(localStorage.getItem('arrIds'));
        $.ajax({
            type: "POST",
            url: "{{url('cart')}}",
            data:{
                all_ids:allArrIds,
            },
            success: function(result) {
                $('#div_table').html(result);
                $('#div_imgs').hide();

            },
            error: function(result) {
                alert(result);
            }
        });
    }








</script>








