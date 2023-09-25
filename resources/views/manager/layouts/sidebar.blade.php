<!--start sidebar -->
<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('admin/images/logo-icon.png') }}" class="logo-icon" alt="logo icon" />
        </div>
        <div>
            <h4 class="logo-text">Project</h4>
        </div>
        <div class="toggle-icon ms-auto">
            <i class="bi bi-chevron-double-left"></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('panel') }}">
                <div class="parent-icon"><i class="bi bi-house-door"></i></div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-grid"></i></div>
                <div class="menu-title">Products Management</div>
            </a>
            <ul>
                <li>
                    <a href="{{ route('product.index') }}"><i class="bi bi-arrow-right-short"></i>Product Details</a>
                </li>
                <li>
                    <a href="{{ route('product.create') }}"><i class="bi bi-arrow-right-short"></i>Add Product</a>
                </li>
            </ul>
        </li>
        
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-person-check"></i></div>
                <div class="menu-title">Orders Management</div>
            </a>
            <ul>
                <li>
                    <a href="{{ route('order') }}"><i class="bi bi-arrow-right-short"></i>Order Details</a>
                </li>
            </ul>
        </li>
        
        <li class="menu-label">Others</li>
        <li>
            <a href="https://codervent.com/skodash/documentation/index.html" target="_blank">
                <div class="parent-icon">
                    <i class="bi bi-file-earmark-code"></i>
                </div>
                <div class="menu-title">Documentation</div>
            </a>
        </li>
        <li>
            <a href="https://themeforest.net/user/codervent" target="_blank">
                <div class="parent-icon"><i class="bi bi-headset"></i></div>
                <div class="menu-title">Support</div>
            </a>
        </li>
    </ul>
    <!--end navigation-->
</aside>
<!--end sidebar -->
