@extends('admin.layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-2 tabs-item">
            <!-- Nav tabs -->
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <button class="nav-link {{($level=='basic')? ' active':''}}" id="v-pills-basic-tab" data-bs-toggle="pill" data-bs-target="#v-pills-basic" type="button" role="tab" aria-controls="v-pills-basic" aria-selected="true">Basic</button>
                <button class="nav-link {{($level=='artwork')? ' active':''}}" id="v-pills-artwork-tab" data-bs-toggle="pill" data-bs-target="#v-pills-artwork" type="button" role="tab" aria-controls="v-pills-artwork" aria-selected="false">Artwork</button>
                <button class="nav-link {{($level=='uploadtrack')? ' active':''}}" id="v-pills-uploadtrack-tab" data-bs-toggle="pill" data-bs-target="#v-pills-uploadtrack" type="button" role="tab" aria-controls="v-pills-uploadtrack" aria-selected="false">Upload Track</button>
                <button class="nav-link {{($level=='edittrack')? ' active':''}}" id="v-pills-edittrack-tab" data-bs-toggle="pill" data-bs-target="#v-pills-edittrack" type="button" role="tab" aria-controls="v-pills-edittrack" aria-selected="false">Edit Track</button>
            </div>
        </div>
        <div class="col-md-10">
            <!-- Display validation errors -->
           @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- Tab panes -->
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade  {{($level=='basic')? ' show active':''}}" id="v-pills-basic" role="tabpanel" aria-labelledby="v-pills-basic-tab">
                   
                    <h5>Complete Release Basic Information</h5>
                    <form action="{{route('releases.basic.save')}}" method="POST">
                        @csrf
                       <div class="mb-3">
                            <label for="upc" class="form-label">UPC</label>
                            <input type="text" class="form-control" id="upc" name="upc" value="{{ old('upc', $release->upc ?? '') }}">
                            <input type="hidden" name ="release_id" value="{{$release->id}}">
                        </div>
                        <div class="mb-3">
                            <label for="release_code" class="form-label">Release Code</label>
                            <input type="text" class="form-control" id="release_code" name="release_code" value="{{ old('release_code', $release->release_code ?? '') }}">
                        </div>
                        <div class="mb-3">
                            <label for="release_code" class="form-label">Meta Language</label>
                            <select class="form-select" id="meta_language" name="meta_language">
                                <option value="">Select Language</option>
                                <option value="Hindi" {{ old('meta_language', $release->meta_language) == 'Hindi' ? 'selected' : '' }}   >Hindi</option>
                                <option value="English" {{ old('meta_language', $release->meta_language) == 'English' ? 'selected' : '' }}  >English</option>
                                <option value="Bhojpuri" {{ old('meta_language', $release->meta_language) == 'Bhojpuri' ? 'selected' : '' }}    >Bhojpuri</option>
                            </select>
                        </div>

                         <div class="mb-3">
                            <label for="release_name" class="form-label">Release Name</label>
                            <input type="text" class="form-control" id="release_name" name="release_name"  value="{{ old('release_name', $release->release_name ?? '') }}">
                        </div>

                        <div class="mb-3">
                            <label for="release_version" class="form-label">Release Version</label>
                            <input type="text" class="form-control" id="release_version" name="release_version"   value="{{ old('release_version', $release->release_version ?? '') }}">
                        </div>
                        <div class="mb-3">
                            <label for="release_name_displayed_as" class="form-label">Release Name Displayed As</label>
                            <input type="text" class="form-control" id="release_name_displayed_as" name="release_name_displayed_as"  value="{{$release->release_name.'('.$release->release_version.')'}}">
                        </div>
                        <h5>Artist & Contributor</h5>
                        <div class="mb-3">
                            <label for="primary_artist_basic" class="form-label">Primary Artist</label>
                            <input type="text" class="form-control" id="primary_artist_basic" name="primary_artist_basic"  value="{{ old('primary_artist_basic', $release->primary_artist ?? '') }}">
                            <div>Suggestions and create new</div>
                        </div>
                        <div class="mb-3">
                            <label for="featuring_artist_basic" class="form-label"> Featuring Artist</label>
                            <input type="text" class="form-control" id="featuring_artist_basic" name="featuring_artist_basic"   value="{{ old('featuring_artist_basic', $release->featuring_artist ?? '') }}">
                        </div>
                        <div class="mb-3">
                            <label for="remixer_artist_basic" class="form-label">Remixer</label>
                            <input type="text" class="form-control" id="featuring_artist_basic" name="featuring_artist_basic"  value="{{ old('featuring_artist_basic', $release->featuring_artist_basic ?? '') }}">
                        </div>
                        <div class="mb-3">
                            <label for="producer_artist_basic" class="form-label">Producer</label>
                            <input type="text" class="form-control" id="producer_artist_basic" name="producer_artist_basic"  value="{{ old('producer_artist_basic', $release->producer_artist ?? '') }}">
                        </div>
                        <h5>Release Details</h5>
                        <div class="mb-3">
                            <label for="genre" class="form-label">Genre*</label>
                            <select class="form-select" id="genre" name="genre">
                                <option value=''>Select Genre</option>
                                <option value='pop' {{ old('genre', $release->genre ) == 'pop' ? 'selected' : '' }}>Pop</option>
                                <!-- Add additional genres as needed -->
                            </select>


                        </div>
                        <div class="mb-3">
                            <label for="sub_genre" class="form-label">Sub Genre</label>
                            <select class="form-select" id="sub_genre" name="sub_genre">
                                <option value=''>Select Sub Genre</option>
                                <option value="pop"  {{ old('sub_genre', $release->sub_genre ) == 'pop' ? 'selected' : '' }}  >  Pop  </option>
                            </select>
                        </div>
                                 
                        <div class="mb-3">
                            <label for="format" class="form-label">Format</label>
                            <select class="form-select" id="format" name="format">
                                <option value="">Select Format</option>
                                <option value="single" {{ old('format', $release->format) == 'single' ? 'selected' : '' }}>Single</option>
                                <option value="ep" {{ old('format', $release->format) == 'ep' ? 'selected' : '' }}>EP</option>
                                <option value="album" {{ old('format', $release->format) == 'album' ? 'selected' : '' }}>Album</option>
                            </select>

                        </div>
                        <div class="mb-3">
                            <label for="cname_basic" class="form-label">C Name</label>
                            <input type="text" class="form-control" id="cname_basic" name="cname_basic" placeholder="Year with Company Name" value="{{ old('cname_basic' , $release->cname ?? '') }}">
                        </div>
                        <div class="mb-3">
                            <label for="pname_basic" class="form-label">P Name</label>
                            <input type="text" class="form-control" id="pname_basic" name="pname_basic" placeholder="Year with Company Name" value="{{ old('pname_basic' , $release->pname ?? '')}}">
                        </div> 

                        <h5>Release Date info</h5> 
                            <div class="mb-3">
                                <label for="original_release_date" class="form-label">Original Release Date*</label>
                                <input type="date" class="form-control" name="original_release_date" value="{{ old('original_release_date') , $release->original_release_date ?? ''}}"/>
                                <label for="sales_date" class="form-label" >Sales Date*</label>
                                <input type="date" class="form-control" name="sales_date" value="{{ old('sales_date') , $release->sales_date ?? ''}}" />
                            </div>
                        <button type="submit" class="btn btn-primary">Save & Next</button>
                   </form>
                </div>

                <div class="tab-pane fade  {{($level=='artwork')? ' show active':''}}" id="v-pills-artwork" role="tabpanel" aria-labelledby="v-pills-artwork-tab">
                    <h3>Artwork</h3>
                    <form action="{{route('releases.artwork.save')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class ="row">
                            <div class=" col-5 mb-3">
                                <label for="thumbnail" class="form-label">Upload Your Artwork</label>
                                <input type="file" class="form-control" id="thumbnail" name="thumbnail" />
                                <input type="hidden" name ="release_id" value="{{$release->id}}">
                            </div>
                            <div class="col-7 artwork-instruction">
                                <p><b>Your Image Must Be :</b></p>
                                <p>TIF or JPG gormat</p>
                                <p>Square</p>
                                <p>Minimum size: 3000 x 3000 pixels.</p>
                                <p>Maximum size: 6000 x 6000 pixels.</p>
                                <p>RGB format</p>
                                <p>Opaque</p>
                                <p>If you are scanning a CD, remove product sticker and crop marks</p>

                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save & Next</button>
                    </form>
                </div>
           
                <div class="tab-pane fade {{($level=='uploadtrack')? ' show active':''}}" id="v-pills-uploadtrack" role="tabpanel" aria-labelledby="v-pills-uploadtrack-tab">
                     <h5>Upload Tracks</h5>
                     <form action="{{route('releases.uploadTrack.save')}}" method="POST" enctype="multipart/form-data">
                            @csrf  
                            <div class="mb-3">
                                <label for="tracks" class="form-label">Upload from Computer</label>
                                <input type="file" class="form-control" id="tracks" name="track_paths[]" multiple />
                                <input type="hidden" name ="release_id" value="{{$release->id}}">
                            </div>   
                            <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                 </div>

                 <div class="tab-pane fade {{($level=='edittrack')? ' show active':''}}" id="v-pills-edittrack" role="tabpanel"        aria-labelledby="v-pills-edittrack-tab">
                        <h5>Edit Tracks</h5>
                        <form action="{{ route('releases.editTrack.save') }}" method="POST" enctype="multipart/form-data">
                        @csrf  
                        <input type="hidden" name ="release_id" value="{{$release->id}}">
                            <div class="row">
                                <div class="col-6">
                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        @foreach($tracks as $index => $track)
                                        <button class="nav-link {{ ($index == 0) ? 'active' : '' }}" id="v-pills-track{{ $index }}-tab" data-bs-toggle="pill" data-bs-target="#v-pills-track{{ $index }}" type="button" role="tab" aria-controls="v-pills-track{{ $index }}" aria-selected="{{ ($index == 0) ? 'true' : 'false' }}">
                                           <span>{{$index+1}}</span> {{ basename($track->track_path) }}
                                            <span class="track-duration">{{ $track->track_duration }}</span>
                                        </button>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="tab-content" id="v-pills-tabContent">
                                        @foreach($tracks as $index => $track)
                                        <div class="tab-pane fade {{ ($index == 0) ? 'show active' : '' }}" id="v-pills-track{{ $index }}" role="tabpanel" aria-labelledby="v-pills-track{{ $index }}-tab">
                                               <h4>Track Info {{ $index+1}}</h4>
                                                <input type="hidden" name="track_id[]" value="{{$track->id}}" />
                                                 <div class="mb-3">
                                                    <label for="track_name{{ $index }}" class="form-label">Track Name</label>
                                                    <input type="text" class="form-control" id="track_name{{ $index }}" name="track_name[]" value="{{ pathinfo(basename($track->track_path), PATHINFO_FILENAME) }}">
                                                </div> 
                                                <div class="mb-3">
                                                    <label for="track_version{{ $index }}" class="form-label">Version</label>
                                                    <button type="button" class="apply_click click_btn">Apply Now</button>
                                                    <input type="text" class="form-control input-track_version" data-name="track_version" id="track_version{{ $index }}" name="track_version[]" value="{{ old('track_version.'.$index)  }}">
                                                </div>   
                                                <div class="mb-3">
                                                    <label for="lyrics_language" class="form-label">Lyrics Language</label>
                                                    <button type="button" class="apply_click click_btn">Apply Now</button>
                                                    <input type="text" class="form-control input-lyrics_language" data-name="lyrics_language" id="lyrics_language{{ $index }}" name="lyrics_language[]" value="{{ old('lyrics_language.'.$index) }}">
                                                </div>
                                                 <div class="mb-3 wrap-field">
                                                    <label for="explicit_content"  class="form-label">Explicit Content</label>
                                                    <button type="button" class="apply_radio_click click_btn" >Apply Now</button>
                                                    <input type="radio" id="explicit_content_none_{{ $index }}" class="input-explicit" name="explicit_content[{{ $index }}]" value="none" {{ old('explicit_content.'.$index) == 'none' ? 'checked' : '' }}>
                                                    <label for="explicit_content_none_{{ $index }}">None</label>

                                                    <input type="radio" id="explicit_content_explicit_{{ $index }}" class="input-explicit"  name="explicit_content[{{ $index }}]" value="explicit"  {{ old('explicit_content.'.$index) == 'explicit' ? 'checked' : '' }}>
                                                    <label for="explicit_content_explicit_{{ $index }}">Explicit</label>

                                                    <input type="radio" id="explicit_content_clean_{{ $index }}"class="input-explicit"  name="explicit_content[{{ $index }}]" value="clean" {{ old('explicit_content.'.$index) == 'clean' ? 'checked' : '' }}>
                                                    <label for="explicit_content_clean_{{ $index }}">Clean</label>

                                                </div>   
                                                <h5>Contributor</h5>
                                                <div class="mb-3">
                                                     <label for="primary_artist"  class="form-label">Primary Artist</label>
                                                     <button type="button" class="apply_click click_btn">Apply Now</button>
                                                     <input type="text" class="form-control input-primary_artist" data-name="primary_artist" id="primary_artist{{ $index }}" name="primary_artist[]" value ="{{old('primary_artist.'.$index)}}"  >
                                                </div>
                                                <div class="mb-3">
                                                     <label for="featuring_artist"  class="form-label">Featuring Artist</label>
                                                     <button type="button" class="apply_click click_btn">Apply Now</button>
                                                     <input type="text" class="form-control input-featuring_artist" data-name="featuring_artist" id="featuring_artist{{ $index }}" name="featuring_artist[]"  value ="{{old('featuring_artist.'.$index)}}" >
                                                </div>
                                                <div class="mb-3">
                                                     <label for="track_remixer"  class="form-label">Remixer</label>
                                                     <button type="button" class="apply_click click_btn">Apply Now</button>
                                                     <input type="text" class="form-control input-track_remixer" data-name="track_remixer" id="track_remixer{{ $index }}" name="track_remixer[]"   value ="{{old('track_remixer.'.$index)}}" >
                                                </div>
                                                <div class="mb-3">
                                                     <label for="song_writer"  class="form-label">Song Writer</label>
                                                     <button type="button" class="apply_click click_btn">Apply Now</button>
                                                     <input type="text" class="form-control input-song_writer" data-name="song_writer" id="song_writer{{ $index }}" name="song_writer[]" value ="{{old('song_writer.'.$index)}}">
                                                </div>
                                                <div class="mb-3">
                                                     <label for="track_producer"  class="form-label">Producer</label>
                                                     <button type="button" class="apply_click click_btn">Apply Now</button>
                                                     <input type="text" class="form-control input-track_producer" data-name="track_producer" id="track_producer{{ $index }}" name="track_producer[]"  value ="{{old('track_producer.'.$index)}}" >
                                                </div>
                                                <h5>Composer</h5>
                                                <div class="mb-3">
                                                     <label for="composer_name"  class="form-label">Composer Name</label>
                                                     <button type="button" class="apply_click click_btn">Apply Now</button>
                                                     <input type="text" class="form-control input-composer_name" data-name="composer_name" id="composer_name{{ $index }}" name="composer_name[]"  value ="{{old('composer_name.'.$index)}}" >
                                                </div>
                                                <div class="mb-3">
                                                     <label for="label_name"  class="form-label">Label Name</label>
                                                     <button type="button" class="apply_click click_btn">Apply Now</button>
                                                     <input type="text" class="form-control input-label_name" data-name="label_name" id="label_name{{ $index }}" name="label_name[]"  value ="{{old('label_name.'.$index)}}" >
                                                </div>
                                                <div class="mb-3">
                                                     <label for="isrc"  class="form-label">ISRC </label>
                                                     <button type="button" class="apply_click click_btn">Apply Now</button>
                                                     <input type="text" class="form-control input-isrc" data-name="isrc" id="isrc{{ $index }}" name="isrc[]"  value ="{{old('isrc.'.$index)}}" >
                                                </div>

                                                <div class="mb-3 wrap-field">
                                                     <label for="primary_performers"  class="form-label">Primary Performers </label>
                                                          <input type="checkbox" class="input-primary_performers" data-name="primary_performers" id="primary_performers{{$index}}" name="primary_performers[]" {{ old('primary_performers.'.$index) ? 'checked' : '' }}>
                                                     <button type="button" class="apply_checkbox_click click_btn">Apply Now</button>
                                                
                                                </div>
                                                <h5>Master Right</h5>
                                                <div class="mb-3">
                                                     <label for="pname"  class="form-label">Publisher Name </label>
                                                     <button type="button" class="apply_click click_btn">Apply Now</button>
                                                     <input type="text" name="pname[]"  class="form-control input-pname" data-name="pname"  id="pname{{ $index }}" value="{{old('pname.'.$index)}}" />
                                                </div>
                                                <div class="mb-3">
                                                     <label for="cname"  class="form-label">C Name </label>
                                                     <button type="button" class="apply_click click_btn">Apply Now</button>
                                                     <input type="text" name="cname[]" class="form-control input-cname" data-name="cname" id="cname{{ $index }}" value="{{old('cname.'.$index)}}"  />
                                                </div>
                                                <div class="mb-3 wrap-field">
                                                     <label for="ownership_for_sound_rec"  class="form-label">Ownership for the sound recording </label>
                                                     <button type="button" class="apply_select_click click_btn">Apply Now</button>
                                                     <select name="ownership_for_sound_rec[]" class="form-control input-ownership_for_sound_rec" data-name="ownership_for_sound_rec" id="ownership_for_sound_rec{{ $index }}">
                                                        <option value="I am the owner" {{ old('ownership_for_sound_rec.'.$index) == 'I am the owner' ? 'selected' : '' }}>I am the owner</option>
                                                        <option value="I am the manager" {{ old('ownership_for_sound_rec.'.$index) == 'I am the manager' ? 'selected' : '' }}>I am the manager</option>
                                                    </select>

                                                </div>
                                                <div class="mb-3">
                                                     <label for="country_of_rec"  class="form-label">Country of recording </label>
                                                     <button type="button" class="apply_click click_btn">Apply Now</button>
                                                     <input type="text" class="form-control input-country_of_rec" data-name="country_of_rec"  id="country_of_rec{{ $index }}" name="country_of_rec[]" value="{{old('country_of_rec.'.$index)}}" />
                                                </div>
                                                <div class="mb-3">
                                                     <label for="nationality" class="form-label">Nationality of original copyright owner </label>
                                                     <button type="button" class="apply_click click_btn">Apply Now</button>
                                                     <input type="text" name="nationality[]"  class="form-control input-nationality" data-name="nationality"  id="nationality{{ $index }}"   value="{{old('nationality.'.$index)}}" />
                                                </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Save Release</button>
                        </form>
                      
                 </div>
   
        </div>
    </div>
</div>


@endsection

