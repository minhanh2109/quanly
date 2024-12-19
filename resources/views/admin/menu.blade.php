<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
  <!-- Quản lý danh mục -->
  <li class="nav-item">
      <a href="{{url('view_category')}}" class="nav-link">
          <i class="nav-icon fas fa-th"></i>
          <p>QUẢN LÝ DANH MỤC</p>
      </a>
  </li>

  <!-- Quản lý sản phẩm với dropdown -->
  <li class="nav-item">
      <a href="#" class="nav-link" data-bs-toggle="collapse" data-bs-target="#productDropdown" aria-expanded="false">
          <i class="nav-icon fas fa-bars"></i>
          <p>
              QUẢN LÝ SẢN PHẨM
              <i class="fas fa-angle-down float-end"></i>
          </p>
      </a>
      <ul id="productDropdown" class="collapse list-unstyled">
        <li><a href="{{ url('view_product') }}" class="nav-link">Danh sách sản phẩm</a></li>
        <li><a href="{{url('add_product')}}" class="nav-link">Thêm sản phẩm</a></li>
      </ul>
  </li>

  <!-- Quản lý đơn hàng -->
  <li class="nav-item">
      <a href="{{url('orders')}}" class="nav-link">
          <i class="nav-icon fas fa-tag"></i>
          <p>QUẢN LÝ ĐƠN HÀNG</p>
      </a>
  </li>

  <!-- Quản lý khách hàng -->
  <li class="nav-item">
      <a href="{{url('customers')}}" class="nav-link">
          <i class="nav-icon fas fa-user"></i>
          <p>QUẢN LÝ KHÁCH HÀNG</p>
      </a>
  </li>
</ul>
<script>
  document.querySelectorAll('.nav-item > .nav-link').forEach(item => {
    item.addEventListener('click', function (e) {
        const target = document.querySelector(this.dataset.bsTarget);
        if (target) {
            e.preventDefault();
            target.classList.toggle('show');
        }
    });
});
</script>