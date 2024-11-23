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
                    <div class="quantity" id="quantity_div_{{$data->id}}" >
                        <svg onclick="clickminus({{$data->id}})" xmlns="http://www.w3.org/2000/svg"
                             width="16" height="16" fill="currentColor" class="bi bi-dash-square minus_plus"
                             viewBox="0 0 16 16">
                            <path
                                d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                            <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8"/>
                        </svg>

                        <input type="number" id="quantity_{{$data->id}}" class="quantity-input" size="2"
                               name="quantity" value="{{$data->qty}}">

                        <svg onclick="clickadd({{$data->id}})" xmlns="http://www.w3.org/2000/svg"
                             width="16" height="16" fill="currentColor" class="bi bi-plus-square plus_minus"
                             viewBox="0 0 16 16">
                            <path
                                d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                            <path
                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                        </svg></div>

                    </td>
{{--                <td>{{$data->qty}}</td>--}}
                <td>{{$data->qty * $data->price }}</td>
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

</script>
