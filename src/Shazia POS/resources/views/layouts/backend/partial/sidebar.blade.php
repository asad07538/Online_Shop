<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a  class="brand-link">
		<span class="brand-text font-weight-light text-white">Shazia Online Mobile Shop</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
					 with font-awesome or any other icon font library -->
				<li class="nav-item has-treeview">
					<a href="{{ route('admin.dashboard') }}" class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}">
						<i class="nav-icon fa fa-dashboard"></i>
						<p>
							Dashboard
						</p>
					</a>
				</li>
				@if(@count(Auth::user()->shops)> 0)
				<li class="nav-item has-treeview">
					<a href="{{ route('admin.pos.index') }}" class="nav-link {{ Request::is('admin/pos') ? 'active' : '' }}">
						<i class="nav-icon fa fa-dashboard"></i>
						<p>
							Point of Sales (POS)
						</p>
					</a>
				</li>

				<li class="nav-item has-treeview {{ Request::is('admin/order*') ? 'menu-open' : '' }}">
					<a href="#" class="nav-link {{ Request::is('admin/order*') ? 'active' : '' }}">
						<i class="nav-icon fa fa-pie-chart"></i>
						<p>
							Order
							<i class="right fa fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ route('admin.order.pending') }}" class="nav-link {{ Request::is('admin/order/pending') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>Pending Orders</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.order.approved') }}" class="nav-link {{ Request::is('admin/order/approved') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>Approved Orders</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="{{ route('admin.order.delivered') }}" class="nav-link {{ Request::is('admin/order/delivered') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>Delievered Orders</p>
							</a>
						</li>
					</ul>
				</li>

<!-- 				<li class="nav-item has-treeview {{ Request::is('admin/employee*') ? 'menu-open' : '' }}">
					<a href="#" class="nav-link {{ Request::is('admin/employee*') ? 'active' : '' }}">
						<i class="nav-icon fa fa-pie-chart"></i>
						<p>
							Employee
							<i class="right fa fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ route('admin.employee.create') }}" class="nav-link {{ Request::is('admin/employee/create') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>Add Employee</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.employee.index') }}" class="nav-link {{ Request::is('admin/employee') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>All Employee</p>
							</a>
						</li>
					</ul>
				</li> -->
		
				<li class="nav-item has-treeview {{ Request::is('admin/customer*') ? 'menu-open' : '' }}">
					<a href="#" class="nav-link {{ Request::is('admin/customer*') ? 'active' : '' }}">
						<i class="nav-icon fa fa-pie-chart"></i>
						<p>
							Customer
							<i class="right fa fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ route('admin.customer.create') }}" class="nav-link {{ Request::is('admin/customer/create') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>Add Customer</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.customer.index') }}" class="nav-link {{ Request::is('admin/customer') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>All Customer</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.cash.index') }}" class="nav-link {{ Request::is('admin/cash/index') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>Cash Receipts</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item has-treeview {{ Request::is('admin/supplier*') ? 'menu-open' : '' }}">
					<a href="#" class="nav-link {{ Request::is('admin/supplier*') ? 'active' : '' }}">
						<i class="nav-icon fa fa-pie-chart"></i>
						<p>
							Supplier
							<i class="right fa fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ route('admin.supplier.create') }}" class="nav-link {{ Request::is('admin/supplier/create') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>Add Supplier</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.supplier.index') }}" class="nav-link {{ Request::is('admin/supplier') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>All Supplier</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-header">Product</li>

				<li class="nav-item has-treeview {{ Request::is('admin/product*') ? 'menu-open' : '' }}">
					<a href="#" class="nav-link {{ Request::is('admin/product*') ? 'active' : '' }}">
						<i class="nav-icon fa fa-pie-chart"></i>
						<p>
							Product
							<i class="right fa fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ route('admin.product.create') }}" class="nav-link {{ Request::is('admin/product/create') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>Add Product</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.product.index') }}" class="nav-link {{ Request::is('admin/product') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>All Products</p>
							</a>
						</li>
					</ul>
				</li>

				@endif
				<li class="nav-item has-treeview {{ Request::is('admin/phone_model*') ? 'menu-open' : '' }}">
					<a href="#" class="nav-link {{ Request::is('admin/phone_model*') ? 'active' : '' }}">
						<i class="nav-icon fa fa-pie-chart"></i>
						<p>
							Phone Models
							<i class="right fa fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ route('admin.phone_model.create') }}" class="nav-link {{ Request::is('admin/phone_model/create') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>Add Phone Model</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.phone_model.index') }}" class="nav-link {{ Request::is('admin/phone_model') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>All Phone Models</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item has-treeview {{ Request::is('admin/category*') ? 'menu-open' : '' }}">
					<a href="#" class="nav-link {{ Request::is('admin/category*') ? 'active' : '' }}">
						<i class="nav-icon fa fa-pie-chart"></i>
						<p>
							Category
							<i class="right fa fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ route('admin.category.create') }}" class="nav-link {{ Request::is('admin/category/create') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>Add Category</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.category.index') }}" class="nav-link {{ Request::is('admin/category') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>All Category</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item has-treeview {{ Request::is('admin/company*') ? 'menu-open' : '' }}">
					<a href="#" class="nav-link {{ Request::is('admin/company*') ? 'active' : '' }}">
						<i class="nav-icon fa fa-pie-chart"></i>
						<p>
							Companies
							<i class="right fa fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ route('admin.company.create') }}" class="nav-link {{ Request::is('admin/company/create') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>Add Company</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.company.index') }}" class="nav-link {{ Request::is('admin/company') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>All Companies</p>
							</a>
						</li>
					</ul>
				</li>
<!-- 				<li class="nav-item has-treeview {{ Request::is('admin/expense*') ? 'menu-open' : '' }}">
					<a href="#" class="nav-link {{ Request::is('admin/expense*') ? 'active' : '' }}">
						<i class="nav-icon fa fa-pie-chart"></i>
						<p>
							Expense
							<i class="right fa fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ route('admin.expense.create') }}" class="nav-link {{ Request::is('admin/expense/create') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>Add Expense</p>
							</a>
						</li> -->
<!-- 						<li class="nav-item">
							<a href="{{ route('admin.expense.today') }}" class="nav-link {{ Request::is('admin/expense-today') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>Today Expense</p>
							</a>
						</li> -->
<!-- 						<li class="nav-item">
							<a href="{{ route('admin.expense.month') }}" class="nav-link {{ Request::is('admin/expense-month*') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>Monthly Expense</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.expense.yearly') }}" class="nav-link {{ Request::is('admin/expense-yearly*') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>Yearly Expense</p>
							</a>
						</li> -->
<!-- 						<li class="nav-item">
							<a href="{{ route('admin.expense.index') }}" class="nav-link {{ Request::is('admin/expense') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>All Expense</p>
							</a>
						</li>
					</ul>
				</li> -->
				@if(@count(Auth::user()->shops)> 0)

				<li class="nav-header">Reports</li>

				<li class="nav-item has-treeview {{ Request::is('admin/sales*') ? 'menu-open' : '' }}">
					<a href="#" class="nav-link {{ Request::is('admin/sales*') ? 'active' : '' }}">
						<i class="nav-icon fa fa-pie-chart"></i>
						<p>
							Sales Report
							<i class="right fa fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ route('admin.sales.today') }}" class="nav-link {{ Request::is('admin/sales-today') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>Today's Report</p>
							</a>
						</li>
<!-- 						<li class="nav-item">
							<a href="{{ route('admin.sales.monthly') }}" class="nav-link {{ Request::is('admin/sales-monthly*') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>Monthly Report</p>
							</a>
						</li> -->
						<li class="nav-item">
							<a href="{{ route('admin.sales.total') }}" class="nav-link {{ Request::is('admin/sales-total') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>Total Sales</p>
							</a>
						</li>
					</ul>
				</li>
				@endif

				<li class="nav-item has-treeview {{ Request::is('user*') ? 'menu-open' : '' }}">
					<a href="#" class="nav-link {{ Request::is('user*') ? 'active' : '' }}">
						<i class="nav-icon fa fa-pie-chart"></i>
						<p>
							Employees
							<i class="right fa fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ route('user') }}" class="nav-link {{ Request::is('/user/') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>Employees</p>
							</a>
						</li>
<!-- 						<li class="nav-item">
							<a href="{{ route('group') }}" class="nav-link {{ Request::is('/group/') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>Roles</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('permission') }}" class="nav-link {{ Request::is('/permission/') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>Permissions</p>
							</a>
						</li> -->
					</ul>
				</li>
				@if(Auth::user()->admin == 1)

				<li class="nav-header">Administrator</li>
				<li class="nav-item has-treeview {{ Request::is('admin/shop*') ? 'menu-open' : '' }}">
					<a href="#" class="nav-link {{ Request::is('admin/shop*') ? 'active' : '' }}">
						<i class="nav-icon fa fa-pie-chart"></i>
						<p>
							Shops
							<i class="right fa fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ route('admin.shop.create') }}" class="nav-link {{ Request::is('admin/shop/create') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>Add Shop</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.shop.index') }}" class="nav-link {{ Request::is('admin/shop') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>All Shops</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item has-treeview">
					<a href="{{ route('registered_customers') }}" class="nav-link {{ Request::is('registered_customers') ? 'active' : '' }}">
						<i class="nav-icon fa fa-server"></i>
						<p>
							Registered Customers
						</p>
					</a>
				</li>
				<li class="nav-item has-treeview">
					<a href="{{ route('admin.setting.index') }}" class="nav-link {{ Request::is('admin/setting') ? 'active' : '' }}">
						<i class="nav-icon fa fa-server"></i>
						<p>
							Setting
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route('logout') }}"
					   onclick="event.preventDefault();
					   document.getElementById('logout-form').submit();">
						<i class="nav-icon fa fa-sign-out"></i> Logout
					</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						@csrf
					</form>
				</li>
				@endif

			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>