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
                // alert(arrCount);
                document.getElementById('cart-item-count').textContent =arrCount;
                $('#cart-item-count').show();
                previousid = JSON.parse(localStorage.getItem('arrIds'));
                // console.log(previousid);
                // newIdArr = previousid.split(",");
                // console.log(previousid.length);
                // previousid=previousid.filter((item,index) => previousid.indexOf(item) === index);
                // console.log(previousid);return;
                for(var i=0; i<previousid.length;i++)
                {
                    // dataArr.push(newIdArr[i]);
                    // alert(previousid[i]+">>>"+i);
                    // alert($('#add_to_cart_'+previousid[i]));return;
                    $('#add_to_cart_'+previousid[i]).hide();
                    $('#quantity_div_'+previousid[i]).show();

                    // alert($('#quantity_2').val());return;
                    // var qtySelected = $('#quantity_2').val();

                    // document.getElementById('#quantity_'+previousid[i]).value = qtySelected;

                }
                //    console.log(dataArr);
                //    localStorage.setItem('arrIds',dataArr);
                var countQty={};
                previousid.forEach(element => {
                    if(countQty[element]){
                    countQty[element] +=1;
                    }else{
                        countQty[element]=1;
                    }

                });
                // console.log(countQty);
                for(const key in countQty)
                {
                    $('#quantity_'+key).show();
                    // alert("loop main fetched key="+key+">>"+countQty[key]);
                    // console.log('#quantity_'+key);return;
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
                    // alert("IF PART");

                    cartItemCount=localStorage.getItem('total_c');
                    // console.log("get cart item count="+cartItemCount);
                    cartItemCount++;
                    localStorage.setItem('total_c',cartItemCount);
                    document.getElementById('cart-item-count').textContent = cartItemCount;
                    $('#cart-item-count').show();
                    previousid = JSON.parse(localStorage.getItem('arrIds'));
                    // console.log(previousid+" and type is="+Array.isArray(previousid));
                    // newIdArr = previousid.split(",");
                    // newIdArr.push(id);
                    // alert(typeof id);
                    previousid.push(id);
                    // console.log(previousid);
                    localStorage.setItem('arrIds',JSON.stringify(previousid));
                    $('#add_to_cart_'+id).hide();
                    $('#quantity_div_'+id).show();
                    if($('#quantity_'+id).val() == '' || $('#quantity_'+id).val()== null)
                    {
                        // $('#quantity_'+id).val(1);
                        document.getElementById('quantity_'+id).value =1;
                        document.getElementById('quantity_'+id).dispatchEvent(new Event('input'));

                    }else{
                        var valueOfQty = $('#quantity_'+id).val();
                        // console.log("value of qty="+valueOfQty);
                        var increValue = parseInt(valueOfQty)+1;
                        // console.log("incremented value to set="+increValue);
                        // $('#quantity_'+id).val(increValue);
                        document.getElementById('quantity_'+id).value = increValue;
                        // $('#quantity_'+id).setAttribute('value', 'increValue');
                        document.getElementById('quantity_'+id).dispatchEvent(new Event('input'));

                    }


                }else{
                    // alert("ELSE PART");
                    // alert(typeof id);

                    dataArr.push(id);
                    // console.log("datatype before= "+Array.isArray(dataArr)+", array_id= "+dataArr+" and json ="+JSON.stringify(dataArr));
                    convArr =JSON.stringify(dataArr);
                    // console.log("convert kr ke "+typeof convArr);
                    localStorage.setItem('arrIds',convArr);
                    countOfArr = dataArr.length;
                    $('#cart-item-count').show();
                    cartItemCount++;
                    document.getElementById('cart-item-count').textContent = cartItemCount;
                    localStorage.setItem('total_c',countOfArr);
                    $('#add_to_cart_'+id).hide();
                    $('#quantity_div_'+id).show();
                    // console.log(cartItemCount+">>");
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
            // alert("minus");

            let qtyValue = $('#quantity_'+id).val();
            // console.log(qtyValue+">>"+typeof qtyValue);  //3>>string
            let decreValue = parseInt(qtyValue)-1;
            // console.log(decreValue+">>>>"+ typeof decreValue); // 2>>>>number
            document.getElementById('quantity_'+id).value = decreValue.toString();
            document.getElementById('quantity_'+id).dispatchEvent(new Event('input'));
            // $('#quantity_'+id).val(decreValue);
            var cartValueDisplayed = document.getElementById('cart-item-count').textContent;
            // console.log("cart ki value = "+cartValueDisplayed);  //cart ki value = 4
            let newCartValue = parseInt(cartValueDisplayed)-1;
            document.getElementById('cart-item-count').textContent = newCartValue;
            localStorage.setItem('total_c',newCartValue);
            var arrRemoveId= JSON.parse(localStorage.getItem('arrIds'));
            // console.log(arrRemoveId+">>>"+Array.isArray(arrRemoveId));    //1,2,2,2>>>true
            // var newArr = arrRemoveId.split(",");
            // var check = id;
            // console.log("id here to be removed= "+id+"typeof="+ typeof id);                //id here to be removed= 2
           for (var i=0;i<arrRemoveId.length;i++)
           {
               if (arrRemoveId[i] == id.toString())
               {
                    arrRemoveId.splice(i, 1);
                    break;
               }

           }
        //    console.log("newarrIDS = "+arrRemoveId+" and newarray id remove-datatype"+ Array.isArray(arrRemoveId));

        //    newarrIDS = 1,2 and newarray id remove-datatypetrue

           localStorage.setItem('arrIds',JSON.stringify(arrRemoveId));


        }


        function cartDisplay()
        {
            var allArrIds='';
            // console.log( localStorage.getItem('arrIds'));
            allArrIds = JSON.parse(localStorage.getItem('arrIds'));
            // alert(allArrIds+">>>"+typeof allArrIds);
            $.ajax({
                    type: "POST",
                    url: "{{url('/cart')}}",
                    data:{
                        all_ids:allArrIds,
                    },
                    success: function (result) {
                        // alert(result);
                        if(result)
                        {
                            $('#div_table').html(result);
                            $('#div_imgs').hide();
                        }else{
                            alert("SOMETHING IS WORNG!!!");
                        }

                    },
                    error: function (result) {
                        alert(result);
                    }
                });
        }

         /*    below function success is written for side bar pannel
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
                 success: function (data) {
                     // alert(data);exit;
                     $('#collapseExample').html(data);
                     $('#collapseExample').collapse('show');
                 },
                 error: function (request, error) {
                     alert("Request: " + JSON.stringify(request));
                 }
             });
         }*/





</script>






