<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<div  class="container">
    <div class="row">
        <table class="table table-hover">
            <tr>
                <th>S.no</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Final Price</th>

            </tr>
            <!-- <?php //echo"<pre>";print_r($productDisplayData[0]->id);die;?> -->
            @php
            $sno=1;
            $total=10;
            // dump($productDisplayData[0]['label']);die;
            @endphp
            <tr>
                <td>{{$sno++}}</td>
                <td>{{'dove'}}</td>
                <td>{{'2'}}</td>
                <td>{{256.00}}
                    @php  $total = 256.00*2  @endphp
                </td>
                <td>{{$total}}</td>

            </tr>

        </table>
        @php
            echo "Total Amount =".$total;
        @endphp
    </div>
</div>


</body>
<script>

    function removeId(id)
    {
        console.log(id);
    }



</script>

</html>
