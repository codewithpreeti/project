<!Doctype html>
<body>
<input type="number" id="qty" name="qty" value="1">

<button type="button" name="btn_incre" id="btn_incre" onclick="changeInputValue()">Increament</button>

<script>
    function changeInputValue()
    {
       var v =  $('#qty').val();
       v++;
       $('#qty').val(v);
    }
</script>
</body>
</html>
