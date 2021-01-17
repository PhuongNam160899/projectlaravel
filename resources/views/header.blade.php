
<div class="header-body">
            <div class="header-body_top">
                <div class="header-logo">
                    <img src="image/logo.png" />
                </div>
                <div class="header-menu">
                    <ul class="header-menu_ul">
                        <a href="">
                            <li class="menu">Trang Chủ</li>
                        </a>
                        <a href="gioithieu">
                            <li class="menu">Giới Thiệu</li>
                        </a>
                        <a href="order">
                            <li class="menu">Đơn Hàng</li>
                        </a>
                    </ul>
                </div>
            </div>
            <div class="header-body_bottom">
                <form action="search" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="header-body_bottom--left">
                        <input placeholder="Tìm kiếm" name="search" maxlength="100" class="search" />
                        <div class="search_submit"><input type="image" src="image/search1.png" alt="SUBMIT" name="search_submit" class="search_submit-img" /></div>
                        </div>
                </form>
                
                <div class="header-body_bottom--right">
                    <form action="cart" method="GET">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <input type="submit" class="cart" name="submit" value="Giỏ Hàng">
                    </form>
                    @if(session('username'))
                            <a href="use">
                        <div class="login">
                            <div class="login-img"><img src="image/use1.png"></div>
                            <div class="login-text">      
                            <p><?php echo Session::get('username'); ?></p>
                            </div>
                        </div>
                    </a>
                            @else
                            <a href="login">
                        <div class="login">
                            <div class="login-img"><img src="image/use1.png"></div>
                            <div class="login-text">      
                            <p>Nguoi dung</p>
                            </div>
                        </div>
                    </a>
                            @endif
                </div>
            </div>
        </div>