<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @stack('head')

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles / Scripts -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
 
    <style>
    body {
        font-family: "Noto Sans Thai", sans-serif !important;
        font-optical-sizing: auto;
        font-style: normal;
    }
    .strike_none {
        text-decoration: none;
    }
    .green {
        background-color: green !important;
    }
    </style>
</head>

<body class="font-sans antialiased" data-theme="light">
    <main class="flex justify-center items-center min-h-screen bg-[#f9f9f9]">
        <div class="h-auto w-96 bg-white rounded-lg p-4 bg-[#f9f9f9]">
            <div class="header">
                <div class="mt-3 text-sm text-[#8ea6c8] flex justify-between items-center">
                    <p class="set_date">Thursday 1 Jan</p>
                    <p class="set_time">00:00 AM</p>
                </div>
            </div>

            @yield('main')

        </div>
    </main>

    <script>
    var setdate = document.querySelector(".set_date");
    var settime = document.querySelector(".set_time");

    var date = new Date().toDateString();
    setdate.innerHTML = date;

    setInterval(function() {
        var time = new Date().toLocaleTimeString();
        settime.innerHTML = time;
    }, 500);
    </script>
    
    @stack('footer')

</body>

</html>