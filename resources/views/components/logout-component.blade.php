<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="text-red-500 font-poppins hover:text-blue-500">Logout</button>
</form>
