
<html>
<body>
<div id="first_div">
    <input type="text" id="textid" name="textid"  >
    <input type="button" name="btn" onclick="ajaxcall()" value="Submit">
</div>
<div id="2_div"></div>



<script src="{{asset('js/jquery-3.7.1.js')}}"></script>
<script>
    function ajaxcall()
    {
         textv = $('#textid').val();
         // alert(textv);return false;
        $.ajax({

            url: '{{url('/ajax-test')}}',
            type: 'GET',
            data: {
                'text': textv
            },
            success: function (result) {
                if(result)
                {
                    $('#2_div').html(result);
                    $('#first_div').hide();
                    $('#2_div').show();
                }

            },
            error: function (request, error) {
                alert("Request: " + JSON.stringify(request));
            }

            });

    }
</script>


</body>
</html>
