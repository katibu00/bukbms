<li class="menu-item {{($route=='admin.home')?'active':''}}">
    <a href="{{ route('admin.home') }}" class="menu-link">
      <i class="menu-icon tf-icons ti ti-home"></i>
      <div data-i18n="Home">Home</div>
    </a>
</li>
<li class="menu-item {{($route=='sales.index')?'active':''}} {{($route=='sales.create')?'active':''}}">
    <a href="{{ route('sales.index') }}" class="menu-link">
      <i class="menu-icon tf-icons ti ti-currency-naira"></i>
      <div data-i18n="Sales">Sales</div>
    </a>
</li>
<li class="menu-item {{($route=='expenses.index')?'active':''}} {{($route=='expenses.create')?'active':''}}">
    <a href="{{ route('expenses.index') }}" class="menu-link">
      <i class="menu-icon tf-icons ti ti-cash"></i>
      <div data-i18n="Expense">Expense</div>
    </a>
</li>
<li class="menu-item {{($route=='report.index')?'active':''}} {{($route=='report.generate')?'active':''}}">
    <a href="{{ route('report.index') }}" class="menu-link">
      <i class="menu-icon tf-icons ti ti-report"></i>
      <div data-i18n="Report">Report</div>
    </a>
</li>
<li class="menu-item {{($route=='users.index')?'active':''}}">
    <a href="{{ route('users.index') }}" class="menu-link">
      <i class="menu-icon tf-icons ti ti-users"></i>
      <div data-i18n="Users">Users</div>
    </a>
</li>




<li class="menu-item {{($prefix=='/setups')?'active open':''}}">
  <a href="javascript:void(0);" class="menu-link menu-toggle">
    <i class="menu-icon tf-icons ti ti-settings"></i>
    <div data-i18n="Settings">Settings</div>
  </a>
  <ul class="menu-sub">
    <li class="menu-item {{($route=='buses.index')?'active':''}}">
      <a href="{{ route('buses.index') }}" class="menu-link">
        <div data-i18n="Buses">Buses</div>
      </a>
    </li>
    <li class="menu-item {{($route=='routes.index')?'active':''}}">
      <a href="{{ route('routes.index') }}" class="menu-link">
        <div data-i18n="Terminals">Terminals</div>
      </a>
    </li>
    <li class="menu-item {{($route=='expense_items.index')?'active':''}}">
      <a href="{{ route('expense_items.index') }}" class="menu-link">
        <div data-i18n="Expense Items">Expense Items</div>
      </a>
    </li>
    <li class="menu-item {{($route=='assign.drivers.index')?'active':''}} {{($route=='assign.drivers.edit')?'active':''}}">
      <a href="{{ route('assign.drivers.index') }}" class="menu-link">
        <div data-i18n="Assign Drivers">Assign Drivers</div>
      </a>
    </li>
    <li class="menu-item {{($route=='assign.cashiers.index')?'active':''}} {{($route=='assign.cashiers.edit')?'active':''}}">
      <a href="{{ route('assign.cashiers.index') }}" class="menu-link">
        <div data-i18n="Assign Cashier">Assign Cashier</div>
      </a>
    </li>
    
  </ul>
</li>
