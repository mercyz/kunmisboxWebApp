<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
  <div class="app-sidebar__user">
    <div>
      <p class="app-sidebar__user-name">{{Auth::user()->name}}</p>
      <p class="app-sidebar__user-designation">Supper Admin</p>
    </div>
  </div>
  <ul class="app-menu">
    <li>
      <a class="app-menu__item active" href="{{route('dashboard')}}"
        ><i class="app-menu__icon fa fa-dashboard"></i
        ><span class="app-menu__label">Dashboard</span></a
      >
    </li>
    <li class="treeview">
      <a class="app-menu__item" href="#" data-toggle="treeview"
        ><i class="app-menu__icon fa fa-laptop"></i
        ><span class="app-menu__label">Products</span
        ><i class="treeview-indicator fa fa-angle-right"></i
      ></a>
      <ul class="treeview-menu">
        <li>
          <a class="treeview-item" href="{{route('products.index')}}"
            ><i class="icon fa fa-circle-o"></i>All Products</a
          >
        </li>
        <li>
          <a
            class="treeview-item"
            href="{{route('products.create')}}"
            ><i class="icon fa fa-circle-o"></i> Add Product</a
          >
        </li>
      </ul>
    </li>
    <li class="treeview">
      <a class="app-menu__item" href="#" data-toggle="treeview"
        ><i class="app-menu__icon fa fa-edit"></i
        ><span class="app-menu__label">Categories</span
        ><i class="treeview-indicator fa fa-angle-right"></i
      ></a>
      <ul class="treeview-menu">
        <li>
          <a class="treeview-item" href="{{route('categories.index')}}"
            ><i class="icon fa fa-circle-o"></i> All Categories</a
          >
        </li>
        <li>
          <a class="treeview-item" href="{{route('categories.create')}}"
            ><i class="icon fa fa-circle-o"></i> Add Category</a
          >
        </li>
      </ul>
    </li>
    <li class="treeview">
      <a class="app-menu__item" href="#" data-toggle="treeview"
        ><i class="app-menu__icon fa fa-th-list"></i
        ><span class="app-menu__label">Banners</span
        ><i class="treeview-indicator fa fa-angle-right"></i
      ></a>
      <ul class="treeview-menu">
        <li>
          <a class="treeview-item" href="{{route('adbanner.index')}}"
            ><i class="icon fa fa-circle-o"></i> All Banners</a
          >
        </li>
        <li>
          <a class="treeview-item" href="{{route('adbanner.create')}}"
            ><i class="icon fa fa-circle-o"></i> Add Banner</a
          >
        </li>
      </ul>
    </li>
     <li>
       <a  class="app-menu__item"  href="{{ route('logout') }}" 
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();"
                ><i class="app-menu__icon fa fa-unlock"></i> <span class="app-menu__label">Logout</span></a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                 @csrf
               </form>
    </li>
  </ul>
</aside>