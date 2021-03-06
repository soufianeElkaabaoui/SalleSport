<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<form class="form-horizontal" method="POST" action="/edituser">
    {{method_field('PUT')}} {{-- pour que ça soit le type de requête PUT. --}}
    @csrf {{-- pour la sécurité. --}}
<fieldset>

<!-- Form Name -->
<legend>modifier utilisateur</legend>

<input type="hidden" name="id" value="{{$user->id}}">
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Nom">Nom:</label>
  <div class="col-md-4">
  <input id="Nom" name="LName" value="{{$user->nom}}" placeholder="Nom d'utilisateur" class="form-control input-md" required="" type="text">

  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Prenom">Prenom:</label>
  <div class="col-md-4">
  <input id="Prenom" name="FName" value="{{$user->prenom}}" placeholder="Prenom d'utilisateur" class="form-control input-md" required="" type="text">

  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Email">Email</label>
  <div class="col-md-4">
    <input id="Email" name="Email" value="{{$user->email}}" placeholder="Email" class="form-control input-md" required="" type="text">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Password">Password</label>
  <div class="col-md-4">
  <input id="Password" name="Password" value="{{$user->password}}" placeholder="Password" class="form-control input-md" required="" type="text">

  </div>
</div>

<!-- Button -->
<div class="form-group">
    <label class="col-md-4 control-label" for="modifier">Modifier</label>
    <div class="col-md-4">
      <button id="modifier" name="modifier" class="btn btn-primary">Modifier utilisateur</button>
    </div>
</div>

</fieldset>
</form>
