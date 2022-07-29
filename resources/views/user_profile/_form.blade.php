{!! Form::model($user, ['route' => ['profile.store'],"method"=> 'post', "enctype"=> "multipart/form-data"]) !!}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-group">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('email', 'Email') !!}
    {!! Form::text('email', null, ['class' => 'form-control','disabled' => 'true'] ) !!}
</div>
<div class="form-group">
    {!! Form::label('profile-url', 'Profile Picture') !!}
    <div class="row">
        <div class="col-md-6">
            {!! Form::file('profile_url', null, ['class' => 'form-control']) !!}
        </div>
        <div class="col-md-6">
            <img class="profile-image" src="{{ asset(Auth::user()->profile_url)}}" height="80px" width="80px"/>
        </div>
    </div>
</div>
<div class="form-group">
    {!! Form::label('address', 'Address') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('dbo', 'Date of Birth') !!}
    {!! Form::date('dob', null, ['class' => 'form-control','id'=>'dob']) !!}
</div>
<div class="form-group">
    {!! Form::label('mobile_no', 'Mobile No') !!}
    {!! Form::number('mobile_no', null , ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit("Update", ['class' => 'btn btn-primary']) !!}
    {!! link_to_route("dashboard","Cancel",null,['class' => 'btn btn-danger']) !!}
</div>
{!! Form::close() !!}

<head>
    <script type="text/javascript">
        $("input[name=\"profile_url\"]").change(function (e) {
            $(".profile-image").attr("src", window.URL.createObjectURL(this.files[0]));
        });
    </script>
