<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('home') }}">KawanPeduli</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('home') }}">KP</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li>
                <a class="nav-link" href="{{ route('home') }}"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Announcement</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-bullhorn"></i>
                    <span>Announcement</span></a>
                <ul class="dropdown-menu">
                    @if (Auth::user()->role == 'Admin')
                    <li><a class="nav-link" href="{{ route('announcement.create') }}"><i class="fas fa-plus"></i><span>Add New</span></a></li>
                    @endif
                    <li><a class="nav-link" href="{{ route('announcement.index') }}"><i class="fas fa-list"></i><span>Announcement List</span></a></li>
                </ul>
            </li>
            @if (Auth::user()->role == 'Admin')
            <li class="menu-header">Role Management</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user-circle"></i>
                    <span>Role</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('author.index') }}"><i class="fas fa-users-cog"></i><span>Author</span></a></li>
                    <li><a class="nav-link" href="{{ route('user.index') }}"><i class="fas fa-users"></i><span>User</span></a></li>
                </ul>
            </li>
            @endif
            @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Author')
            <li class="menu-header">Blog Management</li>
            @if (Auth::user()->role == 'Admin')
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-clipboard-list"></i>
                    <span>Category</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('category.create') }}"><i class="fas fa-plus"></i><span>Add Category</span></a></li>
                    <li><a class="nav-link" href="{{ route('category.index') }}"><i class="fas fa-list"></i><span>Category List</span></a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-tags"></i>
                    <span>Tag</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('tag.create') }}"><i class="fas fa-plus"></i><span>Add Tag</span></a></li>
                    <li><a class="nav-link" href="{{ route('tag.index') }}"><i class="fas fa-list"></i><span>Tag List</span></a></li>
                </ul>
            </li>
            @endif
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-pen"></i>
                    <span>Post</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('post.create') }}"><i class="fas fa-plus"></i><span>Add Post</span></a></li>
                    <li><a class="nav-link" href="{{ route('post.index') }}"><i class="fas fa-list"></i><span>Post List</span></a></li>
                    @if (Auth::user()->role == 'Admin')
                    <li><a class="nav-link" href="{{ route('post.trash') }}"><i class="fas fa-trash"></i><span>Post Trash</span></a></li>
                    @endif
                </ul>
            </li>
            @endif
            <li class="menu-header">Forum Management</li>
            @if (Auth::user()->role == 'Admin')
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-clipboard-list"></i>
                    <span>Category</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('forumcategory.create') }}"><i class="fas fa-plus"></i><span>Add Category</span></a></li>
                    <li><a class="nav-link" href="{{ route('forumcategory.index') }}"><i class="fas fa-list"></i><span>Category List</span></a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-tags"></i>
                    <span>Tag</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('forumtag.create') }}"><i class="fas fa-plus"></i><span>Add Tag</span></a></li>
                    <li><a class="nav-link" href="{{ route('forumtag.index') }}"><i class="fas fa-list"></i><span>Tag List</span></a></li>
                </ul>
            </li>
            @endif
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-comments"></i>
                    <span>Discussion</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('discussion.create') }}"><i class="fas fa-plus"></i><span>Add Discussion</span></a></li>
                    <li><a class="nav-link" href="{{ route('discussion.index') }}"><i class="fas fa-list"></i><span>Discussion List</span></a></li>
                    @if (Auth::user()->role == 'Admin')
                    <li><a class="nav-link" href="{{ route('discussion.trash') }}"><i class="fas fa-trash"></i><span>Discussion Trash</span></a></li>
                    @endif
                </ul>
            </li>
            @if (Auth::user()->role == 'Admin')
            <li class="menu-header">User Feedback</li>
            <li>
                <a class="nav-link" href="{{ route('questionnaire.index') }}"><i class="fas fa-smile"></i><span>Questionnaire Result</span></a>
            </li>
            <li class="menu-header">Subscription</li>
            <li>
                <a class="nav-link" href="{{ route('mail.index') }}"><i class="fas fa-envelope"></i><span>Mailing List</span></a>
            </li>
            @endif
            <li class="menu-header">Profile Management</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user"></i>
                    <span>Profile</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('editprofile.edit', Auth::user()->id) }}"><i class="fas fa-user-edit"></i><span>Edit Profile</span></a></li>
                </ul>
            </li>
        </ul>
        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="{{ url('/') }}" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-home"></i> Website Page
            </a>
        </div>
    </aside>
</div>
