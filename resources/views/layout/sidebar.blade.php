<div class="bg-default text-white" id="sidebar" style="width: 250px; height: 100vh; ">
    <h5 class="p-3"><i class="bi bi-handbag"></i>SIMS Web App</h5>
    <ul class="nav flex-column">
        <li class="nav-item {{ Route::is('produk.index') ? 'active' : '' }}">
            <a class="nav-link text-white" href="{{route('produk.index')}}"><i class="bi bi-box-seam"></i> Produk</a>
        </li>
        <li class="nav-item {{ Route::is('profil.index') ? 'active' : '' }}">
            <a class="nav-link text-white" href="{{route('profil.index')}}"><i class="bi bi-person"></i> Profile</a>
        </li>
        <li class="nav-item">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="nav-link text-white"type="submit"><i class="bi bi-box-arrow-right"></i>
                    Logout</button>
            </form>
        </li>
    </ul>
</div>
