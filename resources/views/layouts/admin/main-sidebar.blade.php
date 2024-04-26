<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar position-relative">

        <div class="multinav">
            <div class="multinav-scroll" style="height: 100%;">
                <ul class="sidebar-menu" data-widget="tree">
                    <li>
                        <a href="{{route('admin.technology_category.index')}}" >
                            <i data-feather="layers"></i>
                            <span>Technology Category</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.technology.index')}}" >
                            <i data-feather="code"></i>
                            <span>Technology</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.test.index')}}" >
                            <i data-feather="edit"></i>
                            <span>Test</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.expert.index')}}" >
                            <i data-feather="award"></i>
                            <span>Experts User</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.mobile_user.index')}}" >
                            <i data-feather="users"></i>
                            <span>Mobile User</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
</aside>

<style>
    .sidebar-menu li a {
        padding: 40px; /* Your preferred padding value */
    }
</style>
