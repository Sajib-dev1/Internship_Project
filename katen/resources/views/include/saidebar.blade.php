<div class="main-menu">
    <!-- Brand Logo -->
    <div class="logo-box">
        <!-- Brand Logo Light -->
        <a class='logo-light' href='index.html'>
            <img src="{{ asset('backend') }}/images/logo-light.png" alt="logo" class="logo-lg" height="28">
            <img src="{{ asset('backend') }}/images/logo-sm.png" alt="small logo" class="logo-sm" height="28">
        </a>

        <!-- Brand Logo Dark -->
        <a class='logo-dark' href='index.html'>
            <img src="{{ asset('backend') }}/images/logo-dark.png" alt="dark logo" class="logo-lg" height="28">
            <img src="{{ asset('backend') }}/images/logo-sm.png" alt="small logo" class="logo-sm" height="28">
        </a>
    </div>

    <!--- Menu -->
    <div data-simplebar>
        <ul class="app-menu">

            <li class="menu-title">Main</li>

            <li class="menu-item">
                <a class='menu-link waves-effect waves-light' href='{{ route('dashboard') }}'>
                    <span class="menu-icon"><i class="bx bx-home-smile"></i></span>
                    <span class="menu-text"> {{ __('Dashboards') }} </span>
                </a>
            </li>

            <li class="menu-title">Backend</li>

            <li class="menu-item">
                <a class='menu-link waves-effect waves-light' href='{{ route('user') }}'>
                    <span class="menu-icon"><i class="fa fa-user" aria-hidden="true"></i></span>
                    <span class="menu-text"> User </span>
                </a>
            </li>

            <li class="menu-item">
                <a href="#menuExpages" data-bs-toggle="collapse" class="menu-link waves-effect waves-light">
                    <span class="menu-icon"><i class="bx bx-file"></i></span>
                    <span class="menu-text">Write Your Blog</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="menuExpages">
                    <ul class="sub-menu">
                        <li class="menu-item">
                            <a class='menu-link' href='{{ route('blog') }}'>
                                <span class="menu-text">Add New Blog</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class='menu-link' href='{{ route('blog.list') }}'>
                                <span class="menu-text">Blog List</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="menu-item">
                <a href="#menuLayouts" data-bs-toggle="collapse" class="menu-link waves-effect waves-light">
                    <span class="menu-icon"><i class="bx bx-layout"></i></span>
                    <span class="menu-text"> Layouts </span>
                    <span class="badge bg-blue ms-auto">New</span>
                </a>
                <div class="collapse" id="menuLayouts">
                    <ul class="sub-menu">
                        <li class="menu-item">
                            <a class='menu-link' href='layout-horizontal.html'>
                                <span class="menu-text">Horizontal</span>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a class='menu-link' href='layout-sidenav-light.html'>
                                <span class="menu-text">Sidenav Light</span>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a class='menu-link' href='layout-sidenav-dark.html'>
                                <span class="menu-text">Sidenav Dark</span>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a class='menu-link' href='layout-topbar-dark.html'>
                                <span class="menu-text">Topbar Dark</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="menu-title">Frontend</li>

            <li class="menu-item">
                <a href="#menuComponentsui" data-bs-toggle="collapse"
                    class="menu-link waves-effect waves-light">
                    <span class="menu-icon"><i class="bx bx-cookie"></i></span>
                    <span class="menu-text"> UI Elements </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="menuComponentsui">
                    <ul class="sub-menu">
                        <li class="menu-item">
                            <a class='menu-link' href='ui-alerts.html'>
                                <span class="menu-text">Alerts</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class='menu-link' href='ui-buttons.html'>
                                <span class="menu-text">Buttons</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class='menu-link' href='ui-cards.html'>
                                <span class="menu-text">Cards</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class='menu-link' href='ui-carousel.html'>
                                <span class="menu-text">Carousel</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class='menu-link' href='ui-dropdowns.html'>
                                <span class="menu-text">Dropdowns</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class='menu-link' href='ui-video.html'>
                                <span class="menu-text">Embed Video</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class='menu-link' href='ui-general.html'>
                                <span class="menu-text">General UI</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class='menu-link' href='ui-grid.html'>
                                <span class="menu-text">Grid</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class='menu-link' href='ui-images.html'>
                                <span class="menu-text">Images</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class='menu-link' href='ui-list-group.html'>
                                <span class="menu-text">List Group</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class='menu-link' href='ui-modals.html'>
                                <span class="menu-text">Modals</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class='menu-link' href='ui-offcanvas.html'>
                                <span class="menu-text">Offcanvas</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class='menu-link' href='ui-placeholders.html'>
                                <span class="menu-text">Placeholders</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class='menu-link' href='ui-progress.html'>
                                <span class="menu-text">Progress</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class='menu-link' href='ui-spinners.html'>
                                <span class="menu-text">Spinners</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class='menu-link' href='ui-tabs-accordions.html'>
                                <span class="menu-text">Tabs & Accordions</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class='menu-link' href='ui-tooltips-popovers.html'>
                                <span class="menu-text">Tooltips & Popovers</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class='menu-link' href='ui-typography.html'>
                                <span class="menu-text">Typography</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="menu-item">
                <a href="#menuExtendedui" data-bs-toggle="collapse" class="menu-link waves-effect waves-light">
                    <span class="menu-icon"><i class="bx bx-briefcase-alt-2"></i></span>
                    <span class="menu-text"> Components </span>
                    <span class="badge bg-info ms-auto">Hot</span>
                </a>
                <div class="collapse" id="menuExtendedui">
                    <ul class="sub-menu">
                        <li class="menu-item">
                            <a class='menu-link' href='components-range-slider.html'>
                                <span class="menu-text">Range Slider</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class='menu-link' href='components-sweet-alert.html'>
                                <span class="menu-text">Sweet Alert</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class='menu-link' href='components-loading-buttons.html'>
                                <span class="menu-text">Loading Buttons</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="menu-item">
                <a href="#menuIcons" data-bs-toggle="collapse" class="menu-link waves-effect waves-light">
                    <span class="menu-icon"><i class="bx bx-aperture"></i></span>
                    <span class="menu-text"> Icons </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="menuIcons">
                    <ul class="sub-menu">
                        <li class="menu-item">
                            <a class='menu-link' href='icons-feather.html'>
                                <span class="menu-text">Feather Icons</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class='menu-link' href='icons-mdi.html'>
                                <span class="menu-text">Material Design Icons</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class='menu-link' href='icons-dripicons.html'>
                                <span class="menu-text">Dripicons</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="menu-item">
                <a href="#menuForms" data-bs-toggle="collapse" class="menu-link waves-effect waves-light">
                    <span class="menu-icon"><i class="bx bxs-eraser"></i></span>
                    <span class="menu-text"> Forms </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="menuForms">
                    <ul class="sub-menu">
                        <li class="menu-item">
                            <a class='menu-link' href='forms-elements.html'>
                                <span class="menu-text">General Elements</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class='menu-link' href='forms-advanced.html'>
                                <span class="menu-text">Advanced</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class='menu-link' href='forms-validation.html'>
                                <span class="menu-text">Validation</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class='menu-link' href='forms-quilljs.html'>
                                <span class="menu-text">Editor</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class='menu-link' href='forms-file-uploads.html'>
                                <span class="menu-text">File Uploads</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="menu-item">
                <a href="#menuTables" data-bs-toggle="collapse" class="menu-link waves-effect waves-light">
                    <span class="menu-icon"><i class="bx bx-table"></i></span>
                    <span class="menu-text"> Tables </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="menuTables">
                    <ul class="sub-menu">
                        <li class="menu-item">
                            <a class='menu-link' href='tables-basic.html'>
                                <span class="menu-text">Basic Tables</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class='menu-link' href='tables-datatables.html'>
                                <span class="menu-text">Data Tables</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="menu-item">
                <a href="#menuCharts" data-bs-toggle="collapse" class="menu-link waves-effect waves-light">
                    <span class="menu-icon"><i class="bx bx-doughnut-chart"></i></span>
                    <span class="menu-text"> Charts </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="menuCharts">
                    <ul class="sub-menu">
                        <li class="menu-item">
                            <a class='menu-link' href='charts-apex.html'>
                                <span class="menu-text">Apex Charts</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class='menu-link' href='charts-morris.html'>
                                <span class="menu-text">Morris Charts</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class='menu-link' href='charts-chartjs.html'>
                                <span class="menu-text">Chartjs Charts</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="menu-item">
                <a href="#menuMaps" data-bs-toggle="collapse" class="menu-link waves-effect waves-light">
                    <span class="menu-icon"><i class="bx bx-map-alt"></i></span>
                    <span class="menu-text"> Maps </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="menuMaps">
                    <ul class="sub-menu">
                        <li class="menu-item">
                            <a class='menu-link' href='maps-google.html'>
                                <span class="menu-text">Google Maps</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a class='menu-link' href='maps-vector.html'>
                                <span class="menu-text">Vector Maps</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="menu-item">
                <a href="#menuMultilevel" data-bs-toggle="collapse" class="menu-link waves-effect waves-light">
                    <span class="menu-icon"><i class="bx bx-share-alt"></i></span>
                    <span class="menu-text"> Multi Level </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="menuMultilevel">
                    <ul class="sub-menu">
                        <li class="menu-item">
                            <a href="#menuMultilevel2" data-bs-toggle="collapse"
                                class="menu-link waves-effect waves-light">
                                <span class="menu-text"> Second Level </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="menuMultilevel2">
                                <ul class="sub-menu">
                                    <li class="menu-item">
                                        <a href="javascript: void(0);" class="menu-link">
                                            <span class="menu-text">Item 1</span>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="javascript: void(0);" class="menu-link">
                                            <span class="menu-text">Item 2</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="menu-item">
                            <a href="#menuMultilevel3" data-bs-toggle="collapse"
                                class="menu-link waves-effect waves-light">
                                <span class="menu-text">Third Level</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="menuMultilevel3">
                                <ul class="sub-menu">
                                    <li class="menu-item">
                                        <a href="javascript: void(0);" class="menu-link">
                                            <span class="menu-text">Item 1</span>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="#menuMultilevel4" data-bs-toggle="collapse"
                                            class="menu-link waves-effect waves-light">
                                            <span class="menu-text">Item 2</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="menuMultilevel4">
                                            <ul class="sub-menu">
                                                <li class="menu-item">
                                                    <a href="javascript: void(0);" class="menu-link">
                                                        <span class="menu-text">Item 1</span>
                                                    </a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="javascript: void(0);" class="menu-link">
                                                        <span class="menu-text">Item 2</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>