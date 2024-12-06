{{-- This file is used for menu items by any Backpack v6 theme --}}
<x-backpack::menu-item title="職員" icon="la la-question" :link="backpack_url('admin')" />
<x-backpack::menu-item title="患者" icon="la la-question" :link="backpack_url('user')" />
<x-backpack::menu-item title="予約" icon="la la-question" :link="backpack_url('reservation')" />
<x-backpack::menu-item title="診療科" icon="la la-question" :link="backpack_url('category')" />
