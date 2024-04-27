<div class="canvas-menu d-flex align-items-end flex-column">
    <!-- close button -->
    <button type="button" class="btn-close" aria-label="Close"></button>
    <!-- logo -->
    <div class="logo">
        <img src="{{ asset('frontend') }}/images/logo.svg" alt="Katen" />
    </div>
    <!-- menu -->
    <nav>
        <ul class="vertical-menu">
			@foreach ( App\Models\Menu::all() as $menu )
			<li class="{{ $menu->menu == 'Home' ?'active':'' }}">
				<a href="{{ route($menu->menu_link) }}">{{ $menu->menu }}</a>
				<ul class="submenu">
					@foreach (App\Models\Submenu::where('menu_id',$menu->id)->get() as $submenu )
					<li><a href="{{ route('allSubmenu',$submenu->id) }}">{{ $submenu->sub_menu }}</a></li>
					@endforeach
				</ul>
			</li>
			@endforeach
        </ul>
    </nav>
    <!-- social icons -->
    <ul class="social-icons list-unstyled list-inline mb-0 mt-auto w-100">
        @include('frontend.include.admin_sidbar_icon')
    </ul>
</div>