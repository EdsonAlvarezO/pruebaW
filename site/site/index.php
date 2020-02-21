<?php
require_once './shared/header.php';
require_once './shared/db.php';
require_once './shared/sessions.php';
?>
<section class="section">
    <div class="container">
        <h1 class="title">
            Login
        </h1>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $errors = '';
        $results = $con->runQuery('SELECT * FROM users WHERE email = $1 and password = md5($2)', [$email, $password]);
        if ($results) {
            $_SESSION['user_id'] = $results[0]['id'];
            $_SESSION['user_email'] = $results[0]['email'];
            header('Location: /page_1.php');
            exit();
        } elseif ($email != '' || $password != '') {
            $errors = 'invalid email or password';
        }
    }
 ?>

       <form method="POST" >
        <div class="hero-body">
          <div class="container">
            <div class="columns is-centered">
              <div class="column is-5-tablet is-4-desktop is-3-widescreen">
                <form action="" class="box">
                  <div class="field">
                    <label for="" class="label">Email</label>
                    <div class="control has-icons-left">
                      <input type="email" name="email" class="input" value="<?= $email ?? '' ?>" required>
                      <span class="icon is-small is-left">
                        <i class="fa fa-envelope"></i>
                      </span>
                    </div>
                  </div>
                  <div class="field">
                    <label for="" class="label">Password</label>
                    <div class="control has-icons-left">
                      <input type="password" class="input" name="password" value="" required>
                      <span class="icon is-small is-left">
                        <i class="fa fa-lock"></i>
                      </span>
                    </div>
                  </div>
                  <div class="field">
                    <button class="button is-success">
                      Login
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
</section>
<?php require_once './shared/footer.php' ?>

