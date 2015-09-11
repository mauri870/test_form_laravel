<body style="text-align: center;">
<h1>Cadastre um novo Post</h1>
@unless($errors->isEmpty())
    <ul>
    @foreach($errors->getMessages() as $error)
        <li>{{ $error[0] }}</li>
    @endforeach
        </ul>
@endunless

@foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(Session::has('alert-' . $msg))
        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
    @endif
@endforeach
{!! Form::open(['url'=>route('form_post')]) !!}
{!! Form::label('title','Titulo') !!}<br>
{!! Form::text('title') !!}<br>

{!! Form::label('author','Autor') !!}<br>
{!! Form::text('author') !!}<br>

{!! Form::label('body','Texto do Post') !!}<br>
{!! Form::textarea('body') !!}<br>


{!! Form::submit('Cadastrar') !!}

{!! Form::close() !!}

</body>

