<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
            <i class="icon-arrow-left8"></i>
        </a>
        Navigation
        <a href="#" class="sidebar-mobile-expand">
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <!-- /sidebar mobile toggler -->


    <!-- Sidebar content -->
    <div class="sidebar-content">

        {{-- <!-- User menu -->
        <div class="sidebar-user">
            <div class="card-body">
                <div class="media">
                    <div class="mr-3">
                        <a href="#"><img src="{{ URL('global_assets/images/placeholders/placeholder.jpg') }}"
                                width="38" height="38" class="rounded-circle" alt=""></a>
                    </div>

                    <div class="media-body">
                        <div class="media-title font-weight-semibold">Victoria Baker</div>
                        <div class="font-size-xs opacity-50">
                            <i class="icon-pin font-size-sm"></i> &nbsp;Santa Ana, CA
                        </div>
                    </div>

                    <div class="ml-3 align-self-center">
                        <a href="#" class="text-white"><i class="icon-cog3"></i></a>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="card card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <!-- Main -->
                <li class="nav-item-header">
                    <div class="text-uppercase font-size-xs line-height-xs">Menüler</div> <i class="icon-menu"
                        title="Main"></i>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link ">
                        <i class="icon-home4"></i>
                        <span>
                            Müşteri
                        </span>
                    </a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="{{ route('musteri.index') }}"
                                class="nav-link active">Listele</a></li>
                        <li class="nav-item"><a href="{{ route('musteri.create') }}"
                                class="nav-link active">Oluştur</a></li>
                        
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu ">
                    <a href="#" class="nav-link"><i class="icon-copy"></i> <span>Sözleşmeler</span></a>

                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="{{ route('sozlesme.index') }}"
                                class="nav-link active">Listele</a></li>
                        <li class="nav-item"><a href="{{ route('sozlesme.create') }}"
                                class="nav-link active">Oluştur</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-color-sampler"></i> <span>Proje</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="{{ route('proje.index') }}" class="nav-link active"> Listele</a>
                        </li>
                        <li class="nav-item"><a href="{{ route('proje.create') }}" class="nav-link active">
                                Oluştur</a></li>

                        <li class="nav-item"><a href="{{ URL::to('/projeler') }}" class="nav-link active">
                                Proje Planlaması</a></li>



                    </ul>

                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link "><i class="icon-color-sampler"></i> <span>Bilgi Bankası</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="{{ URL::to('/bilgibankasi') }}"
                                class="nav-link active">Listele</a>
                        </li>
                        {{-- <li class="nav-item"><a href="#" class="nav-link">Oluştur</a></li> --}}
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link">
                        <i class="icon-list-unordered"></i>
                        <span>Personel</span>
                        <span class="badge bg-blue-400 align-self-center ml-auto"></span>
                    </a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="{{ route('personel.index') }}" class="nav-link active">
                                Listele</a>
                        </li>
                        <li class="nav-item"><a href="{{ route('personel.create') }}" class="nav-link active">
                                Oluştur</a></li>


                    </ul>

                </li>

                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-color-sampler"></i> <span>Ajanda</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="{{ route('randevu.index') }}" class="nav-link active">
                                Ajanda</a>
                        </li>
                    </ul>

                </li>

                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-color-sampler"></i> <span>İletişim</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="{{ route('iletisim.index') }}" class="nav-link active"> Mail Gönder</a>
                        </li>

                    </ul>

                </li>

                <!-- /page kits -->

            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->

</div>
