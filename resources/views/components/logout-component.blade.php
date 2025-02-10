<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="text-red-500 font-poppins">Logout</button>
</form>
