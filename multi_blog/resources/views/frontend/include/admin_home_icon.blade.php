@foreach (App\Models\AdminSocile::all() as $socile )
    <li class="list-inline-item"><a href="{{ $socile->link }}" target="_blank"><i class="{{ $socile->icon }}"></i></a></li>
@endforeach