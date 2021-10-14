<!-- Modal Edit User -->
<div class="modal fade" id="edituser" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit User</h4>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-4">
                            <label class="form-label">User UID</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" readonly id="edit_user_uid" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <label class="form-label">Full Name</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_user_full_name" class="form-control" placeholder="Please Input Full Name User">
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <label class="form-label">Phone Number</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" id="edit_user_phonenumber" class="form-control" placeholder="Please Input Phone Number User">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label> Role Type</label>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio1" value="basic" name="roletype" class="custom-control-input">
                                <label class="custom-control-label" for="customRadio1">Basic</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio2" value="seller" name="roletype" class="custom-control-input">
                                <label class="custom-control-label" for="customRadio2">Seller</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <label> Gender</label>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio11" value="Male" name="gendertype" class="custom-control-input">
                                <label class="custom-control-label" for="customRadio11">Male</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio12" value="Female" name="gendertype" class="custom-control-input">
                                <label class="custom-control-label" for="customRadio12">Female</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label class="form-label">Email</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_user_email" class="form-control" placeholder="Please Input Email User">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Identity Number</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="edit_user_identity_number" class="form-control" placeholder="Please Input Identity Number User">
                                </div>
                            </div>
                        </div>

                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">CLOSE</button>
                <button type="button" onclick="updateUser()" class="btn btn-primary">Update User</button>
            </div>
            </form>
        </div>
    </div>
</div>