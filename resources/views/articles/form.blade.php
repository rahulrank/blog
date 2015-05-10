      <div class="form-group">
          {!! Form::label('title', 'Title:') !!}
          {!! Form::text('title', null, array('class' => 'form-control', 'required' => 'required')) !!}
          <small class="text-danger">{{ $errors->first('title') }}</small>
      </div>

      <div class="form-group">
          {!! Form::label('body', 'Body:') !!}
          {!! Form::textarea('body', null, array('class' => 'form-control', 'required' => 'required')) !!}
          <small class="text-danger">{{ $errors->first('body') }}</small>
      </div>

      <div class="form-group">
          {!! Form::label('published_at', 'Publish On:') !!}
          {!! Form::input('date','published_at', $article->published_at, array('class' => 'form-control', 'required' => 'required')) !!}
          <small class="text-danger">{{ $errors->first('published_at') }}</small>
      </div>

      <div class="form-group">
          {!! Form::label('tag_list', 'Tags:') !!}
          {!! Form::select('tag_list[]', $tags, null, ['id' => 'tag_list', 'class' => 'form-control', 'multiple']) !!}
          <small class="text-danger">{{ $errors->first('tag_list') }}</small>
      </div>

      {!! Form::submit($buttonText, array('class' => 'btn btn-info pull-right')) !!}

      @section('footer')
        <script>
           $('#tag_list').select2({
            placeholder: 'Choose a tag'
           });
        </script>
      @endsection