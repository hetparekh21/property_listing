@extends('layouts.layout')

{{-- <style>
    .row {
        border-block: 1px solid black;
    }
</style> --}}
@php
    $admin = true;
@endphp

@section('content')
    <div class="card mb-5" style="border-radius: 10px;">
        <img class="card-img-top" src="back_cat.svg"
            style="border-top-left-radius: 10px;border-top-right-radius:10px;height:20vh;object-fit:cover">
        <div class="card-body">

            <form action="{{ route('manage_category') }}" method="POST" enctype="multipart/form-data">
                @csrf

                @if (session()->has('delete'))
                    <span class="text-danger">{{ session('delete') }}</span>
                @endif

                <div class="card-img-overlay text-light">

                    <div class="row d-flex align-items-center">

                        <div class="col-3">
                            <h2>Manage Categories</h2>
                        </div>

                        <div class="col-9">
                            @foreach ($categories as $data)
                                <button type="button" value="{{ $data['category_id'] }}"
                                    class="btn rounded-pill btn-outline-light">{{ $data['category_name'] }}</button>
                            @endforeach
                        </div>

                    </div>

                </div>

                {{-- -------------------------------------------------------------------------------------------------------------------------------------------------------- --}}

                <div class="row mt-4">

                    <div class="col-3">

                        <button type="submit" value="add_category" id="add_category" name="sub"
                            class="btn rounded-pill btn-outline-dark">
                            <span class="tf-icons bx bx-folder-plus"></span>&nbsp; Add Category
                        </button>

                    </div>

                    <div class="col-4">

                        <div class="row mb-2">
                            <label for="mc_category">Choose Category</label>
                        </div>

                        <select class="form-control border-success rounded-pill" style="width:100%" name="mc_category"
                            id="mc_category">
                            <option value="0" selected>Add Category</option>
                            @foreach ($categories as $data)
                                <option value="{{ $data['category_id'] }}">{{ $data['category_name'] }}</option>
                            @endforeach``
                        </select>


                    </div>

                    <div class="col-2">

                        <div class="row mb-2">
                            <label style="visibility: hidden">placeholder</label>
                        </div>

                        <button type="submit" value="edit_category" name="sub" id="edit_category"
                            class="btn rounded-pill btn-outline-dark" disabled>
                            <span class="tf-icons bx bx-edit"></span>&nbsp; Edit
                        </button>

                    </div>

                </div>

                {{-- ----------------------------------------------------------------------------------------------------------------------- --}}

                <div class="row mt-4">

                    <div class="col-3">

                    </div>

                    <div class="col-4">

                        <div class="row">
                            <div class="col">
                                <label for="mc_category_name">Category Name :</label>
                            </div>
                            <div class="col">
                                <input type="text" class="text-center form-control border-success rounded-pill"
                                    name="mc_category_name" id="mc_category_name">

                                @error('mc_category_name')
                                    <span class="text-danger">Category Name Required</span>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="col-3">

                        <button type="submit" name="sub" value="delete_category" id="delete_category"
                            class="btn rounded-pill btn-outline-danger" disabled>
                            <span class="tf-icons bx bx-trash"></span>&nbsp; Delete
                        </button>

                    </div>

                </div>

                {{-- ------------------------------------------------------------------------------------------------------------------------------- --}}

                <div class="row mt-4">

                    <div class="col-3">

                    </div>


                    <div class="row">

                        <div class="col">
                            <label for="mc_category_image">Category Image :</label>
                        </div>

                    </div>

                    <div class="col-3">


                        <div class="custom-file">
                            <input type="file" name="img" class="custom-file-input" id="customFile">
                            <label class="rounded-pill custom-file-label text-primary" for="customFile"><span
                                    class="tf-icons bx bx-cloud-upload"></span>&nbsp; Upload</label>
                            @error('img')
                                <span class="text-danger">Image Required</span>
                            @enderror
                        </div>

                        {{-- data:image/png;base64,{{ chunk_split(base64_encode($data['img'])) }}
                    <img src="" id="cat_img" alt="..."> --}}

                    </div>

                </div>

                {{-- ----------------------------------------------------------------------------------------------------------------------- --}}

                <div class="row mt-4">

                    <div class="col-3">

                    </div>

                    <div class="col-4">

                        <div class="row">
                            <div class="col">
                                <label for="mc_category_tag">#tag :</label>
                            </div>
                            <div class="col">
                                <input type="text" class="text-center form-control border-success rounded-pill"
                                    name="mc_category_tag" id="mc_category_tag">
                            </div>
                        </div>

                    </div>

                    <div class="col-3">

                        <button type="button" onclick="mc_add_tag()" class="btn rounded-pill btn-outline-dark">
                            <span class="tf-icons bx bx-folder-plus"></span>&nbsp; Add #tag
                        </button>

                    </div>

                </div>

                {{-- ---------------------------------------------------------------------------------------------------------------------------- --}}

                <div class="row mt-4">

                    <div class="col-3">

                    </div>

                    <div class="col-9 ">

                        <div class="row">

                            <div class="col-2">

                                <label for="mc_related_tags">Related #tags : </label>
                            </div>

                            <div class="col" id="mc_related_tags">
                                {{-- 
                                <button class="btn border-dark rounded-pill mc-tag" type="button" id="beach"
                                    onclick="mc_tag(this.id)" value="Beach">Beach <span
                                        class="tf-icons bx bx-X"></span></button> --}}

                            </div>

                        </div>

                    </div>

                </div>

                {{-- ---------------------------------------------------------------------------------------------------------------------------- --}}

            </form>

        </div>

    </div>

    {{-- #########################################################################$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$ --}}

    <form action="{{route('manage_property')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card mb-5" style="border-radius: 10px;" id="manage_properties">
            <img class="card-img-top" src="back_prop.svg"
                style="border-top-left-radius: 10px;border-top-right-radius:10px;height:20vh;object-fit:cover">
            <div class="card-body">

                <div class="card-img-overlay text-light">

                    <div class="row d-flex align-items-center">

                        <div class="col-3">
                            <h2>Manage properties</h2>
                        </div>

                        <div class="col-9">
                            @foreach ($categories as $data)
                                <button type="button" value="{{ $data['category_id'] }}"
                                    class="btn rounded-pill btn-outline-light">{{ $data['category_name'] }}</button>
                            @endforeach
                        </div>


                    </div>

                </div>

                {{-- -------------------------------------------------------------------------------------------------------------------------------------------------------- --}}

                <div class="row mt-4">

                    <div class="col-3">

                        <button type="submit" name="sub" value="add_property" id="add_property"
                            class="btn rounded-pill btn-outline-dark">
                            <span class="tf-icons bx bx-folder-plus"></span>&nbsp; Add property
                        </button>

                        <input type="hidden" name="mp_property" value="" id="mp_property">

                    </div>

                    <div class="col-4">

                        <div class="row mb-2">
                            <label for="mp_category">Choose Category</label>
                        </div>

                        <select class="form-control border-success rounded-pill" name="mp_category" style="width:100%"
                            id="mp_category" name="mp_category" id="mc_category">
                            <option value="0" selected>Select Category</option>
                            @foreach ($categories as $data)
                                <option value="{{ $data['category_id'] }}">{{ $data['category_name'] }}
                                </option>
                            @endforeach
                        </select>

                    </div>

                    <div class="col-2">

                        <div class="row mb-2">
                            <label style="visibility: hidden">placeholder</label>
                        </div>

                        <button type="submit" value="edit_property" name="sub" id="mp_edit_property"
                            class="btn rounded-pill btn-outline-dark" disabled>
                            <span class="tf-icons bx bx-edit"></span>&nbsp; Edit
                        </button>

                    </div>

                </div>

                {{-- ----------------------------------------------------------------------------------------------------------------------- --}}

                <div class="row mt-4">

                    <div class="col-3">

                    </div>

                    <div class="col-4">

                        <div class="row">
                            <div class="col">
                                <label for="mp_property_name">property Name :</label>
                            </div>
                            <div class="col">
                                <input type="text" class="text-center form-control border-success rounded-pill"
                                    name="mp_property_name" id="mp_property_name">
                            </div>
                            @error('mp_property_name')
                                <span class="text-danger" >Name Required</span>
                            @enderror
                        </div>

                    </div>

                    <div class="col-3">

                        <button type="submit" name="sub" value="delete_property" id="mp_delete_property"
                            class="btn rounded-pill btn-outline-danger" disabled>
                            <span class="tf-icons bx bx-trash"></span>&nbsp; Delete
                        </button>

                    </div>

                </div>

                {{-- ------------------------------------------------------------------------------------------------------------------------------- --}}

                <div class="row mt-4">

                    <div class="col-3">

                    </div>


                    <div class="row">

                        <div class="col">
                            <label for="mp_property_image">Property Image :</label>
                        </div>

                    </div>

                    <div class="col-3">


                        <div class="custom-file">
                            <input type="file" name="mp_property_image" class="custom-file-input"
                                id="mp_property_image">
                            <label class="rounded-pill custom-file-label text-primary" for="customFile"><span
                                    class="tf-icons bx bx-cloud-upload"></span>&nbsp; Upload</label>
                            @error('mp_img')
                                <span class="text-danger">Image Required</span>
                            @enderror
                        </div>

                        {{-- data:image/png;base64,{{ chunk_split(base64_encode($data['img'])) }}
                <img src="" id="cat_img" alt="..."> --}}

                    </div>

                </div>


                {{-- ----------------------------------------------------------------------------------------------------------------------- --}}

                <div class="row mt-4">

                    <div class="col-3">

                    </div>

                    <div class="col-4">

                        <div class="row">
                            <div class="col">
                                <label for="mp_price">Price :</label>
                            </div>
                            <div class="col">
                                <input type="number" min="0" class="form-control border-success rounded-pill"
                                    name="mp_price" id="mp_price" style="font-weight: bold">
                            </div>
                            @error('mp_price')
                                <span class="text-danger">Price Required</span>
                            @enderror
                        </div>

                    </div>

                </div>

                {{-- ---------------------------------------------------------------------------------------------------------------------------- --}}

                <div class="row mt-4">

                    <div class="col-3">

                    </div>

                    <div class="col-9 ">

                        <div class="row">

                            <div class="col-2">

                                <label for="mp_location">Location : </label>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control border-success rounded-pill" name="mp_location"
                                    id="mp_location"style="width: 100%">
                            </div>
                            @error('mp_location')
                                <span class="text-danger">Location Required</span>
                            @enderror

                        </div>

                    </div>

                </div>

                {{-- ---------------------------------------------------------------------------------------------------------------------------- --}}

                <div class="row mt-4">

                    <div class="col-3">

                    </div>

                    <div class="col-9 ">

                        <div class="row">

                            <div class="col-2">

                                <label for="mp_description">Description : </label>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control border-success rounded-pill"
                                    name="mp_description" id="mp_description"style="width: 100%">
                            </div>
                            @error('mp_description')
                                <span class="text-danger">Description Required</span>
                            @enderror

                        </div>

                    </div>

                </div>

                {{-- ----------------------------------------------------------------------------------------------------------------------- --}}

                <div class="row mt-4">

                    <div class="col-3">

                    </div>

                    <div class="col-4">

                        <div class="row">
                            <div class="col">
                                <label for="mp_property_tag">#tag :</label>
                            </div>
                            <div class="col">
                                <input type="text" class="text-center form-control border-success rounded-pill"
                                    name="mp_property_tag" id="mp_property_tag">
                            </div>
                        </div>

                    </div>

                    <div class="col-3">

                        <button type="button" onclick="mp_add_tag()" class="btn rounded-pill btn-outline-dark">
                            <span class="tf-icons bx bx-folder-plus"></span>&nbsp; Add #tag
                        </button>

                    </div>

                </div>

                {{-- ---------------------------------------------------------------------------------------------------------------------------- --}}

                <div class="row mt-4">

                    <div class="col-3">

                    </div>

                    <div class="col-9 ">

                        <div class="row">

                            <div class="col-2">

                                <label for="mp_related_tags">Related #tags : </label>
                            </div>

                            <div class="col" id="mp_related_tags">
                                {{-- 
                            <button class="btn border-dark rounded-pill mc-tag" type="button" id="beach"
                                onclick="mc_tag(this.id)" value="Beach">Beach <span
                                    class="tf-icons bx bx-X"></span></button> --}}

                            </div>

                        </div>

                    </div>

                </div>

                {{-- ---------------------------------------------------------------------------------------------------------------------------- --}}

            </div>


        </div>
    </form>
@endsection

@section('scripts')
    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(".custom-file-label").addClass("selected").html(fileName);
        });

        function mc_tag(id) {

            $('#' + id).remove();
            $('#hidden_' + id).remove();

        }

        function mc_add_tag() {

            var mc_tag_val = $("#mc_category_tag").val();

            if (mc_tag_val != '') {

                $('#mc_related_tags').append("<button type='button' class='btn border-dark rounded-pill mc-tag' id='" +
                    mc_tag_val +
                    "' onclick='mc_tag(this.id)' value='" + mc_tag_val + "'>" + mc_tag_val +
                    "<span class='tf-icons bx bx-X'></span></button>");

                $('#mc_related_tags').append("<input type='hidden' name='tags[]' id='hidden_" + mc_tag_val + "' value='" +
                    mc_tag_val + "'>");

                $('#mc_category_tag').val('');
            }

        }

        $(document).ready(function() {

            $('#mc_category').on('change', function() {
                var category_id = $(this).val();
                console.log(category_id);
                $("#mc_related_tags").empty();
                if (category_id != 0) {
                    $("#add_category").attr('disabled', true);
                    $("#delete_category").attr('disabled', false);
                    $("#edit_category").attr('disabled', false);

                    $.ajax({
                        type: "GET",
                        url: "{{ route('get_category') }}?category_id=" + category_id,
                        success: function(res) {
                            console.log(res);
                            if (res) {

                                // set category_name

                                $("#mc_category_name").val(res[0]['category_name']);

                                tags = res[0]['tags'].replace(/\./g, '').split(',');;

                                for (var i = 0; i < tags.length; i++) {
                                    $('#mc_related_tags').append(
                                        "<button type='button' class='btn border-dark rounded-pill mc-tag' id='" +
                                        tags[i] + "' onclick='mc_tag(this.id)' value='" +
                                        tags[i] + "'>" + tags[i] +
                                        "<span class='tf-icons bx bx-X'></span></button>");

                                    $('#mc_related_tags').append(
                                        "<input type='hidden' name='tags[]' id='hidden_mp_" +
                                        tags[i] + "' value=" + tags[i] + ">");


                                }

                            } else {
                                // $("#mc_category_image").empty();
                            }

                        }
                    });
                } else {
                    // $("#mc_category_image").empty();
                    console.log('empty');
                    $("#add_category").attr('disabled', false);
                    $("#delete_category").attr('disabled', true);
                    $("#edit_category").attr('disabled', true);
                    $("#mc_category_name").val('');
                    $("#mc_related_tags").val('');

                }
            });

        });
    </script>

    <script>
        function mp_tag(id) {

            $('#' + id).remove();
            $('#mp_hidden_' + id).remove();

        }

        function mp_add_tag() {

            var mp_tag_val = $("#mp_property_tag").val();

            if (mp_tag_val != '') {

                $('#mp_related_tags').append("<button type='button' class='btn border-dark rounded-pill mp-tag' id='" +
                    mp_tag_val +
                    "' onclick='mc_tag(this.id)' value='" + mp_tag_val + "'>" + mp_tag_val +
                    "<span class='tf-icons bx bx-X'></span></button>");

                $('#mp_related_tags').append("<input type='hidden' name='tags[]' id='mp_hidden_" + mp_tag_val +
                    "' value='" +
                    mp_tag_val + "'>");

                $('#mp_property_tag').val('');
            }

        }

        function edit(id) {

            $("#add_property").attr('disabled', true);
            $("#mp_edit_property").attr('disabled', false);
            $("#mp_delete_property").attr('disabled', false);

            var property_id = $("#" + id).val();

            $("#mp_property").val(property_id);

            $('html, body').animate({
                scrollTop: $("#manage_properties").offset().top
            }, 1000);

            $.ajax({
                type: "GET",
                url: "{{ route('get_property') }}?property_id=" + property_id,
                success: function(res) {
                    console.log(res);
                    if (res) {

                        // set category_name

                        $("#mp_category > option").each(function() {
                            if (this.value == res[0]['category_category_id']) {
                                $(this).prop('selected', true);
                            }
                        });

                        $("#mp_property_name").val(res[0]['property_name']);
                        $("#mp_description").val(res[0]['description']);
                        $("#mp_price").val(res[0]['price']);
                        $("#mp_location").val(res[0]['location']);

                        tags = res[0]['tags'].replace(/\./g, '').split(',');;

                        for (var i = 0; i < tags.length; i++) {
                            $('#mp_related_tags').append(
                                "<button type='button' class='btn border-dark rounded-pill mp-tag' id='" +
                                tags[i] + "' onclick='mc_tag(this.id)' value='" +
                                tags[i] + "'>" + tags[i] +
                                "<span class='tf-icons bx bx-X'></span></button>");

                            $('#mp_related_tags').append(
                                "<input type='hidden' name='tags[]' id='mp_hidden_" +
                                tags[i] + "' value=" + tags[i] + ">");


                        }


                    } else {
                        // $("#mc_category_image").empty();
                    }

                }
            });
        }

        $(document).ready(function() {

        });
    </script>
@endsection
