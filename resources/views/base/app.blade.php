<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/images/logoSportFind.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        clifford: '#da373d',
                    }
                }
            }
        }
    </script>
    <style>
        html {
            height: 100%;
            box-sizing: border-box;
            background-color: #333333;
            color: white;
        }

        body {
            position: relative;
            margin: 0;
            min-height: 100%;
            padding-bottom: 6rem;
            box-sizing: inherit;
            background-color: #333333;
            color: white;
        }

        footer {
            position: fixed;
            right: 0;
            left: 0;
            bottom: 0;
            background-color: #333333;
            color: white;
        }
    </style>
    <title>SportFind | @yield('titulo')</title>
</head>

<body>
    @include('base.menu')

    <div class="md:container md:mx-auto">
        @include('base.flash-message')
        @yield('content')
    </div>
</body>



<footer
    class="bottom-0 mr-auto ml-auto w-full p-4 border-t-2 border-green-600 shadow flex items-center justify-center md:p-6">
    <span class="text-sm sm:text-center">©2023 SportFind. Todos os direitos reservados.
    </span>
</footer>



</html>
