<div class="flex flex-col justify-center p-10 border rounded mt-10 text-center">
    <div class="text-2xl font-bold mb-2">{!! $title !!}</div>
    <div class="text-xl font-semibold mb-5">{!! $subtitle !!}</div>

    <div class="flex flex-row justify-between">
        <a class="text-center text-white rounded-md px-5 py-2 bg-slate-800 hover:bg-slate-700 w-2/4 mr-5" href="{{ route('register') }}">Sign In</a>    
        <a class="text-center text-white rounded-md px-5 py-2 bg-slate-800 hover:bg-slate-700 w-2/4" href="{{ route('login') }}">Log In</a>
    </div>
</div>