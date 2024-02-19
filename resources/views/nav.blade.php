{{-- <nav class="navbar navbar-primary bg-primary mt-1">
    @auth
        @if (auth()->user()->role == 'admin'){
        <a href="home" class="navbar-brand " style="color: white">Home</a>
        <a href="{{ route('logout') }}" onclick="return confirm('Yakin mau logout?')" class="navbar-brand "
            style="color: white">Logout</a>
        }@else{
        <a href="{{ route('logout') }}" onclick="return confirm('Yakin mau logout?')" class="navbar-brand "
            style="color: white">Logout</a>
        }
        @endif
    @endauth
</nav> --}}

@auth
    @if (auth()->user()->role == 'kasir')
        <nav class="navbar navbar-primary  p-3  bg-secondary" >

            <a href="" class=" navbar-brand " style="color: white"><h4>Adi carwash</h4></a>
            <div >
                <a href="{{ route('kasir') }}" class="navbar-brand " style="color: white" >  Home</a>
                <a href="{{ route('report') }}" class="navbar-brand" style="color: white">Laporan</a>
                <a href="{{ route('logout') }}" class="navbar-brand " style="color: white" onclick="return confirm('Yakin logout?')">Logout</a>


            </div>
    </nav>


    @else
        <nav class="navbar navbar-secondary  p-3 bg-secondary" >

            <a href="" class=" navbar-brand " style="color: white"><h4>Adi carwash</h4></a>
            <div>
                <a href="{{ route('logout') }}" class="navbar-brand btn btn-block" style="color: white" onclick="return confirm('Yakin logout?')">Logout</a>
            </div>
        </nav>


    @endif
@endauth
