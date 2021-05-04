<?php
// prevents this code from being loaded directly in the browser
// or without first setting the necessary object
if(!isset($admin)) {
  redirect_to(url_for('/mushroom-members/admins/index.php'));
}
?>

<dl>
  <dt>First name</dt>
  <dd><input type="text" name="admin[first_name_usr]" value="<?php echo h($admin->first_name_usr); ?>" /></dd>
</dl>

<dl>
  <dt>Last name</dt>
  <dd><input type="text" name="admin[last_name_usr]" value="<?php echo h($admin->last_name_usr); ?>" /></dd>
</dl>

<dl>
  <dt>Email</dt>
  <dd><input type="text" name="admin[email_usr]" value="<?php echo h($admin->email_usr); ?>" /></dd>
</dl>

<dl>
  <dt>Username</dt>
  <dd><input type="text" name="admin[username_usr]" value="<?php echo h($admin->username_usr); ?>" /></dd>
</dl>

<dl>
  <dt>User Level</dt>
  <dd>
    <select name="admin[user_level_usr]" id="user_level">
      <option value="a" <?php if($admin->user_level_usr == 'a'){echo 'selected';} ?>>Admin</option>
      <option value="m" <?php if($admin->user_level_usr == 'm'){echo 'selected';} ?>>Member</option>
    </select>
  </dd>
</dl>

<dl>
  <dt>Password</dt>
  <dd><input type="password" name="admin[password]" value="" /></dd>
</dl>

<dl>
  <dt>Confirm Password</dt>
  <dd><input type="password" name="admin[confirm_password]" value="" /></dd>
</dl>
