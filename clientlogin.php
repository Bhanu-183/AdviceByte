<!DOCTYPE html>
<html>

<head>
  <title>Client Login</title>
  <link rel="stylesheet" href="./clientstyle.css">
</head>


<body>
  <div id="vanta-canvas">
    <div class="wrapper">
      <div class="title-text">
        <div class="title login title-login">Login Form</div>
        <div class="title signup">Signup Form</div>
      </div>
      <div class="form-container">
        <div class="slide-controls">
          <input type="radio" name="slide" id="login" checked>
          <input type="radio" name="slide" id="signup">
          <label for="login" class="slide login">Login</label>
          <label for="signup" class="slide signup">Signup</label>
          <div class="slider-tab">
          </div>
        </div>
        <div class="form-inner">
          <form autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="login" id="form1">
            <div class="field">
              <input type="text" placeholder="Email Address" name="mail" required>
            </div>
            <div class="field">
              <input type="password" placeholder="Password" name="pass" required>
            </div>
            <div class="field btn">
              <div class="btn-layer">
              </div>
              <input type="submit" name="submit_1" value="Login">
            </div>
            <!-- <div class="signup-link">
  Not a member? <a href="">Signup now</a></div> -->
          </form>
          <form autocomplete="off" action="clientreg.php" class="signup" method="POST">
            <table>
              <td>
                <div class="field"><input type="text" name="fname" placeholder="First Name" required></div>
              </td>
              <td>
                <div class="field"> <input type="text" name="lname" placeholder="Last Name" required></div>
              </td>
            </table>
            <div class="field">
              <select id="interest" class="option" name="fld">
                    <option value="" disabled selected>Field of Interest</option>
                    <option value="Artificial Intelligence">Artificial Intelligence</option>
                    <option value="Cloud Computing">Cloud Computing</option>
                    <option value="Data Science">Data Science</option>
                    <option value="Game Development">Game Development</option>
                    <option value="Software Testing">Software Testing</option>
                    <option value="Software Engineering">Software Engineering</option>
                    <option value="Web Development">Web Development</option>
                    
                  </select>
            </div>
            <div class="field">
              <input type="text" name="mailid" placeholder="Email Address" required>
            </div>
            <div class="field">
              <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="field">
              <input type="password" placeholder="Confirm password" name="repassword" required>
            </div>
            <input type="checkbox" name="terms" id="terms" onchange="activateButton(this)"> <a href="#"
              style="color: rgb(248, 245, 245); text-decoration: none;">I Agree Terms &
              Conditions</a>
            <div class="field btn">
              <div class="btn-layer">
              </div>
              <input type="submit" name="submit_2" value="Signup">
            </div>

          </form>
        </div>
      </div>
    </div>
    <script>
      const loginText = document.querySelector(".title-text .login");
      const loginForm = document.querySelector("form.login");
      const loginBtn = document.querySelector("label.login");
      const signupBtn = document.querySelector("label.signup");
      const signupLink = document.querySelector("form .signup-link a");
      signupBtn.onclick = (() => {
        loginForm.style.marginLeft = "-50%";
        loginText.style.marginLeft = "-50%";
      });
      loginBtn.onclick = (() => {
        loginForm.style.marginLeft = "0%";
        loginText.style.marginLeft = "0%";
      });
      signupLink.onclick = (() => {
        signupBtn.click();
        return false;
      });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r120/three.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vanta/0.5.19/vanta.halo.min.js"></script>
    <script type="text/javascript">
      VANTA.HALO
        ({
          el: "#vanta-canvas",
          mouseControls: true,
          touchControls: true,
          gyroControls: true,
          minHeight: 200.00,
          minWeight: 200.00,
          scale: 1.00,
          scaleMobile: 1.00,
        })
    </script>
</body>

</html>