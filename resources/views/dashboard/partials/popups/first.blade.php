<div class="login-popup">
  <div class="login-popup-content">
    <form action="/doika/save-login" method="post" class="form">
      <h2>Абавязкова ўвядзіце бяспечны пароль і імя адміна</h2>
      
      <div class="row">
        <div class="input">
          <label for="conf-login" class="conf-title">Лагін</label>
          <input type="text" placeholder="Login" id="conf-login" name="login" class="input__input" value="{{ isset($login) ? $login : '' }}">
        </div>				
      </div>
      <div class="row">
        <div class="input">
          <label for="conf-password" class="conf-title">Пароль</label>
          <input type="password" id="conf-password" name="password" class="input__input" value="{{ isset($password) ? $password : '' }}">
        </div>
        <div class="input">
          <label for="conf-password-confirm" class="conf-title">Падцвержанне паролю</label>
          <input type="password" id="conf-password-confirm" name="conf-password-confirm" class="input__input" value="{{ isset($password_confirm) ? $password_confirm : '' }}">
        </div>				
      </div>
      <button class="submit-button main-buttons__create-campaign">Захаваць</button>
    </form>
  </div>
</div>
