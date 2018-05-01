    <div class="sidebar" data-background-color="white" data-active-color="danger">
        <div class="sidebar-wrapper">
            <div class="logo">
                <div class="simple-text">
                    Navigation
                </div>
            </div>

            <ul class="nav">
                <li<?php if ($page == 'home' OR $page=='') { echo ' class="active"';} ?>>
                    <a href="?home">
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li<?php if (substr($page, 0, 5) == 'fleet') { echo ' class="active"';} ?>>
                    <a href="?fleet">
                        <i class="ti-stats-up"></i>
                        <p>Fleet Control</p>
                    </a>
                </li>
                <li<?php if ($page == 'user') { echo ' class="active"';} ?>>
                    <a href="?user">
                        <i class="ti-user"></i>
                        <p>User Profile</p>
                    </a>
                </li>
                <li<?php if ($page == 'list') { echo ' class="active"';} ?>>
                    <a href="?list">
                        <i class="ti-view-list-alt"></i>
                        <p>List FLeet Control</p>
                    </a>
                </li>
                <li<?php if ($page == 'plan_fleet') { echo ' class="active"';} ?>>
                    <a href="?plan_fleet">
                        <i class="ti-map"></i>
                        <p>Plan Fleet Control</p>
                    </a>
                </li>
                <li<?php if (substr($page, 0, 6) == 'hauler') { echo ' class="active"';} ?>>
                    <a href="?hauler">
                        <i class="ti-truck"></i>
                        <p>Haulers</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="ti-pencil-alt2"></i>
                        <p>Icons</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="ti-map"></i>
                        <p>Maps</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="ti-bell"></i>
                        <p>Notifications</p>
                    </a>
                </li>
                <li>
                    <a href="logout.php">
                        <i class="ti-shift-left"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>