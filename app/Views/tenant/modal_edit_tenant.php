<!-- Modal Edit Tenant -->
<div class="modal fade" id="edittenant" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Tenant</h4>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-4">
                            <label class="form-label">Tenant UID</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" readonly id="edit_tenant_uid" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <label class="form-label">Name Tenant</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_tenant_full_name" class="form-control" placeholder="Please Input Your Tenant Name">
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <label class="form-label">Phone Number</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" id="edit_tenant_phonenumber" class="form-control" placeholder="Please Input Your Phone Number">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label> Tenant Type</label>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio1" value="umkm" name="tenanttype" class="custom-control-input">
                                <label class="custom-control-label" for="customRadio1">UMKM</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio2" value="official" name="tenanttype" class="custom-control-input">
                                <label class="custom-control-label" for="customRadio2">Official Store</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label class="form-label">Address</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_tenant_address" class="form-control" placeholder="Please Input Your Tenant Address">
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <label class="form-label">Sub District</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_tenant_sub_district" class="form-control" placeholder="Please Input Your Sub District">
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <label class="form-label">Code Sub District</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_tenant_code_sub_district" class="form-control" placeholder="Please Input Your Sub District">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row">
                    <div class="col-4">
                        <label class="form-label">Province</label>
                        <select class="custom-select operator" name="edit_province" id="edit_province">
                            <option disabled selected>Choose Province ...</option>
                            
                        </select>
                    </div>
                    <div class="col-4">
                        <label class="form-label">City</label>
                        <select class="custom-select" id="edit_city">
                            <option value="" selected>Choose City ...</option>
                        </select>
                    </div>

                    <input type="hidden" value="" class="form-control" id="provinsi_name">
                    <input type="hidden" value="" class="form-control" id="city_name">

                    <div class="col-4">
                        <label class="form-label">Postal Code</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" readonly id="postalcode" class="form-control" placeholder="Postal Code" />
                            </div>
                        </div>
                    </div>
                </div> -->
                    <!-- <div class="row">
                    <div class="col-12">
                        <label class="form-label">Maps</label>
                        <div class="form-group">
                            <div id="map" style="width: 100%; height: 300px; z-index:1"></div>
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">CLOSE</button>
                <button type="button" onclick="updateTenant()" class="btn btn-primary">Update Tenant</button>
            </div>
            </form>
        </div>
    </div>
</div>