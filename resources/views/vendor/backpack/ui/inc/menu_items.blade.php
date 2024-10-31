{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<x-backpack::menu-item title="職員" icon="la la-question" :link="backpack_url('admin')" />
<x-backpack::menu-item title="患者" icon="la la-question" :link="backpack_url('user')" />
<x-backpack::menu-item title="予約" icon="la la-question" :link="backpack_url('reservation')" />
<x-backpack::menu-item title="科一覧" icon="la la-question" :link="backpack_url('category')" />
