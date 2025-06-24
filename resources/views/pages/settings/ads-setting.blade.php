<div class="p-4">
    <form>
        <!-- Ads Enable Switch -->
        <div class="row align-items-center mb-3">
            <div class="col-lg-3">
                <label class="fw-bold h6 mb-0">Ads Enable</label>
            </div>
            <div class="col-lg-9">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="adsEnableSwitch"> 
                </div>
            </div>
        </div>

        <!-- Add Network Dropdown -->
        <div class="row align-items-center mb-3">
            <div class="col-lg-3">
                <label class="fw-bold h6 mb-0">Ad Network</label>
            </div>
            <div class="col-lg-9">
                <select class="form-select">
                    <option selected disabled>Select Ad Network</option>
                    <option value="admob">AdMob</option>
                    <option value="facebook">Facebook</option>
                    <option value="unity">Unity</option>
                    <option value="ironSource">IronSource</option>
                </select>
            </div>
        </div>

        <!-- Publish ID -->
        <div class="row align-items-start mb-3">
            <div class="col-lg-3">
                <label class="fw-bold h6">Publish ID</label>
            </div>
            <div class="col-lg-9">
                <input class="form-control" type="text" placeholder="Enter Publish ID">
            </div>
        </div>

        <!-- Ads Type Section -->
        <div class="row g-4 mb-4 mt-2">
            <!-- Banner Ads -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header bg-success text-white mb-0">
                        <label class="fw-bold h5 mb-0  d-flex justify-content-between">
                            Banner Ads
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="bannerAdsSwitch">
                            </div>
                        </label>
                    </div>
                    <div class="card-body">
                        <div class="fw-bold pt-2 pb-0 h5 mb-0">
                            Banner Ads ID
                        </div>
                        <input type="text" class="form-control mb-2" placeholder="Banner Ads ID">
                    </div>
                </div>
            </div>

            <!-- App Open Ads -->
            <div class="col-lg-6">
                <label class="fw-bold h6 d-flex justify-content-between">
                    App Open Ads
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="appOpenAdsSwitch">
                    </div>
                </label>
                <input type="text" class="form-control mb-2" placeholder="App Open Ads ID">
            </div>

            <!-- Native Ads -->
            <div class="col-lg-6">
                <label class="fw-bold h6 d-flex justify-content-between">
                    Native Ads
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="nativeAdsSwitch">
                    </div>
                </label>
                <input type="text" class="form-control mb-2" placeholder="Native Ads ID">
            </div>

            <!-- Rewarded Ads -->
            <div class="col-lg-6">
                <label class="fw-bold h6 d-flex justify-content-between">
                    Rewarded Ads
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="rewardedAdsSwitch">
                    </div>
                </label>
                <input type="text" class="form-control mb-2" placeholder="Rewarded Ads ID">
                <input type="text" class="form-control mt-2" placeholder="Daily Limit in Rewarded">
            </div>

            <!-- Interstitial Ads -->
            <div class="col-lg-6">
                <label class="fw-bold h6 d-flex justify-content-between">
                    Interstitial Ads
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="interstitialAdsSwitch">
                    </div>
                </label>
                <input type="text" class="form-control mb-2" placeholder="Interstitial Ads ID">
                <input type="text" class="form-control mt-2" placeholder="Interstitial Ads Click Count">
            </div>
        </div>

        <!-- Save Button -->
        <div class="text-center">
            <button class="btn btn-primary px-4" type="submit">Save Settings</button>
        </div>
    </form>
</div>
