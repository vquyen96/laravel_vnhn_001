<div id="header">
    <section id="header-top">
        <div class="container">
            <div class="row ">
                <div class="top-header">
                    <div class="e-magazine">
                        <a><img src="{{asset('/local/resources/uploads/images/e-magazine.png')}}"></a>
                    </div>
                    <div class="top-header-menu">
                        <ul class="menu-left">
                            <li class="header-lang"><a href="#"><p><i class="fas fa-phone"></i>096 432 8383</p></a></li>
                            <li class="separation"><img src="{{asset('/local/resources/uploads/images/cham.png')}}"></li>
                            <li class="header-lang"><a href="#"><p><img src="{{asset('/local/resources/uploads/images/ads-icon.png')}}">Quảng cáo</p></a></li>
                            <li class="separation"><img src="{{asset('/local/resources/uploads/images/cham.png')}}"></li>
                            <li class="list-icon">
                                <a href=""><i class="fab fa-facebook-f"></i></a>
                                <a href=""><i class="fab fa-youtube"></i></a>
                                <a href=""><i class="fas fa-envelope"></i></a>
                                <a href=""><i class="fas fa-search" style="color: #303840"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="header-banner">
        <div class="container">
            <div class="row">
                <div class="logo-vnhn">
                    <a href="{{ asset('') }}"><img src="{{asset('local/resources/uploads/images/logo-vnhn.png')}}"></a>
                </div>
                <div class="quangcao-1">
                    <a href="{{ asset('') }}"><img src="{{asset('local/resources/uploads/images/quang-cao-1.png')}}"></a>
                </div>
            </div>
        </div>
    </section>

    <section id="header-menu">
        <div class="container">
            <div class="row">
                <ul class="menu-header">
                    <li><a href="{{ asset('') }}"><i class="fas fa-home"></i></a></li>
                    <li>
                        <a href="{{ asset('') }}">Media</a>
                        <div class="btn_dropdown_menu_head">
                            <i class="fas fa-angle-down"></i>
                        </div>
                        <ul>
                            <li>
                                <a href="{{ asset('') }}">Nóng trong ngày</a>
                            </li>
                            <li>
                                <a href="{{ asset('') }}">Nóng trong ngày</a>
                            </li>

                            <li>
                                <a href="{{ asset('') }}">Nóng trong ngày</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ asset('') }}">Thời sự</a>
                         <div class="btn_dropdown_menu_head">
                            <i class="fas fa-angle-down"></i>
                        </div>
                        <ul>
                            <li>
                                <a href="{{ asset('') }}">Phóng sự</a>
                            </li>
                            <li>
                                <a href="{{ asset('') }}">Cộng đồng quan tâms</a>
                            </li>

                            <li>
                                <a href="{{ asset('') }}">Nhịp cầu nhân ái</a>
                            </li>
                            <li>
                                <a href="{{ asset('') }}">Giá trị cuộc sống</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="{{ asset('') }}">Thế giới</a></li>
                    <li>
                        <a href="{{ asset('') }}">Kinh doanh</a>
                         <div class="btn_dropdown_menu_head">
                            <i class="fas fa-angle-down"></i>
                        </div>
                        <ul>
                            <li>
                                <a href="{{ asset('') }}">Nóng trong ngày</a>
                            </li>
                            <li>
                                <a href="{{ asset('') }}">Nóng trong tháng</a>
                            </li>

                            <li>
                                <a href="{{ asset('') }}">Nóng trong ngày</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="{{ asset('') }}">Từ chính sách tới thực tiễn</a></li>
                    <li><a href="{{ asset('') }}">Khoa học - Công nghệ</a></li>
                    <li><a href="{{ asset('') }}">Số hóa</a></li>
                    {{-- <li><a href="{{ asset('') }}">Nghiên cứu trao đổi</a></li> --}}
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">Danh mục khác <span class="caret"></span></a>
                        <ul class="dropdown-menu dropdown-menu-right" style="background-color: #d71a21">
                            <li><a href="#">Danh mục khác</a></li>
                            <li><a href="#">Thời sự</a></li>
                        </ul>
                    </li>
                    <div class="btn_close_menu">
                        <i class="fas fa-times"></i>
                    </div>  
                </ul>
            </div>
        </div>
    </section>
    <div id="header_btnMenu">
        <i class="fas fa-bars"></i>
    </div>
</div>