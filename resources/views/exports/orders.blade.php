<table>
    <thead>
    <tr>
        <th>Product Id</th>
        <th>Customer Name</th>
        <th>Product</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Payment Status</th>
        <th>Purchase Date</th>
    </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
        <tr>
            <td>{{$order->product_id}}</td>
            <td>{{$order->shipping->user->name}}</td>
            <td>{{$order->product->title ?? 'N/A'}}</td>
            <td>{{$order->quantity}}</td>
            <td>{{$order->product_unit_price}}</td>
            <td>{{$order->shipping->payment_status == 1 ? 'Paid' : 'Unpaid'}}</td>
            <td>{{$order->created_at->format('d-m-Y')}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
