<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 </head>
<body>
<div class="container" style="margin: 50px 100px;">
<form method="POST" action="" class="form">
    @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="Name">
        </div>
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="{{ old('email') }}" placeholder="Enter email">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="role_id" id="radioAdmin" value="1">
        <label class="form-check-label" for="radioAdmin">Admin</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="role_id" id="radioTeamlead" value="2">
        <label class="form-check-label" for="radioTeamlead">Teamlead</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="role_id" id="radioBuyer" value="3">
        <label class="form-check-label" for="radioBuyer">Buyer</label>
    </div>
    <div id="fieldTeamName" class="form-group">
        <label for="teamName">Team name</label>
        <input type="text" class="form-control" name="team_name" id="teamName" placeholder="Team name">
    </div>

    <div id="teamSelector" class="form-group">
        <label for="team">Choose team</label>
        <select class="form-control" name="team_id" id="team">
            <option selected="selected" value=""></option>
            @foreach($teams as $team)
            <option value={{$team->id}}>{{$team->name}}</option>
            @endforeach
        </select>
    </div>

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $key=>$error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</body>
<script src='js/register.js'></script>
