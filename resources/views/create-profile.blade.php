@extends('layout/main')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/create-profile.css')}}">
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endsection

@section('content')
<div class="content">
    <div class="card-content">
        <div class="logo">
            <img src="{{ asset('assets/img/logo.png')}}" alt="">
        </div>
        <div class="main-img">
            <img src="{{ asset('assets/img/penguin.png')}}" alt="">
        </div>
        <div class="title-card">
            <div class="title">
                <h1>Hello!</h1>
            </div>
            <div class="sub-title">
                <p>Complete this step, to complete your profile account, which will make it easier to make orders later
                </p>
            </div>
            <div class="warning-alert">
                <iconify-icon icon="material-symbols:info-rounded"></iconify-icon>
                <p>Silahkan isi data diri anda untuk melanjutkan</p>
            </div>
        </div>
    </div>
    <div class="form-content">
        <form action="{{ url('profile') }}" method="POST">
        @csrf
            <div class="title-form">
                <p>Setup Up Your Profile</p>
            </div>
            <div class="subtitle-form">
                <p>Complete this form according to your personal data, to go to the next page</p>
            </div>
            <div class="name">
                <div class="title-name">
                    <p>1. Set Your full name</p>
                </div>
                <div class="input-name">
                    <input type="text" name="firstname" id="firstname" placeholder="First Name" required>
                    <input type="text" name="lastname" id="lastname" placeholder="Last Name" required>
                </div>
            </div>
            <div class="phone-number">
                <div class="title-number">
                    <p>1. Set Your phone number</p>
                </div>
                <div class="input-number">
                    <input type="text" name="phoneNumber" id="phoneNumber" placeholder="Phone Number" maxlength="15" required>
                </div>
            </div>
            <div class="address">
                <div class="title-address">
                    <p>3. Set your Address for delivery purpose</p>
                </div>
                <div class="input-address">
                    <textarea name="Address" id="Address" cols="77" rows="9" placeholder="Address" required></textarea>
                </div>
            </div>
            <div class="profile">
              <div class="title-profile">
                <p>4. Set Your profile photo</p>
              </div>
              <div class="input-profile">
                <div class="title-photo">
                    <p>Select Profile :</p>
                </div>
                <div class="input-photo needsclick dropzone" id="gallery-dropzone"></div>
              </div>
            </div>
            <div class="btn-submit">
              <input type="submit" value="Continue">
            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

<script>
        var uploadedGalleryMap = {}
            Dropzone.options.galleryDropzone = {
                    url: "{{ url('profile/image') }}",
                         maxFilesize: 5, // MB
                         maxFiles: 1,
                         acceptedFiles: '.jpeg,.jpg,.png,.gif',
                         addRemoveLinks: true,
                         headers: {
                           'X-CSRF-TOKEN': "{{ csrf_token() }}"
                         },
                         success: function (file, response) {
                           $('form').append('<input type="hidden" name="gallery[]" value="' + response.name + '">')
                           uploadedGalleryMap[file.name] = response.name
                         },
                         removedfile: function (file) {
                           file.previewElement.remove()
                           var name = ''
                           if (typeof file.file_name !== 'undefined') {
                             name = file.file_name
                           } else {
                             name = uploadedGalleryMap[file.name]
                           }
                           $('form').find('input[name="gallery[]"][value="' + name + '"]').remove()
                         },
                         init: function () {
                     @if(isset($profile) && $profile->gallery)
                           var files =
                             {!! json_encode($profile->gallery) !!}
                               for (var i in files) {
                               var file = files[i]
                               this.options.addedfile.call(this, file)
                               this.options.thumbnail.call(this, file, file.original_url)
                               file.previewElement.classList.add('dz-complete')
                               $('form').append('<input type="hidden" name="gallery[]" value="' + file.file_name + '">')
                             }
                     @endif
                         },
                          error: function (file, response) {
                              if ($.type(response) === 'string') {
                                  var message = response //dropzone sends it's own error messages in string
                              } else {
                                  var message = response.errors.file
                              }
                              file.previewElement.classList.add('dz-error')
                              _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                              _results = []
                              for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                                  node = _ref[_i]
                                  _results.push(node.textContent = message)
                              }
                              return _results
                          }
                     }
</script>
@endsection