@extends('layouts.admin.master')
@section('title')
    Dashboard
@endsection

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav flex-column " id="sidebar-nav">
                            <li class="nav-item">
                                <a href="#" class="nav-link active " data-target="app-setting">
                                    <i class="bx bx-home"></i> App Setting
                                </a>
                            </li> 
                            <li class="nav-item">
                                <a href="#" class="nav-link " data-target="ads-setting">
                                    <i class="bx bx-home"></i> Ads Setting
                                </a>
                            </li> 
                            <li class="nav-item">
                                <a href="#" class="nav-link " data-target="notification">
                                    <i class="bx bx-home"></i> Notification
                                </a>
                            </li> 
                            <li class="nav-item">
                                <a href="#" class="nav-link " data-target="email-setting">
                                    <i class="bx bx-home"></i> Email Setting
                                </a>
                            </li> 
                            <li class="nav-item">
                                <a href="#" class="nav-link " data-target="payment-setting">
                                    <i class="bx bx-home"></i> Payment Setting
                                </a>
                            </li> 
                            <li class="nav-item">
                                <a href="#" class="nav-link " data-target="api-setting">
                                    <i class="bx bx-home"></i> Api Setting
                                </a>
                            </li> 
                            <li class="nav-item">
                                <a href="#" class="nav-link " data-target="whatsapp-setting">
                                    <i class="bx bx-home"></i> Whatsapp Setting
                                </a>
                            </li> 
                            <li class="nav-item">
                                <a href="#" class="nav-link " data-target="storage-setting">
                                    <i class="bx bx-home"></i> Storage Setting
                                </a>
                            </li> 
                            <li class="nav-item">
                                <a href="#" class="nav-link " data-target="app-update-popup">
                                    <i class="bx bx-home"></i> App Update Popup
                                </a>
                            </li> 
                            <li class="nav-item">
                                <a href="#" class="nav-link " data-target="privacy-policy">
                                    <i class="bx bx-home"></i> Privacy Policy
                                </a>
                            </li> 
                            <li class="nav-item">
                                <a href="#" class="nav-link " data-target="refund-policy">
                                    <i class="bx bx-home"></i> Refund Policy
                                </a>
                            </li> 
                            <li class="nav-item">
                                <a href="#" class="nav-link " data-target="terms-and-condition">
                                    <i class="bx bx-home"></i> Terms & Condition
                                </a>
                            </li> 
                            <li class="nav-item">
                                <a href="#" class="nav-link " data-target="whatsapp-content">
                                    <i class="bx bx-home"></i> Whatsapp Content
                                </a>
                            </li> 
                            <!-- Add more menu items as needed -->
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body" id="dynamic-content"> 
                        <div id="app-setting" class="content-section">
                            <h4>App Setting</h4>
                           @include('pages.settings.app-setting')
                        </div>
                        <div id="ads-setting" class="content-section" style="display: none">
                            <h4>Ads Setting</h4>
                            @include('pages.settings.ads-setting')
                        </div>
                        <div id="notification" class="content-section"  style="display:none;">
                            <h4>Notification</h4>
                            @include('pages.settings.notification')
                        </div>
                        <div id="email-setting" class="content-section" style="display:none;">
                            <h4>Email Setting</h4>
                            @include('pages.settings.email-setting')
                        </div>
                        <div id="payment-setting" class="content-section" style="display:none;">
                            <h4>Payment Setting</h4>
                             @include('pages.settings.payment-setting')
                        </div>
                        <div id="api-setting" class="content-section" style="display:none;">
                            <h4>Api Setting</h4>
                            @include('pages.settings.api-setting')
                        </div>
                        <div id="whatsapp-setting" class="content-section" style="display:none;">
                            <h4>Whatsapp Setting</h4>
                            @include('pages.settings.whatsapp-setting')
                        </div>
                        <div id="storage-setting" class="content-section" style="display:none;">
                            <h4>Storage Setting</h4>
                            @include('pages.settings.storage-setting')
                        </div>
                        <div id="app-update-popup" class="content-section" style="display:none;">
                            <h4>App Update PopUp</h4>
                            @include('pages.settings.app-update-popup')
                        </div>
                        <div id="privacy-policy" class="content-section" style="display:none;">
                            <h4>Privacy Policy</h4>
                            @include('pages.settings.privacy-policy')
                        </div>
                        <div id="refund-policy" class="content-section" style="display:none;">
                            <h4>Refund Policy</h4>
                            @include('pages.settings.refund-policy')
                        </div>
                        <div id="terms-and-condition" class="content-section" style="display:none;">
                            <h4>Terms & Condition</h4>
                            @include('pages.settings.terms-and-condition')
                        </div>
                        <div id="whatsapp-content" class="content-section" style="display:none;">
                            <h4>Whatsapp Content</h4>
                            @include('pages.settings.whatsapp-content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection
 
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get all sidebar links
        const navLinks = document.querySelectorAll('#sidebar-nav .nav-link');
        
        // Add click event listeners
        navLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Remove active class from all links
                navLinks.forEach(l => l.classList.remove('active'));
                
                // Add active class to clicked link
                this.classList.add('active');
                
                // Get target content ID
                const targetId = this.getAttribute('data-target');
                
                // Hide all content sections
                document.querySelectorAll('.content-section').forEach(section => {
                    section.style.display = 'none';
                });
                
                // Show target content section
                document.getElementById(targetId).style.display = 'block';
                
                // Optional: Load content via AJAX if you want fresh data each time
                // loadContent(targetId);
            });
        });

        // Optional AJAX function for loading dynamic content
        function loadContent(section) {
            fetch(`/admin/${section}`)
                .then(response => response.text())
                .then(html => {
                    document.getElementById(`${section}-content`).innerHTML = html;
                });
        }
    });
</script> 
 
<style>
   .nav-link {
    cursor: pointer;
    transition: all 0.3s;
    border-left: 3px solid transparent; /* Add transparent border by default */
    padding-left: 10px; /* Adjust padding to account for border */
    margin-left: -3px; /* Compensate for the border width */
}

.nav-link:hover {
    background-color: rgba(0,0,0,0.05);
}

.nav-link.active {
    background-color: rgba(0,115,230,0.1);
    color: #0073e6;
    font-weight: 500;
    border-left: 3px solid red; /* Red left border for active item */
    padding-left: 10px; /* Keep consistent padding */
}

.content-section {
    animation: fadeIn 0.3s ease-in-out;
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}
</style> 