<div class="p-3">
    <form>
        <!-- Reusable Input Row -->
        <div class="row align-items-center mb-3">
            <div class="col-lg-3">
                <label class="fw-bold h6 mb-0">App Title</label>
            </div>
            <div class="col-lg-9">
                <input type="text" class="form-control" placeholder="Enter App Title">
            </div>
        </div>

        <!-- App Logo -->
        <div class="row align-items-center mb-2">
            <div class="col-lg-3">
                <div class="fw-bold h5 mb-1">App Logo</div>
            </div>
            <div class="col-lg-9">
               <div class="d-flex">
                 <input type="file" class="form-control mb-2" onchange="previewImage(event, 'logoPreview')">
                <img id="logoPreview" src="" alt="Logo Preview" style="max-height: 80px; display: none;">
               </div>
            </div>
        </div>

        <!-- Admin Favicon -->
        <div class="row align-items-center mb-2">
            <div class="col-lg-3">
                <div class="fw-bold h5 mb-1">Admin Favicon</div>
            </div>
            <div class="col-lg-9">
                <div class="d-flex">
                    <input type="file" class="form-control mb-2" onchange="previewImage(event, 'faviconPreview')">
                <img id="faviconPreview" src="" alt="Favicon Preview" style="max-height: 40px; display: none;">
                </div>
            </div>
        </div>

        <div class="row align-items-center mb-3">
            <div class="col-lg-3">
                <label class="fw-bold h6 mb-0">Author</label>
            </div>
            <div class="col-lg-9">
                <input type="text" class="form-control" placeholder="Enter Author Name">
            </div>
        </div>

        <!-- Description -->
        <div class="row align-items-center mb-2">
            <div class="col-lg-3">
                <div class="fw-bold h5 mb-1">Description</div>
            </div>
            <div class="col-lg-9">
                <textarea class="form-control" rows="3" placeholder="Enter Description"></textarea>
            </div>
        </div>

        <div class="row align-items-center mb-3">
            <div class="col-lg-3">
                <label class="fw-bold h6 mb-0">API Key</label>
            </div>
            <div class="col-lg-9">
                <input type="text" class="form-control" placeholder="Enter API Key">
            </div>
        </div>

        <div class="row align-items-center mb-3">
            <div class="col-lg-3">
                <label class="fw-bold h6 mb-0">Products Enable</label>
            </div>
            <div class="col-lg-9">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="productsEnable">
                    <label class="form-check-label" for="productsEnable">Enable Products</label>
                </div>
            </div>
        </div>

        <div class="row align-items-center mb-3">
            <div class="col-lg-3">
                <label class="fw-bold h6 mb-0">Timezone</label>
            </div>
            <div class="col-lg-9">
                <input type="text" class="form-control" placeholder="e.g., Asia/Kolkata">
            </div>
        </div>

        <div class="row align-items-center mb-3">
            <div class="col-lg-3">
                <label class="fw-bold h6 mb-0">Currency</label>
            </div>
            <div class="col-lg-9">
                <input type="text" class="form-control" placeholder="e.g., INR, USD">
            </div>
        </div>

        <div class="row align-items-center mb-3">
            <div class="col-lg-3">
                <label class="fw-bold h6 mb-0">App Version</label>
            </div>
            <div class="col-lg-9">
                <input type="text" class="form-control" placeholder="e.g., 1.0.0">
            </div>
        </div>

        <div class="row align-items-center mb-3">
            <div class="col-lg-3">
                <label class="fw-bold h6 mb-0">Contact</label>
            </div>
            <div class="col-lg-9">
                <input type="text" class="form-control" placeholder="Enter Contact Number">
            </div>
        </div>

        <div class="row align-items-center mb-3">
            <div class="col-lg-3">
                <label class="fw-bold h6 mb-0">Email</label>
            </div>
            <div class="col-lg-9">
                <input type="email" class="form-control" placeholder="Enter Email">
            </div>
        </div>

        <div class="row align-items-center mb-3">
            <div class="col-lg-3">
                <label class="fw-bold h6 mb-0">Website</label>
            </div>
            <div class="col-lg-9">
                <input type="url" class="form-control" placeholder="https://example.com">
            </div>
        </div>

        <div class="row align-items-center mb-4">
            <div class="col-lg-3">
                <label class="fw-bold h6 mb-0">Developed By</label>
            </div>
            <div class="col-lg-9">
                <input type="text" class="form-control" placeholder="Enter Developer Name">
            </div>
        </div>

        <div class="row">
            <div class="col-12 text-center">
                <button class="btn btn-primary px-4" type="submit">Save Settings</button>
            </div>
        </div>
    </form>
</div>
<script>
    function previewImage(event, previewId) {
        const reader = new FileReader();
        reader.onload = function () {
            const output = document.getElementById(previewId);
            output.src = reader.result;
            output.style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>