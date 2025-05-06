<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>
<body>
    <h2>Currectly available products</h2>

    <ul>
       @foreach ($products as $product)
           <li>
                <p>{{ $product['name'] }}</p>
                <a href="/products/{{ $product['id'] }}">View Details</a>
           </li>
       @endforeach
    </ul>
</body>
</html>