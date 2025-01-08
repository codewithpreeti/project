<x-header/>
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<html>
<body>
<button type="button" name="add_to_cart" id="add_to_cart_{{$product['id']}}"
        class="btn btn-block btn-primary" onclick="addToCart()">ADD TO CART
</button>



<div class="quantity" id="quantity_div_" style="display: none;">
    <svg onclick="clickminus()" xmlns="http://www.w3.org/2000/svg"
         width="16" height="16" fill="currentColor" class="bi bi-dash-square minus_plus"
         viewBox="0 0 16 16">
        <path
            d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
        <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8"/>
    </svg>

    <input type="number" id="quantity_" class="quantity-input" size="2"
           name="quantity" value="">

    <svg onclick="clickadd()" xmlns="http://www.w3.org/2000/svg"
         width="16" height="16" fill="currentColor" class="bi bi-plus-square plus_minus"
         viewBox="0 0 16 16">
        <path
            d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
        <path
            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
    </svg></div>
<script>
    function addToCart()
    {
        // alert("S");return false;
        $('#quantity_div_').css('display','block');
        var input = document.getElementById('quantity_');
           input.value=1;
           console.log(input.value);
    }

    function clickadd()
    {

        var inc =$('#quantity_').val();
    document.getElementById('quantity_').value='';
        inc=parseInt(inc)+1;
        $('#quantity_').val(inc);
    }

    function clickminus()
    {
        var inc =$('#quantity_').val();
        document.getElementById('quantity_').value='';
        inc=parseInt(inc)-1;
        $('#quantity_').val(inc);
    }

</script>
</body>

</html>
