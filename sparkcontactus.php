<?php include "header.php"; ?>


<div class="page-title">

  <div class="heading">

    <div class="container">

      <div class="row d-flex justify-content-center text-center">

        <div class="col-lg-10">

          <h1>Contact US</h1>

        </div>

      </div>

    </div>

  </div>

  <nav class="breadcrumbs">

    <div class="container">

      <ol>

        <li><a href="../index.php">Home</a></li>

        <li class="current">Contact US</li>

      </ol>

    </div>

  </nav>

</div>
<section id="team" class="team section">

<div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center" >
  <div class="row w-100 justify-content-center">
    <div class="col-md-5 col-lg-4">

      <div class="card shadow border-0">
        <div class="card-body p-4">
        <?php session_start(); ?>

        <?php if (!empty($_GET['s'])){?>
            <div style="color: green; font-weight: bold;">
               Your details have been submitted successfully!
            </div>
           
        <?php } ?>

      

          <h4 class="mb-2">Contact Us</h4>
          <p class="text-muted small mb-3">
            Fields marked with <span class="text-danger">*</span> are required
          </p>

          <form class="needs-validation" novalidate method="POST" action="contact_submit.php">

            <!-- Full Name -->
            <div class="mb-3">
              <label class="form-label">Full Name <span class="text-danger">*</span></label>
              <input type="text" class="form-control" required minlength="3" name="full_name" maxlength="30" placeholder="Enter your full name">
              <div class="invalid-feedback">
                Please enter at least 3 characters.
              </div>
            </div>

            <!-- Mobile -->
            <div class="mb-3">
                <label class="form-label">Mobile Number <span class="text-danger">*</span></label>
                <input type="text"
                      class="form-control"
                      required
                      inputmode="numeric"
                      maxlength="10"
                      pattern="[0-9]{10}"
                      placeholder="10 digit mobile number"
                      oninput="this.value=this.value.replace(/[^0-9]/g,'')" name="mobile">
                <div class="invalid-feedback">
                  Please enter a valid 10-digit mobile number.
                </div>
              </div>


            <!-- Email -->
            <div class="mb-3">
              <label class="form-label">Email <span class="text-danger">*</span></label>
              <input type="email" class="form-control" maxlength="30" required placeholder="example@email.com" name="email">
              <div class="invalid-feedback">
                Please enter a valid email address.
              </div>
            </div>

            <!-- City / State -->
            <div class="mb-3">
              <label class="form-label">City / State <span class="text-danger">*</span></label>
              <input type="text" class="form-control" required minlength="2" maxlength="30" placeholder="City or State" name="city_state">
              <div class="invalid-feedback">
                Please enter your city or state.
              </div>
            </div>

            <!-- Checkbox -->
            <div class="form-check mb-3">
              <input class="form-check-input" type="checkbox" id="agree" required>
              <label class="form-check-label small" for="agree">
                I agree and authorise to call/send SMS/WhatsApp/RCS/Promotional/Informational messages/notifications.
              </label>
              <div class="invalid-feedback">
                You must agree before submitting.
              </div>
            </div>

            <!-- Submit -->
            <button type="submit" class="btn btn-primary w-100 fw-bold .school-login-bg">
              Submit
            </button>

          </form>

        </div>
      </div>

    </div>
  </div>
</div>
</section>
<!-- Bootstrap Validation Script -->
<script>
(() => {
  'use strict'
  const forms = document.querySelectorAll('.needs-validation')

  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }
      form.classList.add('was-validated')
    }, false)
  })
})()
</script>

<?php include "footer.php"; ?>
