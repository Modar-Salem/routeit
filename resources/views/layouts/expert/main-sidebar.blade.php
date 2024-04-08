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
                <!-- sidebar menu-->
                <ul class="sidebar-menu" data-widget="tree">

                    <li>
                        <a href="{{route('admin.doctor.index')}}">
                            <i data-feather="activity"></i>
                            <span>Doctor</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.physicalTherapist.index')}}">
                            <i data-feather="activity"></i>
                            <span>Physical Therapist</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.pharmacy.index')}}">
                            <i data-feather="shopping-bag"></i>
                            <span>Pharmacies</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.medicalEquipmentSupplyCenter.index')}}">
                            <i data-feather="shopping-bag"></i>
                            <span>Medical Equipment Center</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.laboratory.index')}}">
                            <i data-feather="clipboard"></i>
                            <span>Laboratories</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.x_ray_center.index')}}">
                            <i data-feather="image"></i>
                            <span>X-Ray Centers</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.pharmaceuticalCompany.index')}}">
                            <i data-feather="archive"></i>
                            <span>Pharmaceutical Company</span>
                        </a>
                    </li>
                    <li>
                        <a href="appointments.html" >
                            <i data-feather="heart"></i>
                            <span>Patient</span>
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
