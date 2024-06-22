<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Документація</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f8f9fa;
            color: #333;
        }
        h1 {
            text-align: center;
            color: #007BFF;
            margin-bottom: 40px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .endpoint {
            margin-bottom: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f1f1f1;
        }
        .method {
            font-weight: bold;
            color: #28a745;
        }
        .url {
            font-style: italic;
            color: #555;
        }
        .toggle-btn {
            display: inline-block;
            margin-top: 10px;
            cursor: pointer;
            color: #007BFF;
            text-decoration: underline;
        }
        .response {
            display: none;
            margin-top: 10px;
            background-color: #1e1e1e;
            padding: 20px;
            border-radius: 5px;
            font-family: 'Courier New', Courier, monospace;
            color: #dcdcdc;
            white-space: pre-wrap;
            word-wrap: break-word;
            overflow: auto;
        }
    </style>
    <script>
        function toggleResponse(id) {
            var response = document.getElementById(id);
            if (response.style.display === "none") {
                response.style.display = "block";
            } else {
                response.style.display = "none";
            }
        }
    </script>
</head>
<body>
    <h1>API Документація</h1>
    <div class="container">
        <div class="endpoint">
            <div class="method">GET</div>
            <div class="url">/api/countrys</div>
            <div class="toggle-btn" onclick="toggleResponse('response1')">Показати JSON</div>
            <pre id="response1" class="response"><code>{
    "countrys": [
        {
            "id": 1,
            "name": "Україна",
            "created_at": "2024-05-24T20:04:58.000000Z",
            "updated_at": "2024-05-24T20:04:58.000000Z"
        },
}</code></pre>
        </div>

        <div class="endpoint">
            <div class="method">POST</div>
            <div class="url">/api/countrys</div>
            <div class="toggle-btn" onclick="toggleResponse('response2')">Показати JSON</div>
            <pre id="response2" class="response"><code>{
        "id": 0,
        "name": "string",
}</code></pre>
        </div>

        <div class="endpoint">
            <div class="method">GET</div>
            <div class="url">/api/citys</div>
            <div class="toggle-btn" onclick="toggleResponse('response3')">Показати JSON</div>
            <pre id="response3" class="response"><code>{
    "citys": [
        {
            "id": 1,
            "name": "Тернопіль",
            "id_country": 1,
            "created_at": "2024-05-24T20:10:32.000000Z",
            "updated_at": "2024-05-24T20:10:32.000000Z"
        },
}</code></pre>
        </div>

        <div class="endpoint">
            <div class="method">POST</div>
            <div class="url">/api/citys</div>
            <div class="toggle-btn" onclick="toggleResponse('response4')">Показати JSON</div>
            <pre id="response4" class="response"><code>{
        "id": 0,
        "name": "string",
        "id_country": 0,
}</code></pre>
        </div>

        <div class="endpoint">
            <div class="method">GET</div>
            <div class="url">/api/hotels</div>
            <div class="toggle-btn" onclick="toggleResponse('response5')">Показати JSON</div>
            <pre id="response5" class="response"><code>{
    "hotels": [
        {
            "id": 1,
            "name": "Готель якийсь",
            "id_city": 1,
            "id_country": 1,
            "created_at": "2024-05-24T20:27:41.000000Z",
            "updated_at": "2024-05-24T20:27:41.000000Z"
        },
}</code></pre>
        </div>

        <div class="endpoint">
            <div class="method">POST</div>
            <div class="url">/api/hotels</div>
            <div class="toggle-btn" onclick="toggleResponse('response6')">Показати JSON</div>
            <pre id="response6" class="response"><code>{
        "id": 0,
        "name": "string",
        "id_city": 0,
}</code></pre>
        </div>

        <div class="endpoint">
            <div class="method">GET</div>
            <div class="url">/api/tours</div>
            <div class="toggle-btn" onclick="toggleResponse('response7')">Показати JSON</div>
            <pre id="response7" class="response"><code>{
    "tours": [
        {
            "id": 1,
            "name": "Говерла",
            "description": "бла-бла",
            "price": 100,
            "image": "image",
            "id_hotel": 1,
            "created_at": "2024-05-24T20:31:16.000000Z",
            "updated_at": "2024-05-24T20:31:16.000000Z"
        },
}</code></pre>
        </div>

        <div class="endpoint">
            <div class="method">POST</div>
            <div class="url">/api/tours</div>
            <div class="toggle-btn" onclick="toggleResponse('response8')">Показати JSON</div>
            <pre id="response8" class="response"><code>{
        "id": 0,
        "name": "string",
        "description": "string",
        "price": number,
        "image": "string",
        "id_hotel": 0,
}</code></pre>
        </div>

        <div class="endpoint">
            <div class="method">POST</div>
            <div class="url">/api/orders</div>
            <div class="toggle-btn" onclick="toggleResponse('response9')">Показати JSON</div>
            <pre id="response9" class="response"><code>{
        "id": 0,
        "id_tour": 0,
}</code></pre>
        </div>
</body>
</html>