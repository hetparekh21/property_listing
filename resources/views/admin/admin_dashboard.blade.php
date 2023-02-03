@extends('layouts.layout')

{{-- <style>
    .row {
        border-block: 1px solid black;
    }
</style> --}}

@section('content')
    <div class="card mb-5" style="border-radius: 10px;">
        <img class="card-img-top" src="back_cat.svg"
            style="border-top-left-radius: 10px;border-top-right-radius:10px;height:20vh;object-fit:cover">
        <div class="card-body">

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

                    <button type="button" id="add_category" class="btn rounded-pill btn-outline-dark">
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
                            @if ($selected_category == $data['category_id'])
                                <option value="{{ $data['category_id'] }}" selected>
                                    {{ $data['category_name'] }}
                                </option>
                            @else
                                <option value="{{ $data['category_id'] }}">{{ $data['category_name'] }}
                                </option>
                            @endif
                        @endforeach``
                    </select>


                </div>

                <div class="col-2">

                    <div class="row mb-2">
                        <label style="visibility: hidden">placeholder</label>
                    </div>

                    <button type="button" id="edit_category" class="btn rounded-pill btn-outline-dark" disabled>
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
                        </div>
                    </div>

                </div>

                <div class="col-3">

                    <button type="button" id="delete_category" class="btn rounded-pill btn-outline-danger" disabled>
                        <span class="tf-icons bx bx-trash" ></span>&nbsp; Delete
                    </button>

                </div>

            </div>

            {{-- ------------------------------------------------------------------------------------------------------------------------------- --}}

            <div class="row mt-4">

                <div class="col-3">

                </div>

                <div class="col-4">

                    <div class="row">

                        <div class="col">
                            <label for="mc_category_image">Category Image :</label>
                        </div>
                        <div class="col">
                            <input type="text" class="text-center form-control border-success rounded-pill"
                                name="mc_category_image" id="mc_category_image" disabled>
                        </div>

                    </div>

                </div>

                <div class="col-3">

                    <button type="button" class="btn rounded-pill btn-outline-primary mr-5">
                        <span class="tf-icons bx bx-cloud-upload"></span>&nbsp; Upload
                    </button>

                    {{-- data:image/png;base64,{{ chunk_split(base64_encode($data['img'])) }} --}}
                    <img src="" id="cat_img" alt="...">

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
                        <div class="col">
                            <input type="text" class="form-control border-dark rounded-pill"
                                name="mc_related_tags" id="mc_related_tags"style="width: 100%">
                        </div>

                    </div>

                </div>

            </div>

            {{-- ---------------------------------------------------------------------------------------------------------------------------- --}}

        </div>

    </div>

    <div class="card mb-5" style="border-radius: 10px;">
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

                    <button type="button" class="btn rounded-pill btn-outline-dark">
                        <span class="tf-icons bx bx-folder-plus"></span>&nbsp; Add property
                    </button>

                </div>

                <div class="col-4">

                    <div class="row mb-2">
                        <label for="mc_category">Choose Category</label>
                    </div>

                    <select class="form-control border-success rounded-pill" style="width:100%" name="mc_category"
                        id="mc_category">
                        <option value="0" selected_category>Select Category</option>
                        @foreach ($categories as $data)
                            @if ($selected_category == $data['category_id'])
                                <option value="{{ $data['category_id'] }}" selected>
                                    {{ $data['category_name'] }}
                                </option>
                            @else
                                <option value="{{ $data['category_id'] }}">{{ $data['category_name'] }}
                                </option>
                            @endif
                        @endforeach``
                    </select>


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
                    </div>

                </div>

            </div>

            {{-- ------------------------------------------------------------------------------------------------------------------------------- --}}

            <div class="row mt-4">

                <div class="col-3">

                </div>

                <div class="col-4">

                    <div class="row">

                        <div class="col">
                            <label for="mc_category_image">Images :</label>
                        </div>

                        <div class="col">
                            <input type="text" class="text-center form-control border-success rounded-pill"
                                name="mc_category_image" id="mc_category_image" disabled>
                        </div>

                    </div>

                </div>

                <div class="col-3">


                    <div class="row overflow-auto">

                        <button type="button" class="btn rounded-pill btn-outline-primary mr-5">
                            <span class="tf-icons bx bx-cloud-upload"></span>&nbsp; Upload
                        </button>

                        {{-- data:image/png;base64,{{ chunk_split(base64_encode($data['img'])) }} --}}
                        <div class="col d-flex d-inline-block align-items-center justify-content-around">

                            <img src="" alt="...">
                            <img src="" alt="...">
                            <img src="" alt="...">
                            <img src="" alt="...">
                            <img src="" alt="...">
                            <img src="" alt="...">
                        </div>

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
                            <label for="mp_price">Price :</label>
                        </div>
                        <div class="col">
                            <input type="number" min="0" class="form-control border-success rounded-pill"
                                name="mp_price" id="mp_price" style="font-weight: bold">
                        </div>
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
                            <input type="text" class="form-control border-success rounded-pill" name="mp_description"
                                id="mp_description"style="width: 100%">
                        </div>

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

                            <label for="mp_related_tags">Related #tags : </label>
                        </div>
                        <div class="col">
                            <input type="text" class="text-center form-control border-dark rounded-pill"
                                name="mp_related_tags" id="mp_related_tags"style="width: 100%">
                        </div>

                    </div>

                </div>

            </div>

            {{-- ---------------------------------------------------------------------------------------------------------------------------- --}}

        </div>

    </div>
@endsection

@section('scripts')

<script>
    $(document).ready(function () {
        $('#mc_category').on('change', function () {
            var category_id = $(this).val();
            console.log(category_id);

            if (category_id != 0) {
                $("#add_category").attr('disabled', true);
                $("#delete_category").attr('disabled',false);
                $("#edit_category").attr('disabled',false);
                
                $.ajax({
                    type: "GET",
                    url: "{{ route('get_category') }}?category_id=" + category_id,
                    success: function (res) {
                        console.log(res);
                        if (res) {

                            // set category_name

                        
                            $("#mc_category_name").val(res[0]['category_name']);
                            $("#mc_related_tags").val(res[0]['tags']);

                        } else {
                            // $("#mc_category_image").empty();
                        }
                       
                    }
                });
            } else {
                // $("#mc_category_image").empty();
                console.log('empty');
                $("#add_category").attr('disabled', false);
                $("#delete_category").attr('disabled',true);
                $("#edit_category").attr('disabled',true);
                $("#mc_category_name").val('');
                $("#mc_related_tags").val('');

            }
        });

        // $('#mc_category').on('change', function () {
        //     var category_id = $(this).val();
        //     if (category_id) {
        //         $.ajax({
        //             type: "GET",
        //             url: "{{ route('get_category_img') }}?category_id=" + category_id,
        //             success: function (res) {
        //                 console.log(res);
        //                 if (res) {
        //                     $("#cat_img").empty();
        //                     // set src attibute
        //                     $("#cat_img").attr("src", "data:image/jpeg;base64,'"+res+"'");
                            

        //                 } else {
        //                     $("#mc_category_image").empty();
        //                 }
                       
        //             }
        //         });
        //     } else {
        //         $("#mc_category_image").empty();
        //     }
        // });

    });
</script>

@endsection
