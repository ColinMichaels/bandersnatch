@if(count($media_files))
    @foreach($media_files as $media)
        <div class="row row-pad-bottom">
            <div class="col-sm-12">
                <div class="form-group-sm">
                    {{--{!! Form::text('name', $media->name,['class' => 'form-control']) !!}--}}
                    @if(str_contains($media->mime_type,'image'))
                        <a href="{{$media->getUrl()}}" class="colorbox" rel="gallery" title="{{$media->name}}" v-tippy><img class="img-responsive"
                                                                                                                            src="{{$media->getUrl()}}" /></a>
                    @elseif(str_contains($media->mime_type,'application'))
                        <a href="{{$media->getUrl()}}"  title="{{$media->name}}" download v-tippy>
                            @if(str_contains($media->mime_type, 'pdf'))
                                <i class="fas fa-3x fa-file-pdf text-danger"></i>
                            @else
                                <i class="fas fa-3x fa-file"></i>
                            @endif
                        </a>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
@endif
