



@foreach ( App\Models\Menu::all() as $menu )
<li class="nav-item dropdown  {{ $menu->menu == 'Home' ?'active':'' }}">
    <a class="nav-link dropdown-{{ App\Models\Submenu::where('menu_id',$menu->id)->count() != 0?'toggle':'' }}" href="{{ route($menu->menu_link) }}">{{ $menu->menu }}</a>
    <ul class="dropdown-menu">
        @foreach (App\Models\Submenu::where('menu_id',$menu->id)->get() as $submenu )
        <li><a class="dropdown-item" href="{{ route('allSubmenu',$submenu->id) }}">{{ $submenu->sub_menu }}</a></li>
        @endforeach
    </ul>
</li>
@endforeach