<?php include 'header.php'; ?>
<div class="container-fluid g-0">
    <div class="row g-0 h-100">
        <div class="col-12 col-sm-5 col-md-3 col-xxl-2">
            <?php include 'marketplace-sidebar.php'; ?>
        </div>
        <div class="col-12 col-sm-7 col-md-9 col-lg-9 col-xl-9 col-xxl-10">   
            <div class="content px-4 py-5">
                <div>
                    <div class="row g-1 py-2">
                        <div class="col-12 col-lg-8 mx-auto">
                            <div class="create-card">
                                <div class="row">
                                    <div class="col-12 mx-auto mb-2">
                                        <h2>Create new listing</h2>
                                    </div>
                                    <div class="col-12 mx-auto">
                                        <form action="/">
                                            <div class="row g-3">
                                                <div class="col-12">
                                                    <input class="form-control form-control-lg" type="text" placeholder="Title">
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <select class="form-select form-select-lg">
                                                        <option selected>Category</option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <select class="form-select form-select-lg">
                                                        <option selected>Condition</option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div>
                                                <div class="col-12">
                                                    <textarea class="form-control" rows="5" placeholder="Description"></textarea>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-4">
                                                    <select class="form-select form-select-lg">
                                                        <option selected>Availability</option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-4">
                                                    <input class="form-control form-control-lg" type="text" placeholder="Product Tags">
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-4">
                                                    <input class="form-control form-control-lg" type="text" placeholder="SKU">
                                                </div>
                                                <div class="col-12">
                                                    <input class="form-control form-control-lg" type="file">
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            Default radio
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                                        <label class="form-check-label" for="flexRadioDefault2">
                                                            Default checked radio
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                                    <label class="form-check-label" for="flexCheckChecked">
                                                        Checked checkbox
                                                    </label>
                                                </div>
                                                <div class="col-12">
                                                    <button  class="btn btn-submit w-100">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>