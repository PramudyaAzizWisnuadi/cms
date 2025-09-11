<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Panel - @yield('title', 'Dashboard')</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Remix Icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.0.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #6366f1;
            --primary-dark: #4f46e5;
            --secondary-color: #f8fafc;
            --accent-color: #10b981;
            --warning-color: #f59e0b;
            --danger-color: #ef4444;
            --dark-color: #1e293b;
            --text-primary: #0f172a;
            --text-secondary: #64748b;
            --border-color: #e2e8f0;
            --bg-light: #f8fafc;
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background-color: var(--bg-light);
            color: var(--text-primary);
            overflow-x: hidden;
            font-size: 14px;
            line-height: 1.6;
        }
        
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 260px;
            background: linear-gradient(180deg, #1e293b 0%, #334155 100%);
            backdrop-filter: blur(20px);
            border-right: 1px solid rgba(255, 255, 255, 0.1);
            overflow-y: auto;
            z-index: 1000;
            box-shadow: var(--shadow-xl);
        }
        
        .sidebar::-webkit-scrollbar {
            width: 4px;
        }
        
        .sidebar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
        }
        
        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 2px;
        }
        
        .sidebar::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        .sidebar-brand {
            padding: 1.5rem 1.25rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 1rem;
        }

        .sidebar-brand h4 {
            font-weight: 700;
            font-size: 1.25rem;
            color: white;
            margin: 0;
            letter-spacing: -0.025em;
        }

        .sidebar-brand .brand-icon {
            width: 36px;
            height: 36px;
            background: var(--primary-color);
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
            font-size: 18px;
        }
        
        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.75);
            padding: 0.75rem 1.25rem;
            margin: 0.125rem 0.75rem;
            border-radius: 12px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-weight: 500;
            font-size: 14px;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .sidebar .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.05) 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .sidebar .nav-link:hover::before {
            opacity: 1;
        }

        .sidebar .nav-link i {
            width: 20px;
            font-size: 16px;
            margin-right: 12px;
            opacity: 0.8;
        }
        
        .sidebar .nav-link:hover {
            color: white;
            background: rgba(255, 255, 255, 0.1);
            transform: translateX(4px);
            box-shadow: var(--shadow-md);
        }

        .sidebar .nav-link.active {
            color: white;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            box-shadow: var(--shadow-lg);
            transform: translateX(4px);
        }

        .sidebar .nav-link.active i {
            opacity: 1;
        }

        .sidebar-footer {
            margin-top: auto;
            padding: 1rem 0.75rem 1.5rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .user-dropdown {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            padding: 0.75rem 1rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }

        .user-dropdown:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: rgba(255, 255, 255, 0.2);
        }

        .user-dropdown .dropdown-toggle {
            color: white;
            text-decoration: none;
            font-weight: 500;
            font-size: 14px;
        }

        .user-dropdown .dropdown-toggle::after {
            margin-left: auto;
        }
        
        .main-content {
            margin-left: 260px;
            background: var(--bg-light);
            min-height: 100vh;
            padding: 0;
        }
        
        .main-header {
            background: white;
            border-bottom: 1px solid var(--border-color);
            padding: 1.5rem 2rem;
            margin-bottom: 2rem;
            box-shadow: var(--shadow-sm);
        }

        .main-header h2 {
            font-size: 1.875rem;
            font-weight: 700;
            color: var(--text-primary);
            margin: 0;
            letter-spacing: -0.025em;
        }

        .main-body {
            padding: 0 2rem 2rem;
        }
        
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }
            
            .sidebar.show {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }

            .main-header {
                padding: 1rem 1.5rem;
            }

            .main-body {
                padding: 0 1.5rem 2rem;
            }
        }
        
        .card {
            border: 1px solid var(--border-color);
            border-radius: 16px;
            box-shadow: var(--shadow-sm);
            background: white;
            transition: all 0.3s ease;
        }

        .card:hover {
            box-shadow: var(--shadow-md);
            transform: translateY(-2px);
        }

        .card-header {
            background: white;
            border-bottom: 1px solid var(--border-color);
            padding: 1.5rem;
            border-radius: 16px 16px 0 0 !important;
            font-weight: 600;
            color: var(--text-primary);
        }

        .card-body {
            padding: 1.5rem;
        }
        
        .stats-card {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            color: white;
            border: none;
            overflow: hidden;
            position: relative;
        }

        .stats-card::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100px;
            height: 100px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            transform: translate(30px, -30px);
        }

        .stats-card .card-body {
            position: relative;
            z-index: 1;
        }

        .stats-card h3 {
            font-size: 2.25rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .stats-card p {
            opacity: 0.9;
            margin: 0;
            font-weight: 500;
        }

        /* Modern Table Styling */
        .table {
            border-collapse: separate;
            border-spacing: 0;
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--shadow-sm);
        }

        .table thead th {
            background: var(--bg-light);
            border-top: none;
            border-bottom: 1px solid var(--border-color);
            font-weight: 600;
            color: var(--text-primary);
            padding: 1rem;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.025em;
        }

        .table tbody td {
            padding: 1rem;
            border-bottom: 1px solid var(--border-color);
            color: var(--text-primary);
            vertical-align: middle;
        }

        .table tbody tr:last-child td {
            border-bottom: none;
        }

        .table tbody tr:hover {
            background: rgba(99, 102, 241, 0.04);
        }
        
        /* Modern Button Styling */
        .btn {
            font-weight: 500;
            border-radius: 8px;
            padding: 0.5rem 1rem;
            font-size: 14px;
            transition: all 0.3s ease;
            border: none;
            box-shadow: var(--shadow-sm);
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            color: white;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, var(--primary-dark) 0%, #3730a3 100%);
            transform: translateY(-1px);
            box-shadow: var(--shadow-md);
        }

        .btn-success {
            background: var(--accent-color);
            color: white;
        }

        .btn-success:hover {
            background: #059669;
            transform: translateY(-1px);
            box-shadow: var(--shadow-md);
        }

        .btn-warning {
            background: var(--warning-color);
            color: white;
        }

        .btn-warning:hover {
            background: #d97706;
            transform: translateY(-1px);
            box-shadow: var(--shadow-md);
        }

        .btn-danger {
            background: var(--danger-color);
            color: white;
        }

        .btn-danger:hover {
            background: #dc2626;
            transform: translateY(-1px);
            box-shadow: var(--shadow-md);
        }

        .btn-action {
            padding: 0.375rem 0.75rem;
            margin: 0 0.125rem;
            border-radius: 6px;
            font-size: 12px;
        }

        /* Modern Form Styling */
        .form-control, .form-select {
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 0.75rem 1rem;
            font-size: 14px;
            transition: all 0.3s ease;
            background: white;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
            outline: none;
        }

        .form-label {
            font-weight: 500;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
            font-size: 14px;
        }

        /* Modern Badge Styling */
        .badge {
            font-weight: 500;
            padding: 0.375rem 0.75rem;
            border-radius: 6px;
            font-size: 12px;
            letter-spacing: 0.025em;
        }

        .badge.bg-primary {
            background: var(--primary-color) !important;
        }

        .badge.bg-success {
            background: var(--accent-color) !important;
        }

        .badge.bg-warning {
            background: var(--warning-color) !important;
        }

        .badge.bg-danger {
            background: var(--danger-color) !important;
        }

        /* Modern Alert Styling */
        .alert {
            border: none;
            border-radius: 12px;
            padding: 1rem 1.25rem;
            font-weight: 500;
            box-shadow: var(--shadow-sm);
        }

        .alert-success {
            background: rgba(16, 185, 129, 0.1);
            color: #059669;
            border-left: 4px solid var(--accent-color);
        }

        .alert-danger {
            background: rgba(239, 68, 68, 0.1);
            color: #dc2626;
            border-left: 4px solid var(--danger-color);
        }

        /* Breadcrumb Styling */
        .breadcrumb {
            background: rgba(99, 102, 241, 0.05);
            border-radius: 8px;
            padding: 0.75rem 1rem;
            margin: 0;
        }

        .breadcrumb-item a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
        }

        .breadcrumb-item.active {
            color: var(--text-secondary);
        }
        
        .btn-action {
            padding: 0.25rem 0.5rem;
            margin: 0 0.125rem;
        }
        
        /* CKEditor 5 Modern Styling */
        .ck-editor__editable {
            min-height: 400px;
            max-height: 600px;
            border-radius: 0 0 8px 8px !important;
        }
        
        .ck.ck-editor {
            border: 1px solid var(--border-color) !important;
            border-radius: 8px !important;
            box-shadow: var(--shadow-sm);
        }
        
        .ck.ck-editor__top {
            border-radius: 8px 8px 0 0 !important;
            background: var(--bg-light) !important;
        }
        
        .ck.ck-editor__main > .ck-editor__editable {
            border-top: 1px solid var(--border-color) !important;
        }
        
        /* Modern Image Styling */
        .gallery-image {
            width: 100%;
            height: 160px;
            object-fit: cover;
            border-radius: 12px 12px 0 0;
            transition: transform 0.3s ease;
        }
        
        .logo-image {
            width: 100%;
            height: 140px;
            object-fit: contain;
            padding: 1rem;
            background: var(--bg-light);
            border-radius: 12px 12px 0 0;
            transition: transform 0.3s ease;
        }
        
        .thumbnail-small {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 8px;
            border: 2px solid var(--border-color);
        }
        
        .thumbnail-medium {
            width: 80px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
            border: 2px solid var(--border-color);
        }
        
        .image-placeholder {
            background: var(--bg-light);
            border: 2px dashed var(--border-color);
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            min-height: 200px;
            transition: all 0.3s ease;
        }

        .image-placeholder:hover {
            border-color: var(--primary-color);
            background: rgba(99, 102, 241, 0.05);
        }
        
        .image-placeholder i {
            font-size: 2.5rem;
            color: var(--text-secondary);
        }
        
        /* Modern Card Animations */
        .gallery-card,
        .logo-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid var(--border-color);
            border-radius: 16px;
            overflow: hidden;
            background: white;
        }
        
        .gallery-card:hover,
        .logo-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: var(--shadow-xl);
            border-color: var(--primary-color);
        }

        .gallery-card:hover .gallery-image,
        .logo-card:hover .logo-image {
            transform: scale(1.05);
        }
        
        @media (max-width: 576px) {
            .gallery-image,
            .logo-image {
                height: 120px;
            }
            
            .main-header h2 {
                font-size: 1.5rem;
            }
        }

        @media (max-width: 768px) {
            .ck-editor__editable {
                min-height: 300px;
            }
            
            .sidebar {
                width: 280px;
            }
        }

        /* Loading States */
        .loading {
            opacity: 0.6;
            pointer-events: none;
        }

        /* Modern Scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        ::-webkit-scrollbar-track {
            background: var(--bg-light);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--border-color);
            border-radius: 3px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--text-secondary);
        }

        /* Empty State Styling */
        .empty-state {
            text-align: center;
            padding: 3rem 1rem;
            color: var(--text-secondary);
        }

        .empty-state i {
            font-size: 3rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }

        .empty-state h3 {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--text-primary);
        }

        .empty-state p {
            margin-bottom: 1.5rem;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar d-flex flex-column">
        <div class="sidebar-brand">
            <div class="d-flex align-items-center">
                <span class="brand-icon">
                    <i class="ri-dashboard-3-fill"></i>
                </span>
                <h4>Admin Panel</h4>
            </div>
        </div>
        
        <div class="flex-grow-1 px-0">
            <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="ri-dashboard-3-line"></i>Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.posts.index') }}" class="nav-link {{ request()->routeIs('admin.posts.*') ? 'active' : '' }}">
                        <i class="ri-article-line"></i>Posts
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.tags.index') }}" class="nav-link {{ request()->routeIs('admin.tags.*') ? 'active' : '' }}">
                        <i class="ri-price-tag-3-line"></i>Tags
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.galeries.index') }}" class="nav-link {{ request()->routeIs('admin.galeries.*') ? 'active' : '' }}">
                        <i class="ri-gallery-line"></i>Gallery
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.logos.index') }}" class="nav-link {{ request()->routeIs('admin.logos.*') ? 'active' : '' }}">
                        <i class="ri-image-2-line"></i>Logos
                    </a>
                </li>
                <li class="nav-item" style="margin-top: 1.5rem; padding-top: 1rem; border-top: 1px solid rgba(255, 255, 255, 0.1);">
                    <a href="{{ route('home') }}" class="nav-link" target="_blank">
                        <i class="ri-external-link-line"></i>View Site
                    </a>
                </li>
            </ul>
        </div>
        
        <div class="sidebar-footer">
            <div class="dropdown">
                <div class="user-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <a href="#" class="d-flex align-items-center dropdown-toggle">
                        <i class="ri-user-3-line me-2"></i>
                        <span class="flex-grow-1">{{ Auth::user()->name }}</span>
                    </a>
                </div>
                <ul class="dropdown-menu dropdown-menu-dark">
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="ri-logout-box-line me-2"></i>Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="main-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2>@yield('title', 'Dashboard')</h2>
                    @hasSection('subtitle')
                        <p class="text-muted mb-0">@yield('subtitle')</p>
                    @endif
                </div>
                @hasSection('breadcrumb')
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            @yield('breadcrumb')
                        </ol>
                    </nav>
                @endif
            </div>
        </div>
        
        <div class="main-body">
            <!-- Alerts -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="ri-check-line me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="ri-error-warning-line me-2"></i>{{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Content -->
            @yield('content')
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Modern Image Preview Script -->
    <script>
        // Enhanced image preview with modern styling
        function previewImage(input, previewId) {
            const file = input.files[0];
            const preview = document.getElementById(previewId);
            
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.style.display = 'block';
                    preview.innerHTML = `
                        <label class="form-label fw-semibold text-primary">
                            <i class="ri-image-line me-1"></i>New Image Preview:
                        </label>
                        <div class="position-relative">
                            <img src="${e.target.result}" class="img-fluid shadow-sm" 
                                 style="max-height: 220px; max-width: 100%; object-fit: contain; border-radius: 12px; border: 2px solid var(--border-color);">
                            <div class="position-absolute top-0 end-0 p-2">
                                <span class="badge bg-primary">New</span>
                            </div>
                        </div>
                    `;
                };
                reader.readAsDataURL(file);
            } else {
                if (preview.style.display !== 'none') {
                    preview.style.display = 'none';
                    preview.innerHTML = '';
                }
            }
        }
        
        // Auto-attach enhanced preview functionality
        document.addEventListener('DOMContentLoaded', function() {
            const fileInputs = document.querySelectorAll('input[type="file"][accept*="image"]');
            fileInputs.forEach(input => {
                if (input.dataset.preview) {
                    input.addEventListener('change', function() {
                        previewImage(this, this.dataset.preview);
                    });
                }
            });

            // Enhanced loading states for buttons
            const forms = document.querySelectorAll('form');
            forms.forEach(form => {
                form.addEventListener('submit', function() {
                    const submitBtn = form.querySelector('button[type="submit"]');
                    if (submitBtn) {
                        submitBtn.innerHTML = '<i class="ri-loader-4-line"></i> Processing...';
                        submitBtn.disabled = true;
                        submitBtn.classList.add('loading');
                    }
                });
            });

            // Enhanced table interactions
            const tableRows = document.querySelectorAll('.table tbody tr');
            tableRows.forEach(row => {
                row.addEventListener('mouseenter', function() {
                    this.style.transform = 'scale(1.01)';
                    this.style.transition = 'all 0.2s ease';
                });
                
                row.addEventListener('mouseleave', function() {
                    this.style.transform = 'scale(1)';
                });
            });

            // Smooth scroll for sidebar links
            const sidebarLinks = document.querySelectorAll('.sidebar .nav-link');
            sidebarLinks.forEach(link => {
                link.addEventListener('click', function() {
                    if (!this.classList.contains('active')) {
                        this.style.transform = 'translateX(8px)';
                        setTimeout(() => {
                            this.style.transform = '';
                        }, 200);
                    }
                });
            });
        });

        // Enhanced notification system
        function showNotification(message, type = 'success') {
            const notification = document.createElement('div');
            notification.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
            notification.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
            notification.innerHTML = `
                <i class="ri-${type === 'success' ? 'check' : 'error-warning'}-line me-2"></i>${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            `;
            
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.remove();
            }, 5000);
        }
    </script>
    
    @yield('scripts')
</body>
</html>
