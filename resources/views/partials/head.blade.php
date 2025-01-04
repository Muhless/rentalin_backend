    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title')</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f4f4f9;
                color: #333;
            }

            .content {
                padding: 20px;
                max-width: 800px;
                margin: 20px auto;
                background: white;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                border-radius: 10px;
            }

            .content h1 {
                font-size: 24px;
                margin-bottom: 10px;
            }

            .content p {
                font-size: 16px;
                line-height: 1.5;
            }

            .actions {
                margin-top: 20px;
            }

            .actions a {
                display: inline-block;
                padding: 10px 15px;
                margin-right: 10px;
                background-color: #007bff;
                color: white;
                text-decoration: none;
                border-radius: 5px;
                font-size: 14px;
            }

            .actions a:hover {
                background-color: #0056b3;
            }

            @yield('style')
        </style>
    </head>
