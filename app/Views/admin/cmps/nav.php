<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <?php $request = service('request'); ?>
        <li class="nav-item">
            <a href="<?= base_url();?>" class="nav-link <?= !$request->uri->getSegment(1) ? 'active' : null; ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url();?>/users" class="nav-link <?= $request->uri->getSegment(1) == 'users' ? 'active' : null; ?>">
                <i class="nav-icon fas fa-users"></i>
                <p>Users</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url();?>/staff" class="nav-link <?= $request->uri->getSegment(1) == 'staff' ? 'active' : null; ?>">
                <i class="nav-icon fas fa-user"></i>
                <p>Staff</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url();?>/projects" class="nav-link <?= $request->uri->getSegment(1) == 'projects' ? 'active' : null; ?>">
                <i class="nav-icon fas fa-cubes"></i>
                <p>Projects</p>
            </a>
        </li> 
        
        <li class="nav-item">
            <a href="<?= base_url();?>/tags" class="nav-link <?= $request->uri->getSegment(1) == 'tags' ? 'active' : null; ?>">
                <i class="nav-icon fas fa-tags"></i>
                <p>Tags</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url();?>/blog" class="nav-link <?= $request->uri->getSegment(1) == 'blog' ? 'active' : null; ?>">
                <i class="nav-icon fas fa-list-alt"></i><p>Blog</p>
            </a>
        </li>
    </ul>
</nav>
