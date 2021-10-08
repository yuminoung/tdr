<table>
    <thead>
    <tr>
        <th>Created at</th>
        <th>Order ID</th>
        <th>SKU</th>
        <th>Supplier</th>
        <th>Details</th>
        <th>Images</th>

    </tr>
    </thead>
    <tbody>
    @foreach($issues as $issue)
        <tr>
            <td>{{ $issue->created_at->format('d/m/Y') }}</td>
            <td>{{ $issue->order_id }}</td>
            <td>{{ $issue->sku }}</td>
            <td>{{ App\Models\Product::where('sku', $issue->sku)->first()->supplier ?? '' }}</td>
            <td>{{ $issue->issue }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
