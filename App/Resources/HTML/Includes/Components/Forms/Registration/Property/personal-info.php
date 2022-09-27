<div class="form-body">
    <form method="POST" id="PropertyRegPersonalInfoForm">
        <div class="row">
            <div class="col-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="firstname" placeholder="Firstname">
                    <label for="floatingLabel">Firstname*</label>
                </div>
            </div>
            <div class="col-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="lastname" placeholder="Lastname">
                    <label for="floatingLabel">Lastname*</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <select type="text" class="form-control" name="gender" placeholder="PhoneNumber">
                        <option>Male</option>
                        <option>Female</option>
                        <option>Other</option>
                    </select>
                    <label for="floatingLabel">Gender*</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="national-id" placeholder="National Id Number">
                    <label for="floatingLabel">National Id
                        Number*</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="phone-number" placeholder="PhoneNumber">
                    <label for="floatingLabel">Phone Number*</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" name="email" placeholder="Email">
                    <label for="floatingLabel">Email*</label>
                </div>
            </div>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="address" placeholder="Address">
            <label for="floatingLabel">Address*</label>
        </div>
        <div class="d-flex">
            <input type="hidden" name="destination"
                value="<?php echo Directories::getLocation("app/controllers/middleware/validation.php") ?>">

            <input type="hidden" name="form" value="<?php echo Functions::encrypt("PropertyRegPersonalInfoForm") ?>">
            <input type="submit" name="submit" value="Go to Next Step &raquo" class="btn btn-danger ms-auto">
        </div>
    </form>
</div>