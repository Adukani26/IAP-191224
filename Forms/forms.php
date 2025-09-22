<?php
class forms{
    public function signup(){
?>
<form method="POST">
  <div class="mb-3">
    <label for="exampleInputName1" class="form-label">Name</label>
    <input type="text" class="form-control" id="exampleInputName1" name="name" aria-describedby="nameHelp">
    <div id="nameHelp" class="form-text"></div>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
  </div>
        <button type='submit' class="btn btn-primary" name='signup'>Sign Up</button><br>
        <a href='signin.php'>Already have an account? Login</a>

</form>

<?php
    }
    public function signin(){
?>

<form method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
  </div>
    <button type='submit' class="btn btn-primary" name='signin'>Sign In</button><br>
    <a href='signup.php'>Don't have an account? Sign Up</a>
</form>
<?php
    }
}