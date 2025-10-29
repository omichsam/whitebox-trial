<div class="modal fade" id="loginmodal" tabindex="-1" role="dialog" aria-labelledby="loginmodalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginmodalLabel">Login to WhiteBox</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="login-notification"></div>

                <form id="login-form" class="needs-validation" novalidate>
                    <div class="form-group">
                        <label for="login-email">Email address</label>
                        <input type="email" class="form-control" id="login-email" required>
                        <div class="invalid-feedback">
                            Please provide a valid email.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="login-password">Password</label>
                        <input type="password" class="form-control" id="login-password" required>
                        <div class="invalid-feedback">
                            Please provide your password.
                        </div>
                    </div>

                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="remember-me">
                        <label class="form-check-label" for="remember-me">Remember me</label>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </form>

                <div class="text-center mt-3">
                    <a href="#" id="forgot-password-link">Forgot password?</a>
                </div>

                <hr>

                <div class="text-center">
                    <p>Don't have an account? <a href="#" id="show-register">Sign up</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Registration Modal -->
<div class="modal fade" id="registermodal" tabindex="-1" role="dialog" aria-labelledby="registermodalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registermodalLabel">Create Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="register-notification"></div>

                <form id="register-form" class="needs-validation" novalidate>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="first-name">First name</label>
                            <input type="text" class="form-control" id="first-name" required>
                            <div class="invalid-feedback">
                                Please provide your first name.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="last-name">Last name</label>
                            <input type="text" class="form-control" id="last-name" required>
                            <div class="invalid-feedback">
                                Please provide your last name.
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="register-email">Email address</label>
                        <input type="email" class="form-control" id="register-email" required>
                        <div class="invalid-feedback">
                            Please provide a valid email.
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone number</label>
                        <input type="tel" class="form-control" id="phone" required>
                        <div class="invalid-feedback">
                            Please provide your phone number.
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="register-password">Password</label>
                            <input type="password" class="form-control" id="register-password" required>
                            <div class="invalid-feedback">
                                Please provide a password.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="confirm-password">Confirm Password</label>
                            <input type="password" class="form-control" id="confirm-password" required>
                            <div class="invalid-feedback">
                                Passwords must match.
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="terms" required>
                            <label class="form-check-label" for="terms">
                                I agree to the <a href="#" data-toggle="modal" data-target="#termsModal">terms and
                                    conditions</a>
                            </label>
                            <div class="invalid-feedback">
                                You must agree before submitting.
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                </form>

                <hr>

                <div class="text-center">
                    <p>Already have an account? <a href="#" id="show-login">Login</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Terms Modal -->
<div class="modal fade" id="termsModal" tabindex="-1" role="dialog" aria-labelledby="termsModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="termsModalLabel">Terms and Conditions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>1. Introduction</h5>
                <p>These terms and conditions govern your use of the WhiteBox platform...</p>

                <h5>2. Intellectual Property</h5>
                <p>The Participants agree that by submitting their idea, innovation or product to the Whitebox Facility
                    they agree to the following terms and conditions which constitute a legally binding agreement
                    between the Government and the Participants.</p>

                <h5>3. Privacy Policy</h5>
                <p>We respect your privacy and are committed to protecting your personal data...</p>

                <h5>4. User Responsibilities</h5>
                <p>You agree to use the platform only for lawful purposes...</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="accept-terms">I Accept</button>
            </div>
        </div>
    </div>
</div>