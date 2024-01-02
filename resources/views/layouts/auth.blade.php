<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- ÷ <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"> -->
    <title>SAMA EVEN</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    @if (session('status'))
    <div class="flex flex-col max-w-lg mt-20 mx-auto">
        <div class="inline-flex justify-between bg-teal-100 border border-teal-400 text-teal-700 px-4 py-3 my-2 rounded " role="alert">
            <span class="block sm:inline pl-2">
                <strong class="font-bold">Success</strong>
                {{ session('status') }}
            </span>
            <span class="inline" onclick="return this.parentNode.remove();">
                <svg class="fill-current h-6 w-6" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <title>Close</title>
                </svg>
            </span>
        </div>
    </div>
    @endif
    @if(count($errors) >0)
    <div class="inline-flex justify-between bg-red-100 border border-red-400 text-red-700 px-4 py-3 my-2 rounded  " role="alert">
        <span class="block sm:inline pl-2">
            <strong class="font-bold">Success</strong>
            @foreach($errors->all() as $error)
            {{$error}}
            @endforeach
        </span>
        <span class="inline" onclick="return this.parentNode.remove();">
            <svg class="fill-current h-6 w-6" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <title>Close</title>
                <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
            </svg>
        </span>
    </div>
    @endif
    @yield('formulaire')
</body>

</html>