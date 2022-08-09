<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard')? "active":"collapsed" }}" href="/dashboard">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->
        <li class="nav-item">
            <a class="nav-link {{ Request::is('mahasiswa')? "active":"collapsed" }}" href="/mahasiswa">
                <i class="bi bi-grid"></i>
                <span>Mahasiswa</span>
            </a>
        </li><!-- End Dashboard Nav -->
        <li class="nav-item">
            <a class="nav-link {{ Request::is('matakuliah')? "active":"collapsed" }}" href="/matakuliah">
                <i class="bi bi-grid"></i>
                <span>Matakuliah</span>
            </a>
        </li><!-- End Dashboard Nav -->
        <li class="nav-item">
            <a class="nav-link {{ Request::is('semester')? "active":"collapsed" }}" href="/semester">
                <i class="bi bi-grid"></i>
                <span>Semester</span>
            </a>
        </li><!-- End Dashboard Nav -->
        <li class="nav-item">
            <a class="nav-link {{ Request::is('jadwal')? "active":"collapsed" }}" href="/jadwal">
                <i class="bi bi-grid"></i>
                <span>Jadwal</span>
            </a>
        </li><!-- End Dashboard Nav -->
        <li class="nav-item">
            <a class="nav-link {{ Request::is('absen')? "active":"collapsed" }}" href="/absen">
                <i class="bi bi-grid"></i>
                <span>Absen</span>
            </a>
        </li><!-- End Dashboard Nav -->
        <li class="nav-item">
            <a class="nav-link {{ Request::is('kontrak')? "active":"collapsed" }}" href="/kontrak">
                <i class="bi bi-grid"></i>
                <span>Kontrak Matakuliah</span>
            </a>
        </li><!-- End Dashboard Nav -->
    </ul>

</aside><!-- End Sidebar-->
