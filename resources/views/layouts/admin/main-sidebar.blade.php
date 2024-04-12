<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar position-relative">
        <div class="help-bt">
            <a href="tel:108" class="d-flex align-items-center">
                <div class="bg-danger rounded10 h-50 w-50 l-h-50 text-center me-15">
                    <i data-feather="mic"></i>
                </div>
                <h4 class="mb-0">Emergency<br>help</h4>
            </a>
        </div>
        <div class="multinav">
            <div class="multinav-scroll" style="height: 100%;">
                <ul class="sidebar-menu" data-widget="tree">
                    <li>
                        <a href="{{route('admin.technology_category.index')}}" >
                            <i data-feather="heart"></i>
                            <span>Technology Category</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.technology.index')}}" >
                            <i data-feather="heart"></i>
                            <span>Technology</span>
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
